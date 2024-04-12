<x-guest-layout>
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
          -webkit-appearance: none;
          margin: 0;
        }
        
        /* Firefox */
        input[type=number] {
          -moz-appearance: textfield;
        }
        </style>


    <form method="POST" action="{{ route('register') }}">
        @csrf
       
        <!-- Name -->
        <div>
            <x-input-label for="usr_name" :value="__('Name')" />
            <x-text-input id="usr_name" class="block mt-1 w-full" type="text" name="usr_name" :value="old('usr_name')"  required autofocus autocomplete="usr_name" />
            <x-input-error :messages="$errors->get('usr_name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="usr_phone" :value="__('Phone')" />
            <x-text-input id="usr_phone" class="block mt-1 w-full" type="number" name="usr_phone" :value="old('usr_phone')" required autocomplete="usr_phone" />
            <x-input-error :messages="$errors->get('usr_phone')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="usr_gender" :value="__('Gender')"  />
            <x-select name="usr_gender" id="usr_gender" class="block mt-1 w-full " :value="old('usr_gender')" required autocomplete="usr_gender">
                <option value="">--</option>
                <option value="laki-laki">laki laki</option>
                <option value="prempuan"> perempuan </option>
            </x-select>


            {{-- <x-text-input id="usr_Gender" class="block mt-1 w-full" type="text" name="usr_gender" :value="old('usr_gender')" required autocomplete="usr_gender" /> --}}
            <x-input-error :messages="$errors->get('usr_gender')" class="mt-2" />
        </div>
        

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>



    <script>
        var inputBox = document.getElementById("usr_phone");

        var invalidChars = [
        "-",
        "+",
        "e",
        ];

        inputBox.addEventListener("keydown", function(e) {
        if (invalidChars.includes(e.key)) {
            e.preventDefault();
        }
        });
    </script>

</x-guest-layout>
