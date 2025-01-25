<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\uasmb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UasmbController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $uasmb = uasmb::all();
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil ditemukan',
            'data' => $uasmb,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'value' => 'required',

            
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi error',
                'errors' => $validator->errors(),
            ], 422);
        }
        $uasmb = uasmb::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dimasukkan',
            'data' => $uasmb,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $uasmb =uasmb::findOrFail($id);
        return response()->json([
            'status'=> 'true',
            'message'=> 'Data berhasil di temukan',
            'data'=> $uasmb
        ]);
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'value' => 'required',

            
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi error',
                'errors' => $validator->errors(),
            ], 422);
        }
        $uasmb = uasmb :: findOrFail($id);
        $uasmb ->update($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dimasukkan',
            'data' => $uasmb,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $uasmb = uasmb::findOrfail($id); 
        $uasmb ->delete();
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dihapus',
        ],204);
    }
}
