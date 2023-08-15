<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <h3 class="font-semibold text-2xl mb-12">
            <i class="fa-solid fa-list-ol"></i>
            <span> Tes Wawancara</span>
        </h3>
        @if (session()->has('success'))
        <div alert
            class="relative p-4 pr-12 mb-4 text-white border border-solid rounded-lg bg-gradient-to-tl from-green-600 to-lime-400 border-lime-300">
            <strong>Berhasil !</strong>
            {{ session('success') }}
        </div>
        @endif
        {{-- Form Pertanyaan --}}
        <div class="bg-white rounded-lg shadow-sm px-8 py-8">
            <form action="{{ route('tes-wawancara.save') }}" method="POST">
                @csrf
                @foreach ($pertanyaans as $per)
                <div class="mb-4">
                    <h2 class="text-lg mb-4">{{ $loop->iteration }}. {{ $per->pertanyaan }}</h2>
                    <textarea class="rounded-lg" name="jawaban[{{ $per->id }}]" cols="50" rows="3"></textarea>
                </div>
                @endforeach
                <button type="submit" class="px-4 py-2 bg-indigo-500 rounded-lg text-white shadow-sm hover:opacity-80 ease-in-out transition duration-300">Simpan</button>
            </form>
        </div>
    </div>
</x-app-layout>