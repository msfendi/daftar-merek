<x-admin.wrapper>
    <x-slot name="title">
        {{ __('Kategori Pengumuman') }}
    </x-slot>

    <div>
        <x-admin.breadcrumb href="{{route('admin.category-blog.index')}}" title="{{ __('Update kategori') }}">{{ __('<< Back to all Category') }}</x-admin.breadcrumb>
        <x-admin.form.errors />
    </div>
    <div class="w-full py-2 overflow-hidden">

        <livewire:category-blog.edit :categoryBlog="$categoryBlog">
    </div>
</x-admin.wrapper>