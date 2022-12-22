<?php

namespace App\Http\Controllers\sdm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\townModel;
use Illuminate\Support\Facades\Session as FacadesSession;

class DataMasterKotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $amountLine=3;
        $data= townModel::orderBy('id','desc')->paginate($amountLine);

        return view ('sdm.dataMasterKota')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('sdm.CreateTambahKota');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        FacadesSession::flash('name_town',$request->name_town);
        FacadesSession::flash('province_town',$request->province_town);
        FacadesSession::flash('island_town',$request->island_town);
        FacadesSession::flash('abroad',$request->abroad);
        FacadesSession::flash('latitude',$request->latitude);
        FacadesSession::flash('longtitude',$request->longtitude);
        // validate Input form
        $request->validate([
            'name_town' => 'required',
            'province_town'  =>  'required',
            'island_town'  =>  'required',
            'abroad'  =>  'required',
            'latitude'  =>  'required',
            'longtitude'  =>  'required',
        ],[
            // customize comment error
            'name_town.required'=>'Nama kota wajib disi',
            'province_town.required'=>'Provinsi wajib disi',
            'island_town.required'=>'Pulau wajib disi',
            'abroad.required'=>'Luar Negeri wajib disi',
            'latitude.required'=>'Latitude wajib disi',
            'longtitude.required'=>'Longtitude wajib disi',
        ]);
        $dataKota=[
            //get value from form
            'name_town' => $request->name_town,
            'province_town'  => $request->province_town,
            'island_town'  => $request->island_town,
            'abroad'  => $request->abroad,
            'latitude'  => $request->latitude,
            'longtitude'  => $request->longtitude,
        ];
        // dd($dataKota);
  
        townModel::create($dataKota);
        //to hide error from another variable $data in form page
       ;
        // return view('sdm.CreateTambahKota')->with('success,Update berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $data = townModel::where('id',$id)->first();
       
        return view('sdm.editMasterKota')->with('data',$data);
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
        $request->validate([
            'name_town' => 'required',
            'province_town'  =>  'required',
            'island_town'  =>  'required',
            'abroad'  =>  'required',
            'latitude'  =>  'required',
            'longtitude'  =>  'required',
        ],[
            'name_town.required'=>'Nama Kota awal wajib disi',
            'province_town.required'=>'Provinsi  wajib disi',
            'island_town.required'=>'Pulau asal wajib disi',
            'abroad.required'=>'Luar negeri Tujuan wajib disi',
            'latitude.required'=>'Latitude wajib disi',
            'longtitude.required'=>'Longtitude wajib disi',
        ]);
        $data=[
            'name_town' => $request->name_town,
            'province_town'=>$request->province_town,
            'island_town'  => $request->island_town,
            'abroad'  => $request->abroad,
            'latitude'  => $request->latitude,
            'longtitude'  => $request->longtitude
        ];

        townModel::where('id', $id)->update($data);
       
        return redirect()->to('masterKota')->with('success', 'Berhasil Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        townModel::where('id',$id)->delete();
       
        return redirect()->to('masterKota')->with('success', 'Delete berhasil');
    
    }
}
