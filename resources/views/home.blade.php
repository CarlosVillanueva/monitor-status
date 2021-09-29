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
                        <h2>Control de estados</h2><br>
                        <table class="table">
                        <thead>
                            <tr>
                            <th>Nombre</th>
                            <th>Servicio</th>
                            <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($data))
                            @foreach ($data as $data)
                               dd($data);
                              {{-- @foreach ($data as $item) --}}
                                 
                           
                                <tr class="table-primary">
                                    <td>{{$data->url}}</td>
                                    <td>{{$data->http_code}}</td>
                                    <td>201</td>
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
