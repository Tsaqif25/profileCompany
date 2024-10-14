<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Appointments') }}
            </h2>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
        @forelse ($appointements as $appointements)
                <div class="item-card flex flex-row justify-between items-center">
                    <div class="flex flex-row items-center gap-x-3">
                         <img src="{{ Storage::url($appointements->product->thumbnail) }}" alt="{{ $appointements->name }}" class="rounded-2xl object-cover w-[90px] h-[90px]"> 
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $appointements->name }}</h3>
                        </div>
                    </div> 
                    <div  class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Budget</p>
                        <h3 class="text-indigo-950 text-xl font-bold">{{ number_format($appointements->budget, 0, ',', '.') }}</h3>
                    </div>
                    <div  class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Date</p>
                        <h3 class="text-indigo-950 text-xl font-bold">{{ date('m/d/Y', strtotime($appointements->meeting_at)) }}</h3>
                    </div>
                    <div class="hidden md:flex flex-row items-center gap-x-3">
                        <a href="{{ route('admin.appointments.show', $appointements) }}" class="font-bold py-4 px-6 bg-green-600 text-white rounded-full">
                            Details
                        </a>                        
                            <a href="" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                                Edit
                            </a>
                            <form action="{{ route('admin.appointments.destroy' , $appointements)  }} " method="POST"> 
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-bold py-4 px-6 bg-red-700 text-white rounded-full" onclick="return confirm('Are you sure you want to delete this item?');">
                                    Delete
                                </button>
                            </form> 
                        </div>
                    
                </div> 
                @empty
                <p>Item Belum Tersedia</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
