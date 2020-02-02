<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoMedicamentos;
use Illuminate\Support\Facades\Validator;
use App\Medicamentos;
use Auth;
use Illuminate\Support\Facades\Redirect;

class MedicamentosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $TipoMedi = TipoMedicamentos::all();
        $medicamentos = Medicamentos::all();
        return view('farmacia.medicamentos', compact('TipoMedi', 'medicamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'codigo' => 'required|string|max:20',
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string',
            'valor' => 'required|numeric|digits_between:1,10',
            'stop' => 'required|numeric|max:9999',
            'stop_min' => 'required|numeric|max:9999',
            'stop_max' => 'required|numeric|max:9999',
        ])->validate();
        
        $medi = new Medicamentos();
        $medi->codigo = $request->codigo;
        $medi->nombre = $request->nombre;
        $medi->descripcion = $request->descripcion;
        $medi->tipo_id = $request->tipo;
        $medi->valor = $request->valor;
        $medi->stop = $request->stop;
        $medi->stop_min = $request->stop_min;
        $medi->stop_max = $request->stop_max;
        $medi->user_id = Auth::id();
        $medi->save();
        //Redirigir a la lista de tareas.
        return Redirect::to('medicamentos')->with('notice', 'Medicamento guardada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
