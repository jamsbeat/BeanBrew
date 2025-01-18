<style>
    .container {
        display: flex;
        justify-content: space-between;
        padding: 20px;
    }

    .orders {
        background-color: #f9f9f9;
        width: 45%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .bookings {
        background-color: #f1f1f1;
        width: 45%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .booking-item {
        margin-bottom: 10px;
    }

    .booking-item hr {
        border: none;
        border-top:5px solid #ddd;
        margin-top: 15px;
        margin-bottom: 10px;
    }
</style>

<div class="container">
    <div class="orders">
        <h3><u>Your Orders:</u></h3>
        <div>Order 1: Details...
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
