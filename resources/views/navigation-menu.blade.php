<div>
    @if (request()->is('/'))
            <div class="grid object-center overflow-hidden h-screen content-center bg-black items-center">
                <img src="https://wallpapers.com/images/hd/coffee-beans-with-leaves-xjack9rx9v60yf8l.jpg" class="w-fit h-auto blur-sm">
                <h3 id="bean-brew" class="pr-8 text-white text-8xl border-r-[28px] font-poppins font-bold pl-12 border-white">
                    Bean <br> & <br> Brew
                </h3>
            </div>
            <div class="">
        </div>
        <style>
            #bean-brew { position: absolute; opacity: 1; transition: opacity 1.5s ease; }
        </style>
        <script>
            window.addEventListener('scroll', () => {
                const el = document.getElementById('bean-brew');
                const { top, bottom } = el.getBoundingClientRect();
                el.style.opacity = (top < 0 || bottom > window.innerHeight) ? 0 : 1;
            });
        </script>
        @endif
        <nav class="bg-dark-brown sticky top-0 z-40 shadow-md border-b-2 border-warm-brown">
            <div class="-mx-auto max-w-full px-2 sm:px-6 lg:px-8">
                <div class="flex h-20 items-center justify-between">
                    <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                        <div class="flex-shrink-0">
                            <a href="/"><img class="h-14 w-auto pb-2" src="{{ asset('images/coffeelogo.png') }}"  alt="F1"></a>
                        </div>
                        <div class="hidden sm:ml-6 sm:block">
                            <div class="flex space-x-4">
                                <a href="/" class=" {{ request()->is('/')? 'bg-warm-brown text-white': ' text-white hover:bg-warm-brown hover:text-gray-200'}} rounded-md px-3 py-2 my-2 text-sm font-medium" aria-current="page">Home</a>
                                <a href="/menu" class="{{ request()->is('menu')? 'bg-warm-brown text-white': ' text-white hover:bg-warm-brown hover:text-gray-200'}} rounded-md px-3 py-2 my-2 text-sm font-medium">Menu</a>
                                <a href="/bookings" class="{{ request()->is('bookings')? 'bg-warm-brown text-white': ' text-white hover:bg-warm-brown hover:text-gray-200'}} rounded-md px-3 py-2 my-2 text-sm font-medium">Book</a>
                                @livewire('navigation-cart')
                                <a href="/about" class="{{ request()->is('about')? 'bg-warm-brown text-white': ' text-white hover:bg-warm-brown hover:text-gray-200'}} rounded-md px-3 py-2 my-2 text-sm font-medium">About</a>
                            </div>
                        </div>
                    </div>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0"
                         x-data="{ isOpen: false, openedWithKeyboard: false }" class="relative" @keydown.esc.window="isOpen = false, openedWithKeyboard = false">
                        @auth
                            <button class="flex items-center text-white hover:bg-warm-brown hover:text-gray-200 rounded-md px-3 py-2 my-2 text-sm font-medium" :class="isOpen  ?  'bg-warm-brown '  :  ''"
                                    type="button" @click="isOpen = ! isOpen">{{ Auth::user()->name }}
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke="currentColor" class="size-4 shrink-0 transition px-0.5" aria-hidden="true" :class="isOpen  ?  'rotate-180 '  :  ''">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                                </svg>
                            </button>
                            <div x-cloak x-show="isOpen || openedWithKeyboard" x-transition @click.outside="isOpen = false, openedWithKeyboard = false" @keydown.down.prevent="$focus.wrap().next()" @keydown.up.prevent="$focus.wrap().previous()"
                                 x-data="{ selectedIndex: 0, links: ['Home', 'About'] }"
                                 class="absolute top-[82px] right-[32px] flex w-1/8 min-w-[12rem] text-end flex-col overflow-hidden rounded-x-md rounded-b-md bg-warm-brown" role="menu">
                                @if(Auth::check() && Auth::user()->user_type == 'admin')
                                <a href="/admin" class="bg-warm-brown px-4 py-2 text-sm text-white hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none   dark:hover:text-light-gray dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white" role="menuitem">Dashboard</a>
                                @endif
                                <a href="/" class="bg-warm-brown px-4 py-2 text-sm text-white hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none   dark:hover:text-light-gray dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white" role="menuitem">Subscription</a>
                                <a href="/profile" class="bg-warm-brown px-4 py-2 text-sm text-white hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none   dark:hover:text-light-gray dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white" role="menuitem">Profile</a>
                                <form method="POST" action="/logout">
                                    @csrf
                                    <button type="submit" class="bg-warm-brown px-4 py-2 text-sm text-end text-white w-full hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none   dark:hover:text-light-gray dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white">Logout</button>
                                </form>
                            </div>
                        @else
                        <div class="">
                            <a href="/login" class="{{ request()->is('login')? 'bg-warm-brown text-white': ' text-white hover:bg-warm-brown hover:text-gray-200'}} rounded-md px-3 py-2 my-2 text-sm font-medium">Login</a>
                            <a href="/register" class="{{ request()->is('register')? 'bg-warm-brown text-white': ' text-white hover:bg-warm-brown hover:text-gray-200'}} rounded-md px-3 py-2 my-2 text-sm font-medium">Register</a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="sm:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="/" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white" aria-current="page">Home</a>
                <a href="/items" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Menu</a>
                <a href="/bookings" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Book</a>
                <a href="/basket" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Basket</a>
                <a href="/about" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">About</a>
                <a href="/basket" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Login</a>
            </div>
        </div>
    </nav>
</div>

