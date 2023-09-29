@php
$i = 1;
@endphp
<x-app-layout>
    <x-slot name="header">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="#"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="#"
                            class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Registered</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Vehicles</span>
                    </div>
                </li>

            </ol>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-10">
            <div class="grid grid-cols-3 gap-4">
                @forelse ($vehicles as $vehicle)
                <div
                    class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="dark:hidden rounded-t-lg" src="{{asset('images/logo-light.png')}}" alt="" />
                        <img class="hidden dark:block rounded-t-lg" src="{{asset('images/logo-dark.png')}}" alt="" />
                    </a>
                    <div class="p-5">
                        <div class="grid grid-cols-2 gap-3 mb-3">
                            <div id="toast-undo"
                                class="flex items-center w-full max-w-xs px-2 py-1 text-gray-800 bg-white rounded-lg shadow dark:text-gray-200 dark:bg-gray-900"
                                role="alert">
                                <div class="text-lg font-normal">
                                    Model:
                                </div>
                                <div class="flex items-center ml-auto space-x-2">
                                    <a class="text-lg font-medium text-blue-600 p-1.5 hover:bg-blue-100 rounded-lg dark:text-blue-500 dark:hover:bg-gray-700"
                                        href="#">{{$vehicle->model}}</a>
                                </div>
                            </div>
                            <div id="toast-undo"
                                class="flex items-center w-full max-w-xs px-2 py-1 text-gray-800 bg-white rounded-lg shadow dark:text-gray-200 dark:bg-gray-900"
                                role="alert">
                                <div class="text-lg font-normal">
                                    Status:
                                </div>
                                <div class="flex items-center ml-auto space-x-2">
                                    <a class="text-lg font-medium text-blue-600 p-1.5 hover:bg-blue-100 rounded-lg dark:text-blue-500 dark:hover:bg-gray-700"
                                        href="#">@if ($vehicle->status == 0)
                                        <span class="text-green-600">NEW</span>
                                        @elseif ($vehicle->status == 1)
                                        <span class="text-blue-600">GOOD</span>
                                        @elseif ($vehicle->status == 2)
                                        <span class="text-yellow-600">OLD</span>
                                        @else
                                        <span class="text-red-600">OTHER</span>
                                        @endif</a>
                                </div>
                            </div>
                        </div>
                        <div id="toast-undo"
                            class="flex mb-3 items-center w-full max-w-xs px-2 py-1 text-gray-800 bg-white rounded-lg shadow dark:text-gray-200 dark:bg-gray-900"
                            role="alert">
                            <div class="text-lg font-normal">
                                RegNumber:
                            </div>
                            <div class="flex items-center ml-auto space-x-2">
                                <a class="text-lg font-medium text-blue-600 p-1.5 hover:bg-blue-100 rounded-lg dark:text-blue-500 dark:hover:bg-gray-700"
                                    href="#">{{$vehicle->reg_number}}</a>
                            </div>
                        </div>
                        <form action="{{route('vehicles.destroy',$vehicle->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <x-danger-button>
                                Delete Vehicle
                                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </x-danger-button>
                        </form>
                    </div>
                </div>
                @empty
                <x-skeleton />
                @endforelse
            </div>
            <div class="mt-4 text-center">
                <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'add-new-vehicle')">{{
                    __('New Vehicle')
                    }}
                    <svg class="ml-4 w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M9.546.5a9.5 9.5 0 1 0 9.5 9.5 9.51 9.51 0 0 0-9.5-9.5ZM13.788 11h-3.242v3.242a1 1 0 1 1-2 0V11H5.304a1 1 0 0 1 0-2h3.242V5.758a1 1 0 0 1 2 0V9h3.242a1 1 0 1 1 0 2Z" />
                    </svg>
                </x-primary-button>
            </div>
        </div>
    </div>

    {{-- modal --}}
    <x-modal name="add-new-vehicle" :show="$errors->newVehicle->isNotEmpty()" focusable>
        <form method="post" action="{{ route('vehicles.store') }}" class="p-6">
            @csrf
            @method('POST')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Add New Vehicle') }}
            </h2>

            <div class="w-full mt-6">
                <x-input-label for="make" value="{{ __('Vehicle Make') }}" class="" />

                <x-text-input id="make" name="make" type="text" class="mt-1 block w-full"
                    placeholder="{{ __('Honda') }}" />

                <x-input-error :messages="$errors->newVehicle->get('make')" class="mt-2" />
            </div>
            <div class="w-full mt-6">
                <x-input-label for="model" value="{{ __('Vehicle Model') }}" class="" />

                <x-text-input id="model" name="model" type="text" class="mt-1 block w-full"
                    placeholder="{{ __('Honda Fit') }}" />

                <x-input-error :messages="$errors->newVehicle->get('model')" class="mt-2" />
            </div>
            <div class="w-full mt-6">
                <x-input-label for="reg_num" value="{{ __('Vehicle RegNumber') }}" class="" />

                <x-text-input id="reg_num" name="reg_number" type="text" class="mt-1 block w-full"
                    placeholder="{{ __('ABC 123') }}" pattern="([A-Z]{3}) ([0-9]{3})"
                    title="RegNumber format ie. ABC 123" />

                <x-input-error :messages="$errors->newVehicle->get('reg_number')" class="mt-2" />
            </div>
            <div class="mt-6">
                <x-input-label for="status" value="{{ __('Vehicle Condition') }}" class="" />

                <x-input-select id="status" name="status" class="mt-1 block w-full">
                    <option selected disabled>Choose your Vehicle Condition</option>
                    <option value="0">New</option>
                    <option value="1">Good</option>
                    <option value="2">Old</option>
                    <option value="3">Other</option>
                </x-input-select>

                <x-input-error :messages="$errors->newVehicle->get('status')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ml-3">
                    {{ __('Submit Info') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>
</x-app-layout>