<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <div class="flex flex-wrap justify-between">
            <div class="mb-12">
                <h3 class="font-semibold text-2xl">
                    <i class="fa-brands fa-uncharted"></i>
                    <span> Hasil Akhir</span>
                </h3>
            </div>
            @can('admin')
                <div class="mb-12">
                    <form action="{{ route('admin.hasil-akhir.export') }}">
                        <input type="hidden" name="tahun" value="{{ request()->query('tahun') ? request()->tahun : null}}">
                        <button type="submit" class="px-2 py-2 mt-5 bg-red-500 rounded-lg text-white shadow-sm hover:opacity-80 ease-in-out transition duration-300">
                            <i class="fa-solid fa-file-pdf"></i>
                            Export PDF
                        </button>
                    </form>
                </div>
            @endcan
        </div>
        @if (session()->has('success'))
        <div alert
            class="relative p-4 pr-12 mb-4 text-white border border-solid rounded-lg bg-gradient-to-tl from-green-600 to-lime-400 border-lime-300">
            <strong>Berhasil !</strong>
            {{ session('success') }}
        </div>
        @endif
        <div class="bg-white px-8 py-12 shadow-lg rounded-lg">
            @can('admin')
            <form action="{{ route('admin.hasil-akhir.index') }}" method="GET">
            <div class="flex flex-wrap w-full">
                    <div class="mb-4 w-1/4">
                        <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Tahun</label>
                        <div class="mb-4 mr-4">
                            <select
                                class="js-example-basic-single w-full leading-5.6 py-2 px-2 rounded-lg text-gray-700 focus:border-blue-400 border-gray-300 text-sm bg-white"
                                name="tahun">
                                <option class="text-gray-300" selected value=""/>Pilih Tahun</option>
                                @foreach ($getAllYear as $row)   
                                <option value="{{ $row->tahun }}" {{ $row->tahun == request()->tahun ? 'selected' : '' }}>{{ $row->tahun }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
                        </div>
                    </div>
                    <div class="mb-4 w-1/4">
                        <button type="submit" class="px-2 py-2 mt-5 bg-indigo-500 rounded-lg text-white shadow-sm hover:opacity-80 ease-in-out transition duration-300">
                            <i class="fa-solid fa-filter"></i>
                            Filter
                        </button>
                        <a href="{{ route('admin.hasil-akhir.index') }}" class="px-2 py-2 mt-5 bg-green-500 rounded-lg text-white shadow-sm hover:opacity-80 ease-in-out transition duration-300">
                            <i class="fa-solid fa-filter"></i>
                            Reset
                        </a>
                    </div>
            </div>
            </form>
            @endcan
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Ranking
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tahun Pelamar
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nilai
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hasilDetail as $row)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $row->pelamar->nama }}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $row->hasil->tahun }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $row->nilai }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $hasilDetail->links() }}
            </div>
        </div>
    </div>
</x-app-layout>