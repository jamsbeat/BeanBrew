<div>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Products') }}
        </h2>
    </x-slot>

    <x-slot name="header2">
        <h3 class="text-sm font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Information about the page...') }}
        </h3>
    </x-slot>

    <div class="grid grid-cols-1">
        <h1 class="font-bold text-lg">Products</h1>

        <div class="w-3/4">
            <button class="py-6"
                    x-data
                    x-on:click="$dispatch('open-modal')"
            >
                Create
            </button>
            <table>
                <thead>
                <tr class="">
                    <th class="text-start">Name</th>
                    <th class="text-start px-6">Price</th>
                    <th class="text-start">Description</th>
                    <th class="text-end px-6"></th>
                </tr>
                @foreach($products as $product)
                    <tr class="">
                        <td>{{$product->name}}</td>
                        <td class="px-6">{{$product->price}}</td>
                        <td>{{$product->description}}</td>
                        <td class="text-end items-center px-6">
                            <button x-data x-on:click="$dispatch('edit-mode ', { id: {{ $product->id }} })">Edit</button>
                        </td>
                        <td>
                            <button wire:click="remove({{ $product->id }})">Remove</button>
                        </td>
                    </tr>
                </thead>
                @endforeach
                @livewire('create-product')
            </table>
        </div>
    </div>
</div>
