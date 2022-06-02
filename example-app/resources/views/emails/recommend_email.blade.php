<div>
    <h1>Dear {{ $user->name }}</h1>
    <p>We try to send your email {{ $user->email }} at {{ now()->toDateTimeString() }} !</p>

    <b>Here is Recommended Post List</b>
    <ul>
        @foreach ($posts as $post)
            <li><a target="blank" href="{{ route('post.show', ['id' => $post->id]) }}">{{ $post->title }}</a></li>
        @endforeach
    </ul>
</div>
