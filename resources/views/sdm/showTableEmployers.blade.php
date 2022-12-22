@extends('layouts.dashboardAdmin.main')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-4 text-gray-800">Pengajuan Perdin</h1>
 
</div>
<div class="container-fluid" >
    <?php
      $userRole=Auth::User()-> id;
      $roleResult = DB::table('users')
          ->select('role_user_tb.role_name', 'users.name')
          ->join('role_user_tb', 'users.role_id', '=', 'role_user_tb.role_id')
          ->where('id',$userRole)
          ->get();       
    ?>

        <div class="row">
              <div class="container-fluid">
                      <table class="table  table-bordered table-striped">
                        <thead>  
                          <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kota awal</th>
                                <th scope="col">Kota Tujuan</th>
                                <th scope="col">Tanggal awal</th>
                                <th scope="col">Tanggal akhir</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr> 
                        </thead>
                        <tbody> 
                      
                              @foreach ($joinPerdin as $item)
                                <tr>    
                              
                                  <td >{{$loop->index + 1}}</td>
                            
                                  <td id="nameid">{{ $item->user->name}}	</td>
                                  <td>{{ $item->hometown }}</td>
                                  <td>{{ $item->destination_town }}</td> 
                                  <td>{{ $item->departure_date }}</td>
                                  <td>{{ $item->return_date }}</td>
                                  <td>{{ $item->comment }}</td>
                                  <td>
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
                                  {{-- <td><a href="/user/{{ $item->user->id }}">link</a></td> --}}
                                  <td><a href="{{ url('SDM/'.$item->id.'/edit') }}"><img style="width: 25px;align-content: center;" src="/img/eye-solid.svg" alt=""></a></td>
                                  
                                </tr>
                            @endforeach 
                            </tbody>
                      </table>
                      {{ $joinPerdin->withQueryString()->links() }}
                      <script>
                        let result1= document.getElementById('nameid').value;
                        document.getElementById('resultnam').innerHTML= 'resultnyo: '+result1;
                        </script>
                      <br>
              
                    
              </div>
          </div>
</div>
  @endsection
