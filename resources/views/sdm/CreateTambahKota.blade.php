@extends('layouts.dashboardAdmin.main')
@section('content')
    


<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-4 text-gray-800"></h1>
 
</div>

<!-- Content Row -->

<div class="container-fluid" >

  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Tambah Kota</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ url('SDM') }}" method="POST">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Namat Kota</label>
              <input name="name_town" type="text" class="form-control" id="exampleInputEmail1" placeholder="Sleman" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Provinsi</label>
              <input name="province_town" type="text" class="form-control" id="exampleInputPassword1" placeholder="Yogyakarta" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Pulau</label>
              <input name="island_town" type="text" class="form-control" id="exampleInputPassword1" placeholder="Jawa" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Luar Negeri</label>
              <input name="abroad" type="text" class="form-control" id="exampleInputPassword1" placeholder="Tidak"required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Latitude</label>
              <input name="latitude" type="text" class="form-control" id="exampleInputPassword1" placeholder="-232323333" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Longtitude</label>
              <input name="longtitude" type="text" class="form-control" id="exampleInputPassword1" placeholder="11233434344" required>
            </div>
            
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>

    </div>
  </div>

</div>    
      
@endsection