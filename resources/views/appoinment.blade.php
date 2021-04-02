<title>Doctor Appoinment</title>

@extends('layouts.pageapp')

@section('content')


<div class="container">
    		<div class="row justify-content-center">
	        <div class="col-md-8 ftco-animate">
              <h6 class="text-center" style="font-weight: bold;">Doctor Profile!</h6>
	          <div class="block-7">
	          	<div class="img" style="background-image: url('{{$doctor->coverimage}}');"></div>
                <div class="text-center" style="position: relative; top: -50px; margin-bottom: -90px;">
                    <img style="height: 180px; width: 180px; border-radius: 50%; border: 5px solid rgba(255,255,255,0.5); position: relative; top: -38px;" src="{{$doctor->profileimage}}" class="img-fluid" alt="Responsive image">
                </div>
	            <div class="text-center p-4">
	            	<span class="excerpt d-block">{{$doctor->name}}</span>

		            <ul class="pricing-text mb-5">
		              <li><span class="fa fa-check mr-2"></span>Hospital: {{$doctor->hospital}}</li>
		              <li><span class="fa fa-check mr-2"></span>Education: {{$doctor->education}}</li>
		              <li><span class="fa fa-check mr-2"></span>Specialist: {{$doctor->specialist}}</li>
                  <li><span class="fa fa-check mr-2"></span>Email: {{$doctor->email}}</li>
                  <li><span class="fa fa-check mr-2"></span>Phone: {{$doctor->phone}}</li>
		            </ul>
                <button type="button" class="btn btn-primary d-block px-2 py-3" data-toggle="modal" data-target="#targetp" >Free Appoinment</button>
	            </div>
	          </div>
            </div>

                    <!--Appoinment popup-->
                    <div class="panel-body">

                          <div style="top: 50px;" class="modal fade" id="targetp" role="dialog">
                          <div class="modal-dialog">
                          <div class="modal-content">
                          <div class="modal-header">
                              <h6 style="color: black;" class=modal-title>Submit your Appoinment Letter!</h6>
                              <button type="button" class="close" data-dismiss="modal" >&times</button>

                          </div>
                                <div class="modal-body">

                                    <form class="text-left border border-light p-5" method="POST" action="{{ route('doctor.saveappoinment') }}" enctype="multipart/form-data">
                                    @csrf
                                        <div class="form-group">
                                            <input type="text" name="p_email" value="{{$user->email}}" hidden/>
                                            <input type="text" name="p_name" value="{{$user->name}}" hidden/>
                                            <input type="text" name="d_email" value="{{$doctor->email}}" hidden/>
                                            <input type="text" name="d_name" value="{{$doctor->name}}" hidden/>
                                            <input type="text" name="d_phone" value="{{$doctor->phone}}" hidden/>
                                            <div class="form-group">
                                              <textarea class="form-control rounded-0" name="appoinment_letter" rows="10"></textarea>
                                            </div>
                                            <input type="text" name="prescription" value="pending" hidden/>
                                            <input type="text" name="meetlink" value="pending" hidden/>
                                            <input type="text" name="status" value="pending" hidden/>
                                            <input type="text" name="patient_helth" value="pending" hidden/>
                                        </div>

                                        <input type="submit"  class="btn btn-success float-right" value="Submit"/>
                                    </form>

                                </div>
                          <div class="modal-footer">
                          </div>
                          </div>
                          </div>
                          </div>


                    </div>
                    <!--Appoinment popup end-->            

	      </div>

    </div>


@endsection
