<h1>Hasil Tes Big Five</h1>
@if($hasil)
    <p>Total Skor: <strong>{{ $hasil->total_skor }}</strong></p>
    <p>Interpretasi: <strong>{{ $hasil->interpretasi }}</strong></p>
    <p>Tanggal Tes: {{ $hasil->tanggal_tes }}</p>
@else
    <p>Data hasil tidak ditemukan.</p>
@endif