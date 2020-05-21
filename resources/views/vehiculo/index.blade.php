@extends('layouts.app', ['activePage' => 'Vehiculo', 'titlePage' => __('vehiculo')])

@section('content')

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('vehiculo.store') }}" autocomplete="off" class="form-horizontal">
            @csrf


            @if ($message = Session::get('exito'))
                  <div class="alert alert success">
                  <p style="color:red"> {{$message}}</p>
                  </div>
            @endif

            <div class="card ">
              <div class="card-header card-header-success">
                <h4 class="card-title">{{ __('Agregar marca del vehiculo') }}</h4>
                <p class="card-category">{{ __('Digite la placa del vehiculo') }}</p>
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
                  <label class="col-sm-2 col-form-label">{{ __('Placa del Vehiculo') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="placavehiculo" id="input-name" type="text" placeholder="{{ __('Placa del Vehiculo') }}" value="" required="true" aria-required="true"/>                      
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Tipo del Vehiculo') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="tipovehiculo" list="tipovehiculo" id="input-name" type="text" placeholder="{{ __('Tipo de Vehiculo') }}" value="" required="true" aria-required="true"/>                      
                        <datalist id="tipovehiculo" >
                          <option value="Carro">
                          <option value="Moto">
                        </datalist>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Asignar puesto') }}</label>
                  <div class="col-sm-7">
                    <div class="input-field">
                      <select name="idparqueadero" type="text" value="" required="true"  class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}">
                        <option value="" disabled selected>Puesto</option>
                        @foreach ($parqueaderos as $parqueadero)
                            <option value="{{$parqueadero->id}}">{{$parqueadero->cupo}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-success">Guardar</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="row"> 
        @if ($consulta)
          <div class="alert alert-primary">
              <p>Los resultados de la bùsqueda <strong>{{$consulta}}</strong> son:</p>
          </div>
        @endif
            <div class="col-md-12">
              <div class="card card-plain">
                <div class="card-header card-header-success">
                  <h3 class="card-title mt-0"> VEHÍCULOS DENTRO DEL PARQUEADERO</h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead class="">
                        <th>
                          Cupo
                        </th>
                        <th>
                          Placa del vehiculo
                        </th>
                        <th>
                          Acciones
                        </th>
                      </thead>
                      <tbody>
                        @foreach ($vehiculos as $vehiculo)
                        <tr>
                          <td>{{$vehiculo -> idparqueadero}}</td>                                                   
                          <td>{{$vehiculo -> placavehiculo}}</td>                          
                          <td>
                            <form action="{{route('vehiculo.destroy', $vehiculo->id)}}" method="post">
                              <a href="{{route('vehiculo.show', $vehiculo->id)}}" class="btn btn-info">Mas Información</a>
                              <a href="{{route('vehiculo.edit', $vehiculo->id)}}" class="btn btn-primary">Editar</a>
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    {{$vehiculos->links()}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection