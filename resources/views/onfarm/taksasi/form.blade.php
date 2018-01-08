<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 12/21/2017
 * Time: 8:27 PM
 */?>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Distribusi Taksasi
                </h2>
            </div>
            <div class="body">
                <form id="form-taksasi">
                    <div class="demo-masked-input">
                        <div class="form-group">
                            <label for="bulan">Bulan Taksasi</label>
                            <div class="form-line">
                                <select id="bulan" name="bulan" class="form-control show-tick" required>
                                    <option value="">-- Please select --</option>
                                    <option value="12">Desember</option>
                                    <option value="03">Maret</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tahun_taksasi">Tahun Taksasi</label>
                            <div class="form-line">
                                <input name="tahun_taksasi" id="tahun_taksasi" type="text" class="form-control date-tahun" placeholder="Ex: 2017">
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="password">Kode Petak</label>
                                    <div class="form-line">
                                        <input name="kode_petak" id="kode_petak" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <button onclick="ValidasiNoPetak()" type="button" class="btn btn-primary btn-lg m-l-15 waves-effect">Validasi</button>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="desc">Desc</label>
                                    <div class="form-line">
                                        <input name="desc" id="desc" type="text" class="form-control" readonly/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="afd">Afd</label>
                                    <div class="form-line">
                                        <input name="afd" id="afd" type="text" class="form-control" readonly/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kode_varietas">Kode varietas</label>
                                    <div class="form-line">
                                        <input name="kode_varietas" id="kode_varietas" type="text" class="form-control" readonly/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="status">status</label>
                                    <div class="form-line">
                                        <input name="status" id="status" type="text" class="form-control" readonly/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="luas">Luas</label>
                                    <div class="form-line">
                                        <input name="luas" id="luas" type="text" class="form-control" readonly/>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="password">ID Pegawai</label>
                                            <div class="form-line">
                                                <input name="id_sap" id="id_sap" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <button onclick="ValidasiIdSap()" type="button" class="btn btn-primary btn-lg m-l-15 waves-effect">Validasi</button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama_petugas">Petugas</label>
                                    <div class="form-line">
                                        <input id="nama_petugas" name="nama_petugas" type="text" class="form-control" readonly/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama_petugas">Posisi</label>
                                    <div class="form-line">
                                        <input id="position" name="position" type="text" class="form-control" readonly/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_planing">Tanggal Pengerjaan</label>
                                    <div class="form-line">
                                        <input name="tgl_planing" id="tgl_planing" type="text" class="form-control date" placeholder="Ex: 2018-12-30">
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
<!-- Bootstrap Select Css -->
<link href="{{ asset($base.'plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
<!-- Input Mask Plugin Js -->
<script src="{{ asset($base.'plugins/jquery-inputmask/jquery.inputmask.bundle.js') }}" ></script>

<!-- Bootstrap Notify Plugin Js -->
<script src="{{ asset($base.'plugins/bootstrap-notify/bootstrap-notify.js') }}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{ asset($base.'plugins/node-waves/waves.js') }}"></script>
<!-- Select Plugin Js -->
<script src="{{ asset($base.'plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
<!-- SweetAlert Plugin Js -->
<script src="{{ asset($base.'plugins/sweetalert/sweetalert.min.js') }}"></script>

<script src="{{ asset($base.'js/pages/ui/dialogs.js') }}"></script>

<script>
    $(function () {
        var $demoMaskedInput = $('.demo-masked-input');
        $demoMaskedInput.find('.date').inputmask('yyyy-mm-dd', { placeholder: '____-__-__' });
        $demoMaskedInput.find('.date-tahun').inputmask('y', { placeholder: '____' });

        $('#nama_petugas').autocomplete({
            source : function (request, response) {
                $.ajax({
                    url : "{{ route('setting-users-json-search') }}",
                    dataType : "json",
                    type : "POST",
                    data : { word: request.term },
                    success : function (data) {
                        response(data)
                    }
                });
            }

        });
    });

    $('.loaded_konten').click(function(){
        $('#konten').load($(this).attr('href'));
        return false;
    });

    function ValidasiNoPetak() {
        kode_petak = $('#kode_petak').val();
        bulan = $('#bulan').val();
        tahun = $('#tahun_taksasi').val();
        uri = "{{ route('onfarm-taksasi-validasi-petak') }}?kode_petak="+kode_petak+"&bulan="+bulan+"&tahun="+tahun;
        $.getJSON(uri , function( data ) {
            if(data.count == 0){
                swal("Validasi Petak", "petak no "+ kode_petak + " bulan taksasi " + $('select[name=bulan] option:selected').text() + " " + tahun, "success");
                $('#desc').val(data.petak.description);
                $('#afd').val(data.petak.divisi);
                $('#kode_varietas').val(data.petak.kode_varietas);
                $('#status').val(data.petak.kepemilikan_detail+" "+data.petak.status_blok);
                $('#luas').val(data.petak.luas);
            }else{
                swal("Validasi", "Data taksasi sudah ada", "error");
            }
        });
    }

    function ValidasiIdSap() {
        id_sap = $('#id_sap').val();
        uri = "{{ route('setting-users-json-search') }}?id_sap="+id_sap;
        $.getJSON(uri, function (data) {
            if(data.count > 0){
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
        $.post("{{ route('onfarm-taksasi-create') }}", $("#form-taksasi").serialize(), function ( data ) {
            if(data.status == "true"){
                swal("Data Taksasi", "Simpan Berhasil", 'success');
                clearForm();
            }else{
                swal("Data Taksasi", "Gagal", "error");
            }
        });
    }

    function clearForm() {
        $('#konten').load("{{ route('onfarm-taksasi-form-edit') }}");
    }
</script>