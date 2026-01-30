<nav x-data="{ open: false }" class="navbar bg-base-100 shadow-lg">
    <div class="navbar-start">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"></path>
                </svg>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                @auth
                    @if (Auth::user()->isAdmin())
                        <li><a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.aspirasi.index') }}" class="{{ request()->routeIs('admin.aspirasi.*') ? 'active' : '' }}">Kelola Aspirasi</a></li>
                        <li><a href="{{ route('admin.kategori.index') }}" class="{{ request()->routeIs('admin.kategori.*') ? 'active' : '' }}">Kelola Kategori</a></li>
                    @else
                        <li><a href="{{ route('siswa.dashboard') }}" class="{{ request()->routeIs('siswa.dashboard') ? 'active' : '' }}">Dashboard</a></li>
                        <li><a href="{{ route('siswa.aspirasi.index') }}" class="{{ request()->routeIs('siswa.aspirasi.index') ? 'active' : '' }}">Aspirasi Saya</a></li>
                        <li><a href="{{ route('siswa.aspirasi.create') }}" class="{{ request()->routeIs('siswa.aspirasi.create') ? 'active' : '' }}">Buat Aspirasi</a></li>
                    @endif
                @endauth
            </ul>
        </div>
        <a class="btn btn-ghost text-xl font-bold">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
            </svg>
            Pengaduan Sarana Sekolah
        </a>
    </div>
    
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1">
            @auth
                @if (Auth::user()->isAdmin())
                    <li><a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.aspirasi.index') }}" class="{{ request()->routeIs('admin.aspirasi.*') ? 'active' : '' }}">Kelola Aspirasi</a></li>
                    <li><a href="{{ route('admin.kategori.index') }}" class="{{ request()->routeIs('admin.kategori.*') ? 'active' : '' }}">Kelola Kategori</a></li>
                @else
                    <li><a href="{{ route('siswa.dashboard') }}" class="{{ request()->routeIs('siswa.dashboard') ? 'active' : '' }}">Dashboard</a></li>
                    <li><a href="{{ route('siswa.aspirasi.index') }}" class="{{ request()->routeIs('siswa.aspirasi.index') ? 'active' : '' }}">Aspirasi Saya</a></li>
                    <li><a href="{{ route('siswa.aspirasi.create') }}" class="{{ request()->routeIs('siswa.aspirasi.create') ? 'active' : '' }}">Buat Aspirasi</a></li>
                @endif
            @endauth
        </ul>
    </div>
    
    <div class="navbar-end">
        <!-- Theme Switcher -->
        <div class="dropdown dropdown-end mr-2">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow max-h-60 overflow-y-auto">
                <li><button type="button" onclick="setTheme('light')" class="w-full text-left">🌞 Light</button></li>
                <li><button type="button" onclick="setTheme('dark')" class="w-full text-left">🌙 Dark</button></li>
                <li><button type="button" onclick="setTheme('cupcake')" class="w-full text-left">🧁 Cupcake</button></li>
                <li><button type="button" onclick="setTheme('bumblebee')" class="w-full text-left">🐝 Bumblebee</button></li>
                <li><button type="button" onclick="setTheme('emerald')" class="w-full text-left">💚 Emerald</button></li>
                <li><button type="button" onclick="setTheme('corporate')" class="w-full text-left">🏢 Corporate</button></li>
                <li><button type="button" onclick="setTheme('synthwave')" class="w-full text-left">🌆 Synthwave</button></li>
                <li><button type="button" onclick="setTheme('retro')" class="w-full text-left">📻 Retro</button></li>
                <li><button type="button" onclick="setTheme('cyberpunk')" class="w-full text-left">🤖 Cyberpunk</button></li>
                <li><button type="button" onclick="setTheme('valentine')" class="w-full text-left">💝 Valentine</button></li>
                <li><button type="button" onclick="setTheme('halloween')" class="w-full text-left">🎃 Halloween</button></li>
                <li><button type="button" onclick="setTheme('garden')" class="w-full text-left">🌸 Garden</button></li>
                <li><button type="button" onclick="setTheme('forest')" class="w-full text-left">🌲 Forest</button></li>
                <li><button type="button" onclick="setTheme('aqua')" class="w-full text-left">🌊 Aqua</button></li>
                <li><button type="button" onclick="setTheme('lofi')" class="w-full text-left">📼 Lofi</button></li>
                <li><button type="button" onclick="setTheme('pastel')" class="w-full text-left">🎨 Pastel</button></li>
                <li><button type="button" onclick="setTheme('fantasy')" class="w-full text-left">🦄 Fantasy</button></li>
                <li><button type="button" onclick="setTheme('wireframe')" class="w-full text-left">📐 Wireframe</button></li>
                <li><button type="button" onclick="setTheme('black')" class="w-full text-left">⚫ Black</button></li>
                <li><button type="button" onclick="setTheme('luxury')" class="w-full text-left">💎 Luxury</button></li>
                <li><button type="button" onclick="setTheme('dracula')" class="w-full text-left">🧛 Dracula</button></li>
                <li><button type="button" onclick="setTheme('cmyk')" class="w-full text-left">🖨️ CMYK</button></li>
                <li><button type="button" onclick="setTheme('autumn')" class="w-full text-left">🍂 Autumn</button></li>
                <li><button type="button" onclick="setTheme('business')" class="w-full text-left">💼 Business</button></li>
                <li><button type="button" onclick="setTheme('acid')" class="w-full text-left">🧪 Acid</button></li>
                <li><button type="button" onclick="setTheme('lemonade')" class="w-full text-left">🍋 Lemonade</button></li>
                <li><button type="button" onclick="setTheme('night')" class="w-full text-left">🌃 Night</button></li>
                <li><button type="button" onclick="setTheme('coffee')" class="w-full text-left">☕ Coffee</button></li>
                <li><button type="button" onclick="setTheme('winter')" class="w-full text-left">❄️ Winter</button></li>
            </ul>
        </div>

        @auth
            <!-- User Dropdown -->
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost">
                    <div class="avatar placeholder">
                        <div class="bg-neutral text-neutral-content w-8 rounded-full">
                            <span class="text-xs">{{ substr(Auth::user()->nama_user, 0, 2) }}</span>
                        </div>
                    </div>
                    <span class="ml-2 hidden sm:block">{{ Auth::user()->nama_user }}</span>
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
                <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                    <li>
                        <a href="{{ route('profile.edit') }}">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Profile
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                Log Out
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        @endauth
    </div>

    <script>
        function setTheme(theme) {
            document.documentElement.setAttribute('data-theme', theme);
            localStorage.setItem('theme', theme);
            console.log('Theme changed to:', theme);
        }
    </script>
</nav>
