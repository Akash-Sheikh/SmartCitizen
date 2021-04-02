<title>All Appoinments</title>

@extends('admin/layouts.adminapp')


@section('content')


<div class="container">
<div class="row justify-content-center">
        
        <div class="col-sm-12">
        <h6 class="text-center" style="font-weight: bold;">All Appoinments!</h6> 
        <form class="text-left border border-light">
                    <div class="table-responsive">
                            <table class="table align-items-center table-flush table-borderless">
                            <thead>
                            <tr>
                                <th>Patient</th>
                                <th>Patient-Email</th>
                                <th>Doctor</th>
                                <th>Doctor-Email</th>
                                <th>Time</th>
                                <th>Meet-link</th>
                                <th>Patient-Helth</th>
                                <th>Status</th>                       
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($appoin->reverse() as $value)
                                            <tr>                                              

                                                <td>{{$value->p_name}}</td>                                   
                                                <td>{{$value->p_email}}</td> 
                                                <td>{{$value->d_name}}</td>                                   
                                                <td>{{$value->d_email}}</td>  

                                                @if ($value->visit_time)
                                                <td>{{$value->visit_time}}</td>   
                                                @endif

                                                @if (!$value->visit_time)
                                                <td>Pending</td>  
                                                @endif   

                                                @if ($value->meetlink)
                                                <td>{{$value->meetlink}}</td>   
                                                @endif

                                                @if (!$value->meetlink)
                                                <td>Pending</td>  
                                                @endif  

                                                @if ($value->patient_helth)
                                                <td>{{$value->patient_helth}}</td>   
                                                @endif

                                                @if (!$value->patient_helth)
                                                <td>Pending</td>  
                                                @endif   
                                                <td>{{$value->status}}</td>                                     
                                                                                                                                            
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