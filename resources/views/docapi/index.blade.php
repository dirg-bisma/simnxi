@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <table border="1px">
                            <thead>
                                <td>Nama</td>
                                <td>METHOD</td>
                                <td>Url</td>
                                <td>Param</td>
                                <td>Output Json</td>
                            </thead>
                            <tbody>
                            @foreach($data as $value)
                                <tr>
                                    <td>{{ $value->nama }}</td>
                                    <td>{{ $value->method }}</td>
                                    <td>{{ $value->url }}</td>
                                    <td>{{ $value->param }}</td>
                                    <td>{{ $value->output }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
