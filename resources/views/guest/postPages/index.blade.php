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
            <div class="bg-white py-8 sm:py-8">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <div class="font-[sans-serif] text-gray-800 bg-gray-100 px-6 py-12">
                        <div class="grid lg:grid-cols-2 gap-8 max-lg:max-w-2xl mx-auto">
                            @php
                            $user = \App\Models\User::findOrFail($singlePost->author_id)->name;
                            $image = App\Http\Controllers\Guest\BlogPagesController::defaultImage($singlePost->image);
                            @endphp
                            <div class="text-left">
                                <h2 class="text-4xl font-extrabold mb-6">{{ $singlePost->title }}</h2>
                                <span class="text-sm block text-gray-400 mb-2">{{ \Carbon\Carbon::parse($singlePost->created_at)->format('d/m/Y') }} | {{$user}}</span>
                                <p class="mb-4 text-sm">{{ $singlePost->content }}</p>
                                <br>
                                <p class="mb-4 text-sm">{{ $singlePost->content }}</p>

                            </div>

                            <div class="flex justify-center items-center">
                                <img src="{{$image}}" alt="Placeholder Image" class="rounded-lg object-cover sm:w-[25rem]" />
                            </div>
                        </div>
                    </div>
                    <!-- <div class="mx-auto max-w-2xl lg:mx-0">
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Blog Pengumuman</h2>
                        <p class="mt-2 text-lg leading-8 text-gray-600">Semua pemberitahuan akan muncul disini brow.</p>
                    </div> -->
                </div>

                <!-- <div class="mx-auto">
                        <article class="flex flex-col items-start justify-between">
                            <div class="relative isolate overflow-hidden bg-white px-6 py-8 lg:overflow-visible lg:px-0">
                                <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-2 lg:mx-0 lg:max-w-none lg:grid-cols-2">
                                    <div class="lg:col-span-2 lg:col-start-1 lg:row-start-1 lg:mx-auto lg:grid lg:w-full lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
                                        <div class="lg:pr-4">
                                            <div class="lg:max-w-lg">
                                                <p class="text-base font-semibold leading-7 text-indigo-600">{{ $singlePost->author_id }}</p>
                                                <h1 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl"></h1>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                    $image = App\Http\Controllers\Guest\BlogPagesController::defaultImage($singlePost->image);
                                    @endphp
                                    <div class="-ml-12 -mt-12 p-12 lg:sticky lg:top-4 lg:col-start-2 lg:row-span-2 lg:row-start-1 lg:overflow-hidden">
                                        <img class="rounded-xl bg-gray-900 shadow-xl ring-1 ring-gray-400/10 sm:w-[25rem]" src="{{ $image  }}" alt="">
                                    </div>
                                    <div class="lg:col-span-2 lg:col-start-1 lg:row-start-2 lg:mx-auto lg:grid lg:w-full lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
                                        <div class="lg:pr-4">
                                            <div class="max-w-xl text-base leading-7 text-gray-700 lg:max-w-lg">
                                                <p>{{ $singlePost->content }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </article>

                    </div> -->
            </div>
        </div>
    </div>
    </div>
</x-app-layout>