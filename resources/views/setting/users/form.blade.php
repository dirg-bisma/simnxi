<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Petugas Taksasi
                </h2>
            </div>
            <div class="body">
                <form id="form-petugas">
                    <div class="demo-masked-input">
                        <div class="row clearfix">
                            <div class="col-sm-12">

                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="id_sap">ID Pegawai</label>
                                            <div class="form-line">
                                                @if(isset($pegawai))
                                                    <input name="id_sap" value="{{ @$pegawai->id_sap }}" id="id_sap" type="text" class="form-control" readonly>
                                                    <input type="hidden" name="action" id="action" value="update">
                                                @else
                                                    <input name="id_sap" value="{{ @$pegawai->id_sap }}" id="id_sap" type="text" class="form-control">
                                                    <input type="hidden" name="action" id="action" value="create">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @if(!isset($pegawai))
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <button onclick="ValidasiIdSap()" type="button" class="btn btn-primary btn-lg m-l-15 waves-effect">Validasi</button>
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="nama_petugas">Petugas</label>
                                    <div class="form-line">
                                        <input id="nama_petugas" value="{{ @$pegawai->nama_pegawai }}" name="nama_petugas" type="text" class="form-control" readonly/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="position">Posisi</label>
                                    <div class="form-line">
                                        <input id="position" name="position" value="{{ @$pegawai->position }}" type="text" class="form-control" readonly/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <div class="form-line">
                                        <input id="password" name="password" type="password" class="form-control" minlength="6"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="re_password">Re-Password</label>
                                    <div class="form-line">
                                        <input id="re_password" name="re_password" type="password" class="form-control" minlength="6"/>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <button type="button" onclick="Simpan()" class="btn btn-success btn-lg m-l-15 waves-effect">SIMPAN</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<?php $base = "bower_components/adminbsb/";?>
<!-- Sweetalert Css -->
<link href="{{ asset($base.'plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" />
<!-- Waves Effect Css -->
<link href="{{ asset($base.'plugins/node-waves/waves.css') }}" rel="stylesheet" />
<!-- SweetAlert Plugin Js -->
<script src="{{ asset($base.'plugins/sweetalert/sweetalert.min.js') }}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{ asset($base.'plugins/node-waves/waves.js') }}"></script>

<!-- Validation Plugin Js -->
<script src="{{ asset($base.'plugins/jquery-validation/jquery.validate.js') }}"></script>
<script>
    function ValidasiIdSap() {
        id_sap = $('#id_sap').val();
        uri = "{{ route('setting-users-json-search-pegawai') }}?id_sap="+id_sap;
        $.getJSON(uri, function (data) {
            if(data.exist == 0){
                swal("Validasi Petugas", "nama : " + data.data.nama_pegawai, 'success');
                $('#nama_petugas').val(data.data.nama_pegawai);
                $('#position').val(data.data.position);
                $(this).closest('#form-taksasi').find("input[type=text]").val("");

            }else{
                swal("Validasi Petugas", "Data petugas tidak ada", "error");
            }
        });
    }

    function Simpan() {
        $.post("{{ route('setting-users-save') }}", $("#form-petugas").serialize(), function ( data ) {
            if(data.status == "true"){
                swal("Data Taksasi", "Simpan Berhasil", 'success');
                clearForm();
            }else{
                swal("Data Taksasi", "Gagal "+data.msg, "error");
            }
        });
    }

    function clearForm() {
        if($("#action").val() == 'create'){
            $('#konten').load("{{ route('setting-users-form-add') }}");
        }else{
            $('#konten').load("{{ route('setting-users-list') }}");
        }

    }

    $(function () {
        $('#form-petugas').validate({
            rules: {
                'terms': {
                    required: true
                },
                'confirm': {
                    equalTo: '[name="password"]'
                }
            },
            highlight: function (input) {
                console.log(input);
                $(input).parents('.form-line').addClass('error');
            },
            unhighlight: function (input) {
                $(input).parents('.form-line').removeClass('error');
            },
            errorPlacement: function (error, element) {
                $(element).parents('.input-group').append(error);
                $(element).parents('.form-group').append(error);
            }
        });
    });
</script>