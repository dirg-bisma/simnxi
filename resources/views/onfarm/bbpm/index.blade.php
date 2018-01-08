<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    DATA BERAT BATANG PER METER
                </h2>
                <ul class="header-dropdown m-r--5">

                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                        <tr>
                            <th>KP</th>
                            <th>Nama</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>KP</th>
                            <th>Edit</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($kp as $data)
                            <tr>
                                <td>{{ $data->kode_kp }}</td>
                                <td>{{ $data->nama_kp }}</td>
                                <td><a href="{{ route('onfarm-taksasi-bbpm-showform', array('kode_kp' => $data->kode_kp)) }}" class="loaded_konten"><i class="material-icons">mode_edit</i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.loaded_konten').click(function(){
        $('#konten').load($(this).attr('href'), function () {
            $('.dataTable').DataTable();
        });
        return false;
    });
</script>

