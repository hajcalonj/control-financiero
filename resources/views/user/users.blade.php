@extends('layouts.app')

@section('content')
<!-- Content Row -->
<div class="row">
    <!-- Content Column -->
    <div class="col-lg-12 mb-4">
        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Listado</h6>
            </div>
            <div class="card-body">

                <table class="table table-striped table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>Registro</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuario as $key => $user)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $user->Nombre1 }} {{ $user->Nombre2 }}</td>
                            <td>{{ $user->Apellido1 }} {{ $user->Apellido2 }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                {{ $user->created_at }}
                                <!-- <button class="btn btn-primary">Editar</button> -->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection