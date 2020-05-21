@extends('layouts.app', ['activePage' => 'Parqueadero', 'titlePage' => __('parqueadero')])

@section('content')

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('parqueadero.update', $parqueadero->id)}}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('PUT')

            @if ($message = Session::get('exito'))
                  <div class="alert alert success">
                  <p style="color:red"> {{$message}}</p>
                  </div>
            @endif

            <div class="card ">
              <div class="card-header card-header-success">
                <h3 class="card-title">{{ __('DIGITE PUESTO DEL VEHÍCULO') }}</h3>
              </div>
              <div class="card-body ">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Cupo') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="cupo" id="input-name" type="text" placeholder="{{ __('Cupo') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

            </div>
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-success">Guardar</button>
            </div>
          </div>
        </form>
        <a href="{{route('parqueadero.index')}}"><button class="btn btn-info">Devolver</button>
      </div>
    </div>
  </div>
</div>
@endsection
