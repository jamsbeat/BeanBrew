<div class="bg-white">
    <div class="pt-6">

        <!-- Product info -->
        <div class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
            <div class="lg:col-span-2 lg:border-r lg:border-dark-brown lg:pr-8">
                <img src="https://placehold.co/600x400"
                     alt=""
                        class="rounded-lg bg-gray-100 border border-warm-brown w-full"
                />
            </div>

            <!-- Options -->
            <div class="mt-4 lg:row-span-3 lg:mt-0 ">
                <h2 class="sr-only">Product information</h2>
                <div class="rounded-lg bg-warm-brown p-4 border border-dark-brown"
                     x-data="{ isExpanded: false }">
                    <h1 class="text-2xl font-bold tracking-tight text-white sm:text-3xl">{{ $this->product->name }}</h1>
                    <p class="text-xl tracking-tight text-light-gray">{{ $this->product->price }}</p>
                    <button class="flex items-center pt-2 text-sm text-light-brown"
                            id="controlsAccordionItemOne" type="button" aria-controls="accordionItemOne" @click="isExpanded = ! isExpanded" :class="isExpanded ? 'text-onSurfaceStrong dark:text-onSurfaceDarkStrong font-bold'  : 'text-onSurface dark:text-onSurfaceDark font-medium'" :aria-expanded="isExpanded ? 'true' : 'false'" >
                        Description
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke="currentColor" class="size-4 shrink-0 transition px-0.5" aria-hidden="true" :class="isExpanded  ?  'rotate-180'  :  ''">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                        </svg>
                    </button>
                    <p class="text-light-gray text-sm"
                       x-cloak x-show="isExpanded" id="accordionItemOne" role="region" aria-labelledby="controlsAccordionItemOne">{{ $this->product->description }}
                    </p>
                </div>
                <form class="mt-10">

                    <!-- Sizes -->
                    <div class="">
                        <div class="flex items-center justify-between">
                            <h3 class="text-sm font-medium text-gray-900">Size</h3>
                        </div>

                        <fieldset aria-label="Choose a size" class="mt-4">
                            <select wire:model.change="variant" >
                                @foreach($this->product->variants as $variant)
                                    <option value="{{$variant->id}}" >{{$variant->size}} </option>
                                @endforeach
                            </select>

                            @error('variant')
                            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                            @enderror
                        </fieldset>
                    </div>

                    @csrf
                    <button wire:click.prevent="addToCart"
                            class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-warm-brown px-8 py-3 text-base font-medium text-white hover:bg-warm-brown/30 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Add to cart
                    </button>
                </form>
            </div>
            <script>
                window.addEventListener('cartUpdated', event => {
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
                        title: "Product added to cart successfully!"
                    });
                });
            </script>

        </div>
    </div>
</div>
