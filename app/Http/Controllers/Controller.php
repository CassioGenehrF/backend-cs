<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

abstract class Controller extends BaseController
{
    public string $model;

    public function index(Request $request)
    {
        if (!$request->all()) {
            return $this->model::all();
        }
        
        $params = $request->all();
        $key = key($params);
        
        return $this->model::where($key, 'like', '%'.$params[$key].'%')->get();
    }
    
    public function store(Request $request)
    {
        $model = new $this->model($request->all());
        $model->save();
        return response()
            ->json($model, 201);
    }

    public function show(string $id)
    {
        $student = $this->model::find($id)->first();
        if (is_null($student)) {
            return response()->json('', 204);
        }
        
        return response()->json($student, 200);
    }

    public function update(string $id, Request $request)
    {
        $resource = $this->model::find($id)->first();
        if (is_null($resource)) {
            return response()->json([
                'error' => 'Resource not found'
            ], 404);
        }

        $resource->update($request->all());
        return response()->json($resource, 200);
    }

    public function destroy(mixed $id)
    {
        $resourceRemoved = $this->model::destroy($id);
        if ($resourceRemoved === 0) {
            return response()->json([
                'erro' => 'Resource not found'
            ], 404);
        }
        
        return response()->json('', 204);
    }
}
