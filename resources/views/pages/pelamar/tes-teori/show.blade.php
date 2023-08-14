<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <h3 class="font-semibold text-2xl mb-12">
            <i class="fa-solid fa-list-ol"></i>
            <span> Hasil Tes Teori</span>
        </h3>
        <div class="bg-white px-8 py-12 shadow-lg rounded-lg mb-8 dark:bg-slate-500 dark:text-slate-200">
            <div class="table-responsive mb-8">
                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500 dark:text-slate-200">
                    <thead>
                        <tr>
                            <th class="text-left">Pertanyaan</th>
                            <th class="text-left">Jawaban</th>
                            <th class="text-left">Nilai</th>
                        </tr>
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($tesTeori as $tes)
                        <tr class="border">
                            <td class="p-2 bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <p class="mb-0 text-sm font-semibold leading-tight">
                                    {{ $tes->pertanyaan->pertanyaan }}
                                </p>
                            </td>
                            <td class="p-2 bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <p class="mb-0 text-sm font-semibold leading-tight">
                                    {{ $tes->jawaban->pilihan }}
                                </p>
                            </td>
                            <td class="p-2 bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <p class="mb-0 text-sm font-semibold leading-tight">
                                    {{ $tes->nilai }}
                                </p>
                            </td>
                        </tr>
                        @endforeach
                        <tr class="border">
                            <td colspan="2" class="p-2 bg-transparent border-b whitespace-nowrap shadow-transparent text-center">Total</td>
                            <td class="p-2 bg-transparent border-b whitespace-nowrap shadow-transparent">{{ $tesTeori->sum('nilai') / $tesTeori->count() * 10}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <a href="{{ route('dashboard-pelamar') }}" class="px-4 py-2 bg-slate-500 rounded-lg text-white shadow-sm hover:opacity-80 ease-in-out transition duration-300"><i class="fa-solid fa-chevron-left"></i> Kembali</a>
        </div>
    </div>
</x-app-layout>