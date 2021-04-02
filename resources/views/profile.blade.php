<title>Profile</title>

@extends('layouts.pageapp')

   <script type="text/javascript">
      window.onload = function Gender(){
            var gender = $( "#dbgender" ).val();
            if(gender === "Female"){
                document.getElementById("female").checked = true;
            }
            if(gender === "Male"){
                document.getElementById("male").checked = true;
            }

            var covid = $( "#dbcovid" ).val();
            if(covid === "1"){
                $("#c_status").text("Positive");
            }
            else{
                $("#c_status").text("Negative");
            }
      }

    </script>

@section('content')

<div class="container">
    <div class="row justify-content-center">
          <div class="col-sm-6">  
            <form class="text-left border border-dark p-5" method="POST" action="{{ route('patient.profilePost') }}">
            <h6 class="text-center" style="font-weight: bold;">Update Profile!</h6>
                    @csrf
                    <input type="email" name="email" readonly value="{{ Auth::user()->email }}" hidden>

                    <a class = "label label-left">Name</a>
                    <input type="text" name="name" class="form-control mb-4" placeholder="Name" value="{{$user->name}}">

                    <a class = "label label-left">Age</a>
                    <input type="text" name="age" class="form-control mb-4" placeholder="Age" value="{{$patient->age}}">

                    <a class = "label label-left">Blood Group</a>
                    <input type="text" name="blood_group" class="form-control mb-4" placeholder="Blood Group" value="{{$patient->blood_group}}">                    

                    <a class = "label label-left">Address</a>
                    <input type="text" name="address" class="form-control mb-4" placeholder="Address" value="{{$patient->address}}">

                    <a class = "label label-left">Phone</a>
                    <input type="text" name="phone" class="form-control mb-4" placeholder="Phone" value="{{$patient->phone}}">

                    <div class="form-group">
                          <label for="gender">Gender</label><br>
                          <input type="radio" id="male" name="gender" value="Male" required />Male &nbsp;
                          <input type="radio" id="female" name="gender" value="Female" required />Female                           
                    </div>

                    <div class="form-group">
                          <label for="gender">Covid : </label>
                          <span id="c_status"> </span><br>                         
                    </div> 

                    <input type="text" id="dbgender" value="{{$patient->gender}}" hidden>
                    <input type="text" id="dbcovid" value="{{$user->covid}}" hidden>
                    <!-- Send button -->
                    <button class="btn btn-success" type="submit">Update</button><br><br>
                    <a href="{{ route('patient.passwordGet') }}">
                        Change Password
                    </a><br>                    
            </form>
          </div>
    </div>
</div>
@endsection
