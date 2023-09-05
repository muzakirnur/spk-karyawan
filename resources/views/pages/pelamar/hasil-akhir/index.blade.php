<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <h3 class="font-semibold text-2xl mb-12">
            <i class="fa-brands fa-uncharted"></i>
            <span> Hasil Akhir</span>
        </h3>
        <div class="bg-white px-8 py-12 shadow-lg rounded-lg">
            <div class="table-responsive">
                <table id="tbl_list" class="table table-striped table-bordered" cellspacing="0"
                    width="100%">
                    <thead>
                        <tr>
                            <th>Ranking</th>
                            <th>Nama</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @push('custom-scripts')
    <script>
        $(document).ready(function() {
            $('#tbl_list').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url()->current() }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'id'
                    },
                    {
                        data: 'pelamar.nama',
                        name: 'pelamar.nama'
                    },
                    {
                        data: 'nilai',
                        name: 'nilai'
                    },
                ]
            });
        });
    </script>
    @endpush
</x-app-layout>