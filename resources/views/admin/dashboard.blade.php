<x-admin.layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="pb-8">
        @role('admin')
        <livewire:admin.index>
            @endrole
    </div>
</x-admin.layout>