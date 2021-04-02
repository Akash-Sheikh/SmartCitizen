<title>Appoinments</title>

@extends('doctor/layouts.pagelayouts')

@section('content')

<div class="container">
<div class="row justify-content-center">
        
        <div class="col-sm-12">
        <h6 class="text-center" style="font-weight: bold;">My Appoinments!</h6> 
        <form class="text-left border border-light">

                    <div class="table-responsive">
                            <table class="table align-items-center table-flush table-borderless">
                            <thead>
                            <tr>
                                <th>Patient</th>
                                <th>Email</th>
                                <th>Prescription</th>
                                <th>Visit</th>
                                <th>MeetLink</th>
                                <th>Helth</th>
                                <th>Status</th>  
                                <th>Action</th>                      
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($appoin->reverse() as $value)
                                            <tr>

                                                @if ($value->d_email == $doctor->email)


                                                <td>{{$value->p_name}}</td>                                   
                                                <td>{{$value->p_email}}</td>                              
                                                <td>{{$value->prescription}}</td>

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
                                                <td><a href="{{ route('doctor.updateAppoinmentGet',$value->id) }}" class="btn btn-dark  px-2 py-15">View</a></td>                                                

                                                @endif                                                                                               
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