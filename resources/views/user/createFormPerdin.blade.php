@extends('layouts.dashboardPerdin.main')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tambah Perdin</h1>
                </div>
                <form  action='{{ url('home') }}' method="post">
                    @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="fname">Kota </label>
                                <br>
                                <input style="width: 44%;" type="text" list="idListHomeTown" name="hometown" id="idInputHomeTown" 
                                placeholder="pilih kota asal" value="{{ Session::get('hometown') }}" onchange="distanceFunction()"  >
                                    <datalist id="idListHomeTown">
                                        @foreach ($dataInputForm as $items)
                                            <option> {{ $items->name_town}}</option>
                                        @endforeach
                                    </datalist>
                                </input>
                                &#8594;           
                                <input style="width: 50%;" type="text" list="idListDestinationTown" name="destination_town" id="idInputDestinationTown" 
                                placeholder="pilih kota tujuan" value="{{ Session::get('destination_town') }}"  onchange="distanceFunction()"  >
                                    <datalist id="idListDestinationTown">
                                        @foreach ($dataInputForm as $item)
                                        <option> {{ $item->name_town}}</option>
                                        @endforeach
                                    </datalist>
                                </input>
                            </div>
                            <div class="form-group">
                                <label for="lname">Tanggal </label>
                                <br>
                                <input style="width: 44%" type="date"  name="departure_date" id="idInputDate" 
                                value="{{ Session::get('departure_date') }}" onchange="saveDate()"   data-target="#reservationdatetime">
                                &#8594;
                                <input style="width: 50%" type="date"  name="return_date" id="idInputReturnDate" 
                                value="{{ Session::get('return_date') }}"  onchange="saveDate()">
                            </div> 
                            <div class="form-group" >
                                <label for="lKeterangan">Keterangan</label>
                                <br>
                                <textarea id="almt" name="comment" rows="4" cols="84" value="{{ Session::get('comment') }}">Pusdiklat antar daerah
                                </textarea>
                            </div>
                            <div class="form-group" style="margin-left: 30%;">
                                <label for="ldateCalculate"> Total Perjalanan Dinas</label>
                                <br>
                                <textarea style="text-align: center;border: none;margin-left: 5px;color: blue;font-weight: bold;" id="idDuration" name="duration" cols="10" rows="1" >
                                  
                                </textarea>
                            </div>

                        </div>
                                    
                        <script>
                            console.log(saveDate);
                            async function saveDate(){
                                let firstDate= document.getElementById('idInputDate').value;
                                let lastDate= document.getElementById('idInputReturnDate').value;
                            
                                let date1= new Date(firstDate);
                                let date2= new Date(lastDate);
                                
                                let time_difference = date2.getTime() - date1.getTime();
        
                                //calculate days difference by dividing total milliseconds in a day
                                let days_difference = time_difference / (1000 * 60 * 60 * 24);
                                if(isNaN(days_difference)){
                                    days_difference=0;
                                }
                            
                                document.getElementById('idDuration').innerHTML=await days_difference +" "+"Hari";
                            }
                        </script>
                
                        <input style="display: none" type="text"  name="user_id" id="id" value="{{ Auth::user()->id }}"    >          
                     
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>

                </form>
    
                    

                            {{-- <script >
                                async function distanceFunction(){
                                    let FirstTown= document.getElementById('idInputHomeTown').value;
                                    let SecondTown= document.getElementById('idInputDestinationTown').value;
                                    
                                    document.getElementById("resultJavascript").innerHTML=await FirstTown;  
                                    document.getElementById("resultJavascript1").innerHTML=await SecondTown; 
                            
                                }

                            </script>

                            <div id="result"></div> --}}
                                <?php
                                    // print_r($_GET)
                                ?>

                                {{-- <div class="form-group" >
                                
                                    <textarea name="res1" id="resultJavascript" cols="15" rows="2">
                                    
                                    </textarea>
                            
                                
                                    <textarea name="res2" id="resultJavascript1" cols="15" rows="2">
                                    
                                    </textarea>
                                </div> --}}
                                {{-- <div class="form-group" >
                            
                                </div>
                                <div class="form-group" >
                                    <label for="">result 1</label>
                                    <textarea name="" id="hasil" cols="30" rows="10" ></textarea>
                                </div> --}}
                
            </div>

        </div>
    </div>
    
</div>    

@endsection