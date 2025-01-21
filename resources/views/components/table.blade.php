<div class="card">
    <h5 class="card-header">{{ $title ?? 'Tags Table' }}</h5>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    @foreach ($headers as $header)
                    <th>{{ $header }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                {{ $slot }}
            </tbody>
        </table>

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
</div>
