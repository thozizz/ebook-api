<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //list isi table
    {
        $table=Book::all();
        return response()->json([
            'success' => 200,
            'data' => $table
        ],200);
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
    public function store(Request $request) //save data (create)
    {
        $table=Book::create([
            "title"=>$request->title,
            "description"=>$request->description,
            "author"=>$request->author,
            "publisher"=>$request->publisher,
            "date_of_issue"=>$request->date_of_issue
        ]);

        return response()->json([
            'success' => 201,
            'message' => 'data berhasil disimpan',
            'data' => $table
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table=Book::where('id',$id)->first();
        if($table){
            return response()->json([
                'success' => 200,
                'data' => $table
            ],200);
        }
        else {
            return response()->json([
                'success' => 404,
                'massage' => 'id atas  ' . $id . ' tidak ditemukan'
            ],404);
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
        $table=Book::find($id);
        if($table){
            $table->update([
                "title" => $request->title ? $request->title : $table->title,
                "description" => $request->description ? $request->description : $table->description,
                "author" => $request->author ? $request->author : $table->author,
                "publisher" => $request->publisher ? $request->publisher : $table->publisher,
                "date_of_issue" => $request-> date_of_issue ? $request->date_of_issue : $table->date_of_issue,
                "quantity" => $request->quantity ? $request->quantity : $table->quantity
            ]);

            return response()->json([
                'status' => 203,
                'massage' => 'update berhasil',
                'data' => $table
            ],203);
        }
        else {
            return response()->json([
                'status' => 404,
                'massage' => 'id atas ' . $id . ' tidak ditemukan'
            ],404);
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
         $table=Book::find($id);
         if($table){
             $table->delete();
             return response()->json([
                 'Status' => 200,
                 'Message' => "Data berhasil dihapus"
             ],200);
         }else{
             return response()->json([
                 'status' => 404,
                 'Message' => "id atas" .  $id . "tidak ditemukan"
             ], 404);
         }

    }
}
