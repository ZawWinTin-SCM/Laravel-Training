<x-app-layout>
    <div class="block px-12 py-6">
        @forelse($posts as $post)
            <div class="w-full lg:max-w-full lg:flex border border-gray-400 mb-3">
                <div
                    class="bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                    <div class="mb-8">
                        <div class="text-gray-900 font-bold text-xl mb-2">{{ $post->title }}</div>
                        <p class="text-gray-700 text-base">
                            {{ $post->body }}
                        </p>
                    </div>
                    <div class="flex items-center">
                        <div class="text-sm">
                            <p class="text-gray-900 leading-none">{{ $post->user->name }}</p>
                            <p class="text-gray-600">{{ $post->created_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="w-full lg:max-w-full flex items-center">
                <span class="text-gray-600">Post is not exist</span>
            </div>
        @endforelse
    </div>
</x-app-layout>
