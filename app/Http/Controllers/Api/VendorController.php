<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Vendor;
use Validator;

class VendorController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Vendor = Vendor::all();
        return response()->json([
            'message' => 'Vendor All Data',
            'Vendor' => $Vendor
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

        $Vendor = Vendor::create(array_merge(
                    $validator->validated(),
                    ['name' => $request->name],
                    ['users_id' => $request->users_id]
                ));

        return response()->json([
            'message' => 'successfully Store',
            'Vendor' => $Vendor
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
        $Vendor = Vendor::find($id);
        return response()->json([
            'message' => 'Show successfully',
            'Vendor' => $Vendor
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
        $Vendor = Vendor::find($id);
        $Vendor->name = $request->name;
        $Vendor->users_id = $request->users_id;
        $result = $Vendor->save();

        if($result){
            return response()->json([
                'message' => 'successfully Update',
                'Vendor' => $Vendor
            ], 201);
        }else{
            return response()->json([
                'message' => 'Not successfully Update',
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
        $Vendor = Vendor::find($id);
        
        $result = $Vendor->delete();

        if($result){
            return response()->json([
                'message' => 'successfully Delete',
            ], 201);
        }else{
            return response()->json([
                'message' => 'Not successfully Delete',
            ], 400);
        }
    }
}
