<div>
    <div class="flex flex-row justify-between items-center">
        <x-admin.grid.search action="{{ route('admin.permohonan.index') }}" />

        <button wire:click="export()" type='btn' class='btn btn-sm ml-4 inline-flex items-center px-4 py-2 bg-purple-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'>
            {{ __('Export') }}
        </button>

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
                            <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">{{ $permohonan->status }}</span>
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
                            <form>
                                <div>
                                    @can('permohonan edit')
                                    <button wire:click="checkId({{$permohonan->id}})" type="button" class="open-modal btn btn-square btn-ghost">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </button>
                                    @endcan
                                    @can('permohonan delete')
                                    <button wire:click='destroy({{ $permohonan->id }})' class="btn btn-square btn-ghost" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="w-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                                        </svg>
                                    </button>
                                    @endcan
                                </div>
                            </form>
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
    <div>
        <dialog id="my_modal_4" class="modal {{$showModal ? 'modal-open' : ''}}">
            <div class="modal-box flex flex-col gap-y-4">
                <div>
                    <h3 class="font-bold text-lg">Verifikasi Permohonan</h3>
                </div>
                <div>
                    <label class="form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text">Status Permohonan</span>
                        </div>
                        <select wire:model="status" class="select select-bordered">
                            @foreach($statusList as $stl)
                            <option value='{{$stl}}'>{{$stl}}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
                <div>
                    <textarea type="text" wire:model="keterangan" class="textarea textarea-bordered textarea-md w-full max-w-xl">{{$keterangan}}</textarea>
                </div>
                <div class="modal-action flex flex-row gap-x-3 items-center">
                    <form>
                        <!-- if there is a button, it will close the modal -->
                        <button type="button" class="btn btn-accent" wire:click="verificationPermohonan()">Simpan</button>
                        <form method="dialog">
                            <!-- if there is a button in form, it will close the modal -->
                            <button class="btn">Close</button>
                        </form>
                    </form>
                </div>
            </div>
        </dialog>
    </div>
</div>