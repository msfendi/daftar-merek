<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row gap-x-8">
            <a href="{{route('dashboard')}}" class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </a>

            <a href="{{route('pengumuman')}}" class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Pengumuman') }}
            </a>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white py-24 sm:py-32">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <div class="mx-auto max-w-2xl lg:mx-0">
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Blog Pengumuman</h2>
                        <p class="mt-2 text-lg leading-8 text-gray-600">Semua pemberitahuan akan muncul disini brow.</p>
                    </div>
                    <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">

                        @foreach($blogs as $blog)
                        @php
                        $category = \App\Models\CategoryBlog::findOrFail($blog->category_id)->name;
                        $user = \App\Models\User::findOrFail($blog->author_id)->name;
                        $image = App\Http\Controllers\Guest\BlogPagesController::defaultImage($blog->image);
                        @endphp
                        <article class="flex max-w-xl flex-col items-start justify-between">
                            <div class="flex">
                                <img class="mb-2 rounded " src="{{$image}}" alt="">
                            </div>
                            <div class="flex items-center gap-x-4 text-xs">
                                <time datetime="2020-03-16" class="text-gray-500">{{\Carbon\Carbon::parse($blog->created_at)->format('d/m/Y')}}</time>
                                <a href="#" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">{{$category}}</a>
                            </div>
                            <div class="group relative">
                                <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                    <a href="/pengumuman/{{ $blog->slug }}">
                                        <span class="absolute inset-0"></span>
                                        {{$blog->title}}
                                    </a>
                                </h3>
                                <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{{ $blog->content }}</p>
                            </div>
                            <div class="relative mt-8 flex items-center gap-x-4">
                                <img src="https://i.pinimg.com/736x/94/3b/bd/943bbdf32c4c7a5f86a37d3d6b48ecda.jpg" alt="" class="h-10 w-10 rounded-full bg-gray-50">
                                <div class="text-sm leading-6">
                                    <p class="font-semibold text-gray-900">
                                        <a href="#">
                                            <span class="absolute inset-0"></span>
                                            {{$user}}
                                        </a>
                                    </p>
                                    <p class="text-gray-600">Co-Founder / CTO</p>
                                </div>
                            </div>
                        </article>
                        @endforeach

                        <!-- More posts... -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>