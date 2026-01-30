<x-guest-layout>
    <div class="text-center mb-6">
        <h2 class="text-2xl font-bold text-base-content">{{ __('Create Account') }}</h2>
        <p class="text-base-content/70 mt-2">{{ __('Join us today') }}</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Nama Lengkap -->
        <div class="form-control">
            <label class="label" for="fullname">
                <span class="label-text">{{ __('Fullname') }}</span>
            </label>
            <input 
                id="fullname" 
                type="text" 
                name="fullname" 
                value="{{ old('fullname') }}" 
                class="input input-bordered w-full @error('fullname') input-error @enderror" 
                placeholder="{{ __('Enter your full name') }}"
                required 
                autofocus 
            />
            @error('fullname')
                <label class="label">
                    <span class="label-text-alt text-error">{{ $message }}</span>
                </label>
            @enderror
        </div>

        <!-- Username -->
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
                placeholder="{{ __('Choose a username') }}"
                required 
            />
            @error('username')
                <label class="label">
                    <span class="label-text-alt text-error">{{ $message }}</span>
                </label>
            @enderror
        </div>

        <!-- Kelas -->
        <div class="form-control">
            <label class="label" for="kelas">
                <span class="label-text">{{ __('Kelas') }}</span>
            </label>
            <input 
                id="kelas" 
                type="text" 
                name="kelas" 
                value="{{ old('kelas') }}" 
                class="input input-bordered w-full @error('kelas') input-error @enderror" 
                placeholder="Contoh: XII IPA 1"
                required 
            />
            @error('kelas')
                <label class="label">
                    <span class="label-text-alt text-error">{{ $message }}</span>
                </label>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-control">
            <label class="label" for="password">
                <span class="label-text">{{ __('Password') }}</span>
            </label>
            <input 
                id="password" 
                type="password" 
                name="password" 
                class="input input-bordered w-full @error('password') input-error @enderror" 
                placeholder="{{ __('Create a password') }}"
                required 
            />
            @error('password')
                <label class="label">
                    <span class="label-text-alt text-error">{{ $message }}</span>
                </label>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="form-control">
            <label class="label" for="password_confirmation">
                <span class="label-text">{{ __('Confirm Password') }}</span>
            </label>
            <input 
                id="password_confirmation" 
                type="password" 
                name="password_confirmation" 
                class="input input-bordered w-full @error('password_confirmation') input-error @enderror" 
                placeholder="{{ __('Confirm your password') }}"
                required 
            />
            @error('password_confirmation')
                <label class="label">
                    <span class="label-text-alt text-error">{{ $message }}</span>
                </label>
            @enderror
        </div>

        <!-- Actions -->
        <div class="form-control mt-6">
            <button type="submit" class="btn btn-primary w-full">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
                {{ __('Register') }}
            </button>
        </div>

        <!-- Login Link -->
        <div class="divider">{{ __('OR') }}</div>
        
        <div class="text-center">
            <a href="{{ route('login') }}" class="link link-primary">
                {{ __('Sudah punya akun?') }}
            </a>
        </div>
    </form>
</x-guest-layout>
