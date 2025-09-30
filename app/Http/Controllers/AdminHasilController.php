<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminHasilController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');
        $hasil = DB::table('kepribadian_hasil as h')
            ->leftJoin('users as u','u.id','=','h.user_id')
            ->select('h.*','u.name as user_name','u.email')
            ->when($q, function($query) use ($q) {
                $query->where('u.name','like',"%$q%")
                      ->orWhere('u.email','like',"%$q%")
                      ->orWhere('h.interpretasi','like',"%$q%");
            })
            ->orderByDesc('h.tanggal_tes')
            ->paginate(20)
            ->withQueryString();

        return view('admin.hasil.index', compact('hasil','q'));
    }

    public function destroy($id)
    {
        DB::table('kepribadian_hasil')->where('id',$id)->delete();
        return back()->with('success', 'Hasil tes dihapus');
    }
}
