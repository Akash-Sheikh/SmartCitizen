<title>Update Plasma</title>

@extends('admin/layouts.adminapp')

<script type="text/javascript">
      window.onload = function Gender(){

            var covid = $( "#dbcovid" ).val();
            var plasma = $( "#dbplasma" ).val();

            if(covid === "1"){
                $("#c_status").text("Positive!");
            }
            else{
                $("#c_status").text("Negative!");
            }

            if(plasma === "1"){
                $("#r_for").text("Plasma Donate!");
            }
            else{
                $("#r_for").text("Plasma Collect!");
            }

      }

    </script>

@section('content')

<div class="container">
    <div class="row justify-content-center">
         
                    <div class="col-sm-6"> 
                        <form class="text-left border border-light p-5">

                            <input type="text" id="dbcovid" value="{{$plasma->covid}}" hidden>
                            <input type="text" id="dbplasma" value="{{$plasma->plasma}}" hidden>
                           
                            <div class="form-group text-center">
                            <label for="gender">Request For: </label>
                            <span id="r_for"> </span>   
                            </div> 
                             
                            
                            <a class = "label label-left">Name</a>
                            <input type="text" name="name" class="form-control mb-4"  value="{{$plasma->p_name}}" readonly>

                            <a class = "label label-left">Age</a>
                            <input type="text" name="age" class="form-control mb-4"  value="{{$patient->age}}" readonly>                            

                            <a class = "label label-left">Blod Group</a>
                            <input type="text" name="blood_group" class="form-control mb-4" value="{{$patient->blood_group}}" readonly>   

                            <a class = "label label-left">Phone</a>
                            <input type="text" name="phone" class="form-control mb-4"  value="{{$patient->phone}}" readonly>                                                        

                            <a class = "label label-left">Address</a>
                            <input type="text" name="address" class="form-control mb-4" placeholder="Address" value="{{$patient->address}}" readonly>                                                     
                            
                            <a class = "label label-left">Request Letter</a>
                            <div class="form-group">
                                              <textarea readonly class="form-control rounded-0" name="appoinment_letter" rows="6">{{$plasma->letter}}</textarea>
                            </div>

                            <div class="form-group text-center">
                            <label for="gender">Covid: </label>
                            <span id="c_status"> </span> 
                            </div>                            

                        </form>                  
                    </div>

                    <div class="col-sm-6"> 

                            <form class="text-left border border-light p-5" method="POST" action="{{ route('admin.postPlasma') }}">
                            @csrf
                                <input type="text" name="p_id" hidden value="{{$plasma->id}}">

                                <a class = "label label-left">Set Status!</a>
                                <input class="form-control" type="text" name="status"  value="Accepted">                             

                                <a class = "label label-left">Set Time!</a>
                                <div class="input-group date" id="datetimepicker">
                                    <input type="text"  name="time" class="form-control" placeholder="MM/DD/YY 8:14 AM">
                                    <div class="input-group-addon input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    </div>
                                </div>
                                <br>
                                <a class = "label label-left">Set Hospital!</a>
                                <input type="text"  name="hospital" class="form-control mb-4" placeholder="Set Hospital!">

                                <!-- Send button -->
                                <button class="btn btn-success" type="submit">Update</button>
                            </form>                  
                    </div>         
    </div>
</div>


@endsection