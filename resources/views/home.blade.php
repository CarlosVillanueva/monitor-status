@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container"><br>
                        {{-- <h2>Control de estados</h2><br> --}}
                        <table class="table">
                            <h3>AuthService</h3>
                            <thead>
                                <tr>
                                <th>Tipo</th>
                                <th>Nombre</th>
                                <th>Servicio</th>
                                <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($authservice))
                                @foreach ($authservice as $data)
                                    <tr class="table-primary">
                                        <td class="label label-lg font-weight-bold label-light-success label-inline">{{$data['tipo']}}</td>
                                        <td>{{$data['name']}}</td>
                                        <td>{{$data['url']}}</td>
                                        <td>{{$data['http_code']}}</td>
                                    </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        <table class="table">
                            <h3>FirmappService</h3>
                            <thead>
                                <tr>
                                <th>Tipo</th>
                                <th>Nombre</th>
                                <th>Servicio</th>
                                <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($firmappservice))
                                @foreach ($firmappservice as $data)
                                    <tr class="table-primary">
                                        <td>{{$data['tipo']}}</td>
                                        <td>{{$data['name']}}</td>
                                        <td>{{$data['url']}}</td>
                                        <td>{{$data['http_code']}}</td>
                                    </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        <a href="/test">Consulta estado</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
