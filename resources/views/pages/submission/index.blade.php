<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        @if (session()->has('success'))
        <div alert
            class="relative p-4 pr-12 mb-4 text-white border border-solid rounded-lg bg-green-600">
            <strong>Berhasil !</strong>
            {{ session('success') }}
        </div>
        @endif
        <x-dashboard.welcome-banner />
    </div>
</x-app-layout>