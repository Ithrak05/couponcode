<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div>
        <button wire:click="genrate_code" class="relative inline-flex mt-4 float-right items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800">
            <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
            Generate Coupon
            </span>
        </button>
    </div>
    <div>
        <div class="grid grid-cols-3 gap-1">
            @if (collect($coupon_details)->isNotEmpty())
            @foreach ($coupon_details as $c)

            <div class="p-4 w-80">
                <div class="p-8 bg-white rounded shadow-md">
                    <h2 class="text-2xl font-bold text-gray-800">{{$c->name}}</h2>
                    <p class="text-gray-600">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur deserunt
                        quas repellat facere dolor blanditiis tenetur quibusdam corporis quaerat. Impedit, repellendus!
                        Delectus et illum eum ipsa magni? Facilis, molestiae est!</p>
                </div>
            </div>
            @endforeach

            @else

            @endif



        </div>

    </div>
</div>

