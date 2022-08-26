@extends('layouts.appsytem')
@section('contentSys')

<div class="card-header shadow rounded bg-dark text-white">
    Listado de Habitaciones de Hotel {{$hotel[0]->name}}
</div>
<div class="card my-2 shadow">
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <div class=" fw-bold">
                    Nombre: {{$hotel[0]->name}}
                </div>
                <div class=" fw-bold">
                Ciudad: {{$hotel[0]->city}}
                </div>
                <div class=" fw-bold">
                    Dirección: {{$hotel[0]->address}}
                </div>
                <div class=" fw-bold">
                    Nit: {{$hotel[0]->nit}}
                </div>
                <div class=" fw-bold">
                    Número de hab permitidas: {{$hotel[0]->max_rooms}}
                </div>
                <div class=" fw-bold">
                    Número de hab creadas: {{$hotel[0]->has_total_rooms}}
                </div>
            </div>

            <div class="col-6">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Tipo Habitación</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">{{$countTypeRoom['estandar']}}</th>
                            <td>Estandar</td>
                        </tr>
                        <tr>
                            <th scope="row">{{$countTypeRoom['junior']}}</th>
                            <td>Junior</td>
                        </tr>
                        <tr>
                            <th scope="row">{{$countTypeRoom['suite']}}</th>
                            <td>Suite</td>
                        </tr>
                        </tbody>
                    </table>
            </div>
        </div>
</div>
<div class="col-4 mx-2">
    <a href="{{route('create.room',$hotel[0]->id)}}" class="btn btn-success my-2">Nueva Habitación</a>
</div>

<div class="table-responsive">
    <table class="table table-dark table-striped my-4 shadow rounded">
        <thead>
        <tr>
            <th scope="col">Número</th>
            <th scope="col">Precio</th>
            <th scope="col">Acomodación</th>
            <th scope="col">Tipo de acomodación</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $r )
                <tr>
                    <td>{{$r->number}}</td>
                    <td>{{$r->amount}}</td>
                    <td>{{$r->accommodations}}</td>
                    <td>{{$r->type_rooms}}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{route('edit.room',$r->id)}}" class="btn btn-success ">Editar</a>
                            <form  action="{{route('delete.room',$r->id)}}"
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
