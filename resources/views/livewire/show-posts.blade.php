<div wire:poll.60s="refreshPosts">
    <div class="d-flex">
        <h3 class="me-5">kanye.rest </h3>
        <button class="btn btn-primary btn-sm" wire:click="refreshPosts">Refresh Posts</button>
    </div>
    <div>
        @foreach ($posts as $post)
            <li> {!! $post !!}
            </li>
        @endforeach
    </div>
</div>
