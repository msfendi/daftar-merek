<div class="w-full max-w-xl p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center justify-between mb-4">
        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Latest Customers</h5>
        <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
            View all
        </a>
    </div>
    <div class="flow-root">
        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
            @if(isset($trademark))
            @foreach($trademark as $merek)
            <div class="card">
                <li class="py-3 px-3 sm:py-4 sm:px-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="w-16 h-12 rounded-2xl" src="{{ $merek['_source']['image'][0]['image_path'] }}
                                " alt="Neil image">
                        </div>
                        <div class="flex-1 min-w-0 ms-4">
                            <p class="text-md font-bold text-gray-900 truncate dark:text-white mb-2">
                                {{ $merek['_source']['nama_merek'] }}

                            </p>
                            <div class="flex flex-row gap-x-2">
                                <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">{{ $merek['_source']['status_permohonan'] }}
                                </span>
                                <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">{{ $merek['_source']['nomor_permohonan'] }}</span>
                            </div>
                        </div>
                        <div class="inline-flex items-center">
                            <button type="button" wire:click="" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Detail</button>
                        </div>
                    </div>
                </li>
            </div>

            @endforeach
            @endif

        </ul>
    </div>
</div>