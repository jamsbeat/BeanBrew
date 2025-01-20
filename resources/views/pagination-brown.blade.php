
@if ($paginator->hasPages())
    <ul class="flex justify-between">
        <!-- prev -->
        @if ($paginator->onFirstPage())
            <li class="w-16 px-2 py-1 text-center rounded-lg bg-warm-brown/10 text-gray-400">Prev</li>
        @else
            <li class="w-16 px-2 py-1 text-center rounded-lg bg-warm-brown text-white cursor-pointer" wire:click="previousPage">Prev</li>
        @endif
        <!-- prev end -->

        <!-- numbers -->
        @foreach ($elements as $element)
            <div class="flex">
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class=" w-10 py-1 text-center text-gray-400 cursor-pointer" wire:click="gotoPage({{$page}})">{{$page}}</li>
                        @else
                            <li class=" w-10 py-1 text-center text-dark-brown cursor-pointer" wire:click="gotoPage({{$page}})">{{$page}}</li>
                        @endif
                    @endforeach
                @endif
            </div>
        @endforeach
        <!-- end numbers -->


        <!-- next  -->
        @if ($paginator->hasMorePages())
            <li class="w-16 px-2 py-1 text-center rounded-lg bg-warm-brown text-white cursor-pointer" wire:click="nextPage">Next</li>
        @else
            <li class="w-16 px-2 py-1 text-center rounded-lg bg-warm-brown/10 text-gray-400">Next</li>
        @endif
        <!-- next end -->
    </ul>
@endif
