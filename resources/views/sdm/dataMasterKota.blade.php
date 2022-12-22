@extends('layouts.dashboardAdmin.main')
@section('content')
    


<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-4 text-gray-800">Master Kota</h1>
 
</div>



<!-- Content Row -->

   
<div class="container-fluid" >

  <div class="row">
    <div style="padding-left: 89%;padding-right: 10px">
      <a href="{{ url('masterKota/create') }}">
          <button class="btn btn-sm btn-primary mb-3 " data-toggle="modal"  >
              <i class="fas fa-plus fa-sm"></i> Tambah Kota
              
          </button>
      </a>
 
  </div >
    <div class="col-lg">
          <table class="table  table-bordered table-striped" id="dataTable">
            <thead>
              <tr>
                <th scope="col">#</th> 
                <th scope="col">Nama Kota</th>
                <th scope="col">Provinsi</th>
                <th scope="col">Pulau</th>
                <th scope="col">Luar negeri</th>
                <th scope="col">Latitude</th>
                <th scope="col">Longtitude</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
      
            @foreach ($data as $items)

              <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{ $items->name_town }} </td>
                    <td>{{ $items->province_town}} </td>
                    <td> {{ $items->island_town }} </td>
                    <td> {{ $items->abroad  }}</td>
                    <td> {{ $items->latitude }} </td>
                    <td> {{$items->longtitude }}</td>
                    <td>
                      <a href="{{ url('masterKota/'.$items->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                      <form onsubmit="return confirm ('Apakah anda yakin ingin menghapus data anda ?')" class="d-inline" action="{{ url('masterKota/'.$items->id) }}"method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit"name='submit'class='btn btn-danger btn-sm'>Del</button>
                         
                      </form>
                      
                  </td>
                 
              </tr>
            @endforeach
              
          
            </tbody>
          </table>
          {{ $data->withQueryString()->links() }}
    </div>
     

 

         
</div>    
      
@endsection