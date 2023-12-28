<div>
    <div class="flex flex-row items-center justify-between">
        <x-admin.grid.search action="{{ route('admin.permohonan.index') }}" />
        @can('permohonan create')
        <x-admin.add-link href="{{ route('admin.permohonan.create') }}">
            {{ __('Add Permohonan') }}
        </x-admin.add-link>
        @endcan
    </div>
    <div class="py-2">
        <div class="min-w-full  border-base-200 shadow overflow-x-auto">
            <x-admin.grid.table>
                <x-slot name="head">
                    <tr class="bg-base-200">
                        <x-admin.grid.th>
                            @include('admin.includes.sort-link', ['label' => 'Nama Usaha', 'attribute' => 'name'])
                        </x-admin.grid.th>
                        <x-admin.grid.th>
                            @include('admin.includes.sort-link', ['label' => 'Alamat Usaha', 'attribute' => 'name'])
                        </x-admin.grid.th>
                        <x-admin.grid.th>
                            @include('admin.includes.sort-link', ['label' => 'Pemilik Usaha', 'attribute' => 'name'])
                        </x-admin.grid.th>
                        <x-admin.grid.th>
                            @include('admin.includes.sort-link', ['label' => 'Logo Usaha', 'attribute' => 'name'])
                        </x-admin.grid.th>
                        <x-admin.grid.th>
                            @include('admin.includes.sort-link', ['label' => 'Status Usaha', 'attribute' => 'name'])
                        </x-admin.grid.th>
                        @canany(['permohonan edit', 'permohonan delete'])
                        <x-admin.grid.th>
                            {{ __('Actions') }}
                        </x-admin.grid.th>
                        @endcanany
                    </tr>
                </x-slot>
                <x-slot name="body">
                    @foreach($permohonans as $permohonan)
                    <tr wire:key="{{ $permohonan->id }}">
                        <x-admin.grid.td>
                            <a href="{{route('admin.permohonan.show', $permohonan->id)}}" class="no-underline hover:underline text-cyan-600">{{ $permohonan->nama_usaha }}</a>
                        </x-admin.grid.td>
                        <x-admin.grid.td>
                            <a href="{{route('admin.permohonan.show', $permohonan->id)}}" class="no-underline hover:underline text-cyan-600">{{ $permohonan->alamat_usaha }}</a>
                        </x-admin.grid.td>
                        <x-admin.grid.td>
                            <a href="{{route('admin.permohonan.show', $permohonan->id)}}" class="no-underline hover:underline text-cyan-600">{{ $permohonan->pemilik_usaha }}</a>
                        </x-admin.grid.td>
                        <x-admin.grid.td>
                            <img class="h-24 max-w-xs" src="{{ $this->defaultImage($permohonan->logo) }}" />
                        </x-admin.grid.td>
                        <x-admin.grid.td>
                            @if($permohonan->status == 'diajukan')
                            <span class="inline-flex items-center rounded-sm bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">{{ $permohonan->status }}</span>
                            @elseif($permohonan->status == 'diterima')
                            <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-700/10">{{ $permohonan->status }}</span>
                            @elseif($permohonan->status == 'ditolak')
                            <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-700/10">{{ $permohonan->status }}</span>
                            @elseif($permohonan->status == 'perbaikan')
                            <span class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-700 ring-1 ring-inset ring-yellow-700/10">{{ $permohonan->status }}</span>
                            @endif
                        </x-admin.grid.td>
                        @canany(['permohonan edit', 'permohonan delete'])
                        <x-admin.grid.td>
                            <div class="inline-flex items-center rounded-sm shadow-sm">
                                @can('permohonan edit')
                                <a href="{{route('permohonan.edit', $permohonan->id)}}" class=" text-slate-800 hover:text-blue-600 text-sm bg-white hover:bg-slate-100 border border-slate-200 rounded-l-lg font-medium px-4 py-2 inline-flex space-x-1 items-center">
                                    <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </span>
                                </a>
                                @endcan
                                <button type="button" wire:click="showDetail({{$permohonan->id}})" class="text-slate-800 hover:text-blue-600 text-sm bg-white hover:bg-slate-100 border-y border-slate-200 font-medium px-4 py-2 inline-flex space-x-1 items-center">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </span>

                                </button>
                                @can('permohonan delete')
                                <button wire:click='destroy({{ $permohonan->id }})' class="text-slate-800 hover:text-blue-600 text-sm bg-white hover:bg-slate-100 border border-slate-200 rounded-r-lg font-medium px-4 py-2 inline-flex space-x-1 items-center">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </span>

                                </button>
                                @endcan
                            </div>

                        </x-admin.grid.td>
                        @endcanany
                    </tr>


                    @endforeach
                    @if($permohonans->isEmpty())
                    <tr>
                        <td colspan="2">
                            <div class="flex flex-col justify-center items-center py-4 text-lg">
                                {{ __('No Result Found') }}
                            </div>
                        </td>
                    </tr>
                    @endif
                </x-slot>
            </x-admin.grid.table>
        </div>

    </div>
    <dialog id="my_modal_4" class="modal {{$showTrademark ? 'modal-open' : ''}}">
        <div class="modal-box flex flex-col">
            <div class="flex flex-row">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-cyan-600">
                        Detail Permohonan
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-white">
                        This is some information about the trademark.
                    </p>
                </div>
            </div>

            <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                <dl class="sm:divide-y sm:divide-gray-200">
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-cyan-600">
                            Nama Usaha
                        </dt>
                        <dd class="mt-1 text-sm text-white sm:mt-0 sm:col-span-2">
                            {{$nama_usaha}}
                        </dd>
                    </div>
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-cyan-600">
                            Alamat Usaha
                        </dt>
                        <dd class="mt-1 text-sm text-white sm:mt-0 sm:col-span-2">
                            {{$alamat_usaha}}
                        </dd>
                    </div>
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-cyan-600">
                            Pemilik Usaha
                        </dt>
                        <dd class="mt-1 text-sm text-white sm:mt-0 sm:col-span-2">
                            {{$pemilik_usaha}}
                        </dd>
                    </div>
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-cyan-600">
                            UMK
                        </dt>
                        <dd class="mt-1 text-sm text-white sm:mt-0 sm:col-span-2">
                            {{$umk}}
                        </dd>
                    </div>

                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-cyan-600">
                            Logo Usaha
                        </dt>
                        <div class="flex-shrink-0 ">
                            <img class="w-16 h-12 rounded-2xl" src="{{ $this->defaultImage($logo_usaha) }}" alt="Neil image">
                        </div>
                    </div>
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-cyan-600">
                            Status Pengajuan
                        </dt>
                        <dd class="mt-1 text-sm text-white sm:mt-0 sm:col-span-2">
                            {{$status_usaha}}
                        </dd>
                    </div>
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-cyan-600">
                            Keterangan
                        </dt>
                        <dd class="mt-1 text-sm text-white sm:mt-0 sm:col-span-2">
                            {{$keterangan}}
                        </dd>
                    </div>
                </dl>
            </div>
            <div class="modal-action flex ">
                <form>
                    <!-- if there is a button in form, it will close the modal -->
                    <button wire:click="closeDetail()" type="button" class="btn">Close</button>
                </form>
            </div>
        </div>
    </dialog>
</div>