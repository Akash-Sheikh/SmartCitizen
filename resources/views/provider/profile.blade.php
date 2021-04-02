<title>Doctor Profile</title>

@extends('doctor/layouts.pagelayouts')

<script type="text/javascript">
      window.onload = function Gender(){
            var gender = $( "#dbgender" ).val();
            if(gender === "Female"){
                document.getElementById("female").checked = true;
            }
            if(gender === "Male"){
                document.getElementById("male").checked = true;
            }
      }
</script>

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

                    <!--cover popup-->
                    <div class="panel-body">                                        
                          <div style="top: 50px;" class="modal fade" id="targetc" role="dialog">
                          <div class="modal-dialog">
                          <div class="modal-content">
                          <div class="modal-header">
                              <h6 style="color: black;" class=modal-title>Update Cover Photo!</h6>
                              <button type="button" class="close" data-dismiss="modal" >&times</button>

                          </div>
                                <div class="modal-body">                          

                                    <form class="text-left border border-light p-5" method="POST" action="{{ route('doctor.storecover') }}" enctype="multipart/form-data">
                                    @csrf
                                        <div class="form-group">
                                            <input type="text" name="id" value="{{$doctor->id}}" hidden/> 
                                            <img id="previewCover" src="images/blankimg.png" style="max-width:130px; margin-top:20px;"/><br><br>
                                            <input required type="file" name="c_file" placeholder="Choose Image" onchange="coverPreview(this)"/>
                                        </div>

                                        <input type="submit"  class="btn btn-success float-right" value="Update"/> 
                                    </form>

                                </div>
                          <div class="modal-footer">
                          </div>
                          </div>
                          </div>
                          </div>

                          
                    </div>
                    <!--cover popup end-->

                    <!--profile popup-->
                    <div class="panel-body">
                                           
                          <div style="top: 50px;" class="modal fade" id="targetp" role="dialog">
                          <div class="modal-dialog">
                          <div class="modal-content">
                          <div class="modal-header">
                              <h6 style="color: black;" class=modal-title>Update Profile Photo!</h6>
                              <button type="button" class="close" data-dismiss="modal" >&times</button>

                          </div>
                                <div class="modal-body">                          

                                    <form class="text-left border border-light p-5" method="POST" action="{{ route('doctor.storeprofile') }}" enctype="multipart/form-data">
                                    @csrf
                                        <div class="form-group">
                                            <input type="text" name="id" value="{{$doctor->id}}" hidden/> 
                                            <img id="previewProfile" src="images/blankimg.png" style="max-width:130px; margin-top:20px;"/><br><br>
                                            <input required type="file" name="p_file" placeholder="Choose Image" onchange="profilePreview(this)"/>
                                        </div>

                                        <input type="submit"  class="btn btn-success float-right" value="Update"/> 
                                    </form>

                                </div>
                          <div class="modal-footer">
                          </div>
                          </div>
                          </div>
                          </div>

                          
                    </div>
                    <!--profile popup end-->

                    <div class="card">
                    <div class="card-body">
                                <img style="width: 100%; min-height: 120px; background-size: cover; background-repeat: no-repeat; background-position: center" class="img-fluid" alt="Responsive image" src="{{$doctor->coverimage}}">                                      
                                       
                                <div class="text-center" style="position: relative; top: -50px; margin-bottom: -90px;">
                                    <img style="height: 130px; width: 130px; border-radius: 50%; border: 5px solid rgba(255,255,255,0.5); position: relative; top: -38px;" src="{{$doctor->profileimage}}" class="img-fluid" alt="Responsive image">
                                </div> 
                                <div class="title text-center">
                                    <a target="_blank" href="#">{{$user->name}}</a>
                                </div> 

                                <div class="title text-center">
                                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#targetc" >Cover Photo</button>
                                <br>
                                <br>                           
                                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#targetp" >Profile Photo</button>
                                </div> 
                                <br>
                            <form class="text-left border border-light p-2" method="POST" action="{{ route('doctor.update') }}">
                                                   
                                                   @csrf
                                                   <input type="email" name="email" readonly value="{{ Auth::user()->email }}" hidden>
                       
                                                   <a class = "label label-left">Name</a>
                                                   <input type="text" name="name" class="form-control mb-4" placeholder="Name" value="{{$user->name}}">                            
                       
                                                   <a class = "label label-left">Hospital</a>
                                                   <input type="text" name="hospital" class="form-control mb-4" placeholder="Hospital" value="{{$doctor->hospital}}">
                       
                                                   <a class = "label label-left">Phone</a>
                                                   <input type="text" name="phone" class="form-control mb-4" placeholder="Phone" value="{{$doctor->phone}}">
                       
                                                   <a class = "label label-left">Education</a>
                                                   <input type="text" name="education" class="form-control mb-4" placeholder="Education" value="{{$doctor->education}}">
                       
                                                   <a class = "label label-left">Specialist</a>
                                                   <input type="text" name="specialist" class="form-control mb-4" placeholder="Specialist" value="{{$doctor->specialist}}">    
                                                   
                                                    <div class="form-group">
                                                        <label for="gender">Gender</label><br>
                                                        <input type="radio" id="male" name="gender" value="Male" required autofocus placeholder="Enter gender..."/>Male &nbsp;
                                                        <input type="radio" id="female" name="gender" value="Female" required autofocus placeholder="Enter gender..."/>Female                           
                                                    </div>  
                                                    
                                                    <input type="text" id="dbgender" value="{{$doctor->gender}}" hidden> 
                       
                                                   <!-- Send button -->
                                                   <button class="btn btn-success" type="submit">Update</button><br><br>
                                                   <a href="{{ route('doctor.passwordGet') }}">
                                                     Change Password
                                                   </a><br>                       
                                           </form>                                     

                    </div>
                    </div>
                
           

               <!-- <div class="bottom">
                        <ul class="ftco-footer-social p-0">
                            <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><span class="fa fa-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><span class="fa fa-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><span class="fa fa-instagram"></span></a></li>
                        </ul>
                </div> -->
           
        </div>
    </div>
</div>


<script>
      function coverPreview(input){
          var file = $("input[type=file]").get(0).files[0];
          if(file){
              var reader = new FileReader();
              reader.onload = function(){
                  $("#previewCover").attr("src",reader.result);
              }
              reader.readAsDataURL(file);
          }
      }

      function profilePreview(input){
          var file = $("input[type=file]").get(1).files[0];
          if(file){
              var reader = new FileReader();
              reader.onload = function(){
                  $("#previewProfile").attr("src",reader.result);
              }
              reader.readAsDataURL(file);
          }
      }      
</script>

@endsection