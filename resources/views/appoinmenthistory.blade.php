<title>Appoinment History</title>

@extends('layouts.pageapp')

@section('content')

<div class="container">

    <div class="row justify-content-center">
    <div class="col-sm-12"> 
    <h6 class="text-center" style="font-weight: bold;">Appoinment History!</h6>
    <form class="text-left border border-dark"> 
                <div class="table-responsive">
                <table class="table table-borderless"> 
                <thead style="background: linear-gradient(45deg, #217dfbb8  0%, #12ba5d 100%); color: white;">
                      <tr>
                        <th>Doctor</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Prescription</th>
                        <th>Visit</th>
                        <th>MeetLink</th>
                        <th>Helth</th>
                        <th>Status</th>                       
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($appoin->reverse() as $value)
                                      <tr>

                                        @if ($value->p_email == $user->email)


                                        <td>{{$value->d_name}}</td>                                  
                                        <td>{{$value->d_email}}</td>
                                        <td>{{$value->d_phone}}</td>                               
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

<div style="padding: 4rem !important;">
</div>

@endsection