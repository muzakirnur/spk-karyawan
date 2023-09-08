<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <div class="flex flex-wrap justify-between">
            <div class="mb-12">
                <h3 class="font-semibold text-2xl">
                    <i class="fa-brands fa-uncharted"></i>
                    <span> Perhitungan TOPSIS</span>
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
        @if ($checkPenilaian <= 1)
            <p>Data Belum ada, Atau Belum Memenuhi !!</p>
        @else
            <div class="bg-white px-8 py-12 shadow-lg rounded-lg mb-8">
                <h3 class="font-semibold text-lg mb-4">
                    Hasil Penilaian
                </h3>
                <div class="table-responsive">
                    <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                        <thead class="align-bottom">
                            <tr>
                                <th
                                    class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">
                                    Nama Pelamar</th>
                                    @foreach ($kriterias as $kriteria)
                                    <th
                                        class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">
                                        {{ $kriteria->kode_kriteria }}</th>
                                    @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelamars as $pelamar)
                            <tr>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-sm font-semibold leading-tight">
                                        {{ $pelamar->nama }}
                                    </p>
                                </td>
                                @foreach ($kriterias as $kriteria)
                                @php
                                    $nilaiA = $penilaians->where('criteria_id', $kriteria->id)->where('pelamar_id', $pelamar->id)->whereYear('created_at', date('Y', strtotime(now())))->first();
                                @endphp
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    {{ $nilaiA->nilai }}
                                </td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bg-white px-8 py-12 shadow-lg rounded-lg mb-8">
                <h3 class="font-semibold text-lg mb-4">
                    Pembobotan Kriteria
                </h3>
                <div class="table-responsive">
                    <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                        <thead class="align-bottom">
                            <tr>
                                <th
                                    class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">
                                    Kode</th>
                                <th
                                    class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">
                                    Kriteria</th>
                                <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">
                                    Bobot (%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kriterias as $kriteria)
                            <tr>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-sm font-semibold leading-tight">
                                        {{ $kriteria->kode_kriteria }}
                                    </p>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    {{ $kriteria->nama }}
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    {{ $kriteria->bobot }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bg-white px-8 py-12 shadow-lg rounded-lg mb-8">
                <h3 class="font-semibold text-lg mb-4">
                    Matriks Ternormalisasi
                </h3>
                <div class="table-responsive">
                    <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                        <thead class="align-bottom">
                            <tr>
                                <tr>
                                    <th rowspan="3"
                                        class="px-6 py-3 pl-2 font-bold border text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">
                                        Nama</th>
                                    <th colspan="6" scope="colgroup" class="px-6 py-3 pl-2 border font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">Kriteria</th>
                                </tr>
                                <tr>
                                    @foreach ($kriterias as $kriteria) 
                                    <th scope="col" class="px-6 py-3 pl-2 border-r font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">{{ $kriteria->nama }}</th>
                                    @endforeach
                                </tr>
                                <tr>
                                    @foreach ($kriterias as $kriteria) 
                                    <th scope="col" class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b border-r border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">{{ $kriteria->kode_kriteria }}</th>
                                    @endforeach
                                </tr>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" class="bg-yellow-300 border align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-lg uppercase font-semibold leading-tight">
                                        Pembagi
                                    </p>
                                </th>
                                @foreach ($kriterias as $kr)
                                @php
                                    $getNilai[$kr->id] = $penilaians->where('criteria_id', $kr->id)->get();
                                    $pow[$kr->id] = 0.00;
                                    foreach ($getNilai[$kr->id] as $key) {
                                       $a = pow($key->nilai,2);
                                       $pow[$kr->id] = $pow[$kr->id] + $a;
                                    }
                                    $squareRoot[$kr->id] = sqrt($pow[$kr->id]);
                                @endphp
                                <td class="bg-yellow-300 align-middle font-bold border-r text-center bg-transparent border-b whitespace-nowrap shadow-transparent">{{ $squareRoot[$kr->id] }}</td>
                                @endforeach
                            </tr>
                            @foreach ($pelamars as $pelamar)
                            <tr>
                                <th scope="row" class="p-2 border align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-sm font-semibold leading-tight">
                                        {{ $pelamar->nama }}
                                    </p>
                                </th>
                                @foreach ($kriterias as $kr)
                                @php
                                    $nilaiPelamar[$kr->id] = $penilaians->where('pelamar_id', $pelamar->id)->where('criteria_id', $kr->id)->whereYear('created_at', date('Y', strtotime(now())))->first();
                                    $nilaiPelamar[$kr->id] = $nilaiPelamar[$kr->id]->nilai/$squareRoot[$kr->id];
                                @endphp
                                <td class="p-2 align-middle border-r text-center bg-transparent border-b whitespace-nowrap shadow-transparent">{{ $nilaiPelamar[$kr->id] }}</td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bg-white px-8 py-12 shadow-lg rounded-lg mb-8">
                <h3 class="font-semibold text-lg mb-4">
                    Pembobotan Kriteria Bobot (Y)
                </h3>
                <div class="table-responsive">
                    <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                        <thead class="align-bottom">
                            <tr>
                                <tr>
                                    <th rowspan="3"
                                        class="px-6 py-3 pl-2 font-bold border text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">
                                        Nama</th>
                                </tr>
                                <tr>
                                    @foreach ($kriterias as $kriteria) 
                                    <th scope="col" class="px-6 py-3 pl-2 border-r border-t font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">{{ $kriteria->kode_kriteria }}</th>
                                    @endforeach
                                </tr>
                                <tr>
                                    @foreach ($kriterias as $kriteria) 
                                    <th scope="col" class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b border-r border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">Y{{ $loop->iteration }}</th>
                                    @endforeach
                                </tr>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelamars as $pelamar)
                            <tr>
                                <th scope="row" class="p-2 border align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-sm font-semibold leading-tight">
                                        {{ $pelamar->nama }}
                                    </p>
                                </th>
                                @foreach ($kriterias as $kr)
                                @php
                                    $matriksY[$kr->kode_kriteria][$pelamar->id] = [];
                                    $getNilaiPelamar[$kr->id] = $penilaians->where('pelamar_id', $pelamar->id)->where('criteria_id', $kr->id)->whereYear('created_at', date('Y', strtotime(now())))->first();
                                    $getNilaiPelamar[$kr->id] = $getNilaiPelamar[$kr->id]->nilai/$squareRoot[$kr->id];
                                    $nilaiY[$kr->id] = $getNilaiPelamar[$kr->id]*$kr->bobot;
                                    array_push($matriksY[$kr->kode_kriteria][$pelamar->id], $nilaiY[$kr->id]);
                                    $jarak[$pelamar->id][$kr->id] = $nilaiY[$kr->id];
                                @endphp
                                <td class="p-2 align-middle border-r text-center bg-transparent border-b whitespace-nowrap shadow-transparent">{{ $nilaiY[$kr->id] }}</td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bg-white px-8 py-12 shadow-lg rounded-lg mb-8">
                <h3 class="font-semibold text-lg mb-4">
                    Matriks Solusi Ideal Positif dan Negatif
                </h3>
                <div class="table-responsive">
                    <table class="items-center w-full mb-4 align-top border-gray-200 text-slate-500">
                        <thead class="align-bottom">
                            <tr>
                                <th scope="col" class="px-6 py-3 pl-2 border-r border-l border-t font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">Positif</th>
                                <th scope="col" class="px-6 py-3 pl-2 border-r border-t font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">A+</th>
                                <th scope="col" class="px-6 py-3 pl-2 border-r border-t font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">Negatif</th>
                                <th scope="col" class="px-6 py-3 pl-2 border-r border-t font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">A-</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($kriterias as $kr)
                                <th scope="row" class="p-2 border align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-sm font-semibold leading-tight">
                                        Y{{ $loop->iteration }} {{ $kr->type == "BENEFIT" ? "+" : "-" }}
                                    </p>
                                    <td class="p-2 align-middle border-r text-center bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        @php
                                        if($kr->type == "BENEFIT"){
                                            $getMax = max($matriksY[$kr->kode_kriteria]);
                                        } else {
                                            $getMax = min($matriksY[$kr->kode_kriteria]);
                                        }
                                            echo $getMax[0];
                                        @endphp
                                    </td>
                                </th>
                                <th scope="row" class="p-2 border align-middle bg-transparent border-b whitespace-nowrap shadow-transparent"la>
                                    <p class="mb-0 text-sm font-semibold leading-tight">
                                        Y{{ $loop->iteration }} {{ $kr->type == "BENEFIT" ? "-" : "+" }}
                                    </p>
                                    <td class="p-2 align-middle border-r text-center bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        @php
                                        if($kr->type == "BENEFIT"){
                                            $getMax = min($matriksY[$kr->kode_kriteria]);
                                        } else {
                                            $getMax = max($matriksY[$kr->kode_kriteria]);
                                        }
                                            echo $getMax[0];
                                        @endphp
                                    </td>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <table class="items-center w-full mb-4 align-top border-gray-200 text-slate-500">
                        <thead class="align-bottom">
                            <tr>
                                <th scope="col" class="px-6 py-3 pl-2 border-r border-l border-t font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">Solusi Ideal Positif</th>
                                <th scope="col" class="px-6 py-3 pl-2 border-r border-l border-t font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">A+</th>
                                @foreach ($kriterias as $kr)
                                @php
                                    if($kr->type == "BENEFIT"){
                                        $getMax = max($matriksY[$kr->kode_kriteria]);
                                    } else {
                                        $getMax = min($matriksY[$kr->kode_kriteria]);
                                    }
                                    $positif[$kr->id] = $getMax;
                                @endphp 
                                <th scope="col" class="px-6 py-3 pl-2 border-r border-l border-t font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">{{ $getMax[0] }}</th>
                                @endforeach   
                            </tr>
                            <tr>
                                <th scope="col" class="px-6 py-3 pl-2 border-r border-l border-t font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">Solusi Ideal Negatif</th>
                                <th scope="col" class="px-6 py-3 pl-2 border-r border-l border-t font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">A-</th>
                                @foreach ($kriterias as $kr)
                                @php
                                    if($kr->type == "BENEFIT"){
                                        $getMax = min($matriksY[$kr->kode_kriteria]);
                                    } else {
                                        $getMax = max($matriksY[$kr->kode_kriteria]);
                                    }
                                    $negatif[$kr->id] = $getMax;
                                @endphp 
                                <th scope="col" class="px-6 py-3 pl-2 border-r border-l border-t font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">{{ $getMax[0] }}</th>
                                @endforeach
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="bg-white px-8 py-12 shadow-lg rounded-lg mb-8">
                <h3 class="font-semibold text-lg mb-4">
                    Jarak Antara Setiap Nilai Alternatif dengan Matriks Solusi Ideal Positif & Negatif
                </h3>
                <div class="table-responsive">
                    <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                        <thead class="align-bottom">
                            <tr>
                                <th
                                    class="px-6 py-3 pl-2 text-center border-t border-r border-l font-bold uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">
                                    Nama</th>
                                <th
                                    class="px-6 py-3 pl-2 text-center border-t border-r font-bold uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">
                                    Jarak Alternatif</th>
                                <th class="px-6 py-3 pl-2 text-center border-t border-r font-bold uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">
                                    D+</th>
                                <th class="px-6 py-3 pl-2 text-center border-t border-r font-bold uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">
                                    Positif +</th>
                                <th class="px-6 py-3 pl-2 text-center border-t border-r font-bold uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">
                                    D-</th>
                                <th class="px-6 py-3 pl-2 text-center border-t border-r font-bold uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">
                                    Negatif</th>
                                <th class="px-6 py-3 pl-2 text-center border-t border-r font-bold uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">
                                    (D+) + (D-)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelamars as $pelamar)      
                            <tr>
                                <td class="p-2 align-middle text-center border bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    {{ $pelamar->nama }}
                                </td>
                                <td class="p-2 align-middle text-center border bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    A{{ $loop->iteration }}
                                </td>
                                <td class="p-2 align-middle text-center border bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    D{{ $loop->iteration }}+
                                </td>
                                @php
                                    // Menhitung Positif
                                    $hasilPositif = 0;
                                    $hasilNegatif = 0;
                                    foreach($kriterias as $kr){
                                        $nilaiPositif = $positif[$kr->id][0] - $jarak[$pelamar->id][$kr->id];
                                        $nilaiNegatif = $negatif[$kr->id][0] - $jarak[$pelamar->id][$kr->id];
                                        $nilaiPositif = pow($nilaiPositif, 2);
                                        $nilaiNegatif = pow($nilaiNegatif, 2);
                                        $hasilPositif = $hasilPositif + $nilaiPositif;
                                        $hasilNegatif = $hasilNegatif + $nilaiNegatif;
                                    }
                                    $hasilPositif = sqrt($hasilPositif);
                                    $hasilNegatif = sqrt($hasilNegatif);
                                    $pertambahanNilai = $hasilPositif + $hasilNegatif;
                                    $hn[$pelamar->id] = $hasilNegatif;
                                    $pn[$pelamar->id] = $pertambahanNilai;
                                @endphp
                                <td class="p-2 align-middle text-center border bg-transparent border-b whitespace-nowrap shadow-transparent">
                                   {{ $hasilPositif }}
                                </td>
                                <td class="p-2 align-middle text-center border bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    D{{ $loop->iteration }}-
                                </td>
                                <td class="p-2 align-middle text-center border bg-transparent border-b whitespace-nowrap shadow-transparent">
                                   {{ $hasilNegatif }}
                                </td>
                                <td class="p-2 align-middle text-center border bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    {{ $pertambahanNilai }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <form action="{{ route('admin.perhitungan.save') }}" method="POST">
                @csrf
            <div class="bg-white px-8 py-12 shadow-lg rounded-lg mb-8">
                <h3 class="font-semibold text-lg mb-4">
                    Nilai Preferensi dari Setiap Kriteria
                </h3>
                <div class="table-responsive">
                    <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                        <thead class="align-bottom">
                            <tr>
                                <th
                                    class="px-6 py-3 pl-2 text-center border-t border-r border-l font-bold uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">
                                    Nama</th>
                                <th
                                    class="px-6 py-3 pl-2 text-center border-t border-r font-bold uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">
                                    Alternatif</th>
                                <th class="px-6 py-3 pl-2 text-center border-t border-r font-bold uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">
                                    V</th>
                                <th class="px-6 py-3 pl-2 text-center border-t border-r font-bold uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">
                                    Ranking</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                foreach ($pelamars as $pelamar) {
                                    $v[$pelamar->id] = $hn[$pelamar->id] / $pn[$pelamar->id];
                                }
                                $ordered_values = $v;
                                rsort($ordered_values);
                            @endphp
                                @foreach ($pelamars as $key => $value)      
                                <tr>
                                    <td class="p-2 align-middle text-center border bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        {{ $value->nama }}
                                        <input type="hidden" name="id[]" value="{{ $value->id }}">
                                    </td>
                                    <td class="p-2 align-middle text-center border bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        A{{ $loop->iteration }}
                                    </td>
                                    <td class="p-2 align-middle text-center border bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        {{ $v[$value->id]}}
                                        <input type="hidden" name="nilai[]" value="{{ $v[$value->id] }}">
                                    </td>
                                    <td class="p-2 align-middle text-center border bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        @php
                                            foreach ($ordered_values as $ordered_key => $ordered_value) {
                                                if ($v[$value->id] === $ordered_value) {
                                                    $key = $ordered_key;
                                                    break;
                                                }
                                            }
                                        @endphp
                                        {{ $key+1 }}
                                        <input type="hidden" name="rank[]" value="{{ $key+1 }}">
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <button type="submit" class="px-4 py-2 bg-indigo-500 rounded-lg text-white shadow-sm hover:opacity-80 ease-in-out transition duration-300">Simpan</button>
            </form>
        @endif

    </div>
</x-app-layout>