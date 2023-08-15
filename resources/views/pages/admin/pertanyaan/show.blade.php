<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <h3 class="font-semibold text-2xl mb-12">
            <i class="fa-solid fa-question"></i>
            <span> Form Edit Pertanyaan</span>
        </h3>
        <form action="{{ route('admin.pertanyaan.update', Crypt::encrypt($pertanyaan->id)) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="px-8 py-8 bg-white rounded-lg shadow-lg mb-8">
                <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Pertanyaan</label>
                <div class="mb-4">
                    <input type="text" autofocus class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-blue-400 focus:outline-none focus:transition-shadow" placeholder="Pertanyaan" name="pertanyaan" value="{{ $pertanyaan->pertanyaan }}" required />
                    <x-input-error :messages="$errors->get('pertanyaan')" class="mt-2" />
                </div>
                <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Kategori</label>
                <div class="mb-4">
                    <select id="selectKategori"
                        class="js-example-basic-single w-full leading-5.6 py-2 px-2 rounded-lg text-gray-700 focus:border-blue-400 border-gray-300 text-sm bg-white"
                        name="kategori" required>
                        <option class="text-gray-300" selected value="{{ $pertanyaan->kategori }}"/>{{ $pertanyaan->kategori}}</option>
                        <option value="TEORI">TEORI</option>
                        <option value="WAWANCARA">WAWANCARA</option>
                    </select>
                    <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
                </div>
            </div>
            <div id="choice" class="px-8 py-8 bg-white rounded-lg shadow-lg mb-8">
                @csrf
                @foreach ($jawabans as $jawaban)
                <div class="flex flex-wrap mb-4">
                    <label for="{{ $jawaban->pilihan }}" class="font-semibold text-lg align-middle p-2">{{ $jawaban->pilihan }}</label>
                    <div class="mb-4 w-1/2">
                        <input type="text" autofocus class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-blue-400 focus:outline-none focus:transition-shadow" placeholder="Masukkan Jawaban" name="jawaban[{{ $jawaban->pilihan }}]" value="{{ $jawaban->jawaban }}" required />
                        <x-input-error :messages="$errors->get('jawaban[{{ $jawaban->pilihan }}]')" class="mt-2" />
                    </div>
                </div>
                @endforeach
                <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Jawaban Benar</label>
                <div class="mb-4">
                    <select
                        class="js-example-basic-single w-full leading-5.6 py-2 px-2 rounded-lg text-gray-700 focus:border-blue-400 border-gray-300 text-sm bg-white"
                        name="jawaban_benar" required>
                        <option class="text-gray-300" selected value="{{ isset($pertanyaan) ? $pertanyaan->jawaban_benar : '' }}"/>{{ isset($pertanyaan) ? $pertanyaan->jawaban_benar : 'Pilih Jawaban Benar'}}</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                    <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
                </div>
            </div>
            <div class="flex flex-wrap justify-between">
                <a href="{{ route('admin.pertanyaan.index') }}" class="px-4 py-2 bg-slate-500 rounded-lg text-white shadow-sm hover:opacity-80 ease-in-out transition duration-300"><i class="fa-solid fa-chevron-left"></i> Kembali</a>
                <button type="submit" class="px-4 py-2 bg-indigo-500 rounded-lg text-white shadow-sm hover:opacity-80 ease-in-out transition duration-300">Simpan</button>
            </div>
        </form>
    </div>
    @push('custom-scripts')
        <script>
            let bar = $("#choice");
            var pilihan = $('#selectKategori');
            pilihan.on('change',function(){
                if(pilihan.val() == "WAWANCARA"){
                    bar.addClass('hidden');
                } else {
                    bar.removeClass('hidden');
                }
            });
        </script>
        <script>
            $(document).ready(function() {
                var pilihan = $('#selectKategori').val();
                let bar = $("#choice");
                if(pilihan == "WAWANCARA"){
                    bar.addClass('hidden');
                }
            });
        </script>
    @endpush
</x-app-layout>