<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — CMS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen items-center justify-center bg-neutral-950 px-4 text-neutral-100 antialiased">
    <div class="w-full max-w-sm rounded-2xl border border-neutral-800 bg-neutral-900/70 p-7 shadow-2xl">
        <div class="mb-6 flex items-center gap-3">
            <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-lime-400 text-sm font-bold text-neutral-950">E.</span>
            <div>
                <h1 class="text-base font-semibold">CMS Login</h1>
                <p class="text-xs text-neutral-500">edits_dewww dashboard</p>
            </div>
        </div>

        @if ($errors->any())
            <div class="mb-4 rounded-lg border border-red-400/30 bg-red-400/10 px-3 py-2 text-xs text-red-300">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <label class="block">
                <span class="mb-1.5 block text-xs font-medium uppercase tracking-wide text-neutral-400">Email</span>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="w-full rounded-lg border border-neutral-700 bg-neutral-950 px-3 py-2 text-sm text-neutral-100 focus:border-lime-400 focus:outline-none focus:ring-1 focus:ring-lime-400">
            </label>

            <label class="block">
                <span class="mb-1.5 block text-xs font-medium uppercase tracking-wide text-neutral-400">Password</span>
                <input type="password" name="password" required
                       class="w-full rounded-lg border border-neutral-700 bg-neutral-950 px-3 py-2 text-sm text-neutral-100 focus:border-lime-400 focus:outline-none focus:ring-1 focus:ring-lime-400">
            </label>

            <label class="flex items-center gap-2 text-xs text-neutral-400">
                <input type="checkbox" name="remember" value="1" class="rounded border-neutral-700 bg-neutral-950 text-lime-400 focus:ring-lime-400">
                Ingat saya
            </label>

            <button type="submit" class="w-full rounded-lg bg-lime-400 px-4 py-2.5 text-sm font-semibold text-neutral-950 transition hover:bg-lime-300">
                Masuk
            </button>
        </form>

        <a href="{{ route('portfolio') }}" class="mt-5 block text-center text-xs text-neutral-500 transition hover:text-neutral-300">
            ← Kembali ke situs
        </a>
    </div>
</body>
</html>
