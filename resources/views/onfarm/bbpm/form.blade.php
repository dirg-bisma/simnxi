
<?php $base = 'bower_components/adminbsb/'?>
<!-- Bootstrap Spinner Css -->
<link href="{{ asset($base.'plugins/jquery-spinner/css/bootstrap-spinner.css') }}" rel="stylesheet">
<!-- Bootstrap Select Css -->
<link href="{{ asset($base.'plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    DATA BERAT BATANG PER METER
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="{{ route('onfarm-taksasi-bbpm-index') }}" class="loaded_konten">Back</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="password">Kode KP</label>
                            <div class="form-line">
                                <input type="text" value="{{ $kp->kode_kp }}" class="form-control" placeholder="KP" readonly/>
                            </div>
                        </div>
                        <label for="password">Nama</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" value="{{ $kp->nama_kp }}" class="form-control" placeholder="Password" readonly/>
                            </div>
                        </div>
                        <br>
                        <button type="button" class="btn btn-default waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal">Tambah Data</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h4>
                    DATA
                </h4>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a onclick="loadTable()">Refesh</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <div id="table-bbpm"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Add Data</h4>
            </div>
            <form id="form_advanced_validation">
            <div class="modal-body">

                    <div class="form-group form-float">
                        <label for="password">Diameter</label>
                        <div class="form-line">

                            <input type="hidden" id="kode_kp" value="{{ $kp->kode_kp }}" name="kode_kp">
                            <input type="text" id="diameter" class="form-control" name="diameter" min="10" max="200" required>

                        </div>
                        <div class="help-info">Min. Value: 10, Max. Value: 200</div>
                    </div>
                    <div class="form-group form-float">
                        <label for="password">Varietas</label>
                        <div class="form-line">
                            <select class="form-control show-tick" id="id_varietas" name="id_varietas">
                                @foreach($varietas as $data_var)
                                <option value="{{ $data_var->id_varietas }}">{{ $data_var->kode_varietas }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <label for="password">Nilai</label>
                        <div class="form-line">
                            <input type="text" id="nilai_bbpm" name="nilai_bbpm" class="form-control text-center" data-rule="quantity">
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button id="simpan" type="button" class="btn btn-link waves-effect" data-dismiss="modal">SAVE</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('.loaded_konten').click(function(){
        $('#konten').load($(this).attr('href'));
        return false;
    });

    $("#simpan").click(function(){
        $.post("{{ route('onfarm-taksasi-bbpm-save') }}",
            {
                id_varietas : $('#id_varietas').val(),
                diameter : $('#diameter').val(),
                nilai_bbpm : $('#nilai_bbpm').val(),
                kode_kp : $('#kode_kp').val(),
                action : 'create'
            },
            function(data, status){
                //alert("Data: " + data + "\nStatus: " + status);
                if(status == 'success'){
                    loadTable();
                    $('#diameter').empty();
                    $('#nilai_bbpm').empty();
                    $('body').notify({
                        message: 'Create data Success',
                        type: 'danger'
                    });
                }

            });
    });

    $.get('{{ route('onfarm-taksasi-bbpm-table', array('kode_kp'=> $kp->kode_kp)) }}', function (data) {
        $('#table-bbpm').html(data);
        $('.dataTable').DataTable();
    });

    function loadTable() {
        $.get('{{ route('onfarm-taksasi-bbpm-table', array('kode_kp'=> $kp->kode_kp)) }}', function (data) {
            $('#table-bbpm').html(data);
            $('.dataTable').DataTable();
        });
    }
</script>
<!-- Jquery Spinner Plugin Js -->
<script src="{{ asset($base.'plugins/jquery-spinner/js/jquery.spinner.js') }}"></script>
<script src="{{ asset('/js/JSON-to-Table.min.1.0.0.js') }}"></script>
