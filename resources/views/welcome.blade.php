<x-app-layout>
    <div class="mx-20 w-full my-16">
        <div class="flex flex-col-reverse md:flex-row">
            <div class="mt-24">
                <div class="py-8 px-4 mx-auto ml-16 max-w-screen-xl lg:py-16">
                    <h1
                        class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                        Vehicle Breakdown Services </h1>
                    <p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">Get your Car Serviced
                        Anytime Anywhere. The World's Best <span
                            class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">ROADSIDE
                            ASSISTANCE</span> Services.</p>
                    <div
                        class="flex flex-col space-y-4 sm:flex-row sm:justify-center justify-start sm:space-y-0 sm:space-x-4 mt-10">
                        <a href="{{route('login')}}"
                            class="inline-flex justify-center items-center py-3 px-5 text-base font-medium  text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                            Become a Memember
                            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                        <a href="{{route('requests.index')}}"
                            class="inline-flex gap-3 justify-center items-center py-3 px-5 text-base font-medium  text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                            Request Assistance<svg class="w-5 h-5 rotate-45 text-blue-700" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                <path
                                    d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z" />
                            </svg>

                        </a>
                    </div>
                </div>
            </div>
            <div class="mr-10">
                <img class="h-auto max-w-full" src="{{asset('images/car.png')}}" alt="image description">
            </div>
        </div>
    </div>
    <div class="text-center mx-60 flex gap-16 mb-20 bg-white dark:bg-gray-800 rounded-xl p-10 shadow-lg">
        <div class="flex-row">
            <img src="{{asset('images/Vehicle-Service.png')}}" alt="" class="h-40 w-30">
            <p class="text-gray-800 dark:text-gray-200 leading-none text-lg">Vehicle Service.</p>
        </div>
        <div class="flex-row">
            <img src="{{asset('images/Clutch-Repairs.png')}}" alt="" class="h-40 w-30">
            <p class="text-gray-800 dark:text-gray-200 leading-none text-lg">Fuel Consumption Optimization.</p>
        </div>
        <div class="flex-row">
            <img src="{{asset('images/cog.png')}}" alt="" class="h-40 w-30">
            <p class="text-gray-800 dark:text-gray-200 leading-none text-lg">General Repair and Maintanance.</p>
        </div>
        <div class="flex-row">
            <img src="{{asset('images/4x4-Upgrades-Accessories.png')}}" alt="" class="h-40 w-30">
            <p class="text-gray-800 dark:text-gray-200 leading-none text-lg">4x4 Accessories.</p>
        </div>
        <div class="flex-row">
            <img src="{{asset('images/towing-vehicle_8692430.png')}}" alt="" class="h-40 w-30">
            <p class="text-gray-800 dark:text-gray-200 leading-none text-lg">Towing Vehicles.</p>
        </div>
    </div>
</x-app-layout>