<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Principle') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg"> 
                
                <form method="POST" action="{{ route('admin.principles.update', $principle->id) }}" enctype="multipart/form-data"> 
                    @csrf
                    @method('PUT')
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" 
                         value="{{ old('name', $principle->name) }}" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="thumbnail" :value="__('Thumbnail')" />
                        @if($principle->thumbnail)
                            <img src="{{ asset('storage/'.$principle->thumbnail) }}" alt="{{ $principle->name }}" class="rounded-2xl object-cover w-[90px] h-[90px]">
                        @endif
                        <x-text-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" autofocus autocomplete="thumbnail" />
                        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="icon" :value="__('Icon')" />
                        @if($principle->icon)
                            <img src="{{ asset('storage/'.$principle->icon) }}" alt="{{ $principle->name }}" class="rounded-2xl object-cover w-[90px] h-[90px]">
                        @endif
                        <x-text-input id="icon" class="block mt-1 w-full" type="file" name="icon" autofocus autocomplete="icon" />
                        <x-input-error :messages="$errors->get('icon')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="subtitle" :value="__('Subtitle')" />
                        <textarea name="subtitle" id="subtitle" cols="30" rows="5" class="border border-slate-300 rounded-xl w-full">{{ old('subtitle', $principle->subtitle) }}</textarea>
                        <x-input-error :messages="$errors->get('subtitle')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Update Principle
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>