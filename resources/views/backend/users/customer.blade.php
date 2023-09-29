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
                            class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Administrators</a>
                    </div>
                </li>

            </ol>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-10">
            <div class="grid grid-cols-3 gap-4">
                @forelse ($customers as $customer)
                @if ($customer->hasRole('user'))
                <div
                    class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-end px-4 pt-4">
                        <x-danger-button class="">
                            {{__('Delete User')}}
                        </x-danger-button>
                    </div>
                    <div class="flex flex-col items-center pb-10 mt-3">
                        <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{asset('images/user.png')}}"
                            alt="Bonnie image" />
                        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{$customer->name}}</h5>
                        <p class="grid grid-cols-1 gap-3 mx-3">
                            <span
                                class="border border-blue-700 rounded px-2 text-sm text-gray-500 dark:text-gray-400">{{$customer->email}}</span>
                            <span
                                class="border border-blue-700 rounded px-2 text-sm text-gray-500 dark:text-gray-400">{{$customer->phone}}</span>
                        </p>
                    </div>
                </div>
                @endif
                @empty

                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>