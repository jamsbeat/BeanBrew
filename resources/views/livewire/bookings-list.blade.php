<div class="p-6">
    <input type="text" wire:model="search" placeholder="Search bookings..."
    class="my-4 rounded-lg h-8">

    <table>
        <div>

        </div>
        <tbody>
        @foreach($bookings as $booking)
        <div class="border-2 border-indigo-800 p-4 my-4">
            <div class="">
                <div class="flex justify-between">
                    <div class="text-white text-lg font-bold">
                        {{$booking->id}} {{ $booking->user->name }}
                    </div>
                    <div class="text-white font-thin text-sm">
                        {{ $booking->created_at }}
                    </div>
                </div>
                <div>
                    <div>

                    </div>
                </div>
            </div>
            <button>
                <div class="text-red-600"
                wire:click="remove({{$booking->id}})">Remove</div>
            </button>
        </div>
        @endforeach
        </tbody>
    </table>
    <div>
        {{ $bookings->links('pagination-links') }}
    </div>

</div>
