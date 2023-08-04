<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <h3 class="font-semibold text-2xl mb-12">
            <i class="fa-solid fa-user mr-2"></i>
            <span> Data Diri</span>
        </h3>
        @if (session()->has('success'))
        <div alert
            class="relative p-4 pr-12 mb-4 text-white border border-solid rounded-lg bg-gradient-to-tl from-green-600 to-lime-400 border-lime-300">
            <strong>Berhasil !</strong>
            {{ session('success') }}
        </div>
        @endif
        {{-- Form Edit Profile --}}
        <div class="bg-slate-200 rounded-lg shadow-sm px-8 py-8">
            <form action="{{ route('pelamar.create') }}" method="POST">
                @csrf
                <div class="flex flex-wrap justify-evenly gap-2">
                    <div class="w-1/3">
                        <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Nama</label>
                        <div class="mb-4">
                            <input type="text" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-blue-400 focus:outline-none focus:transition-shadow" placeholder="Masukkan Nama" name="nama" value="{{ isset($dataPelamar) ? $dataPelamar->nama : old('nama') }}" required />
                            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                        </div>
                    </div>
                    <div class="w-1/3">
                        <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Tempat Lahir</label>
                        <div class="mb-4">
                            <input type="text" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-blue-400 focus:outline-none focus:transition-shadow" placeholder="Tempat Lahir" name="tempat_lahir" value="{{ isset($dataPelamar) ? $dataPelamar->tempat_lahir : old('tempat_lahir') }}" required />
                            <x-input-error :messages="$errors->get('tempat_lahir')" class="mt-2" />
                        </div>
                    </div>
                    <div class="w-1/3">
                        <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Tanggal Lahir</label>
                        <div class="mb-4">
                            <input type="date" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-blue-400 focus:outline-none focus:transition-shadow" placeholder="Masukkan Nama" name="tanggal_lahir" value="{{ isset($dataPelamar) ? $dataPelamar->tanggal_lahir : old('tanggal_lahir') }}" required />
                            <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2" />
                        </div>
                    </div>
                    <div class="w-1/3">
                        <label class="mb-2 ml-1 font-bold text-xs text-slate-700">NIK</label>
                        <div class="mb-4">
                            <input type="number" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-blue-400 focus:outline-none focus:transition-shadow" placeholder="Masukkan NIK" name="nik" value="{{ isset($dataPelamar) ? $dataPelamar->nik : old('nik') }}" required />
                            <x-input-error :messages="$errors->get('nik')" class="mt-2" />
                        </div>
                    </div>
                    <div class="w-1/3">
                        <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Jenis Kelamin</label>
                        <div class="mb-4">
                            <select
                                class="js-example-basic-single w-full leading-5.6 py-2 px-2 rounded-lg text-gray-700 focus:border-blue-400 border-gray-300 text-sm bg-white"
                                name="jenis_kelamin" required>
                                <option class="text-gray-300" selected value="{{ isset($dataPelamar) ? $dataPelamar->jenis_kelamin : '' }}">{{ isset($dataPelamar) ? $dataPelamar->jenis_kelamin : 'Pilih Jenis Kelamin' }}</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                            <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
                        </div>
                    </div>
                    <div class="w-1/3">
                        <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Email</label>
                        <div class="mb-4">
                            <input type="email" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-blue-400 focus:outline-none focus:transition-shadow" placeholder="Masukkan Email" name="email" value="{{ isset($dataPelamar) ? $dataPelamar->email : old('email') }}" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    </div>
                    <div class="w-1/3">
                        <label class="mb-2 ml-1 font-bold text-xs text-slate-700">No Telpon</label>
                        <div class="mb-4">
                            <input type="number" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-blue-400 focus:outline-none focus:transition-shadow" placeholder="Masukkan Nomer Telepon" name="hp" value="{{ isset($dataPelamar) ? $dataPelamar->hp : old('hp') }}" required />
                            <x-input-error :messages="$errors->get('hp')" class="mt-2" />
                        </div>
                    </div>
                    <div class="w-1/3">
                        <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Alamat Lengkap</label>
                        <div class="mb-4">
                            <textarea class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-blue-400 focus:outline-none focus:transition-shadow" name="alamat" cols="30" rows="2">{{ isset($dataPelamar) ? $dataPelamar->alamat : old('alamat') }}</textarea>
                            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                        <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Pendidikan</label>
                        <select
                        class="js-example-basic-single w-full leading-5.6 py-2 px-2 rounded-lg text-gray-700 focus:border-blue-400 border-gray-300 text-sm bg-white"
                        name="pendidikan" required>
                        <option class="text-gray-300" selected value="{{ isset($dataPelamar->pendidikan) ? $dataPelamar->pendidikan : '' }}">{{ isset($dataPelamar) ? $dataPelamar->pendidikan : 'Pilih Pendidikan Terakhir' }}</option>
                        <option value="SMA">SMA</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                        <x-input-error :messages="$errors->get('pendidikan')" class="mt-2" />
                    </select>
                </div>
                <div class="mb-4">
                        <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Pengalaman</label>
                        <div class="mb-4">
                            <input type="text" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-blue-400 focus:outline-none focus:transition-shadow" placeholder="Masukkan Pengalaman Bekerja" name="pengalaman" value="{{ isset($dataPelamar) ? $dataPelamar->pengalaman : old('pengalaman') }}" required />
                            <x-input-error :messages="$errors->get('pengalaman')" class="mt-2" />
                        </div>
                </div>
                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                <button type="submit" class="px-4 py-2 bg-indigo-500 rounded-lg text-white shadow-sm hover:opacity-80 ease-in-out transition duration-300">Simpan</button>
            </form>
        </div>
    </div>
</x-app-layout>