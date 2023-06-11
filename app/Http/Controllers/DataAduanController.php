<?php

namespace App\Http\Controllers;

use App\Models\DataAduan;
use App\Models\User;
use Illuminate\Http\Request;

class DataAduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataAduan = DataAduan::paginate(10);
        return response() -> json([
            'data' => $dataAduan
            ]); 
    }
    public function index2()
    {
        $pengaduan = DataAduan::get();
        $users = User::get();
 
        return view('pengaduan.index', 
        ['pengaduan'=>$pengaduan
        ,'data_diri'=>$users
    ]);      

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataAduan = DataAduan::create([
            'statement' => $request->statement,
            'bukti_foto'=>$request->bukti_foto,
            'id_user' => $request->id_user,
           ]);
           if($dataAduan){
            return response()->json([
                'data' =>$dataAduan,
                'message' =>"success"
               ]);

           }else{
            return response()->json([
                'data' =>null,
                'message' =>"failed"
               ]);
           }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataAduan  $dataAduan
     * @return \Illuminate\Http\Response
     */
    public function show(DataAduan $dataAduan)
    {
        if($dataAduan){
            echo "succes";
            return response()->json([
                'data' =>$dataAduan
               ]);

           }else{
            echo "failed";
           }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataAduan  $dataAduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataAduan $dataAduan)
    {
        $dataAduan->statement = $dataAduan->statement;
        $dataAduan->bukti_foto = $dataAduan->bukti_foto;
        $dataAduan->id_user = $dataAduan->id_user;
        $dataAduan->save();

        if($dataAduan){
            echo "succes";
            return response()->json([
                'data' =>$dataAduan
               ]);

           }else{
            echo "failed";
           }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataAduan  $dataAduan
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataAduan $dataAduan)
    {
        $dataAduan->delete();
        return response()->json([
        'message' => 'data aduan deleted'], 204);
    }
}