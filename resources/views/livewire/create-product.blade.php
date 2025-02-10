<div class="fixed z-50 inset-0 h-screen"
     x-data="{ show : false}"
     x-show="show"
     x-on:open-modal.window="show = true"
     x-on:close-modal.window="show = false"
     x-on:close-modal.window="show = false"
     x-on:keydown.escape.window="show = false"
>
    <div class="fixed inset-0 backdrop-blur-lg">
        <div class="bg-white rounded m-auto fixed inset-0 max-w-2xl h-[500px]">
            <div class="p-6 text-center text-xl font-bold">
                Create Product
            </div>
            <div>
                <div class="p-6 grid grid-cols-1">
                    <label class="py-1 font-semibold" for="name">Name</label>
                    <input class="rounded" type="text" wire:model="name"/>
                </div>
                <div class="p-6 py-2 grid grid-cols-1">
                    <label class="py-1 font-semibold" for="description">Description</label>
                    <input class="rounded" type="text" wire:model="description"/>
                </div>
                <div class="p-6 grid grid-cols-1">
                    <label class="py-1 font-semibold" for="price">Price</label>
                    <input class="rounded" type="number" min="100" max="3000" wire:model="price"/>
                </div>
            </div>
            <div class="flex justify-between px-8 py-4">
                <button x-on:click="show = false">Cancel</button>
                @if($editform)
                <button wire:click="update">Update</button>
                @else
                <button wire:click="save">Save</button>
                @endif
            </div>
        </div>
    </div>
</div>
