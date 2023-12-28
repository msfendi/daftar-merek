<div>
    @if (session('error'))
    <div class="alert alert-warning">
        {{ session('error') }}
    </div>
    @endif

    <form wire:submit="update">

        <div class="py-2">
            <x-admin.form.label class="{{$errors->has('nama_usaha') ? 'text-red-400' : ''}}">{{ __('Nama Usaha') }}</x-admin.form.label>
            <x-admin.form.input class="{{$errors->has('nama_usaha') ? 'border-red-400' : ''}}" type="text" wire:model.lazy="nama_usaha" />
        </div>

        @if ($nama_usaha != null)
        <div class="">
            <ul>
                @foreach ($data_merek as $merek)
                <li>
                    <p class="text-red-600">{{ $merek['nama'] }} || {{ $merek['similarity'] }}%</p>
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="py-2">
            <x-admin.form.label class="{{$errors->has('alamat_usaha') ? 'text-red-400' : ''}}">{{ __('Alamat Usaha') }}</x-admin.form.label>
            <x-admin.form.input class="{{$errors->has('alamat_usaha') ? 'border-red-400' : ''}}" type="text" wire:model="alamat_usaha" />
        </div>

        <div class="py-2">
            <x-admin.form.label class="{{$errors->has('pemilik_usaha') ? 'text-red-400' : ''}}">{{ __('Pemilik Usaha') }}</x-admin.form.label>
            <x-admin.form.input class="{{$errors->has('pemilik_usaha') ? 'border-red-400' : ''}}" type="text" wire:model="pemilik_usaha" />
        </div>

        <div class="py-2">
            <x-admin.form.label class="{{$errors->has('logo') ? 'text-red-400' : ''}}">{{ __('Logo Merek') }}</x-admin.form.label>
            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                    <input class="ml-24 mb-4" id="dropzone-file" type="file" wire:model="logo" />
                </label>
            </div>
        </div>

        <div class="py-2">
            <x-admin.form.label class="{{$errors->has('umk') ? 'text-red-400' : ''}}">{{ __('UMK') }}</x-admin.form.label>
            <x-admin.form.input class="{{$errors->has('umk') ? 'border-red-400' : ''}}" type="number" wire:model="umk" />
        </div>

        <div class="py-2">
            <x-admin.form.label class="{{$errors->has('ttd') ? 'text-red-400' : ''}}">{{ __('TTD') }}</x-admin.form.label>
            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                    <input class="ml-24 mb-4" id="dropzone-file" type="file" wire:model="ttd" />
                </label>
            </div>
        </div>

        <div class="flex justify-end mt-4">
            <x-admin.form.button>{{ __('Create') }}</x-admin.form.button>
        </div>
    </form>

</div>