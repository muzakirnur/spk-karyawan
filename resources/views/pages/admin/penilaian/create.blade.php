<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <h3 class="font-semibold text-2xl mb-12">
            <i class="fa-solid fa-pen"></i>
            <span> Tambah Penilaian</span>
        </h3>
        <div class="bg-white px-8 py-12 shadow-lg rounded-lg mb-8 dark:bg-slate-500 dark:text-slate-200">
            <div class="mb-4">
                <h3 class="font-semibold text-lg">
                    <i class="fa-regular fa-user"></i>
                    Data Pelamar
                </h3>
            </div>
            <div class="table-responsive mb-8">
                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500 dark:text-slate-200">
                    <tbody>
                            <tr class="border">
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-sm font-semibold leading-tight">
                                        NIK
                                    </p>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-sm font-semibold leading-tight">
                                        {{ $pelamar->nik }}
                                    </p>
                                </td>
                            </tr>
                            <tr class="border">
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-sm font-semibold leading-tight">
                                        Nama
                                    </p>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-sm font-semibold leading-tight">
                                        {{ $pelamar->nama }}
                                    </p>
                                </td>
                            </tr>
                            <tr class="border">
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-sm font-semibold leading-tight">
                                        Tempat Lahir
                                    </p>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-sm font-semibold leading-tight">
                                       {{$pelamar->tempat_lahir}}
                                    </p>
                                </td>
                            </tr>
                            <tr class="border">
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-sm font-semibold leading-tight">
                                        Tanggal Lahir
                                    </p>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-sm font-semibold leading-tight">
                                       {{date('d-m-Y', strtotime($pelamar->tanggal_lahir))}}
                                    </p>
                                </td>
                            </tr>
                            <tr class="border">
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-sm font-semibold leading-tight">
                                        Jenis Kelamin
                                    </p>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-sm font-semibold leading-tight">
                                        {{ $pelamar->jenis_kelamin }}
                                    </p>
                                </td>
                            </tr>
                            <tr class="border">
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-sm font-semibold leading-tight">
                                        Email
                                    </p>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-sm font-semibold leading-tight">
                                        {{ $pelamar->email }}
                                    </p>
                                </td>
                            </tr>
                            <tr class="border">
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-sm font-semibold leading-tight">
                                        Jarak Rumah 
                                    </p>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-sm font-semibold leading-tight">
                                        {{ $pelamar->jarak_rumah }} Km
                                    </p>
                                </td>
                            </tr>
                            <tr class="border">
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-sm font-semibold leading-tight">
                                        Nilai IPK
                                    </p>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-sm font-semibold leading-tight">
                                        {{ $pelamar->ipk }}
                                    </p>
                                </td>
                            </tr>
                            <tr class="border">
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-sm font-semibold leading-tight">
                                        Pendidikan
                                    </p>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-sm font-semibold leading-tight">
                                        {{ $pelamar->pendidikan }}
                                    </p>
                                </td>
                            </tr>
                            <tr class="border">
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-sm font-semibold leading-tight">
                                        Pengalaman
                                    </p>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-sm font-semibold leading-tight">
                                        {{ $pelamar->pengalaman }}
                                    </p>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
            <div class="table-responsive mb-8">
                <h3 class="font-semibold text-lg mb-2">
                    <i class="fa-solid fa-square-poll-vertical"></i>
                    Tes Teori
                </h3>
                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500 dark:text-slate-200">
                    <tbody>
                            <tr class="border">
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-sm font-semibold leading-tight">
                                        Tes Teori
                                    </p>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-sm font-semibold leading-tight">
                                        {{ $nilaiTeori }}
                                    </p>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
            <div class="table-responsive mb-8">
                <h3 class="font-semibold text-lg mb-2">
                    <i class="fa-solid fa-clipboard-question"></i>
                    Wawancara
                </h3>
                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500 dark:text-slate-200 border">
                    <thead>
                        <tr>
                            <th class="text-left p-2">Pertanyaan</th>
                            <th class="text-left p-2">Jawaban</th>
                        </tr>
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($wawancara as $tes)
                        <tr class="border">
                            <td class="p-2 bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <p class="mb-0 text-sm font-semibold leading-tight">
                                    {{ $tes->pertanyaan->pertanyaan }}
                                </p>
                            </td>
                            <td class="p-2 bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <p class="mb-0 text-sm font-semibold leading-tight">
                                    {{ $tes->jawaban }}
                                </p>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <form action="{{ route('admin.penilaian.save', Crypt::encrypt($pelamar->id)) }}" method="POST">
            <div class="px-8 py-8 bg-white rounded-lg shadow-lg mb-8">
                <h3 class="font-semibold text-lg mb-2">
                    <i class="fa-solid fa-edit"></i>
                    Form Penilaian Pelamar
                </h3>
                @csrf
                @foreach ($kriteria as $kr)
                @php
                    $sub = $subKriteria->where('criteria_id', $kr->id)->get();
                    $value[$kr->id] = $penilaian->where('criteria_id', $kr->id)->first();
                @endphp
                <label class="mb-2 ml-1 font-bold text-xs text-slate-700">{{ $kr->nama }} ({{ $kr->kode_kriteria }})</label>
                <div class="mb-4">
                    <select id="penilaian"
                        class="js-example-basic-single w-full leading-5.6 py-2 px-2 rounded-lg text-gray-700 focus:border-blue-400 border-gray-300 text-sm bg-white"
                        name="penilaian[{{ $kr->id }}]" required>
                        <option class="text-gray-300" selected value="{{ $value[$kr->id] != null ? $value[$kr->id]->sub_criteria_id : '' }}"/>{{ $value[$kr->id] != null ? $value[$kr->id]->subCriteria->nama : 'Pilih' }}</option>
                        @foreach ($sub as $sb)
                        <option value="{{ $sb->id }}">{{ $sb->nama }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('penilaian[]')" class="mt-2" />
                @endforeach
                </div>
                <div class="flex flex-wrap justify-between">
                    <a href="{{ route('admin.penilaian.index') }}" class="px-4 py-2 bg-slate-500 rounded-lg text-white shadow-sm hover:opacity-80 ease-in-out transition duration-300"><i class="fa-solid fa-chevron-left"></i> Kembali</a>
                    <button type="submit" class="px-4 py-2 bg-indigo-500 rounded-lg text-white shadow-sm hover:opacity-80 ease-in-out transition duration-300">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>