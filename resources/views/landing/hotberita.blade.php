@forelse ($hotberita as $item)
<div class="media">
    <div class="media-body">
        <h5 class="mt-0" style="white-space: nowrap; width: 100%; overflow: hidden;text-overflow: ellipsis;">
            <a href="{{ route('landingdetailberita', $item->id) }}">{{ $item->title }}</a>
        </h5>
        <div class="blog-meta">
            <ul class="list-inline">
                <li>{{ $item->created_at->diffForHumans() }}</li>
            </ul>
        </div><!-- end blog-meta -->
    </div>
</div>
@empty
<h5 class="mt-0">berita kosong</h5>
@endforelse