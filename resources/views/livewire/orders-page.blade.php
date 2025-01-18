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
>>>>>>> e48eb2f28b1241ccf311f67bf4e73a68aba46e77
        </div>
    </div>

    <div class="bookings">
        <h3><u>Your Bookings:</u></h3>
        @foreach($bookings as $booking)
            <div class="booking-item">
                <div><strong>Booking Location:</strong> {{ $booking->location }}</div>
                <div><strong>Number of People:</strong> {{ $booking->people }}</div>
                <div><strong>Date of Booking:</strong> {{ $booking->date }}</div>
                <div><strong>Time of Booking:</strong> {{ $booking->time }}</div>
                <button class="text-red-600" wire:click="remove({{$booking->id}})">Remove
                </button>
                <hr>
            </div>
        @endforeach
    </div>
</div>
