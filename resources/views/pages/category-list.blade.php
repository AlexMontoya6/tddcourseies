<x-guest-layout :page-title="config('app.name') . ' - Category-List'">
    <div class="relative bg-gray-50 py-16 sm:py-24 lg:py-32">
        <div class="relative">
            <div class="mx-auto max-w-md px-4 text-center sm:max-w-3xl sm:px-6 lg:max-w-7xl lg:px-8">
                <h2 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Cursos asociados a la
                    categoria {{ $category->name }}</h2>
            </div>
            <div class="mx-auto mt-12 grid max-w-md gap-8 px-4 sm:max-w-lg sm:px-6 lg:max-w-7xl lg:grid-cols-3 lg:px-8">
                @foreach ($courses as $course)
                    @include('partials.home-course-item')
                @endforeach
                <livewire:create-category-button :coursesAll="$coursesAll" />

            </div>
        </div>
    </div>
</x-guest-layout>
