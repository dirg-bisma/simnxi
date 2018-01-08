<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    DATA PETUGAS TAKSASI
                </h2>
                <ul class="header-dropdown m-r--5">

                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table id="load-taksasi" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Posisi</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Posisi</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/DatatableJson.js') }}"></script>
<script>
    $('#load-taksasi').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": $.fn.dataTable.pipeline({
            url: '{{ route('setting-users-list-json') }}',
            pages: 5 // number of pages to cache
        })
    });

    function formload(uri) {
        $('#konten').load(uri);
    }
</script>

