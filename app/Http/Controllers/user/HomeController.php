<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PerdinModel;
use App\Models\townModel;
use App\Models\User;
use Illuminate\Support\Facades\Session as FacadesSession;
use DateTime;
use Illuminate\Contracts\Session\Session;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $amountLine = 3;
        $data= PerdinModel::orderBy('id','desc')->paginate($amountLine);
       
        return view ('user.home')->with('showPerdin',$data);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $dataInputForm = townModel::orderBy('id','desc')->get();
        $data['showPerdin'] = PerdinModel::orderBy('id','desc');
        // return view ('home')->with('showPerdin',$data,$dataInputForm);
        // return redirect()->to('home.#tambah_barang')->with('showPerdin',$dataInputForm);
        return view ('user.createFormPerdin')->with('dataInputForm',$dataInputForm);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        FacadesSession::flash('departure_date',$request->departure_date);
        FacadesSession::flash('return_date',$request->return_date);
        FacadesSession::flash('hometown',$request->hometown);
        FacadesSession::flash('destination_town',$request->destination_town);
        FacadesSession::flash('comment',$request->comment);
        FacadesSession::flash('duration',$request->duration);
        // // validate process
        $request->validate([
            'departure_date' => 'required',
            'return_date'  =>  'required',
            'hometown'  =>  'required',
            'destination_town'  => 'required',
            'comment'  =>  'required',
            'duration' => 'required',
        ],[
            'departure_date.required'=>'Tanggal awal wajib disi',
            'return_date.required'=>'Tanggal akhir wajib disi',
            'hometown.required'=>'Kota asal wajib disi',
            'destination_town.required'=>'Kota Tujuan wajib disi',
            'comment.required'=>'Keterangan wajib disi',
            'duration.required'=>'Duration wajib diisi',
        ]);
     
        $data=[
          
            'departure_date' => $request->departure_date,
            'return_date'  => $request->return_date,
            'hometown'  => $request->hometown,
            'destination_town'  =>$request-> destination_town,
            'comment'  => $request->comment,
            'duration'  => $request->duration,
            'distance' =>$request->distance,
            'amount' =>$request->amount,
            'user_id'=>$request->user_id
        ];

      
  
        PerdinModel::create($data);
        return redirect()->to('home')->with('success', 'Berhasil menambahkan data');
    
    }

    


   
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

