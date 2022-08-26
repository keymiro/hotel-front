@extends('layouts.appsytem')
@section('contentSys')

<div class="card-header shadow rounded bg-dark text-white">
    Actualizar  hotel
</div>
<div class="container">
    <form class="row g-3 my-4" method="POST" action="{{route('update.hotel',$hotel->hotel->id)}}">
        @csrf
        @method('PUT')
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Nombre</label>
          <input type="text" name="name" class="form-control" id="inputNombre4" value="{{$hotel->hotel->name}}">
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Ciudad</label>
          <input type="ciudad" name="city" class="form-control" id="inputPassword4" value="{{$hotel->hotel->city}}">
        </div>
        <div class="col-6">
          <label for="inputAddress" class="form-label">Dirección</label>
          <input type="text" name="address" class="form-control" id="inputAddress" value="{{$hotel->hotel->address}}">
        </div>
        <div class="col-md-6">
          <label for="inputCity" class="form-label">Nit</label>
          <input type="text"  name="nit" class="form-control" id="inputCity" value="{{$hotel->hotel->nit}}">
        </div>
        <div class="col-md-4">
          <label for="inputState" class="form-label">Habitaciones Permitidas</label>
          <input type="text"  name="max_rooms" class="form-control" id="inputCity" value="{{$hotel->hotel->max_rooms}}">
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
</div>

@endsection
