<div>
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
            <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <!-- <div class="flex flex-col"> -->
                    <div class="max-w-xl mx-auto py-8">
                        <livewire:guest.dashboard>

                            <livewire:guest.daftar-merek>
                    </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </x-app-layout>
</div>