@extends('layouts.app', ['activePage' => 'vehiculos', 'titlePage' => __('vehiculo')])

@section('content')

<br><br>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                <div class="card card-plain">
                    <div class="card-header card-header-primary">
                        <h3 class="card-title mt-0"> INFORMACIÓN DEL VEHÍCULO SELECCIONADO</h3>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">

                                <thead class="">
                                    <th>
                                        Tipo del Vehiculo
                                    </th>
                                    <th>
                                        Placa del Vehiculo
                                    </th>
                                    <th>
                                        Puesto asignado
                                    </th>
                                    
                                 </thead>

                                 <tbody>
                                    <tr>
                                        <td>{{$vehiculo->tipovehiculo}}</>                                       
                                        <td>{{$vehiculo->placavehiculo}}</td>                                        
                                        <td>{{$vehiculo->parqueadero}}</td>                                        
                                    
                                    </tr>
                                </tbody>

                            </table>
                            <a href="{{route('vehiculo.index')}}"><button class="btn btn-info">Devolver</button>
                        </div>
                    </div>
                </div>
            </div>    
        </div> 
    </div>
</div>
@endsection