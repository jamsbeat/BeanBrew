<div>
    <div>
        <div class="text-xl font-bold py-1 text-dark-brown">
            Your Orders
        </div>
    </div>

    <div class="bookings">
        <h3 class="py-1 text-xl font-bold text-dark-brown">Your Bookings</h3>

        <div class="flex justify-center w-full">
            {{ $bookings->links('pagination-brown') }}
        </div>

        @foreach($bookings as $booking)
            <div class="rounded-x-xl rounded-b-xl p-4 my-4 border-b-1 shadow-lg border-t border-gray-400">
                <div class="">
                    <div class="flex justify-between">
                        <div class="text-warm-brown text-xl font-extrabold">
                            {{ $booking->time }} <br>
                            {{ $booking->date }}
                        </div>
                        <div class="flex items-center text-2xl text-dark-brown font-semibold pr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6 text-warm-brown">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                            </svg>
                            {{ $booking->location }}
                        </div>
                    </div>
                    <div class="flex justify-between"
                         x-data="{ isExpanded: false }">
                        <div class="text-gray-400 py-1 text-sm">
                            {{ $booking->people }} Person(s)
                        </div>
                    </div>
                    <div class="flex justify-between items-center pt-2"
                         x-data="{ isOpen: false, openedWithKeyboard: false }" class="relative" @keydown.esc.window="isOpen = false, openedWithKeyboard = false">
                        <button>
                            <div class="text-red-600 text-sm font-thin"
                                 wire:click="remove({{$booking->id}})">Remove
                            </div>
                        </button>

                        <button class="flex items-center text-dark-brown hover:bg-warm-brown hover:text-white rounded-md px-3 py-2 my-2 text-sm font-medium" :class="isOpen  ?  'bg-warm-brown text-white'  :  ''"
                                type="button" @click="isOpen = ! isOpen">Message
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke="currentColor" class="size-4 shrink-0 transition px-0.5" aria-hidden="true" :class="isOpen  ?  'rotate-180 '  :  ''">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                            </svg>
                        </button>
                        <div x-cloak x-show="isOpen || openedWithKeyboard" x-transition @click.outside="isOpen = false, openedWithKeyboard = false" @keydown.down.prevent="$focus.wrap().next()" @keydown.up.prevent="$focus.wrap().previous()"
                        class="absolute right-[154px] mt-[160px] w-1/4">
                            <div class="text-start bg-warm-brown p-3 rounded-md text-white text-base">{{$booking->message}}</div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
