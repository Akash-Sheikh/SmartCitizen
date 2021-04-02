<title>All Doctors</title>

@extends('admin/layouts.adminapp')


@section('content')


<div class="container">
<div class="row justify-content-center">
        
        <div class="col-sm-12">
        <h6 class="text-center" style="font-weight: bold;">All Doctors!</h6> 
        <form class="text-left border border-light">
                    <div class="table-responsive">
                            <table class="table align-items-center table-flush table-borderless">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Hospital</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Gender</th>
                                <th>Education</th>
                                <th>Specialist</th>                       
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($doctor->reverse() as $value)
                                            <tr>                                              

                                                <td>{{$value->name}}</td>                                   
                                                <td>{{$value->hospital}}</td> 
                                                <td>{{$value->email}}</td>                                   
                                                <td>{{$value->phone}}</td>    
                                                <td>{{$value->gender}}</td>    
                                                <td>{{$value->education}}</td>    
                                                <td>{{$value->specialist}}</td>                                                                                 
                                                                                                                                            
                                            </tr>

                                @endforeach              
                                </tbody>
                            </table>
                    </div>
                </form> 
                         
        </div>
    </div>
</div>


@endsection