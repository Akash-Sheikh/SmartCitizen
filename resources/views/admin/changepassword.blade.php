<title>Change Password</title>

@extends('admin/layouts.adminapp')


@section('content')

<div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-8">

                    <div class="card">
                     @if($errors->any())
                        <h6 class="text-center">{{$errors->first()}}</h6>
                     @endif     
                    <div class="card-body">                     
                            <form class="text-left border border-light p-2" method="POST" action="{{ route('admin.passwordPost') }}">
                                                   
                                                   @csrf                                                
                                                   <input type="email" name="email" readonly value="{{ Auth::user()->email }}" hidden>                     
                       
                                                   <a class = "label label-left">Current Password</a>
                                                   <input type="password" name="c_pass" class="form-control mb-4" placeholder="Current Password" required>                      
                                                   <a class = "label label-left">New Password</a>
                                                   <input type="password" name="n_pass" class="form-control mb-4" placeholder="New Password" required> 
                                                   
                       
                                                   <!-- Send button -->
                                                   <button class="btn btn-success" type="submit">Update</button><br>
                       
                                           </form>                                     

                    </div>
                    </div>
           
        </div>
    </div>
</div>


@endsection