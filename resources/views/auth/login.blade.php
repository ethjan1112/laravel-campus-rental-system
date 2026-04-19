<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[#E8F1FF]">
        
        <div class="w-full sm:max-w-md mt-6 px-10 py-12 bg-white shadow-lg overflow-hidden sm:rounded-xl border border-gray-100 text-center">
            
            <div class="flex justify-center mb-4">
                <div class="bg-blue-600 rounded-full p-3 shadow-md">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
            </div>

            <h2 class="text-2xl font-bold text-gray-800">Welcome Back</h2>
            <p class="text-gray-500 text-sm mb-8">Sign in to your Campus Rental account</p>

            <x-validation-errors class="mb-4 text-left" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="text-left">
                    <x-label for="email" value="{{ __('Email') }}" class="font-semibold text-gray-700" />
                    <x-input id="email" class="block mt-1 w-full bg-gray-50 border-gray-200 focus:border-blue-500 focus:ring-blue-500 rounded-lg" type="email" name="email" :value="old('email')" required autofocus placeholder="your@email.com" />
                </div>

                <div class="mt-4 text-left">
                    <div class="flex justify-between">
                        <x-label for="password" value="{{ __('Password') }}" class="font-semibold text-gray-700" />
                        @if (Route::has('password.request'))
                            <a class="text-xs text-blue-600 hover:underline" href="{{ route('password.request') }}">
                                {{ __('Forgot?') }}
                            </a>
                        @endif
                    </div>
                    <x-input id="password" class="block mt-1 w-full bg-gray-50 border-gray-200 focus:border-blue-500 focus:ring-blue-500 rounded-lg" type="password" name="password" required placeholder="••••••••" />
                </div>

                <div class="block mt-4 text-left">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" class="text-blue-600 rounded focus:ring-blue-500" />
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="mt-8">
                    <button type="submit" class="w-full bg-[#0D1117] hover:bg-black text-white font-bold py-3 rounded-lg transition duration-200">
                        Sign in
                    </button>
                </div>
            </form>

            <div class="mt-6 text-sm text-gray-600">
                Don't have an account? 
                <a href="{{ route('register') }}" class="text-blue-600 font-semibold hover:underline">Sign up</a>
            </div>
        </div>
    </div>
</x-guest-layout>