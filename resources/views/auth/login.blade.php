<x-guest-layout>
    <div class="text-center mb-6">
        <h2 class="text-2xl font-bold text-base-content">{{ __('Welcome Back') }}</h2>
        <p class="text-base-content/70 mt-2">{{ __('Please sign in to your account') }}</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <div class="form-control">
            <label class="label" for="username">
                <span class="label-text">{{ __('Username') }}</span>
            </label>
            <input 
                id="username" 
                type="text" 
                name="username" 
                value="{{ old('username') }}" 
                class="input input-bordered w-full @error('username') input-error @enderror" 
                placeholder="{{ __('Enter your username') }}"
                required 
                autofocus 
            />
            @error('username')
                <label class="label">
                    <span class="label-text-alt text-error">{{ $message }}</span>
                </label>
            @enderror
        </div>

        <div class="form-control">
            <label class="label" for="password">
                <span class="label-text">{{ __('Password') }}</span>
            </label>
            <input 
                id="password" 
                type="password" 
                name="password" 
                class="input input-bordered w-full @error('password') input-error @enderror" 
                placeholder="{{ __('Enter your password') }}"
                required 
            />
            @error('password')
                <label class="label">
                    <span class="label-text-alt text-error">{{ $message }}</span>
                </label>
            @enderror
        </div>

        <div class="form-control">
            <label class="label cursor-pointer justify-start">
                <input 
                    id="remember_me" 
                    type="checkbox" 
                    name="remember" 
                    class="checkbox checkbox-primary mr-3" 
                />
                <span class="label-text">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="form-control mt-6">
            <button type="submit" class="btn btn-primary w-full">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                </svg>
                {{ __('Log in') }}
            </button>
        </div>

        <div class="divider">{{ __('OR') }}</div>
        
        <div class="text-center">
            <a href="{{ route('register') }}" class="link link-primary">
                {{ __('Belum punya akun?') }}
            </a>
        </div>
    </form>
</x-guest-layout>
