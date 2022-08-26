@extends('layouts.appsytem')
@section('contentSys')

<div class="card-header shadow rounded bg-dark text-white">
    Edición de Habitación
</div>
<div class="container">
    <form class="row g-3 my-4" method="POST" action="{{route('update.room',$room->room[0]->id)}}">
        @csrf
        @method('PUT')
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Numero</label>
          <input type="text" name="number" class="form-control" id="inputNombre4" value="{{$room->room[0]->number}}">
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Precio</label>
          <input type="text" name="amount" class="form-control" id="inputPassword4" value="{{$room->room[0]->amount}}">
        </div>
        <div class="col-6">
            <select class="form-select" aria-label="Default select example" name="type_room_id">
                <option value="{{$room->room[0]->type_room_id}}">{{$room->room[0]->type_rooms}}</option>
                <option value="1">Estandar</option>
                <option value="2">Junior</option>
                <option value="3">Suite</option>
              </select>
        </div>
        <div class="col-6">
            <select class="form-select" aria-label="Default select example" name="accommodations">
                <option selected">Selecciones acomodación</option>
                @foreach ( $room->accomodations as  $ac)
                <option velue="{{$ac}}">{{$ac}}</option>
                @endforeach
              </select>
        </div>
          <input type="hidden"  name="hotel_id" class="form-control" id="inputCity" value="{{$room->room[0]->hotel_id}}">
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
</div>

@endsection
