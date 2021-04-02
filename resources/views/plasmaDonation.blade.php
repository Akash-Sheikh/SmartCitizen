<title>Plasma Donation</title>

@extends('layouts.pageapp')

@section('content')



    	<div class="container">

      <div class="row justify-content-center">

                <div class="col-sm-6">    

                      <form class="text-left border border-dark p-5" method="POST" action="{{ route('patient.plasmaPost') }}">
                      <h6 class="text-center" style="font-weight: bold;">New Donate!</h6>
                                    @csrf
                                    <input type="text" name="email"  value="{{$user->email}}" hidden>
                                    <input type="text" name="name"  value="{{$user->name}}" hidden>
                                    <input type="text" name="covid"  value="{{$user->covid}}" hidden>
                                    <input type="text" name="at"  value="Pending" hidden>
                                    <input type="text" name="hospital"  value="Pending" hidden>
                                    <input type="text" name="status"  value="Pending" hidden>
                                    <input type="text" name="plasma"  value="1" hidden>                                                                                                                     
                                    <a class = "label label-left">Write Donate Letter</a>
                                    <div class="form-group">
                                                      <textarea required class="form-control" name="letter" rows="10"></textarea>
                                    </div>

                                    <!-- Send button -->
                                    <button class="btn btn-success" type="submit">Donate</button>
                       </form>   
                                      
                </div>        

 
                 <div class="col-sm-6">                          
                      <form class="text-left border border-dark p-5" method="POST" action="{{ route('patient.plasmaPost') }}">
                      <h6 class="text-center" style="font-weight: bold;">New Collect!</h6>
                              @csrf
                              <input type="text" name="email"  value="{{$user->email}}" hidden>
                                    <input type="text" name="name"  value="{{$user->name}}" hidden>
                                    <input type="text" name="covid"  value="{{$user->covid}}" hidden>
                                    <input type="text" name="at"  value="Pending" hidden>
                                    <input type="text" name="hospital"  value="Pending" hidden>
                                    <input type="text" name="status"  value="Pending" hidden>
                                    <input type="text" name="plasma"  value="0" hidden>                                                                                                                     
                              <a class = "label label-left">Write Collect Letter</a>
                              <div class="form-group">
                                                <textarea required class="form-control" name="letter" rows="10"></textarea>
                              </div>

                              <!-- Send button -->
                              <button class="btn btn-success" type="submit">Collect</button>
                       </form>                                 
              </div>
     
        </div>

                        
    		<div class="row justify-content-center">
        
              <div class="col-sm-6">
              <h6 class="text-center" style="font-weight: bold;">Your Donate History!</h6> 
              <form class="text-left border border-dark">
                          <div class="table-responsive">
                              <table class="table table-borderless">                               
                              <thead style="background: linear-gradient(45deg, #217dfbb8  0%, #12ba5d 100%); color: white;">
                                <tr>
                                  <th>Name</th>
                                  <th>Covid</th>
                                  <th>Time</th>  
                                  <th>Hospital</th>                   
                                  <th>Status</th>                     
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($plasma->reverse() as $value)
                                                <tr>

                                                  @if ($value->p_email == $user->email && $value->plasma)


                                                  <td>{{$value->p_name}}</td>                                  
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

                                                  <td>{{$value->status}}</td> 
                                                  
                                                  @endif                                                                                               
                                                </tr>
                                  @endforeach              
                                  </tbody>
                              </table>
                        </div>
                        </form>  
                </div>   



                <div class="col-sm-6">
                <h6 class="text-center" style="font-weight: bold;">Your Collect History!</h6>    
                <form class="text-left border border-dark">                
                        <div class="table-responsive">                       
                            <table class="table table-borderless">
                                <thead style="background: linear-gradient(45deg, #12ba5d 0%, #217dfbb8 100%); color: white;">
                              <tr>
                                <th>Name</th>
                                <th>Covid</th>
                                <th>Time</th>  
                                <th>Hospital</th>                   
                                <th>Status</th>                     
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($plasma->reverse() as $value)
                                              <tr>

                                                @if ($value->p_email == $user->email && !$value->plasma)


                                                <td>{{$value->p_name}}</td>
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


@endsection