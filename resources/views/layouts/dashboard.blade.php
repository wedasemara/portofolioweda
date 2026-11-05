<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') — CMS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-neutral-950 text-neutral-100 antialiased">
    <div class="mx-auto flex max-w-7xl flex-col gap-8 px-4 py-6 lg:flex-row lg:px-8 lg:py-10">
        <aside class="lg:w-56 lg:shrink-0">
            <div class="mb-6 flex items-center gap-3">
                <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-lime-400 text-sm font-bold text-neutral-950">E.</span>
                <div>
                    <p class="text-sm font-semibold">CMS</p>
                    <p class="text-xs text-neutral-500">edits_dewww</p>
                </div>
            </div>

            <nav class="flex flex-wrap gap-2 lg:flex-col">
                <a href="{{ route('dashboard') }}"
                   class="rounded-lg px-3 py-2 text-sm transition {{ request()->routeIs('dashboard') ? 'bg-neutral-800 text-white' : 'text-neutral-400 hover:bg-neutral-900 hover:text-white' }}">
                    Dashboard
                </a>
                <a href="{{ route('dashboard.content.edit') }}"
                   class="rounded-lg px-3 py-2 text-sm transition {{ request()->routeIs('dashboard.content.*') ? 'bg-neutral-800 text-white' : 'text-neutral-400 hover:bg-neutral-900 hover:text-white' }}">
                    Konten
                </a>
                <a href="{{ route('dashboard.projects.index') }}"
                   class="rounded-lg px-3 py-2 text-sm transition {{ request()->routeIs('dashboard.projects.*') ? 'bg-neutral-800 text-white' : 'text-neutral-400 hover:bg-neutral-900 hover:text-white' }}">
                    Projects
                </a>
                <a href="{{ route('portfolio') }}" target="_blank"
                   class="rounded-lg px-3 py-2 text-sm text-neutral-400 transition hover:bg-neutral-900 hover:text-white">
                    Lihat situs ↗
                </a>
            </nav>

            <div class="mt-6 border-t border-neutral-800 pt-4">
                <p class="truncate text-xs text-neutral-500">{{ auth()->user()?->name }}</p>
                <p class="truncate text-xs text-neutral-600">{{ auth()->user()?->email }}</p>
                <form method="POST" action="{{ route('logout') }}" class="mt-3">
                    @csrf
                    <button type="submit" class="text-xs text-neutral-400 transition hover:text-red-400">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <main class="min-w-0 flex-1">
            @if (session('status'))
                <div class="mb-5 rounded-lg border border-lime-400/30 bg-lime-400/10 px-4 py-3 text-sm text-lime-300">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-5 rounded-lg border border-red-400/30 bg-red-400/10 px-4 py-3 text-sm text-red-300">
                    <p class="font-medium">Ada input yang perlu diperbaiki.</p>
                    <ul class="mt-1 list-inside list-disc text-xs">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>
</html>
