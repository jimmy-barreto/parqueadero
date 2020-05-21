@extends('layouts.app', ['activePage' => 'Hora', 'titlePage' => __('hora')])

@section('content')

<br><br>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                <div class="card card-plain">
                    <div class="card-header card-header-primary">
                        <h3 class="card-title mt-0"> INFORMACIÓN DE LA HORA DE ENTRADA</h3>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">

                                <thead class="">
                                    <th>
                                        Placa del Vehiculo
                                    </th>
                                    <th>
                                        Nombre del cliente
                                    </th>
                                    <th>
                                        Hora de entrada
                                    </th>
                                    
                                 </thead>

                                 <tbody>
                                    <tr>
                                        <td>{{$detalle->vehiculo}}</td>                                       
                                        <td>{{$detalle->cliente}}</td>
                                        <td>{{$detalle->horaentrada}}</td>                                       
                                    
                                    </tr>
                                </tbody>

                            </table>
                            <a href="{{route('detalle.index')}}"><button class="btn btn-info">Devolver</button>
                        </div>
                    </div>
                </div>
            </div>    
        </div> 
    </div>
</div>
@endsection