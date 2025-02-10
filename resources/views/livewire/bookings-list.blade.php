<div class="p-6">
    <input type="text" wire:model.live="search" placeholder="Search bookings..."
           class="my-4 rounded-lg h-10 border-2 border-indigo-800 w-full"
    >
    <div>
        <div>
            <div class="flex justify-center w-full">
                {{ $bookings->links('pagination-links') }}
            </div>
            <div class="">
                @foreach($bookings as $booking)
                    <div class="rounded-xl p-4 my-4 border-b-1 shadow-xl">
                        <div class="">
                            <div class="flex justify-between"
                                 x-data="{ open : false }"
                                 @mouseleave="open = false">
                                <div class="text-indigo-700 text-lg font-bold cursor-pointer"
                                     @mouseover="open = true"
                                     onclick="copyToClipboard('{{ $booking->user->email }}')">
                                    {{$booking->id}} • {{ $booking->user->name }}
                                </div>
                                <div x-show="open"
                                     @mouseover="open = true"
                                     class="p-2 absolute right-[680px] h-fit rounded-xl grid grid-cols-1 bg-indigo-700 text-white text-sm shadow-xl">
                                    <div class="">{{$booking->user->name}}</div>
                                    <div> - </div>
                                    <div>Contact Details :</div>
                                    <div>{{ $booking->user->email }}</div>
                                </div>
                                <script>
                                    function copyToClipboard(text) {
                                        // Create a temporary input element
                                        const tempInput = document.createElement('input');
                                        tempInput.value = text;
                                        document.body.appendChild(tempInput);
                                        // Select the text in the input
                                        tempInput.select();
                                        // Copy the text to the clipboard
                                        document.execCommand('copy');
                                        // Remove the temporary input element
                                        document.body.removeChild(tempInput);

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
                                            title: "Email copied successfully!",
                                            text: "{{ $booking->user->email }}",
                                            customClass: {
                                                title: 'text-xl font-bold',
                                                text: 'text-xs font-extrathin'
                                            }
                                        });
                                    }
                                </script>
                                <div class="text-gray-400 font-thin text-xs">
                                    Created : {{ $booking->created_at }}
                                </div>
                            </div>
                            <div class="flex justify-between">
                                <div class="text-black dark:text-white py-1 text-sm font-semibold">
                                    {{ $booking->people }} Person(s)
                                </div>
                                <div class="text-lg text-black dark:text-white">
                                    {{ $booking->location }}
                                </div>
                            </div>
                            <div class="flex justify-between items-center pt-2">
                                <button>
                                    <div class="text-red-600 font-thin text-sm"
                                         wire:click="remove({{$booking->id}})">Remove</div>
                                </button>
                                <div class="text-black dark:text-white text-sm font-bold">
                                    {{ $booking->time }} {{ $booking->date }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
