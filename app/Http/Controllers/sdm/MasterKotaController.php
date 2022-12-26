<?php

namespace App\Http\Controllers\sdm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\townModel;
use App\Models\User;
use App\Models\PerdinModel;
// use  App\Models\PerdinModel::getTable();
use Illuminate\Support\Facades\DB;
use DateTime;
use PhpParser\Node\Stmt\Const_;

class MasterKotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->PerdinModel= new PerdinModel();
        // return view('sdm.showTableEmployers')->with('success,Update berhasil');
    }
    
    public function index()
    {
        $amountLine=3;
        $this->authorize('sdm');
        $data['joinPerdin'] = PerdinModel::orderBy('id','desc')->paginate($amountLine);

        return view ('sdm.showTableEmployers')->with($data);
    
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
        // FacadesSession::flash('name_town',$request->name_town);
        // FacadesSession::flash('province_town',$request->province_town);
        // FacadesSession::flash('island_town',$request->island_town);
        // FacadesSession::flash('abroad',$request->abroad);
        // FacadesSession::flash('latitude',$request->latitude);
        // FacadesSession::flash('longtitude',$request->longtitude);
        // validate Input form
        // $request->validate([
        //     'name_town' => 'required',
        //     'province_town'  =>  'required',
        //     'island_town'  =>  'required',
        //     'abroad'  =>  'required',
        //     'latitude'  =>  'required',
        //     'longtitude'  =>  'required',
        // ],[
        //     // customize comment error
        //     'name_town.required'=>'Nama kota wajib disi',
        //     'province_town.required'=>'Provinsi wajib disi',
        //     'island_town.required'=>'Pulau wajib disi',
        //     'abroad.required'=>'Luar Negeri wajib disi',
        //     'latitude.required'=>'Latitude wajib disi',
        //     'longtitude.required'=>'Longtitude wajib disi',
        // ]);
        $dataKota=[
            //get value from form
            'name_town' => $request->name_town,
            'province_town'  => $request->province_town,
            'island_town'  => $request->island_town,
            'abroad'  => $request->abroad,
            'latitude'  => $request->latitude,
            'longtitude'  => $request->longtitude,
        ];
  
        townModel::create($dataKota);
        //to hide error from another variable $data in form page
        $data= townModel::orderBy('id','desc')->get();
        // return view('sdm.dataMasterKota')->with('data',$data,'success,Update berhasil');
        // return(dd('masuk'));
        return redirect()->to('masterKota')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       dd('yoo');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd('wokeedit');
        // $data['editOne'] = $this->PerdinModel->editOneDataTbPerdin($id)->where('id',$id)->first();
        $data = PerdinModel::where('id',$id)->first();
        // dd($data);
        return view('sdm.editPerdinStatus')->with('data',$data);
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
        //get data
        $dataUpdate=[
            'amount'=>$request->amount,
            'distance'=>$request->distance,
            'status'=>$request->status
        ];
 
      
       PerdinModel::where('id', $id)->update($dataUpdate);
 
    //    $data['joinPerdin'] = PerdinModel::get();
    //     return view( 'sdm.showTableEmployers')->with($data);
        return redirect()->to('SDM')->with('success', 'Selamat berhasil update status data');
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
