<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = author::all();
        return response()->json([
            'success' => 200,
            'data' => $table
        ], 200);
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
        $table = author::create([
            "name" => $request->name,
            "date_of_birth" => $request->date_of_birth,
            "place_of_birth" => $request->place_of_birth,
            "gender" => $request->gender,
            "email" => $request->email,
            "hp" => $request->hp 
        ]);

        return response()->json([
            'success' => 201,
            'message' => 'data berhasil disimpan',
            'data' => $table
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
        $table = author::where('id', $id)->first();
        if ($table) {
            return response()->json([
                'success' => 200,
                'data' => $table
            ], 200);
        } else {
            return response()->json([
                'success' => 404,
                'massage' => 'id atas  ' . $id . ' tidak ditemukan'
            ], 404);
        }
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
        $table = author::find($id);
        if ($table) {
            $table->update([
                "name" => $request->name ? $request->name : $table->name,
                "date_of_birth" => $request->date_of_birth ? $request->date_of_birth : $table->date_of_birth,
                "place_of_birth" => $request->place_of_birth ? $request->place_of_birth : $table->place_of_birth,
                "gender" => $request->gender ? $request->gender : $table->gender,
                "email" => $request->email ? $request->email : $table->email,
                "hp" => $request->hp ? $request->hp : $table->hp
            ]);

            return response()->json([
                'status' => 203,
                'massage' => 'update berhasil',
                'data' => $table
            ], 203);
        } else {
            return response()->json([
                'status' => 404,
                'massage' => 'id atas ' . $id . ' tidak ditemukan'
            ], 404);
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
        $table = author::find($id);
        if ($table) {
            $table->delete();
            return response()->json([
                'Status' => 200,
                'Message' => "Data berhasil dihapus"
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'Message' => "id atas" .  $id . "tidak ditemukan"
            ], 404);
        }
    }
}
