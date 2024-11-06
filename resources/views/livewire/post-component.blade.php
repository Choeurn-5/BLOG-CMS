<div>
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="createPost">
        <input type="text" wire:model="title" placeholder="Title">
        <textarea wire:model="content" placeholder="Content"></textarea>
        <button type="submit">Create Post</button>
    </form>

    <h2>Posts</h2>
    <ul>
        @foreach($posts as $post)
            <li>
                <h3>{{ $post->title }}</h3>
                <p>{{ $post->content }}</p>
                <button wire:click="editPost({{ $post->id }})">Edit</button>
                <button wire:click="deletePost({{ $post->id }})">Delete</button>
            </li>
        @endforeach
    </ul>
</div>
