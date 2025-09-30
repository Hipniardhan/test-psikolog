@php
    $total = count($soals);
@endphp

@extends('layouts.app')
@section('content')
<div id="bigfive-app" class="mx-auto" style="max-width:700px;">
    <div class="card shadow-sm mb-3">
        <div class="card-body">
            <h4 class="card-title mb-3">Tes Big Five</h4>
            <div id="progress-bar" class="mb-3">
                <div class="progress">
                    <div class="progress-bar bg-gradient" role="progressbar" style="width: 0%" aria-valuenow="1" aria-valuemin="1" aria-valuemax="{{ $total }}" id="progress-bar-inner">Soal 1 dari {{ $total }}</div>
                </div>
            </div>
            <form id="bigfive-form" method="POST" action="{{ route('bigfive.submit') }}">
                @csrf
                @foreach($soals as $idx => $soal)
                    <div class="soal-card" data-index="{{ $idx }}" style="display: {{ $idx == 0 ? 'block' : 'none' }};">
                        <div class="card question-card mb-2">
                            <div class="card-body">
                                <strong class="d-block mb-2">{{ $idx+1 }}. {{ $soal->pertanyaan }}</strong>
                                <div class="mt-2">
                                    @foreach($jawaban[$soal->id] ?? [] as $jwb)
                                        <div class="form-check mb-1">
                                            <input class="form-check-input" type="radio" name="jawaban[{{ $soal->id }}]" value="{{ $jwb->id }}" id="jawaban-{{ $soal->id }}-{{ $jwb->id }}" required>
                                            <label class="form-check-label" for="jawaban-{{ $soal->id }}-{{ $jwb->id }}">
                                                {{ $jwb->jawaban_text }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="mt-4 d-flex justify-content-between">
                    <button type="button" class="btn btn-outline-secondary" id="prev-btn" disabled>Previous</button>
                    <button type="button" class="btn btn-primary" id="next-btn">Next</button>
                    <button type="submit" class="btn btn-success" id="submit-btn" style="display:none;">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const total = {{ $total }};
        let current = 0;
        const soalCards = document.querySelectorAll('.soal-card');
        const progressBar = document.getElementById('progress-bar-inner');
        const prevBtn = document.getElementById('prev-btn');
        const nextBtn = document.getElementById('next-btn');
        const submitBtn = document.getElementById('submit-btn');

        function updateView() {
            soalCards.forEach((card, idx) => {
                card.style.display = (idx === current) ? 'block' : 'none';
            });
            progressBar.style.width = ((current+1)/total*100) + '%';
            progressBar.innerText = `Soal ${current+1} dari ${total}`;
            prevBtn.disabled = current === 0;
            nextBtn.style.display = current < total-1 ? 'inline-block' : 'none';
            submitBtn.style.display = current === total-1 ? 'inline-block' : 'none';
        }

        prevBtn.addEventListener('click', function() {
            if(current > 0) current--;
            updateView();
        });
        nextBtn.addEventListener('click', function() {
            if(current < total-1) current++;
            updateView();
        });
        updateView();
    });
</script>
@endsection
