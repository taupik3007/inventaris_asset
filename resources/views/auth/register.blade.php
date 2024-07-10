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
            <x-text-input id="usp_name" class="block mt-1 w-full" type="text" name="usp_name" :value="old('usp_name')"  required autofocus autocomplete="usp_name" />
            <x-input-error :messages="$errors->get('usp_name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="usp_nis" :value="__('NIS')" />
            <x-text-input id="usp_nis" class="block mt-1 w-full" type="number" name="usp_nis" :value="old('usp_nis')" required autocomplete="usp_nis" />
            <x-input-error :messages="$errors->get('usp_nis')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="usp_class" :value="__('Kelas')" />
            <x-select name="usp_class" id="usp_class" class="block mt-1 w-full " :value="old('usp_class')" required autocomplete="usp_class">
                <option value="">--</option>
                @foreach ($classes as $classes)
                <option value="{{$classes->cls_id}}">{{$classes->cls_level." ".$classes->cls_major->mjr_name." ".$classes->cls_number }}</option>
                @endforeach
                
            </x-select>
            <x-input-error :messages="$errors->get('usp_class')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="usp_phone" :value="__('Phone')" />
            <x-text-input id="usp_phone" class="block mt-1 w-full" type="number" name="usp_phone" :value="old('usp_phone')" required autocomplete="usp_phone" />
            <x-input-error :messages="$errors->get('usp_phone')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="usp_gender" :value="__('Gender')"  />
            <x-select name="usp_gender" id="usp_gender" class="block mt-1 w-full " :value="old('usp_gender')" required autocomplete="usp_gender">
                <option value="">--</option>
                <option value="laki-laki">laki laki</option>
                <option value="prempuan"> perempuan </option>
            </x-select>


            {{-- <x-text-input id="usr_Gender" class="block mt-1 w-full" type="text" name="usr_gender" :value="old('usr_gender')" required autocomplete="usr_gender" /> --}}
            <x-input-error :messages="$errors->get('usp_gender')" class="mt-2" />
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
