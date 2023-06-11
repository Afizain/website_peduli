<?php

namespace App\Http\Controllers;

use App\Models\DataDiri;
use Illuminate\Http\Request;
use Validator;

class DataDiriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // untuk web

    public function profileUpdate(Request $request)
    {
        Validator::make($request->all(),[
            'nama_lengkap' => 'required',
            'perumahan' => 'required',
            'telp' => 'required',
            'rt' => 'required',
            'rw' => 'required'

            
        ])->validate();
        $dataDiri=[
            'nama_lengkap' => $request->nama_lengkap,
            'no_telp' => $request->telp,
            'nama_perumahan'=>$request->perumahan,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'photo'=>'gambar.jpg'
        ];
        DataDiri::create($dataDiri);
        return redirect('login');
    }

     // untuk mobile
    public function index()
    {
        $dataDiri = DataDiri::paginate(10);
        return response() -> json([
            'data' => $dataDiri
            ]); 
    }
    // public function index2()
    // {
    //     $DataDiri = DataDiri::get();
            
    //     return view('profile', ['data_diri'=>$DataDiri]);
    //     // return view('pengaduan.index', ['data_diri'=>$DataDiri]);

    // }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        //
        $dataDiri = DataDiri::create([
            
            'nama_lengkap' => $request->nama_lengkap,
            'no_telp' => $request->no_telp,
            'nama_perumahan'=>$request->nama_perumahan,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'photo'=>$request->photo
           ]);
           if($dataDiri){
            return response()->json([
                'data' =>$dataDiri,
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
     * @param  \App\Models\DataDiri  $dataDiri
     * @return \Illuminate\Http\Response
     */
    public function show(DataDiri $dataDiri)
    {
        if($dataDiri){
            echo "succes";
            return response()->json([
                'data' =>$dataDiri
               ]);

           }else{
            echo "failed";
           }
    //    return response()->json([
    //    'data' =>$dataDiri
    //        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataDiri  $dataDiri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataDiri $dataDiri)
    {
        
        $dataDiri->nama_lengkap = $request->nama_lengkap;
        // $dataDiri->nama_perumahan=$request->nama_perumahan;
        // $dataDiri->no_telp = $request->no_telp;
        // $dataDiri->rt = $request->rt;
        // $dataDiri->rw = $request->rw; 
        // $dataDiri->photo = $request -> photo;
        $dataDiri->save();

        if($dataDiri){
            echo "success";
            return response()->json([
                'data' =>$dataDiri
               ]);

           }else{
            echo "failed";
           }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataDiri  $dataDiri
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataDiri $dataDiri)
    {
        $dataDiri->delete();
        return response()->json([
        'message' => 'data diri deleted'], 204);
    }
}