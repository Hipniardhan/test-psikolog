<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class SoalController extends Controller
{
    public function index()
    {
        $soals = DB::table('kepribadian_soals')->orderByDesc('id')->paginate(15);
        return view('admin.soal.index', compact('soals'));
    }

    public function create()
    {
        return view('admin.soal.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'tipe' => 'required|in:bigfive,mbti,mmpi',
            'pertanyaan' => 'required|string',
            'jawaban.*.text' => 'required|string',
            'jawaban.*.bobot' => 'required|integer'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        DB::beginTransaction();
        try {
            $soalId = DB::table('kepribadian_soals')->insertGetId([
                'tipe' => $data['tipe'],
                'pertanyaan' => $data['pertanyaan'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            if (!empty($data['jawaban'])) {
                foreach ($data['jawaban'] as $j) {
                    if (!empty($j['text'])) {
                        DB::table('kepribadian_jawaban')->insert([
                            'soal_id' => $soalId,
                            'jawaban_text' => $j['text'],
                            'bobot' => (int)$j['bobot'],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }
            }
            DB::commit();
            return redirect()->route('admin.soal.index')->with('success','Soal berhasil ditambahkan');
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Error saving soal: '.$e->getMessage());
            return back()->with('error','Gagal menyimpan soal')->withInput();
        }
    }

    public function edit($id)
    {
        $soal = DB::table('kepribadian_soals')->find($id);
        abort_unless($soal, 404);
        $jawaban = DB::table('kepribadian_jawaban')->where('soal_id',$id)->get();
        return view('admin.soal.edit', compact('soal','jawaban'));
    }

    public function update(Request $request, $id)
    {
        $soal = DB::table('kepribadian_soals')->find($id);
        abort_unless($soal, 404);
        $data = $request->all();
        $validator = Validator::make($data, [
            'tipe' => 'required|in:bigfive,mbti,mmpi',
            'pertanyaan' => 'required|string',
            'jawaban.*.id' => 'nullable|integer',
            'jawaban.*.text' => 'required|string',
            'jawaban.*.bobot' => 'required|integer'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        DB::beginTransaction();
        try {
            DB::table('kepribadian_soals')->where('id',$id)->update([
                'tipe' => $data['tipe'],
                'pertanyaan' => $data['pertanyaan'],
                'updated_at' => now(),
            ]);
            // Remove existing answers and reinsert (simpler approach)
            DB::table('kepribadian_jawaban')->where('soal_id',$id)->delete();
            foreach ($data['jawaban'] as $j) {
                if (!empty($j['text'])) {
                    DB::table('kepribadian_jawaban')->insert([
                        'soal_id' => $id,
                        'jawaban_text' => $j['text'],
                        'bobot' => (int)$j['bobot'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('admin.soal.index')->with('success','Soal diperbarui');
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Error updating soal: '.$e->getMessage());
            return back()->with('error','Gagal memperbarui soal')->withInput();
        }
    }

    public function destroy($id)
    {
        DB::table('kepribadian_soals')->where('id',$id)->delete();
        return redirect()->route('admin.soal.index')->with('success','Soal dihapus');
    }
}
