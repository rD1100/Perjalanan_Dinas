@extends('layouts.dashboardPerdin.main')
@section('content')
    


<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-4 text-gray-800">Perdinku</h1>
 
</div>



<!-- Content Row -->

   
<div class="container-fluid" >
    <?php
      $userData=Auth::User()->id ;

      $users = DB::table('tb_perdins')
      ->select('hometown','destination_town','departure_date','return_date','comment','status','duration')
      ->where('user_id',$userData)
      ->get();

      foreach ($users as $item ) {
        $firsttown=$item->hometown;
        $secondtown=$item->destination_town;
        $departuredate=$item->departure_date;
        $returndate=$item->return_date;
        $commentTown=$item->comment;
        $status=$item->status;

      }
    ?>     

  <div class="row">
    <div style="padding-left: 88%;padding-right: 10px">
      <a href="{{ url('home/create') }}">
          <button class="btn btn-sm btn-info mb-3 " data-toggle="modal"  >
              <i class="fas fa-plus fa-sm"></i> Tambah Perdin
              
          </button>
      </a>
         
    {{-- <a style="" class="btn btn-block btn-outline-primary" href='{{ url('perdin/create') }}'>+ Tambah Perdin</a> --}}
  </div >
    <div class="col-lg">
          <table style="empty-cells: show;" class="table  table-bordered table-striped" id="dataTable">
            <thead>
              <tr>
                <th scope="col">#</th> 
                <th scope="col">Kota asal </th> 
                <th scope="col">Kota tujuan</th>
                <th scope="col">Tanggal awal</th> 
                <th scope="col">Tanggal akhir</th>
                <th scope="col">Duration</th>
                <th scope="col">Keterangan</th> 
                <th scope="col">Status</th> 
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $item)
              <tr>    
            
                <td>{{$loop->index + 1}}</td>
                <td>{{ $item->hometown }}</td>
                <td> {{ $item->destination_town }}</td>
                <td>{{ $item->departure_date }}</td>
                <td>{{ $item->return_date }}</td>
                <td>{{ $item->duration }}</td>
                <td>{{ $item->comment }}</td>
                <td >
                  <?php
                  $statusValue=$item->status;
                  if ($statusValue=='reject'|| $statusValue=='Reject') {
                  
                  ?>
                  <div style="color: rgb(241, 24, 24); border: none  ;text-align: center;background: rgba(230, 10, 10, 0.232);border-radius: 50px;font-weight: 500;font-size: 16px">{{ $statusValue }}</div>
                      
                  <?php 
                  }elseif($statusValue=='pending'||$statusValue=='Pending') {
                    
                  ?>
                  <div style="color:rgb(243, 158, 0); border: none  ;text-align: center;background: rgba(232, 202, 5, 0.427);border-radius: 50px;font-weight: 500;font-size: 16px">{{ $statusValue }}</div>
                  <?php
                  }elseif($statusValue=='Approve'||$statusValue=='approve'){
                    
                  ?>
                     <div style="color: rgba(8, 4, 243, 0.985); border: none  ;text-align: center;background: rgba(0, 0, 255, 0.21);border-radius: 50px;font-weight: 500;font-size: 16px">{{ $statusValue }}</div>
                  <?php
                  }
                  ?>
                      
              
                
                </td>
                
              </tr>
              
              @endforeach
            </tbody>
          </table>
          {{ $showPerdin->withQueryString()->links() }}

    </div>
    
 

{{-- form --}}

  <div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    {{-- query show town --}}
    <?php
      $town = DB::table('town_tb')
        ->select('name_town')
        ->get();
    ?>


   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Tambah Perdin</h5>
               
             
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                 <span aria-hidden="true">&times;</span> 
           </div>
           <div class="modal-body">
              <form action='{{ url('home') }}' method="post" >
                  @csrf
                  <div class="form-group">
                    <label for="">Kota</label>
                    <br>
                      <input style="width: 44%" class="" type="text" list="idListHomeTown" name="hometown" id="idInputHomeTown" 
                      placeholder="pilih kota asal" value="{{ Session::get('hometown') }}" required  >
                          <datalist id="idListHomeTown">
                              @foreach ($town as $items)
                                  <option> {{ $items->name_town}}</option>
                              @endforeach
                          </datalist>
                      </input>
                   
                    &#8594;
                   
                      <input style="width: 50%" class="" type="text" list="idListDestinationTown" name="destination_town" id="idInputDestinationTown" 
                      placeholder="pilih kota tujuan" value="{{ Session::get('destination_town') }}" required  >
                          <datalist id="idListDestinationTown">
                              @foreach ($town as $item)
                              <option> {{ $item->name_town}}</option>
                              @endforeach
                          </datalist>
                      </input>
                 
                  
                   
                   
                   <div class="form-group">
                      <label for="lname">Tanggal </label>
                      <br>
                      <input style="width: 44%" type="date"  name="departure_date" id="idInputDate" 
                      value="{{ Session::get('departure_date') }}" onchange="saveDate()" required  >
                      &#8594;
                      <input style="width: 50%" type="date"  name="return_date" id="idInputReturnDate" 
                      value="{{ Session::get('return_date') }}"  onchange="saveDate()" required>
                   </div>
                   <script>
                      console.log(saveDate);
                      function saveDate(){
                          let firstDate= document.getElementById('idInputDate').value;
                          let lastDate= document.getElementById('idInputReturnDate').value;
                      
                          let date1= new Date(firstDate);
                          let date2= new Date(lastDate);
                          
                          let time_difference = date2.getTime() - date1.getTime();

                          //calculate days difference by dividing total milliseconds in a day
                          // let days_difference = 0;
                          let days_difference = time_difference / (1000 * 60 * 60 * 24);
                  
                              document.getElementById('idDuration').innerHTML=days_difference+" "+'Hari' ;
                          
                          
                      }
                      </script>
                   <div class="form-group">
                      <label for="">Keterangan</label>
                      <br>
                      <textarea name="comment" id="" cols="60" rows="2" required>Pusdiklat antar provinsi</textarea>
                       
                   </div>
                   <div class="form-group" style="margin-left: 30%;">
                      <label for="">Total Perjalanan Dinas</label>
                      <br>
                       {{-- <input type="text" class="form-control" id="stok" name="stok" placeholder="Stok" value="<div></div>" required> --}}
                       <textarea style="text-align: center;border: none;margin-left: 5px;color: blue;font-weight: bold" name="duration" id="idDuration" cols="10" rows="1" disabled> </textarea>
                   </div>
                   <input style="display: none" type="text"  name="user_id" id="id" value="{{ Auth::user()->id }}"    >

                   <div class="modal-footer">
                       <button type="button" class="btn btn-dark" data-dismiss="modal">Keluar</button>
                       <button type="submit" class="btn btn-primary">Simpan</button>
                   </div>
              </div>
           </form>
       </div>
   </div>
</div>

  </div>
         
</div>    
      
@endsection