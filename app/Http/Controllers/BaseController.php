<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class BaseController 
{
    protected $class;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
 
    public function index()
    {
        return $this->class::paginate(10);
    }

    public function store(Request $request)
    {
        $resource = $this->class::create($request->all());

        return response()->json($resource, 201);
    }

    public function show($id)
    {
        $resource = $this->class::find($id);

        if (is_null($resource)) {
            return response()->json(['erro' => 'Recuso não encontrado'], 404);
        }

        return response()->json($resource, 200);
    }

    public function update(Request $request, $id)
    {
        $resource = $this->class::find($id);

        if (is_null($resource)) {
            return response()->json(['erro' => 'Recuso não encontrado'], 404);
        }

        $resource->update($request->all());

        return response()->json($resource, 200);
    }

    public function destroy($id)
    {
        $resource = $this->class::find($id);

        if (is_null($resource)) {
            return response()->json(['erro' => 'Recuso não encontrado'], 404);
        }

        $resource->delete();

        return response()->json(['success' => 'Deletado com sucesso'], 200);
    }
}