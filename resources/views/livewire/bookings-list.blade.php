<div class="p-6">
    <input type="text" wire:model.live="search" placeholder="Search bookings..."
    class="my-4 rounded-lg h-10 border-2 border-indigo-800">

    <div>
        <div>
            <div class="">
                @foreach($bookings as $booking)
                <div class="rounded-xl p-4 my-4 border-b-1 shadow-xl">
                    <div class="">
                        <div class="flex justify-between">
                            <div class="text-indigo-700 text-lg font-bold">
                                {{$booking->id}} {{ $booking->user->name }}
                            </div>
                            <div class="text-gray-400 font-thin text-xs">
                                Created : {{ $booking->created_at }}
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <div class="text-white py-1 text-sm">
                                {{ $booking->people }} Person(s)
                            </div>
                            <div class="text-xl text-white">
                                {{ $booking->location }}
                            </div>
                        </div>
                        <div class="flex justify-between items-center pt-2">
                            <button>
                                <div class="text-red-600"
                                     wire:click="remove({{$booking->id}})">Remove</div>
                            </button>
                            <div class="text-white text-xs font-bold">
                                {{ $booking->time }} {{ $booking->date }}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="flex justify-center w-full">
                    {{ $bookings->links('pagination-links') }}
                </div>
            </div>
        </div>
    </div>
</div>
