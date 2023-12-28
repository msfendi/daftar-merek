<x-admin.wrapper>
    <x-slot name="title">
        {{ __('Permohonan') }}
    </x-slot>

    @can('permohonan-blog create')
    <x-admin.add-link href="{{ route('admin.permohonan.create') }}">
        {{ __('Add Permohonan') }}
    </x-admin.add-link>
    @endcan

    <livewire:permohonan.index>
</x-admin.wrapper>