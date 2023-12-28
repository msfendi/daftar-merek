<div>

    <form wire:submit="store">
        @csrf

        <div class="py-2">
            <x-admin.form.label class="{{$errors->has('name') ? 'text-red-400' : ''}}">{{ __('Name') }}</x-admin.form.label>

            <x-admin.form.input class="{{$errors->has('name') ? 'border-red-400' : ''}}" type="text" wire:model="name" />
        </div>

        <div class="flex justify-end mt-4">
            <x-admin.form.button>{{ __('Create') }}</x-admin.form.button>
        </div>
    </form>

</div>