<div>
    <div>
        <div>
            <div class="text-xl font-semibold py-1 text-dark-brown">
                Your Orders
            </div>
        </div>
        <div>
            <div class="text-lg font-semibold py-1 text-dark-brown">
                Your Bookings
            </div>
            <div>
                @foreach($bookings as $booking)
                    <div>
                        <div>
                            <div>
                                {{ $booking->user->name }}

                                {{ $booking->location }}

                                {{ $booking->created_at }}
                            </div>
                        </div>
                        <button>
                            <div class="text-red-600"
                            wire:click="remove({{$booking->id}})">Remove</div>
                        </button>
                    </div>
                @endforeach
                <div class="pt-2">
                    {{ $bookings->links('pagination-links') }}
                </div>
            </div>
        </div>
    </div>
</div>
