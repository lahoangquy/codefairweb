<div class="col mb-4">
    <div class="card h-100">
        <div class="card-image">
            <img src="{{ $post->thumbnail }}" class="card-img-top" loading="lazy" alt="{{ $post->title }}">
        </div>
        <div class="card-body">
            <h5 class="card-title text-primary text-capitalize" style="font-size:18px;">{{ $post->title }}</h5>
            <a href="{{ $post->buildRoute() }}" class="card-text text-muted stretched-link">{{ \Str::limit($post->short_intro, 90) }}</a>
        </div>
    </div>
</div>