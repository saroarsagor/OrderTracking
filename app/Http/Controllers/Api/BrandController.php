<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Brand;
use Validator;

class BrandController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allBrand = Brand::all();
        return response()->json([
            'message' => 'Brand Data',
            'allBrand' => $allBrand
        ], 201);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $Brand = Brand::create(array_merge(
                    $validator->validated(),
                    ['name' => $request->name],
                    ['users_id' => $request->users_id]
                ));

        return response()->json([
            'message' => 'Brand successfully Store',
            'Brand' => $Brand
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showBrand = Brand::find($id);
        return response()->json([
            'message' => 'Brand Show successfully',
            'showBrand' => $showBrand
        ], 201);
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
        $Brand = Brand::find($id);
        $Brand->name = $request->name;
        $Brand->users_id = $request->users_id;
        $result = $Brand->save();

        if($result){
            return response()->json([
                'message' => 'Brand successfully Update',
                'Brand' => $Brand
            ], 201);
        }else{
            return response()->json([
                'message' => 'Brand Not successfully Update',
            ], 400);
        }
                  

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Brand = Brand::find($id);
        
        $result = $Brand->delete();

        if($result){
            return response()->json([
                'message' => 'Brand successfully Delete',
            ], 201);
        }else{
            return response()->json([
                'message' => 'Brand Not successfully Delete',
            ], 400);
        }
    }
}
