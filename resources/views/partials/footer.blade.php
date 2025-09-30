<footer class="bg-white border-top py-3 mt-auto small text-muted">
    <div class="container d-flex flex-column flex-sm-row align-items-center justify-content-between gap-2">
        <div>
            &copy; {{ date('Y') }} {{ config('app.name','Aplikasi') }}. Semua hak dilindungi.
        </div>
        <div>
            <i class="bi bi-info-circle"></i> Versi Laravel {{ Illuminate\Foundation\Application::VERSION }} / PHP {{ PHP_VERSION }}
        </div>
    </div>
</footer>