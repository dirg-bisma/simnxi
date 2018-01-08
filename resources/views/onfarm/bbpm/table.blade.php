<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
    <thead>
    <tr>
        <th>Varietas</th>
        <th>Diameter</th>
        <th>Nilai</th>
        <th>Edit</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>Varietas</th>
        <th>Diameter</th>
        <th>Nilai</th>
        <th>Edit</th>
    </tr>
    </tfoot>
    <tbody>
    @foreach($bbpm as $data)
        <tr>
            <td>{{ $data->nama_varietas }}</td>
            <td>{{ $data->diameter }}</td>
            <td>{{ $data->nilai_bbpm }}</td>
            <td><a href="{{ route('onfarm-taksasi-bbpm-showform', array('kode_kp' => $data->kode_kp)) }}" class="loaded_konten"><i class="material-icons">mode_edit</i></a></td>
        </tr>
    @endforeach
    </tbody>
</table>