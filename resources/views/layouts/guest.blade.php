<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-base-200 flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <!-- Theme Switcher -->
            <div class="absolute top-4 right-4">
                <div class="dropdown dropdown-end">
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
            </div>

            <div class="mb-6">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-primary" />
                </a>
            </div>

            <div class="w-full sm:max-w-md">
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>

        <script>
            function setTheme(theme) {
                document.documentElement.setAttribute('data-theme', theme);
                localStorage.setItem('theme', theme);
                console.log('Theme changed to:', theme);
                
                // Force a small delay to ensure theme is applied
                setTimeout(() => {
                    document.body.style.display = 'none';
                    document.body.offsetHeight; // Trigger reflow
                    document.body.style.display = '';
                }, 10);
            }

            // Load saved theme immediately when script runs
            (function() {
                const savedTheme = localStorage.getItem('theme') || 'light';
                document.documentElement.setAttribute('data-theme', savedTheme);
                console.log('Theme loaded:', savedTheme);
            })();
        </script>
    </body>
</html>
