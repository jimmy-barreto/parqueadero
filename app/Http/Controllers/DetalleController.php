<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class DetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request){
            $consulta = $request->buscar;

            $clientes = App\Cliente::orderby('nombre', 'asc')->get();
            $vehiculos = App\Vehiculo::orderby('placavehiculo', 'asc')->get();       
            $detalles = App\Detalle::where('id', 'LIKE', '%' . $consulta . '%')
                                        ->orderby('id','asc')
                                        ->paginate(5);

            return view('detalle.index', compact('detalles','consulta', 'clientes', 'vehiculos'));
        }

        $detalles = App\Detalle::orderby('id', 'asc')->paginate(5);
        $clientes = App\Cliente::orderby('nombre', 'asc')->get();
        $vehiculos = App\Vehiculo::orderby('placavehiculo', 'asc')->get();       
        return view('detalle.index', compact('detalles', 'clientes', 'vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'horaentrada' => 'required',
            'idvehiculo' => 'required',
            'idcliente' => 'required'
        ]);

        App\Detalle::create($request->all());      
        
        return redirect()->route('detalle.index')
                ->with('exito', 'Se ha Creado la Hora de Entrada Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Detalle  $detalle
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalle = App\Detalle::join('clientes', 'detalles.idcliente', '=', 'clientes.id')
                                ->join('vehiculos', 'detalles.idvehiculo', '=', 'vehiculos.id')
                                ->select('detalles.*', 'clientes.nombre as cliente', 'vehiculos.placavehiculo as vehiculo')
                                ->where('detalles.id', $id)
                                ->first(); 
        return view('detalle.view', compact('detalle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Detalle  $detalle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientes = App\Cliente::orderby('nombre', 'asc')->get();
        $vehiculos = App\Vehiculo::orderby('placavehiculo', 'asc')->get();
        $detalle = App\Detalle::findorfail($id);

        return view('detalle.edit', compact('detalle', 'clientes', 'vehiculos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Detalle  $detalle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'horaentrada' => 'required',            
            'idvehiculo' => 'required',
            'idcliente' => 'required'            
        ]);
        
        $detalle = App\Detalle::findorfail($id);

        $detalle->update($request->all());

        /*return response()->json([
            "mensaje" => "modificado"
        ]);*/

        return redirect()->route('detalle.index')
                ->with('exito', 'Se ha Modificado el Detalle Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Detalle  $detalle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detalle = App\Detalle::findorfail($id);

        $detalle->delete();

        return redirect()->route('detalle.index')
                ->with('exito', 'Se ha Eliminado el Detalle Correctamente');
    }
}
