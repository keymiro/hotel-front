@extends('layouts.appsytem')
@section('contentSys')

<div class="card-header shadow rounded bg-dark text-white">
    Creación de Habitación
</div>
<div class="container">
    <form class="row g-3 my-4" method="POST" action="{{route('store.room')}}">
        @csrf
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Numero</label>
          <input type="text" name="number" class="form-control" id="inputNombre4">
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Precio</label>
          <input type="text" name="amount" class="form-control" id="inputPassword4">
        </div>
        <div class="col-6">
            <select class="form-select" aria-label="Default select example" name="type_room_id">
                <option selected>Tipo de habitación</option>
                <option value="1">Estandar</option>
                <option value="2">Junior</option>
                <option value="3">Suite</option>
              </select>
        </div>
          <input type="hidden"  name="hotel_id" class="form-control" id="inputCity" value="{{$id}}">
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
</div>

@endsection
