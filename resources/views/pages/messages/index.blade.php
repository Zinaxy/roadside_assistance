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
                            class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Messages</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Inbox</span>
                    </div>
                </li>

            </ol>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="flex  gap-3 mx-20">
            <div class="w-4/12 mx-auto sm:px-6 lg:px-8 my-10">
                <div
                    class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Your Massages Inbox
                        </h5>
                        <form action="{{route('messages.destroy',Auth::user()->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <x-danger-button>
                                {{
                                __('Delete Chats')
                                }}
                                <svg class="ml-4 w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.546.5a9.5 9.5 0 1 0 9.5 9.5 9.51 9.51 0 0 0-9.5-9.5ZM13.788 11h-3.242v3.242a1 1 0 1 1-2 0V11H5.304a1 1 0 0 1 0-2h3.242V5.758a1 1 0 0 1 2 0V9h3.242a1 1 0 1 1 0 2Z" />
                                </svg>
                            </x-danger-button>
                        </form>
                    </div>
                    <div class="flow-root">
                        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <img class="w-8 h-8 rounded-full" src="{{asset('images/user.png')}}"
                                            alt="Neil image">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            Costomer Services
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            vbms@services.co.zw <br>+243 7800000000
                                        </p>
                                    </div>
                                    <div>
                                        <a href="#"
                                            class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                            Reply
                                            <svg class="w-6 h-8 ml-2 text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 19 16">
                                                <path
                                                    d="M12.5 3.046H10v-.928A2.12 2.12 0 0 0 8.8.164a1.828 1.828 0 0 0-1.985.311l-5.109 4.49a2.2 2.2 0 0 0 0 3.24L6.815 12.7a1.83 1.83 0 0 0 1.986.31A2.122 2.122 0 0 0 10 11.051v-.928h1a2.026 2.026 0 0 1 2 2.047V15a.999.999 0 0 0 1.276.961A6.593 6.593 0 0 0 12.5 3.046Z" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="w-8/12  mx-auto sm:px-6 lg:px-8 my-10">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("Inbox With Customer Services ") }}
                    </div>
                    @forelse ($chats as $chat)
                    @if ($chat->from_id == 1)
                    <div id="toast-message-cta"
                        class="w-6/12 mx-10 mt-2 mb-4 p-4 text-gray-500 bg-white rounded-lg shadow dark:bg-gray-900 dark:text-gray-400"
                        role="alert">
                        <div class="flex">
                            <img class="w-8 h-8 rounded-full shadow-lg" src="{{asset('images/user.png')}}"
                                alt="Jese Leos image" />
                            <div class="ml-3 text-sm font-normal">
                                <span class="mb-1 text-sm font-semibold text-gray-900 dark:text-white">Customer
                                    Service</span>
                                <div class="mb-2 text-sm font-normal">{{$chat->message}}.</div>
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400 mb-3">
                                    <svg class="w-2.5 h-2.5 mr-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                                    </svg>
                                    {{$chat->created_at->diffForHumans()}}
                                </span>
                            </div>
                        </div>
                    </div>
                    @else
                    <div id="toast-message-cta"
                        class="w-6/12 mx-10 mt-2 mb-6 ml-[45%] p-4 text-gray-100 bg-blue-600 rounded-lg shadow"
                        role="alert">
                        <div class="flex">
                            <img class="w-8 h-8 rounded-full shadow-lg" src="{{asset('images/user.png')}}"
                                alt="Jese Leos image" />
                            <div class="ml-3 text-sm font-normal">
                                <span
                                    class="mb-1 text-sm font-semibold text-gray-900 dark:text-white">{{$chat->user->name}}</span>
                                <div class="mb-2 text-sm font-normal">{{$chat->message}}.</div>
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400 mb-3">
                                    <svg class="w-2.5 h-2.5 mr-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                                    </svg>
                                    {{$chat->created_at->diffForHumans()}}
                                </span>
                            </div>
                        </div>
                    </div>
                    @endif
                    @empty

                    @endforelse


                    <div class="my-10 mx-6">
                        <form action="{{route('messages.store')}}" method="POST">
                            @csrf
                            @method('POST')
                            <label for="chat" class="sr-only">Your message</label>
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="from_id" value="0">
                            <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
                                <textarea id="chat" rows="1" name="message"
                                    class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Your message..."></textarea> <br>
                                <x-input-error :messages="$errors->newMessage->get('message')" class="mt-2" />
                                <button type="submit"
                                    class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                                    <svg class="w-5 h-5 rotate-90" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 18 20">
                                        <path
                                            d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z" />
                                    </svg>
                                    <span class="sr-only">Send message</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>