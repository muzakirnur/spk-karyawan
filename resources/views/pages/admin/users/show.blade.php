<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <h3 class="font-semibold text-2xl mb-12">
            <i class="fa-solid fa-user mr-2"></i>
            <span> Detail User</span>
        </h3>
        <div class="bg-white px-8 py-12 shadow-lg rounded-lg mb-8 dark:bg-slate-500 dark:text-slate-200">
            <div class="mb-4">
                <h2 class="font-semibold text-lg">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    Data Kredensial
                </h2>
            </div>
            <div class="table-responsive mb-8">
                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500 dark:text-slate-200">
                    <tbody>
                            <tr class="border">
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-sm font-semibold leading-tight">
                                        Nama
                                    </p>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-sm font-semibold leading-tight">
                                        {{ $user->name }}
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
                                        {{ $user->email }}
                                    </p>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="bg-white px-8 py-12 shadow-lg rounded-lg mb-8 dark:bg-slate-500 dark:text-slate-200">
            <div class="mb-4">
                <h2 class="font-semibold text-lg">
                    <i class="fa-brands fa-uncharted"></i>
                    Data Pelamar
                </h2>
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
        </div>
    </div>
</x-app-layout>