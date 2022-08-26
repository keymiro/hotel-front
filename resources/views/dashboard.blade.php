@extends('layouts.appsytem')
@section('contentSys')

<div class="card-header shadow rounded bg-dark text-white">
    Listado de hoteles
</div>
<a href="{{route('create.hotel')}}" class="btn btn-success my-2">Nuevo Hotel</a>
<div class="table-responsive">
    <table class="table table-dark table-striped my-4 shadow rounded">
        <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Ciudad</th>
            <th scope="col">Dirección</th>
            <th scope="col">Nit</th>
            <th scope="col">Número de hab creadas</th>
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
                        <div class="btn-group">
                            <a href="{{route('showWithRooms.hotel',$h->id)}}" class="btn btn-primary ">Habitaciones</a>
                            <a href="{{route('edit.hotel',$h->id)}}" class="btn btn-success ">Editar</a>
                            <form  action="{{route('delete.hotel',$h->id)}}"
                                method="post">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Estás seguro que desea eliminar el registro?');">Eliminar
                            </button>
                        </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{-- {{ session()->get('user')->user->name }} --}}
@endsection
