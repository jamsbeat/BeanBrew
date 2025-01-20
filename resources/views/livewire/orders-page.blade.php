<div>
    <div>
=======
        <div class="text-xl font-bold py-1 text-dark-brown">
            Your Orders
        </div>
    </div>
>>>>>>> 26e1af7dded11126b40fe1a08e380008c5de4dab


    <div class="bookings">
        <h3 class="py-1 text-xl font-bold text-dark-brown">Your Bookings</h3>

        <div class="flex justify-center w-full">
            {{ $bookings->links('pagination-brown') }}
        </div>
        @foreach($bookings as $booking)
            <div class="rounded-x-xl rounded-b-xl p-4 my-4 border-b-1 shadow-lg border-t border-gray-400">
                <div class="">
                    <div class="flex justify-between">
                        <div class="text-warm-brown text-lg font-bold">
                            {{ $booking->time }} <br>
                            {{ $booking->date }}
                        </div>
                        <div class="text-2xl text-dark-brown font-semibold">
                            {{ $booking->location }}
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <div class="text-gray-400 py-1 text-sm">
                            {{ $booking->people }} Person(s)
                        </div>
                        <div></div>
                    </div>
                    <div class="flex justify-between items-center pt-2">
                        <button>
                            <div class="text-red-600"
                                 wire:click="remove({{$booking->id}})">Remove
                            </div>
                        </button>
                        <div>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
