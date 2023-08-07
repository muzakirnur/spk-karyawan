<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <h3 class="font-semibold text-2xl mb-12">
            <i class="fa-brands fa-uncharted"></i>
            <span> Form Tambah Kriteria</span>
        </h3>
        <div class="px-8 py-8 bg-white rounded-lg shadow-lg">
            <form action="{{ route('admin.kriteria.save') }}" method="POST">
                @csrf
                <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Nama Kriteria</label>
                <div class="mb-4">
                    <input type="text" autofocus class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-blue-400 focus:outline-none focus:transition-shadow" placeholder="Nama Kriteria" name="nama" value="{{ old('nama') }}" required />
                    <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                </div>
                <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Kode Kriteria</label>
                <div class="mb-4">
                    <input type="text" autofocus class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-blue-400 focus:outline-none focus:transition-shadow" placeholder="Kode Kriteria" name="kode_kriteria" value="{{ old('kode_kriteria') }}" required />
                    <x-input-error :messages="$errors->get('kode_kriteria')" class="mt-2" />
                </div>
                <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Bobot</label>
                <div class="mb-4">
                    <input type="number" autofocus class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-blue-400 focus:outline-none focus:transition-shadow" placeholder="Bobot" name="bobot" value="{{ old('bobot') }}" required />
                    <x-input-error :messages="$errors->get('bobot')" class="mt-2" />
                </div>
                <button type="submit" class="px-4 py-2 bg-indigo-500 rounded-lg text-white shadow-sm hover:opacity-80 ease-in-out transition duration-300">Simpan</button>
            </form>
        </div>
    </div>
</x-app-layout>