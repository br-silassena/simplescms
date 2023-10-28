<?php

namespace App\Traits;


use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

trait TraitCrudController 
{
    private Model $model;

    public string $pathIndex = '';

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $page = $request->page ?? 1;
        
        return view($this->pathIndex, [
            'listagem' => $this->model->customizedPagnedWithLinks($page)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       try {

            $this->model->fill($request->all());

            $this->model->save();

            return response()->json('success', 200);
            
       } catch (Exception $e) {

        return response()->json($e->getMessage(), 400);
       }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return response()->json($this->model->find($id) ?? [], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {

            $this->model = $this->model->find($id);
            
            $this->model->fill($request->all());

            $this->model->save();

            return response()->json('success', 200);
            
       } catch (Exception $e) {

        return response()->json($e->getMessage(), 400);
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->model->find($id)->delete();
        return response()->json('success', 200);
    }   
}
