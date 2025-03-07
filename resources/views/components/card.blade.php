<div class="card">
    <h5 class="card-header">{{ $title ?? 'Grid Card' }}</h5>
    <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
        {{ $slot }}
    </div>

    @if(isset($pagination))
    <nav class="mt-2">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                {{ $pagination }}
            </li>
        </ul>
    </nav>
    @endif
</div>
