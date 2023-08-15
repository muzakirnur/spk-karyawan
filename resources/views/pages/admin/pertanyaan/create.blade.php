<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <h3 class="font-semibold text-2xl mb-12">
            <i class="fa-solid fa-question"></i>
            <span> Form Tambah Pertanyaan</span>
        </h3>
        <form action="{{ route('admin.pertanyaan.save') }}" method="POST">
            <div class="px-8 py-8 bg-white rounded-lg shadow-lg mb-8">
                @csrf
                <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Pertanyaan</label>
                <div class="mb-4">
                    <input type="text" autofocus class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-blue-400 focus:outline-none focus:transition-shadow" placeholder="Pertanyaan" name="pertanyaan" value="{{ old('pertanyaan') }}" required />
                    <x-input-error :messages="$errors->get('pertanyaan')" class="mt-2" />
                </div>
                <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Kategori</label>
                <div class="mb-4">
                    <select id="selectKategori"
                        class="js-example-basic-single w-full leading-5.6 py-2 px-2 rounded-lg text-gray-700 focus:border-blue-400 border-gray-300 text-sm bg-white"
                        name="kategori" required>
                        <option class="text-gray-300" selected value=""/>Pilih Kategori</option>
                        <option value="TEORI">TEORI</option>
                        <option value="WAWANCARA">WAWANCARA</option>
                    </select>
                    <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
                </div>
            </div>
            <div id="choice" class="px-8 py-8 bg-white rounded-lg shadow-lg mb-8">
                @csrf
                <div class="flex flex-wrap mb-4">
                    <label for="A" class="font-semibold text-lg align-middle p-2">A</label>
                    <div class="mb-4 w-1/2">
                        <input type="text" autofocus class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-blue-400 focus:outline-none focus:transition-shadow" placeholder="Masukkan Jawaban" name="jawaban[A]" value="{{ old('A') }}" />
                        <x-input-error :messages="$errors->get('A')" class="mt-2" />
                    </div>
                </div>
                <div class="flex flex-wrap mb-4">
                    <label for="B" class="font-semibold text-lg align-middle p-2">B</label>
                    <div class="mb-4 w-1/2">
                        <input type="text" autofocus class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-blue-400 focus:outline-none focus:transition-shadow" placeholder="Masukkan Jawaban" name="jawaban[B]" value="{{ old('B') }}" />
                        <x-input-error :messages="$errors->get('B')" class="mt-2" />
                    </div>
                </div>
                <div class="flex flex-wrap mb-4">
                    <label for="C" class="font-semibold text-lg align-middle p-2">C</label>
                    <div class="mb-4 w-1/2">
                        <input type="text" autofocus class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-blue-400 focus:outline-none focus:transition-shadow" placeholder="Masukkan Jawaban" name="jawaban[C]" value="{{ old('C') }}" />
                        <x-input-error :messages="$errors->get('C')" class="mt-2" />
                    </div>
                </div>
                <div class="flex flex-wrap mb-4">
                    <label for="D" class="font-semibold text-lg align-middle p-2">D</label>
                    <div class="mb-4 w-1/2">
                        <input type="text" autofocus class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-blue-400 focus:outline-none focus:transition-shadow" placeholder="Masukkan Jawaban" name="jawaban[D]" value="{{ old('D') }}" />
                        <x-input-error :messages="$errors->get('D')" class="mt-2" />
                    </div>
                </div>
                <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Jawaban Benar</label>
                <div class="mb-4">
                    <select
                        class="js-example-basic-single w-full leading-5.6 py-2 px-2 rounded-lg text-gray-700 focus:border-blue-400 border-gray-300 text-sm bg-white"
                        name="jawaban_benar">
                        <option class="text-gray-300" selected value=""/>Pilih Jawaban Benar</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                    <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
                </div>
            </div>
            <button type="submit" class="px-4 py-2 bg-indigo-500 rounded-lg text-white shadow-sm hover:opacity-80 ease-in-out transition duration-300">Simpan</button>
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
    @endpush
</x-app-layout>