<div class="card h-100 mx-4" style="min-height: 351px">
    <img src="{{ $post->thumbnail }}" class="card-img-top" loading="lazy" alt="{{ $post->title }}"">
    <div class="card-body">
        <h5 class="card-title text-primary text-capitalize" style="font-size:18px; font-weight:500; letter-spacing:normal">
        {{ $post->title }}</h5>
        <a href="{{ route('event.detail', $post->slug) }}" class="card-text text-muted stretched-link">{{ \Str::limit($post->short_intro, 100) }}</a>
    </div>
</div>