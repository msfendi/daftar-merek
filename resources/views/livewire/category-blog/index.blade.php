<div>
    <div class="py-2">
        <div class="min-w-full  border-base-200 shadow overflow-x-auto">
            <div class="flex flex-row items-center justify-between">
                <x-admin.grid.search action="{{ route('admin.category-blog.index') }}" />
                @can('category-blog create')
                <x-admin.add-link href="{{ route('admin.category-blog.create') }}">
                    {{ __('Add Category Blog') }}
                </x-admin.add-link>
                @endcan
            </div>
            <x-admin.grid.table>
                <x-slot name="head">
                    <tr class="bg-base-200">
                        <x-admin.grid.th>
                            @include('admin.includes.sort-link', ['label' => 'Name', 'attribute' => 'name'])
                        </x-admin.grid.th>
                        @canany(['category-blog edit', 'category-blog delete'])
                        <x-admin.grid.th>
                            {{ __('Actions') }}
                        </x-admin.grid.th>
                        @endcanany
                    </tr>
                </x-slot>
                <x-slot name="body">
                    @foreach($categoryBlogs as $categoryBlog)
                    <tr>
                        <x-admin.grid.td>
                            <a href="{{route('admin.category-blog.show', $categoryBlog->id)}}" class="no-underline hover:underline text-cyan-600">{{ $categoryBlog->name }}</a>
                        </x-admin.grid.td>
                        @canany(['category-blog edit', 'category-blog delete'])
                        <x-admin.grid.td>
                            <form>
                                <div>
                                    @can('category-blog edit')
                                    <a href="{{route('admin.category-blog.edit', $categoryBlog->id)}}" class="btn btn-square btn-ghost">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </a>
                                    @endcan

                                    @can('category-blog delete')
                                    <button wire:click='destroy({{ $categoryBlog->id }})' class="btn btn-square btn-ghost" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">
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
                    @if($categoryBlogs->isEmpty())
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
</div>