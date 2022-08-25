@extends('layouts.appsytem')
@section('contentSys')

<div class="card-header shadow rounded bg-dark text-white">
    Listado de hoteles
</div>
<a href="" class="btn btn-success my-2">Nuevo Hotel</a>
<table class="table table-dark table-striped my-4 shadow rounded">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Ciudad</th>
        <th scope="col">Dirección</th>
        <th scope="col">Nit</th>
        <th scope="col">Número de hab disponibles</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach ( $hotels->Hoteles as $h )
            <tr>
                <th>{{$h->name}}</th>
                <td>{{$h->city}}</td>
                <td>{{$h->address}}</td>
                <td>{{$h->nit}}</td>
                <td>{{$h->has_total_rooms}}</td>
                <td>
                    <a href="" class="btn btn-primary">Habitaciones</a>
                    <a href="" class="btn btn-success">Editar</a>
                    <a href="" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
{{-- {{ session()->get('user')->user->name }} --}}
@endsection
