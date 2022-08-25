@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row my-4">
        <div class="col"></div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                  <h4 class="text-center">Bienvenido Al Sistema</h4>
                </div>
                <div class="card-body shadow">
                    <form method="POST" action="{{route('login')}}">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Email</label>
                          <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                          <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-primary">Ingresar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>
</div>
@endsection
