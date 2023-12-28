<x-admin.wrapper>
    <x-slot name="title">
        {{ __('Pengumuman') }}
    </x-slot>

    <div>
        <x-admin.breadcrumb href="{{route('admin.blog.index')}}" title="{{ __('Create Pengumuman') }}">{{ __('<< Back to all Pengumuman') }}</x-admin.breadcrumb>
        <x-admin.form.errors />
    </div>
    <div class="w-full py-2 overflow-hidden">

        <livewire:blog.create>
    </div>
</x-admin.wrapper>