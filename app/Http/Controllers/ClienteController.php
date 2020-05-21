<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class ClienteController extends Controller
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
            $clientes = App\Cliente::where('nombre', 'LIKE', '%' . $consulta . '%')
                                        ->orderby('nombre','asc')
                                        ->paginate(5);

            return view('cliente.index', compact('clientes','consulta'));
        }

        $clientes = App\Cliente::orderby('nombre', 'asc')->paginate(5);
        return view('cliente.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'cedula' => 'required'
        ]);

        App\Cliente::create($request->all());      
        
        return redirect()->route('cliente.index')
                        ->with('exito', 'El Cliente se ha Creado con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = App\Cliente::findorfail($id);        

        return view('cliente.view', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientes = App\Cliente::findorfail($id);

        return view('cliente.edit', compact('clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'cedula' => 'required'
        ]);

        $clientes = App\Cliente::findorfail($id);

        $clientes->update($request->all());

        return redirect()->route('cliente.index')
                        ->with('exito', 'Se Modifico el Cliente con Exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientes = App\Cliente::findorfail($id);

        $clientes->delete();

        return redirect()->route('cliente.index')
                ->with('exito', 'Se Elimino el Cliente con Exito');
    }
}
