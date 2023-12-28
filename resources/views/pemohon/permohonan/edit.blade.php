<x-admin.wrapper>
    <x-slot name="title">
        {{ __('Permohonan') }}
    </x-slot>

    <div>
        <x-admin.breadcrumb href="{{route('permohonan.index')}}" title="{{ __('Update Permohonan') }}">{{ __('<< Back to all Permohonan') }}</x-admin.breadcrumb>
        <x-admin.form.errors />
    </div>
    <div class="w-full py-2 overflow-hidden">

        <livewire:permohonan.edit :permohonan="$permohonans">
    </div>
</x-admin.wrapper>