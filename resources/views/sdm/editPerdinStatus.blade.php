@extends('layouts.dashboardAdmin.main')
@section('content')


<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card card-primary">
            <div class="card-header"> 
                <h3 class="card-title">Approval Pengajuan Perdin</h3>
            </div>
             
            <form action="{{ url('SDM/'.$data->id) }}"method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label >Nama</label>
                        <input class="form-control" type='text' name="name" id="idUpdateNameTown" 
                        value="{{ $data->user->name }}" disabled >
                    </div>
                    <div class="form-group">
                        <label >Kota</label>
                        <br>
                        <input style="width: 45%" type='text' name="hometown" id="idInputHomeTown" 
                        value="{{ $data->hometown }}" disabled >
                        &#8594;
                        <input style="width: 50%" type="text" name="destinationtown" id="idInputDestinationTown"
                        value="{{ $data->destination_town }}" disabled>
                    </div>
                    <div class="form-group">
                        <label >Tanggal </label>
                        <br>
                        <input  style="width: 45%" type="date" id="" name="departure_date" 
                        value="{{ $data->departure_date }}" disabled>
                        &#8594;
                        <input style="width: 50%" type="date" name="return_date" id=""
                        value="{{ $data->return_date }}" disabled>
                    </div>
                    <div class="form-group">
                        <label >Keterangan</label>
                        <br>
                        <input class="form-control" type="text" id="" name="comment" 
                        value="{{ $data->comment }}"disabled>
                    </div>
                    <?php
                    //declared variable to query
                        $hometownData= $data->hometown ;
                        $destinatontownData= $data->destination_town ;
                        $resultDurationForm= $data->duration ;
                        $resultDurationConvertInt=(int)$resultDurationForm;
                        
                
                            $HometownQuery = DB::table('town_tb')
                                                ->select('latitude', 'longtitude','province_town','island_town','abroad')
                                                ->where('name_town','=', $hometownData)
                                                ->get();
                
                            
                
                                $DestinationtownQuery = DB::table('town_tb')
                                                ->select('latitude', 'longtitude','province_town','island_town','abroad')
                                                ->where('name_town','=', $destinatontownData)
                                                ->get();
                
                    ?> 
            
                {{-- get data  latitude longtitude hometown  --}}
                    
                    <?php 
                    $arrayTown=array();
                    $LatitudeHometown=" ";
                
                    
                        foreach($HometownQuery as $items){
                        
                            $LatitudeHometown=$items->latitude ;
                            // $LatitudeHometowns=new $LatitudeHometown;
                        //    $LatitudeHometowns=$LatitudeHometown;
                            $LongtitudeHometown=$items->longtitude;
                            $provinceHometown=$items->province_town;
                            $islandHometown=$items->island_town;
                            $abroadHometown=$items->abroad;
                            // echo  $LatitudeHometown ;
                        
                        }
                    
                        ?> 
                        
                        {{-- @endforeach --}}
                        {{-- <p>longtitude:{{ }}</p> --}}
     
                    </div>
                    
                     {{-- get data latitude longtitude destinationtown  --}}
                     @foreach ($DestinationtownQuery as $item)
                     <?php
                         $LatitudeDestinationtown=$item->latitude ;
                         $LongtitudeDestinationtown=$item->longtitude;
                         $provinceDestinationtown=$item->province_town;
                         $islandDestinationtown=$item->island_town;
                         $abroadDestinationtown=$item->abroad;
                     ?>
                     @endforeach  
             
                     <?php
                         $arrayBudget=array();
                         $longi1 = deg2rad($LongtitudeHometown); 
                         $longi2 = deg2rad($LongtitudeDestinationtown); 
                     
                         $lati1 = deg2rad($LatitudeHometown); 
                         $lati2 = deg2rad($LatitudeDestinationtown); 
                         
                         $difflong = $longi2 - $longi1; 
                         $difflat = $lati2 - $lati1; 
                     
                         $durationResult=0;
                         $budgetJourney=0;
                                 
                         $val = pow(sin($difflat/2),2)+cos($lati1)*cos($lati2)*pow(sin($difflong/2),2); 
                                 
                         $res1 =3936* (2 * asin(sqrt($val))); //for miles
                         $ResultDistanceKm =6378.8 * (2 * asin(sqrt($val))); //for kilometers
 
                     ?>
                 
                     <?php if ($ResultDistanceKm >= 0 && $ResultDistanceKm <= 60.00000000000 ){?>
                         
                     <?php
                     }elseif($ResultDistanceKm >= 60.00000000000 && $provinceHometown == $provinceDestinationtown && $islandHometown == $islandDestinationtown && $abroadHometown == $abroadDestinationtown ){
                         $budgetJourney = 200000;
                         $durationResult = $budgetJourney*$resultDurationConvertInt;
                         array_push($arrayBudget,$budgetJourney);
                     
                     ?>
                     
                     <?php
                     }elseif($ResultDistanceKm >= 60.00000000000 && $islandHometown == $islandDestinationtown && $provinceHometown != $provinceDestinationtown && $abroadHometown == $abroadDestinationtown ){
                         $budgetJourney = 250000;
                         $durationResult = $budgetJourney*$resultDurationConvertInt;
                         array_push($arrayBudget,$budgetJourney);
                        
                     ?>
                    
                     <?php
                     }elseif($ResultDistanceKm >= 60.00000000000 && $islandHometown != $islandDestinationtown && $provinceHometown != $provinceDestinationtown && $abroadHometown == $abroadDestinationtown){
                         $budgetJourney = 300000;
                         $durationResult = $budgetJourney*$resultDurationConvertInt;
                         array_push($arrayBudget,$budgetJourney);
                         
                     ?>
                     
                     <?php
                     }elseif($ResultDistanceKm >= 60.00000000000 && $abroadHometown != $abroadDestinationtown && $islandHometown != $islandDestinationtown && $provinceHometown != $provinceDestinationtown){
                         $budgetJourney = 50;
                         $convertDollartoRupiah= $budgetJourney*15730.645289;
                         $durationResult = $convertDollartoRupiah*$resultDurationConvertInt;
                         array_push($arrayBudget,$budgetJourney);
 
                       
                     ?>
                     
                     <?php
                     }
                    
                    
                     ?>
                     <div class="form-group">
                         <div style="margin-top: 20px;">
                             <table class="table table-hover">
                                 <tr style="background-color: rgb(188, 248, 228);">
                                     <th>
                                         Total Hari
                                     </th>
                                     <th>
                                         Jarak Tempuh
                                     </th>
                                     <th>
                                         Total Uang Perdin
                                     </th>
                                 </tr>
                                 <tbody>
                                     <tr>
                                         <style>
                                             table td{
                                                 color: rgb(62, 126, 244);
                                                 font-weight: bold;
                                                 
                                             }
                                             
                                             .reject{
                                                 background-color: rgb(192, 13, 13);
                                                 color: white;
                                                  font-weight: 400;
                                                   border: none;
                                                  padding: 2% 8% 2% 8%;
                                                  font-size: large;
                                                  border-radius: 6px;
                                             }
 
                                             .approved{
                                                 background-color: rgb(36, 94, 209);
                                                 color: white;
                                                  font-weight: 400;
                                                   border: none;
                                                  padding: 2% 3% 2% 8%;
                                                  font-size: large;
                                                  border-radius: 6px;
                                                  text-align: left;
                                             }
 
                                         </style>
                                         <td>{{ $data->duration }} Hari</td>
                                         <td>
                                             {{ round($ResultDistanceKm )}} KM
                                             <br>
                                          
                                               <div style="color: rgb(186, 195, 195)">Rp.{{  number_format($budgetJourney, 0, ',', '.') }} -/ Hari</div> 
                                   
                                         </td>
                                         <td>Rp. {{ number_format($durationResult, 0, ',', '.') }}</td>
                                     </tr>
                                 </tbody>
                                 
                             </table >

                    </div>
                    <div style="margin-left: 35%">
                        <input class="reject"  type="submit" name="status" id=""value="Reject">
                        <input class="approved" type="submit" name="status" id=""value="Approve">
                    </div>
                </form>

                {{-- <body onload="document.createElement('form').submit.call(document.getElementById('myForm'))"> --}}
                    {{-- <form id="myForm" name="myForm"  action="{{url ('saveReport') }}" method="POST">
                        @csrf
                            <input name="nama" type="text" value="{{ $data->user->name }}" style="display: none">
                            <input name="Kota_awal" type="text" value="{{ $data->hometown }}" style="display: none">
                            <input name="kota_tujuan" type="text" value="{{ $data->destination_town }}" style="display: none">
                            <input name="tanggal_awal" type="text" value="{{ $data->departure_date }}" style="display: none">
                            <input name="tanggal_akhir" type="text" value="{{ $data->return_date }}" style="display: none">
                            <input name="comment" type="text" value="{{ $data->comment }}" style="display: none">
                            <input name="jarak" type="text" value=" {{ round($ResultDistanceKm )}}" style="display: none">
                            <input name="duration" type="text" value="{{ $data->duration }}" style="display: none">
                            <input name="money_perdins" type="text" value=" {{ $durationResult }}" style="display: none">
                        
                    </form> --}}
                </body>
            </div>
        </div>
    </div>
</div>
    @endsection