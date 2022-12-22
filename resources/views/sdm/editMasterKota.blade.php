@extends('layouts.dashboardAdmin.main')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-4 text-gray-800"></h1>
   
</div>
  
  <!-- Content Row -->
  
<div class="container-fluid" >

    <div class="row justify-content-center">
        <div class="col-md-8">
       
              
            <!-- left column -->
            
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Approval Pengajuan Perdin</h3>
                </div>
 
             

                {{-- content --}}

                   

                    {{-- <div class="container"  >
                        
                        <div class="card-body" > --}}
                        @if ($errors->any())
                        <div class="pt-3">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors ->all() as $item)
                                    <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div> 
                        @endif
                  
                <form action='{{ url('masterKota/'.$data->id) }}' method="post" >
                    <div class="card-body">
                        <div class="form-group">
                            @csrf
                            @method('PUT')
                            <label for="exampleInputEmail1">Nama Kota </label>
                            
                            <input type='text' class="form-control" name="name_town" id="idUpdateNameTown" 
                            value="{{ $data->name_town }}" >
                        </div>
                        
                        <div class="form-group">
                            <label for="">Provinsi</label>
                            
                            <input type='text' class="form-control" name="province_town" id="idUpdateProvinceTown" 
                            value="{{ $data->province_town }}" >
                        </div>
                        <div class="form-group">
                            <label >Pulau </label>
                            <input type="text" class="form-control" id="idUpdateIsland" name="island_town" 
                            value="{{ $data->island_town }}" >
                        </div>
                        <div class="form-group">
                            <label >Luar Negeri</label>
                            
                            <input type="text" class="form-control" id="idUpdateLuarnegeri" name="abroad" 
                            value="{{ $data-> abroad}}">
                        </div>
                        <div class="form-group">
                            <label >Latitude</label>
                            
                            <input type="text" class="form-control" id="idUpdateLatitude" name="latitude"
                            value="{{ $data-> latitude}}" >
                        </div>
                        <div class="form-group">
                            <label >Longtitude</label>
                            <input type="text" class="form-control" id="idUpdateLongtitude" name="longtitude"
                            value="{{ $data->longtitude }}">
                        </div>  
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                            
                    </div>
                </form>
                  
                       
                   
            </div>
        </div>
    </div>
</div>

@endsection