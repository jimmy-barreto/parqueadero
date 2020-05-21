@extends('layouts.app', ['activePage' => 'parqueadero', 'titlePage' => __('parqueadero')])

@section('content')

<br><br>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                <div class="card card-plain">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title mt-0"> INFORMACIÓN DEL CUPO SELECCIONADO</h4>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">

                                <thead class="">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Cupo asignado
                                    </th>                                    
                                 </thead>

                                 <tbody>
                                    <tr>
                                        <td>{{$parqueadero->id}}</td>
                                        <td>{{$parqueadero->cupo}}</td>                                                                      
                                    </tr>
                                </tbody>

                            </table>
                            <a href="{{route('parqueadero.index')}}"><button class="btn btn-info">Devolver</button>
                        </div>
                    </div>
                </div>
            </div>    
        </div> 
    </div>
</div>
@endsection