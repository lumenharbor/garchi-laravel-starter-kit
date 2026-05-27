<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel × Garchi CMS</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=dm-mono:400,500&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
    <style>
        body { font-family: 'DM Mono', monospace; }
    </style>
</head>
<body class="antialiased bg-[#0a0a0a] text-white min-h-screen overflow-x-hidden">

    <!-- Ambient grid -->
    <div class="pointer-events-none fixed inset-0 opacity-[0.04]"
         style="background-image: linear-gradient(#e5e5e5 1px, transparent 1px), linear-gradient(90deg, #e5e5e5 1px, transparent 1px); background-size: 48px 48px;"></div>

    <!-- Accent blobs -->
    <div class="pointer-events-none fixed -top-32 -right-32 w-[480px] h-[480px] rounded-full bg-[#ff3c3c] opacity-[0.12] blur-[100px]"></div>
    <div class="pointer-events-none fixed -bottom-32 -left-32 w-[360px] h-[360px] rounded-full bg-[#ff3c3c] opacity-[0.07] blur-[90px]"></div>

    <!-- Header -->
    <header class="relative z-10 flex items-center justify-between px-8 py-6 border-b border-white/[0.06]">
        <div class="flex items-center gap-3">
            <span class="w-2 h-2 rounded-full bg-[#ff3c3c] animate-pulse"></span>
            <span class="text-xs uppercase tracking-[0.25em] text-white/40">Starter Kit</span>
        </div>

        <div class="flex items-center gap-6">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/home') }}"
                       class="text-xs uppercase tracking-[0.2em] text-white/40 hover:text-white transition-colors duration-200">
                        Home
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="text-xs uppercase tracking-[0.2em] text-white/40 hover:text-white transition-colors duration-200">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="text-xs uppercase tracking-[0.2em] text-white/40 hover:text-white transition-colors duration-200">
                            Register
                        </a>
                    @endif
                @endauth
            @endif

            <a href="https://garchi.co.uk" target="_blank" rel="noopener noreferrer"
               class="opacity-60 hover:opacity-100 transition-opacity duration-200">
                <img src="/garchi_logo.png" alt="Garchi Logo" width="72" height="18"  />
            </a>
        </div>
    </header>

    <div class="relative z-10 max-w-4xl px-8">

        <!-- Hero -->
        <section class="pt-20 pb-16">
            <p class="text-xs uppercase tracking-[0.3em] text-[#ff3c3c] mb-5">
                Garchi CMS × Laravel
            </p>
            <h1 class="text-[clamp(2.8rem,6vw,5rem)] font-bold leading-[1.05] tracking-tight mb-6">
                Your content,<br>
                <span class="text-white/20">your structure,</span><br>
                your rules.
            </h1>
            <p class="text-white/40 text-base max-w-md leading-relaxed">
                An API-first headless CMS built for developers who think in components. Get set up in minutes.
            </p>
            <a href="https://garchi.co.uk/mcp-docs" target="_blank" rel="noopener noreferrer"
               class="mt-6 inline-flex items-center gap-2 rounded-full border border-[#ff3c3c]/30 bg-[#ff3c3c]/[0.07] px-4 py-1.5 hover:bg-[#ff3c3c]/[0.12] transition-colors duration-200">
                <span class="w-1.5 h-1.5 rounded-full bg-[#ff3c3c]"></span>
                <span class="text-[11px] uppercase tracking-[0.2em] text-[#ff3c3c]">MCP-native — AI agent ready</span>
            </a>
        </section>

        <!-- Steps -->
        <section class="pb-20">
            <div class="max-w-2xl divide-y divide-white/[0.06] border-t border-white/[0.06]">
                @php
                $steps = [
                    ['num' => '01', 'pre' => 'Add your Garchi API key in ', 'code' => '.env', 'post' => ''],
                    ['num' => '02', 'pre' => 'Create your first page on ', 'link' => ['href' => 'https://garchi.co.uk', 'label' => 'Garchi CMS'], 'post' => ''],
                    ['num' => '03', 'pre' => 'Check out ', 'code' => 'app/Http/Controllers/GarchiController.php', 'post' => ' for example usage'],
                    ['num' => '04', 'pre' => 'Check out ', 'code' => 'resources/views/garchi', 'post' => ' for example Blade components'],
                    ['num' => '05', 'pre' => 'Check out ', 'code' => 'routes/web.php', 'post' => ' to wire up your Garchi pages'],
                ];
                @endphp

                @foreach($steps as $step)
                <div class="group flex items-start gap-6 py-5 hover:bg-white/[0.02] -mx-4 px-4 transition-colors duration-200 rounded-sm">
                    <span class="shrink-0 text-[#ff3c3c] text-xs mt-0.5 tabular-nums">{{ $step['num'] }}</span>
                    <p class="text-white/60 text-sm leading-relaxed group-hover:text-white/80 transition-colors">
                        {{ $step['pre'] }}
                        @if(isset($step['code']))
                            <code class="text-white bg-white/[0.08] border border-white/[0.1] rounded px-1.5 py-0.5 text-xs font-mono">{{ $step['code'] }}</code>
                        @endif
                        @if(isset($step['link']))
                            <a href="{{ $step['link']['href'] }}" target="_blank" rel="noopener noreferrer"
                               class="text-[#ff3c3c] underline underline-offset-2 decoration-[#ff3c3c]/40 hover:decoration-[#ff3c3c] transition-colors">
                                {{ $step['link']['label'] }}
                            </a>
                        @endif
                        {{ $step['post'] }}
                    </p>
                </div>
                @endforeach
            </div>
        </section>

        <!-- Cards -->
        <section class="pb-24">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 max-w-3xl">

                <a href="https://garchi.co.uk/documentation" target="_blank" rel="noopener noreferrer"
                   class="group relative overflow-hidden rounded-lg border border-white/[0.08] bg-white/[0.03] p-6 hover:border-[#ff3c3c]/40 hover:bg-white/[0.05] transition-all duration-300">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-[#ff3c3c] opacity-0 group-hover:opacity-[0.05] blur-2xl transition-opacity duration-500 rounded-full"></div>
                    <p class="text-[10px] uppercase tracking-[0.25em] text-white/25 mb-3">01 / Learn</p>
                    <h2 class="text-lg font-semibold mb-2 flex items-center gap-2">
                        Documentation
                        <span class="text-white/20 group-hover:text-[#ff3c3c] group-hover:translate-x-1 inline-block transition-all duration-200">→</span>
                    </h2>
                    <p class="text-sm text-white/35 leading-relaxed">
                        In-depth reference for features, API endpoints, and usage patterns.
                    </p>
                </a>

                <a href="https://garchi.co.uk/signup" target="_blank" rel="noopener noreferrer"
                   class="group relative overflow-hidden rounded-lg border border-white/[0.08] bg-white/[0.03] p-6 hover:border-[#ff3c3c]/40 hover:bg-white/[0.05] transition-all duration-300">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-[#ff3c3c] opacity-0 group-hover:opacity-[0.05] blur-2xl transition-opacity duration-500 rounded-full"></div>
                    <p class="text-[10px] uppercase tracking-[0.25em] text-white/25 mb-3">02 / Start</p>
                    <h2 class="text-lg font-semibold mb-2 flex items-center gap-2">
                        Sign Up Free
                        <span class="text-white/20 group-hover:text-[#ff3c3c] group-hover:translate-x-1 inline-block transition-all duration-200">→</span>
                    </h2>
                    <p class="text-sm text-white/35 leading-relaxed">
                        Create an account and start building your content structure instantly.
                    </p>
                </a>

                <a href="https://garchi.co.uk/mcp-docs" target="_blank" rel="noopener noreferrer"
                   class="group relative overflow-hidden rounded-lg border border-[#ff3c3c]/20 bg-[#ff3c3c]/[0.04] p-6 hover:border-[#ff3c3c]/50 hover:bg-[#ff3c3c]/[0.08] transition-all duration-300">
                    <div class="absolute top-0 right-0 w-28 h-28 bg-[#ff3c3c] opacity-0 group-hover:opacity-[0.08] blur-2xl transition-opacity duration-500 rounded-full"></div>
                    <p class="text-[10px] uppercase tracking-[0.25em] text-[#ff3c3c]/60 mb-3">03 / Agents</p>
                    <h2 class="text-lg font-semibold mb-2 flex items-center gap-2">
                        MCP Integration
                        <span class="text-white/20 group-hover:text-[#ff3c3c] group-hover:translate-x-1 inline-block transition-all duration-200">→</span>
                    </h2>
                    <p class="text-sm text-white/35 leading-relaxed">
                        Connect AI agents to your content via the native MCP server. No extra glue code.
                    </p>
                </a>

            </div>
        </section>

    </div>

    <!-- Footer -->
    <footer class="relative z-10 px-8 py-4 border-t border-white/[0.06] flex items-center justify-between">
        <span class="text-[10px] uppercase tracking-[0.25em] text-white/20">Garchi CMS</span>
        <span class="text-[10px] text-white/20">
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} · PHP v{{ PHP_VERSION }} · API-first · Headless · MCP-native
        </span>
    </footer>

</body>
</html>