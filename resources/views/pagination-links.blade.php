@if($paginator->hasPages())
    <div class="w-1/2 mt-2">
        <ul class="flex justify-between">
            <button wire:click="previousPage">Prev</button>
            <button wire:click="nextPage">Next</button>
        </ul>
    </div>
@endif
