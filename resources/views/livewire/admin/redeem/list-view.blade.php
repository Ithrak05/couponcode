<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
        <form>
          <h6
            class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase"
          >
            User Information
          </h6>
          <div class="flex flex-wrap justify-center text-center">
            <div class="w-full lg:w-6/12 px-4">
              <div class="relative w-full mb-3">
                <label
                  class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                  htmlFor="grid-password"
                >
                  Enter Coupon name
                </label>
                <input
                  type="text"
                  wire:model.defer="search"
                  wire:keyup="searchcoupon"
                  class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"

                />
              </div>
            </div>

          </div>




        </form>
      </div>
      @if ($search!=" ")

      <div class="flex flex-wrap">
          @foreach ($all_coupon as $c)

          <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
            <div
              class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg"
            >
              <div class="flex-auto p-4 cursor-pointer " wire:click="showuserdet('{{$c->coupon}}')">
                <div class="flex flex-wrap">
                  <div
                    class="relative w-full pr-4 max-w-full flex-grow flex-1"
                  >
                    <h5
                      class="text-blueGray-400 uppercase font-bold text-xs"
                    >
                     {{$c->name}}
                    </h5>
                    <span class="font-semibold text-xl text-blueGray-700">
                        {{$c->coupon}}
                    </span>
                  </div>
                  <div class="relative w-auto pl-4 flex-initial">
                    <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-lightBlue-500">
                        <i class="fas fa-percent"></i>
                      </div>
                  </div>
                </div>
                <p class="text-sm text-blueGray-400 mt-4">
                    @if ($c->status=='active')
                    <span class="text-emerald-500 mr-2">
                      <i class="fas fa-check-circle"></i> Active
                    </span>

                    @else
                    <span class="text-red-500 mr-2">
                      <i class="fas fa-times-circle"></i> Inactive
                    </span>

                    @endif
                  <span class="whitespace-nowrap">
                    Since last month
                  </span>
                </p>
              </div>
            </div>
          </div>
          @endforeach

      </div>
      @endif
      @if($showmodal)
      <div class="fixed z-10 overflow-y-auto top-0 w-full left-0" id="modal">
        <div class="flex items-center justify-center min-height-100vh pt-4 px-4 pb-20 text-center sm:block sm:p-0">
          <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-900 opacity-75" />
          </div>
          <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
          <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl
           transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full md:w-1/2" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                  <h3 class="text-lg leading-6 font-medium text-gray-900">Applicant Information</h3>
                  <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details and application.</p>
                </div>
                <div class="border-t border-gray-200">
                  <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                      <dt class="text-sm font-medium text-gray-500">Name</dt>
                      <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$user_det->name}}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                      <dt class="text-sm font-medium text-gray-500">Email address</dt>
                      <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$user_det->email}}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                      <dt class="text-sm font-medium text-gray-500">Coupon</dt>
                      <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$user_det->coupon}}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                      <dt class="text-sm font-medium text-gray-500">Offer</dt>
                      <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$user_det->offer}} %</dd>
                    </div>

                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                      <dt class="text-sm font-medium text-gray-500">Attachments</dt>
                      <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
                            @foreach (json_decode($user_det->offer_used_details) as $coup=>$status)

                            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                              <div class="w-0 flex-1 flex items-center">

                                <span class="ml-2 flex-1 w-0 "> {{ucfirst($coup)}}</span>
                              </div>
                              <div class="ml-4 flex-shrink-0">
                                  @if ($status)
                                  <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500"> Claimed </a>

                                  @else
                                  <a href="#" wire:click="updateCoupon('{{$coup}}','{{$user_det->id}}')" class="font-medium text-indigo-600 hover:text-indigo-500"> Use </a>

                                  @endif
                              </div>
                            </li>
                            @endforeach


                        </ul>
                      </dd>
                    </div>
                  </dl>
                </div>
              </div>
          </div>
        </div>
      </div>
      @endif
</div>
