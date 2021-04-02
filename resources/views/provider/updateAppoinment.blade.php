<title>Update Appoinments</title>

@extends('doctor/layouts.pagelayouts')

<script type="text/javascript">
      window.onload = function Gender(){
            var helth = $( "#dbhelth" ).val();
            var covid = $( "#dbcovid" ).val();
            if(helth === "Good"){
                document.getElementById("p_good").checked = true;
            }
            if(helth === "Bad"){
                document.getElementById("p_bad").checked = true;
            }

            if(covid === "1"){
                document.getElementById("c_p").checked = true;
            }
            if(covid === "0"){
                document.getElementById("c_n").checked = true;
            }

      }

</script>

@section('content')

<div class="container">
    <div class="row justify-content-center">
         
                    <div class="col-sm-6"> 
                        <form style="height: 757px;" class="text-left border border-light p-5" >
                            
                            <a class = "label label-left">Name</a>
                            <input type="text" name="name" class="form-control mb-4" placeholder="Name" value="{{$patient->name}}" readonly>

                            <a class = "label label-left">Age</a>
                            <input type="text" name="age" class="form-control mb-4" placeholder="Age" value="{{$patient->age}}" readonly>   

                            <a class = "label label-left">Blood Group</a>
                            <input type="text" name="blood_group" class="form-control mb-4" placeholder="Blood Group" value="{{$patient->blood_group}}" readonly>                                                      

                            <a class = "label label-left">Phone</a>
                            <input type="text" name="phone" class="form-control mb-4" placeholder="Phone" value="{{$patient->phone}}" readonly>                                                        

                            <a class = "label label-left">Address</a>
                            <input type="text" name="address" class="form-control mb-4" placeholder="Address" value="{{$patient->address}}" readonly>                                                     
                            
                            <a class = "label label-left">Patient Letter</a>
                            <div class="form-group">
                                              <textarea readonly class="form-control rounded-0" name="appoinment_letter" rows="6">{{$appoin->appoinment_letter}}</textarea>
                            </div>
                            <br>

                        </form>                  
                    </div>

                    <div class="col-sm-6"> 

                            <form class="text-left border border-light p-5" method="POST" action="{{ route('doctor.updateAppoinmentPost') }}">
                            @csrf
                                <input type="text" name="a_id" hidden value="{{$appoin->id}}">
                                 
                                <input type="email" name="email" readonly value="{{ $appoin->p_email }}" hidden>   

                                <a class = "label label-left">Appoinment Status!</a>
                                <input type="text" name="status" class="form-control mb-4" value="Accepted">                                                         

                                <a class = "label label-left">Write Prescription</a>
                                <div class="form-group">
                                                <textarea  class="form-control rounded-0" name="prescription" rows="6">{{$appoin->prescription}}</textarea>
                                </div>
                                <a class = "label label-left">Set visit Hour!</a>
                                <div class="input-group date" id="datetimepicker">
                                    <input type="text"  name="visit" class="form-control" placeholder="MM/DD/YY 8:14 AM">
                                    <div class="input-group-addon input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    </div>
                                </div>
                                <br>
                                <a class = "label label-left">Meet Link</a>
                                <input type="text"  name="meetlink" class="form-control mb-4" placeholder="Meet Link">
                                <a class = "label label-left">Helth</a>
                                <br>
                                    <input type="radio"  name="p_helth" id="p_good" value="Good"  autofocus />Good &nbsp;
                                    <input type="radio"  name="p_helth" id="p_bad"  value="Bad"  autofocus />Bad  
                                <br>
                                <br>
                                <a class = "label label-left">Covid</a>
                                <br>
                                    <input type="radio"  name="covid" id="c_p" value="1"  autofocus />Positive &nbsp;
                                    <input type="radio"  name="covid" id="c_n"  value="0"  autofocus />Negative  
                                <br>
                                <br>
                                
                                <input type="text" id="dbhelth" value="{{$appoin->patient_helth}}" hidden>
                                <input type="text" id="dbcovid" value="{{$user_c->covid}}" hidden>
                                <!-- Send button -->
                                <button class="btn btn-success" type="submit">Update</button>
                            </form>                  
                    </div>         
    </div>
</div>


@endsection