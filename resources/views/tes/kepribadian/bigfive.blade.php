<h1>Big Five Test</h1>
<form method="POST" action="{{ route('bigfive.submit') }}">
	@csrf
	@foreach($soals as $soal)
		<div style="margin-bottom:20px">
			<strong>{{ $loop->iteration }}. {{ $soal->pertanyaan }}</strong><br>
			@foreach($jawaban[$soal->id] ?? [] as $jwb)
				<label>
					<input type="radio" name="jawaban[{{ $soal->id }}]" value="{{ $jwb->id }}" required>
					{{ $jwb->jawaban_text }}
				</label><br>
			@endforeach
		</div>
	@endforeach
	<button type="submit">Submit</button>
</form>