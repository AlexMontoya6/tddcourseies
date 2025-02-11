<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Videos') }} - {{ $video->course->title }}

        </h2>

        <h3>
            @foreach ($categories as $category)
                <a href="{{ route('pages.category-list', $category) }}"
                    class="text-lg font-semibold text-gray-900 hover:text-yellow-500">{{ $category->name }}</a>
            @endforeach
        </h3>
    </x-slot>
    <livewire:video-player :video="$video" />
</x-app-layout>
