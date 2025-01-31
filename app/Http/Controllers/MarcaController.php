<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{

    protected $marca;
    
    public function __construct(Marca $marca){
        $this->marca = $marca;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marcas = $this->marca->all();
        return response()->json($marcas, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $marca = $this->marca->create($request->all());
        return response()->json($marca, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $marca = $this->marca->find($id);
        
        if($marca === null)
        {
            return response()->json(['erro' => 'Não econtrado!'], 404); 
        }
        return response()->json($marca, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,int $id)
    {
        $marca = $this->marca->find($id);
        if($marca === null)
        {
            return response()->json(['erro' => 'Não econtrado!'], 404); 
        }
        $marca->update($request->all());
        return response()->json($marca, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $marca = $this->marca->find($id);
        if($marca === null)
        {
            return response()->json(['erro' => 'Não econtrado!'], 404); 
        }
        $marca->delete();
        return response()->json(['msg'=> 'A Marca foi removida com sucesso!'], 200);
    }
}
