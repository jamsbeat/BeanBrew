<div class="min-h-screen flex flex-col sm:justify-center items-center sm:pt-0 bg-light-gray">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-dark-brown shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
