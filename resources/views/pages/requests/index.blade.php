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
                            class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Breakdown</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Requests</span>
                    </div>
                </li>

            </ol>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-10">
            <div class="grid grid-cols-3 gap-4">
                @forelse ($requests as $request)
                <div
                    class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <span
                        class="bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400 mb-3">
                        <svg class="w-2.5 h-2.5 mr-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                        </svg>
                        {{$request->created_at->diffForHumans()}}
                    </span>
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                            {{$request->user->name}}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">{{Str::limit($request->description,
                        100)}}:</p>
                    <a href="{{route('requests.show',$request->id)}}"
                        class="inline-flex items-center text-blue-600 hover:underline">
                        Read More
                        <svg class="w-3 h-3 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                        </svg>
                    </a>
                </div>
                @empty
                <x-skeleton />
                @endforelse
            </div>
            <div class="mt-4 text-center">
                <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'add-new-request')">{{
                    __('New Requests')
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
    <x-modal name="add-new-request" :show="$errors->newRequest->isNotEmpty()" focusable>
        <form method="post" action="{{ route('requests.store') }}" class="p-6">
            @csrf
            @method('POST')

            @if ($vehicles->count() != 0)
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Add New Requests') }}
            </h2>
            <div class="mt-6">
                <x-input-label for="asstype" value="{{ __('Assistance Type') }}" class="" />

                <x-input-select id="asstype" name="ass_type" class="mt-1 block w-full">
                    <option selected disabled>Choose your Assistance type</option>
                    <option value="0">Mechanic/Technician</option>
                    <option value="1">Towing Vehicle</option>
                    <option value="2">Other</option>
                </x-input-select>

                <x-input-error :messages="$errors->newRequest->get('ass_type')" class="mt-2" />
            </div>
            <div class="mt-6">
                <x-input-label for="Breakdown Vehicle" value="{{ __('Breakdown Vehicle') }}" class="" />

                <x-input-select id="Breakdown Vehicle" name="vehicle_id" class="mt-1 block w-full">
                    <option selected disabled>Choose Breakdown Vehicle</option>
                    @forelse ($vehicles as $vehicle)
                    <option value="{{$vehicle->id}}">{{$vehicle->model}} ({{$vehicle->reg_number}})</option>
                    @empty

                    @endforelse
                </x-input-select>

                <x-input-error :messages="$errors->newRequest->get('vehicle_id')" class="mt-2" />
            </div>
            <div class="flex gap-4 mt-6">
                <div class="w-full">
                    <x-input-label for="Province" value="{{ __('Province') }}" class="" />

                    <x-input-select id="Breakdown Vehicle" name="province" class="mt-1 block w-full">
                        <option selected disabled>Province Name</option>
                        <option value="Bulawayo">Bulawayo</option>
                        <option value="Harare">Harare</option>
                        <option value="Manicaland">Manicaland</option>
                        <option value="Mashonaland Central">Mashonaland Central</option>
                        <option value="Mashonaland East">Mashonaland East</option>
                        <option value="Mashonaland West">Mashonaland West</option>
                        <option value="Masvingo">Masvingo</option>
                        <option value="Matabeleland North">Matabeleland North</option>
                        <option value="Matabeleland South">Matabeleland South</option>
                        <option value="Midlands">Midlands</option>
                    </x-input-select>

                    <x-input-error :messages="$errors->newRequest->get('province')" class="mt-2" />
                </div>
                <div class="w-full">
                    <x-input-label for="place" value="{{ __('Place/Road Name') }}" class="" />

                    <x-text-input id="place" name="place" type="text" class="mt-1 block w-full"
                        placeholder="{{ __('Place or road Name') }}" />

                    <x-input-error :messages="$errors->newRequest->get('place')" class="mt-2" />
                </div>
            </div>
            <div class="flex gap-4 mt-6">
                <div class="w-full">
                    <x-input-label for="Latitude" value="{{ __('Latitude Coodinates') }}" class="" />

                    <x-text-input id="Latitude" name="latitude" type="text" class="mt-1 block w-full"
                        placeholder="{{ __('Latitude Coodinates') }}" />

                    <x-input-error :messages="$errors->newRequest->get('latitude')" class="mt-2" />
                </div>
                <div class="w-full">
                    <x-input-label for="Longitude" value="{{ __('Longitude Coodinates') }}" class="" />

                    <x-text-input id="Longitude" name="longitude" type="text" class="mt-1 block w-full"
                        placeholder="{{ __('Longitude Coodinates') }}" />

                    <x-input-error :messages="$errors->newRequest->get('longitude')" class="mt-2" />
                </div>

            </div>
            <div class="mt-6">
                <x-input-label for="description" value="{{ __('Problem Description (ie. Flat tyre)') }}" class="" />

                <x-textarea id="description" name="description" class="mt-1 block w-full"
                    placeholder="{{ __('Problem Description (ie. Flat tyre)') }}" />

                <x-input-error :messages="$errors->newRequest->get('description')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ml-3">
                    {{ __('Submit Info') }}
                </x-primary-button>
            </div>
            @else
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Please Register Vehicles First to Add New Requests') }}
            </h2>
            @endif
        </form>
    </x-modal>
</x-app-layout>