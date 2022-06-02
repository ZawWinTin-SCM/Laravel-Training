<x-app-layout>
    @if ($post)
        <div class="w-full px-5 py-3">
            <div class="flex justify-center">
                <h2 class="text-lg font-semibold pb-1">{{ $post->title }}</h2>
            </div>
            <p class="text-gray-500">{{ $post->body }}</p>
            <div class="flex justify-end">
                <span class="text-cyan-500">{{ $post->user->name }}</span>
            </div>
            <div class="flex items-center justify-center">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex items-center"
                    id="votes" @click="vote()">
                    <span class="mr-2">
                        <span id="voteCount">{{ $post->no_of_votes }}</span>
                        Votes
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>
    @endif

    @section('scripts')
        <script>
            var alpineData = {
                voteLink: "{{ route('post.vote') }}",
                postId: {{ $post->id }},
            }
        </script>
        <script src="{{ mix('/js/post/show.js') }}"></script>
    @endsection
</x-app-layout>
