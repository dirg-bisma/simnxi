<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    TAKSASI BULAN
                </h2>
                <ul class="header-dropdown m-r--5">

                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table id="load-taksasi" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                        <tr>
                            <th>Bulan</th>
                            <th>Status</th>
                            <th>Kode Petak</th>
                            <th>Afd</th>
                            <th>Desc</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Bulan</th>
                            <th>Status</th>
                            <th>Kode Petak</th>
                            <th>Afd</th>
                            <th>Desc</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/taksasi.js') }}"></script>
<script>
    $('#load-taksasi').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": $.fn.dataTable.pipeline({
            url: '{{ route('onfarm-taksasi-data') }}',
            pages: 5 // number of pages to cache
        })
    });

    function formload(uri) {
        $('#konten').load(uri);
    }

    $('.loaded_konten').click(function(){
        $('#konten').load($(this).attr('href'), function () {
            //$('.dataTable').DataTable();
        });
        return false;
    });
</script>

