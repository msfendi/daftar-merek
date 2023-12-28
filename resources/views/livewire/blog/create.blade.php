<div>

    <form wire:submit="store">

        <div class="py-2">
            <x-admin.form.label class="{{$errors->has('title') ? 'text-red-400' : ''}}">{{ __('Title') }}</x-admin.form.label>
            <x-admin.form.input class="{{$errors->has('title') ? 'border-red-400' : ''}}" type="text" wire:model.lazy="title" />
        </div>

        <div class="py-2">
            <x-admin.form.label class="{{$errors->has('slug') ? 'text-red-400' : ''}}">{{ __('Slug-Link') }}</x-admin.form.label>
            <x-admin.form.input class="{{$errors->has('slug') ? 'border-red-400' : ''}}" type="text" wire:model="slug" />
        </div>

        <div class="py-2">
            <x-admin.form.label class="{{$errors->has('content') ? 'text-red-400' : ''}}">{{ __('Content') }}</x-admin.form.label>
            <textarea class="input input-bordered w-full" wire:model="content"></textarea>
        </div>

        <div class="py-2">
            <x-admin.form.label class="{{$errors->has('author') ? 'text-red-400' : ''}}">{{ __('Author') }}</x-admin.form.label>
            <x-admin.form.input class="{{$errors->has('author') ? 'border-red-400' : ''}}" type="text" wire:model="author" disabled />
        </div>

        <div class="py-2">
            <x-admin.form.label class="{{$errors->has('category') ? 'text-red-400' : ''}}">{{ __('Ketegori Pengumuman') }}</x-admin.form.label>
            <select wire:model="category_blog_id" id="category" class="bg-dark-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option>Choose a category</option>
                @foreach($categoryBlogs as $categoryBlog)
                <option value="{{$categoryBlog->id}}">{{$categoryBlog->name}}</option>
                @endforeach
            </select>

        </div>

        <div class="py-2">
            <x-admin.form.label class="{{$errors->has('image') ? 'text-red-400' : ''}}">{{ __('Image Content') }}</x-admin.form.label>

            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                    <input id="dropzone-file" type="file" class="hidden" wire:model="image" />
                </label>
            </div>



        </div>

        <div class="flex justify-end mt-4">
            <x-admin.form.button>{{ __('Create') }}</x-admin.form.button>
        </div>
    </form>

</div>