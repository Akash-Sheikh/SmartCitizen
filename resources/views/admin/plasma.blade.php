<title>Plasma Request</title>

@extends('admin/layouts.adminapp')


@section('content')

<div class="container">
<div class="row justify-content-center">
        
        <div class="col-sm-12">
        <h6 class="text-center" style="font-weight: bold;">Plasma Request!</h6> 
        <form class="text-left border border-light">

                    <div class="table-responsive">
                            <table class="table align-items-center table-flush table-borderless">
                            <thead>
                            <tr>
                                <th>Patient</th>
                                <th>Email</th>
                                <th>Covid</th>
                                <th>Time</th>
                                <th>Hospital</th>
                                <th>Request</th>
                                <th>Status</th>                       
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($plasma->reverse() as $value)
                                            <tr>                                              


                                                <td>{{$value->p_name}}</td>                                   
                                                <td>{{$value->p_email}}</td>                              

                                                @if ($value->covid)
                                                <td>Positive</td>   
                                                @endif

                                                @if (!$value->covid)
                                                <td>Negative</td>  
                                                @endif   

                                                @if ($value->at)
                                                <td>{{$value->at}}</td>  
                                                @endif

                                                @if (!$value->at)
                                                <td>Pending</td>  
                                                @endif                                                   

                                                @if ($value->hospital)
                                                <td>{{$value->hospital}}</td>
                                                @endif

                                                @if (!$value->hospital)
                                                <td>Pending</td>  
                                                @endif  

                                                @if ($value->plasma)
                                                <td>Donate</td>   
                                                @endif

                                                @if (!$value->plasma)
                                                <td>Collect</td>  
                                                @endif                                                 
                                                                                 
                                                <td>{{$value->status}}</td>
                                                <td><a href="{{ route('admin.getPlasma',$value->id) }}" class="btn btn-dark  px-2 py-15">View</a></td>                                                

                                                                                                                                            
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