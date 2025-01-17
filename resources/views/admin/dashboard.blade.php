<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-slot name="header2">
        <h3 class="text-sm font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Information about the page...') }}
        </h3>
    </x-slot>

    <div class="p-8 bg-white shadow-xl rounded-xl">
        <div class="grid grid-cols-2 bg-gray-800 sm:rounded-t-lg">
            <section class="">
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  p-4">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg p-4 px-2">
                            <div class="p-2 text-2xl dark:text-white font-bold font-poppins border-b-2 border-indigo-600">
                                Orders
                            </div>
                            <div class="p-2 mt-2 dark:text-white">
                                list of orders
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="">
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-4">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg p-4 px-2">
                            <div class="p-2 text-2xl dark:text-white font-bold font-poppins border-b-2 border-indigo-600">
                                Bookings
                            </div>
                            <div class="p-2 mt-2 dark:text-white">
                                <div class="grid">
                                    @foreach($bookings as $booking)
                                        <div class="py-4">
                                            <div>{{ $booking->user->name }}</div>
                                            <div>{{ $booking->location }}</div>
                                            <div>{{ $booking->date }}</div>
                                            <div>{{ $booking->time }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <section class="sm:rounded-b-lg shadow-xl">
            <div class="py-12 round-b-lg bg-gray-800">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-4 bg-gray-800">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg p-4 px-2">
                        <div class="p-2 text-2xl dark:text-white font-bold font-poppins border-b-2 border-indigo-600">
                            Something
                        </div>
                        <div class="p-2 mt-2 dark:text-white">
                            list of something
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</x-admin-layout>
