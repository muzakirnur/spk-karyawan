<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <div class="flex flex-wrap justify-between">
            <div class="mb-12">
                <h3 class="font-semibold text-2xl">
                    <i class="fa-solid fa-section"></i>
                    <span> Data Sub Kriteria</span>
                </h3>
            </div>
        </div>
        @if (session()->has('success'))
        <div alert
            class="relative p-4 pr-12 mb-4 text-white border border-solid rounded-lg bg-gradient-to-tl from-green-600 to-lime-400 border-lime-300">
            <strong>Berhasil !</strong>
            {{ session('success') }}
        </div>
        @endif
        @foreach ($tables as $tab)
        <div class="bg-white px-8 py-12 shadow-lg rounded-lg mb-8">
            <div class="flex flex-wrap justify-between">
                <h2 class="font-semibold text-lg">
                    <i class="fa-brands fa-uncharted"></i>
                    {{ $tab->nama }} ({{ $tab->kode_kriteria }})
                </h2>
                <a href="{{ route('admin.sub-kriteria.create', Crypt::encrypt($tab->id)) }}" class="bg-teal-700 text-white rounded-lg px-4 py-2 shadow-sm text-sm font-semibold transition ease-in-out duration-300 hover:opacity-80">
                    <i class="fa-solid fa-plus"></i>
                    Tambah Subkriteria
                </a>
            </div>
            <div class="table-responsive">
                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                    <thead class="align-bottom">
                        <tr>
                            <th
                                class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">
                                Nama Sub Kriteria</th>
                            <th
                                class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">
                                Nilai</th>
                            <th
                                class="text-center px-6 py-3 pl-2 font-bold uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">
                                Aksi    </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $data = $subkriteria->query()->where('criteria_id', $tab->id)->get();
                        @endphp
                        @foreach ($data as $row)
                            <tr>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-sm font-semibold leading-tight">
                                        {{ $row->nama }}
                                    </p>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    {{ $row->nilai }}
                                </td>
                                <td class="text-center p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <a href="{{ route('admin.sub-kriteria.edit', Crypt::encrypt($row->id)) }}" class="py-2 mr-2 px-4 text-sm bg-indigo-500 text-white rounded-lg hover:opacity-80 transition duration-300 ease-in-out shadow-sm">
                                        <i class="fa-solid fa-eye"></i> Lihat
                                    </a>
                                    <a href="{{ route('admin.sub-kriteria.destroy', Crypt::encrypt($row->id)) }}"
                                        class="py-2 px-4 bg-red-500 text-sm text-white rounded-lg hover:opacity-80 transition duration-300 ease-in-out shadow-sm">
                                        <i class="fa-solid fa-trash"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>