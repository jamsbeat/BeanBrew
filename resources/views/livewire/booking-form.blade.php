<div class="max-w-lg mx-auto p-4 bg-white shadow rounded">
    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit="save" class="space-y-4">
        <!-- Location Select -->
        <div>
            <label for="location" class="block font-medium text-gray-700">Location</label>
            <select id="location" wire:model="location" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                <option value="">Select a location</option>
                <option value="Harrogate">Harrogate</option>
                <option value="Sheffield">Sheffield</option>
                <option value="Leeds">Leeds</option>
            </select>
            @error('location') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="people" class="block font-medium text-gray-700">Number of People</label>
            <input id="people" type="number" wire:model="people" min="1" max="8" placeholder="1" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
            @error('location') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Date Picker -->
        <div>
            <label for="booking_date" class="block font-medium text-gray-700">Date</label>
            <input type="date" id="booking_date" wire:model="booking_date" min="2024-24-02" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm "  required>
            @error('booking_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Time Picker -->
        <div>
            <label for="booking_time" class="block font-medium text-gray-700">Time</label>
            <input type="time" id="booking_time" wire:model="booking_time" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            @error('booking_time') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Submit Booking
            </button>
        </div>

        <script>
            window.addEventListener('bookingAdded', event => {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-start",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: "success",
                    title: "Booking added successfully!"
                });
            });
        </script>
    </form>
</div>
