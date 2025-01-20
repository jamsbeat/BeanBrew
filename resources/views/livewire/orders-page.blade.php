<div>
    <div>
        <div>
            <div class="text-xl font-semibold py-1 text-dark-brown">
                Your Orders
            </div>
        </div>
        <div>

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
