<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="flex justify-between gap-4">
            <div class="w-full">
                <x-input-label for="name" :value="__('Full Name')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                    :value="old('name', $user->name)" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
            <div class="w-full">
                <x-input-label for="phone" :value="__('Phone Number')" />
                <x-text-input id="phone" name="phone" type="tel" class="mt-1 block w-full"
                    :value="old('phone', $user->phone)" required autofocus autocomplete="phone" />
                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
            </div>
        </div>
        <div class="flex justify-between gap-4">
            <div class="w-full">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                    :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                    @endif
                </div>
                @endif
            </div>
            <div class="w-full">
                <x-input-label for="identity #" :value="__('Identification Number')" />
                <x-text-input id="inter_id" name="inter_id" type="text" class="mt-1 block w-full"
                    :value="old('inter_id', $user->inter_id)" required autofocus autocomplete="inter_id" />
                <x-input-error class="mt-2" :messages="$errors->get('inter_id')" />
            </div>
        </div>
        <div class="flex justify-between gap-4">
            <div class="w-full">
                <x-input-label for="dob" :value="__('Date of Birth')" />
                <x-text-input id="dob" name="dob" type="text" class="mt-1 block w-full" :value="old('dob', $user->dob)"
                    required autofocus autocomplete="dob" />
                <x-input-error class="mt-2" :messages="$errors->get('dob')" />
            </div>
            <div class="w-full">
                <x-input-label for="Occupation" :value="__('Occupation')" />
                <x-text-input id="name" name="occupation" type="text" class="mt-1 block w-full"
                    :value="old('occupation', $user->occupation)" required autofocus autocomplete="occupation" />
                <x-input-error class="mt-2" :messages="$errors->get('occupation')" />
            </div>
        </div>
        <div class="">
            <x-input-label for="Occupation" :value="__('Home Address')" />
            <x-textarea id="address" name="address" rows="4" class="mt-1 block w-full">{{Auth::user()->address}}
            </x-textarea>
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Update Profile') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>