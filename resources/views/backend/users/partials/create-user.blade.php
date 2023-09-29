<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Register New User') }}
        </h2>
    </header>

    <form method="post" action="{{ route('users.store') }}" class="mt-6 space-y-6">
        @csrf

        <div class="w-full">
            <x-input-label for="userrole" :value="__('Choose User Role')" />
            <x-input-select id="role_id" name="role_id" class="mt-1 block w-full" :value="old('role_id')" autofocus>
                <option selected disabled>Choose User Role</option>
                <option value="1">Administrator</option>
                <option value="2">Techinician</option>
                <option value="3">Customer</option>
            </x-input-select>
            <x-input-error class="mt-2" :messages="$errors->get('role_id')" />
        </div>
        <div class="flex justify-between gap-4">
            <div class="w-full">
                <x-input-label for="name" :value="__('Full Name')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" autofocus
                    autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
            <div class="w-full">
                <x-input-label for="phone" :value="__('Phone Number')" />
                <x-text-input id="phone" name="phone" type="tel" class="mt-1 block w-full" :value="old('phone')"
                    autofocus autocomplete="phone" />
                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
            </div>
        </div>
        <div class="flex justify-between gap-4">
            <div class="w-full">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email')"
                    autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>
            <div class="w-full">
                <x-input-label for="identity #" :value="__('Identification Number')" />
                <x-text-input id="inter_id" name="inter_id" type="text" class="mt-1 block w-full"
                    :value="old('inter_id')" autofocus autocomplete="inter_id" />
                <x-input-error class="mt-2" :messages="$errors->get('inter_id')" />
            </div>
        </div>
        <div class="flex justify-between gap-4 mt-2">
            <div class="w-full">
                <x-input-label for="dob" :value="__('Date of Birth')" />
                <x-text-input id="dob" name="dob" type="date" class="mt-1 block w-full" :value="old('dob')" autofocus
                    autocomplete="dob" />
                <x-input-error class="mt-2" :messages="$errors->get('dob')" />
            </div>
            <div class="w-full">
                <x-input-label for="Occupation" :value="__('Occupation')" />
                <x-text-input id="name" name="occupation" type="text" class="mt-1 block w-full"
                    :value="old('occupation')" autofocus autocomplete="occupation" />
                <x-input-error class="mt-2" :messages="$errors->get('occupation')" />
            </div>
        </div>
        <div class="mt-2">
            <x-input-label for="Occupation" :value="__('Home Address')" />
            <x-textarea id="address" name="address" rows="4" class="mt-1 block w-full">{{old('address')}}
            </x-textarea>
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>
        <div class="flex justify-between gap-4 mt-2">
            <div class="w-full">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                    autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="w-full">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
        </div>
        <div class="flex items-center gap-4 mt-3">
            <x-primary-button>{{ __('Submit Info') }}</x-primary-button>


        </div>
    </form>
</section>