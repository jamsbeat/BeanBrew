<div>
    <div>
        <div>
            <div>
                Your Orders
            </div>
        </div>
        <div>
            <div>
                Your Bookings
            </div>
            <div>
                @foreach($bookings as $booking)
                    <div>{{ $booking->location }} - {{ $booking->people }} - {{ $booking->date }} - {{ $booking->time }}</div>
                @endforeach
            </div>
        </div>
    </div>
</div>
