<title>Shops</title>

@extends('admin/layouts.adminapp')

<script type="text/javascript">
      //12 hour format
      //var d = new Date("2011-04-20T09:30:51.01");
/*
      window.onload = function Gender(){

        var startTime = new Date("2021-01-18 21:10:00");  
     
        var endTime = new Date("2021-01-18 21:11:00");

        //Define false datetime 
        var f_d_f_t = new Date("2021-01-18 00:00:00");
        //Divide real time from real datetime
        var c_dt = new Date();
        var c_hour = c_dt.getHours();
        var c_min = c_dt.getMinutes();
        var c_sec = c_dt.getSeconds();      
        //Add real time with false date
        f_d_f_t.setHours(c_hour, c_min, c_sec);
        //This is real time with false date
        var f_d_c_t = f_d_f_t;
        //Now we are ready to compare both dates
        if(f_d_c_t >= startTime && endTime >= f_d_c_t)
        {
        alert('Shop is Open now!');
        }
        else
        {
        alert('Shop is Close now!');
        }
*/
      

  /*          var helth = $( "#dbhelth" ).val();
            var covid = $( "#dbcovid" ).val();
            if(helth === "Good"){
                document.getElementById("p_good").checked = true;
            }
            if(helth === "Bad"){
                document.getElementById("p_bad").checked = true;
            }

            if(covid === "1"){
                document.getElementById("c_p").checked = true;
            }
            if(covid === "0"){
                document.getElementById("c_n").checked = true;
            }
            */

      }

</script>


@section('content')

<div class="row justify-content-center">
       
        <div class="col-sm-12">

                    <!--Add popup-->
                    <div class="panel-body">
                                           
                          <div style="top: 50px;" class="modal fade " id="targetp" role="dialog">
                          <div class="modal-dialog">
                          <div class="modal-content">

                                <div class="modal-header">
                                    <h6 style="color: black;" class=modal-title>Add New Shop!</h6>
                                    <button type="button" class="close" data-dismiss="modal" >&times</button>

                                </div>
                                <div class="modal-body" style="background: #6c757dab;">                          

                                    <form class="border border-light p-5" method="POST" action="{{ route('admin.addShops') }}" enctype="multipart/form-data">
                                    @csrf

                                      <div class="form-group">
                                        <label for="Shop Category">Shop Category</label>
                                        <select class="form-control" name="shop_category" required id="shop_category">
                                            
                                            @foreach($shop_categories as $value)
                                                <option value="{{ $value->name }}" >{{ $value->name }}</option>
                                            @endforeach

                                        </select>
                                      </div> 
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Shop Name</label>
                                        <input type="text" class="form-control" name="s_name" aria-describedby="emailHelp" required>
                                      </div>

                                        <input type="text" class="form-control" name="s_vendor"  value="{{ Auth::user()->email }}" hidden>

                                      <div class="form-group">
                                            <label for="exampleInputPassword1">Open Time</label><br>
                                          HH <input type="number" min="0" max="23" style=" max-width: 40px; border: 0px solid #e5eaef; background-color: rgba(255, 255, 255, 0.2); color: #fff !important;" name="o_hour"  placeholder="HH" >
                                          MM <input type="number" min="0" max="59" style=" max-width: 42px; border: 0px solid #e5eaef; background-color: rgba(255, 255, 255, 0.2); color: #fff !important;" name="o_min"  placeholder="MM" >                                      
                                      </div>

                                      <div class="form-group">
                                            <label for="exampleInputEmail1">Close Time</label><br>                          
                                            HH <input type="number" min="0" max="23" style=" max-width: 40px; border: 0px solid #e5eaef; background-color: rgba(255, 255, 255, 0.2); color: #fff !important;" name="c_hour"  placeholder="HH" >                          
                                            MM <input type="number" min="0" max="59" style=" max-width: 42px; border: 0px solid #e5eaef; background-color: rgba(255, 255, 255, 0.2); color: #fff !important;" name="c_min"  placeholder="MM" >
                                      </div> 

                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Shop Discount</label>                 
                                              <input type="number" min="0" max="50" class="form-control" name="s_discount" step="any" min="0" aria-describedby="emailHelp" required>                       
                                      </div>

                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Shop Brance</label>
                                        <select class="form-control" name="s_brance" required id="shops">                   
                                                    <option value="Pangsha" >Pangsha</option>
                                                    <option value="Dhaka" >Dhaka</option>                        
                                        </select>
                                      </div>

                                      <div class="form-group">
                                        <img id="previewBanner" src="images/blankimg.png" style="max-width:68px; margin-top:10px;"/><br><br>
                                        <label for="exampleInputPassword1">Shop Banner</label>
                                        <input required type="file" name="s_banner" placeholder="Shop Banner" onchange="bannerPreview(this)"/>
                                      </div> 

                                        <input type="text" class="form-control" name="status" value="Pending" hidden>

                                      <div class="form-group">
                                        <input type="submit"  class="btn btn-success float-left" value="Add"/>
                                      </div><br>                                    

                                    </form>

                                </div>
                                <div class="modal-footer">
                                </div>

                          </div>
                          </div>
                          </div>
                         
                    </div>
                    <!--Add popup end-->

        <h6 class="text-center" style="font-weight: bold;">All Shops!</h6>

        <a class="text-center" data-toggle="modal" data-target="#targetp" href=""><i class="fa fa-plus-square" aria-hidden="true"></i></a>
        <br><br>
        <form class="text-center border border-dark">         
                    <div class="table-responsive">
                        <table class="table table-borderless">                              
                        <thead style="background: linear-gradient(45deg, #62828d 0%, #5b594c 100%); color: white;">
                          <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Open</th>
                            <th>Close</th>
                            <th>Banner</th>
                            <th>Brance</th>
                            <th>Discount</th>
                            <th>Shop</th>
                            <th>Status</th>  
                            <th>Action</th>                                                                             
                          </tr>
                          </thead>
                          <tbody>
                            @foreach($shops->reverse() as $value)
                                          <tr>

                                            <td>{{$value->id}}</td>
                                            <td>{{$value->s_name}}</td>
                                            <td>{{$value->s_category}}</td>
                                            <td>{{$value->open_hh}}-{{$value->open_mm}}</td>
                                            <td>{{$value->close_hh}}-{{$value->close_mm}}</td>
                                            <td><img src="{{$value->s_banner}}" style="max-width:21px; max-height:20px;"/></td>
                                            <td>{{$value->s_brance}}</td>
                                            <td>{{$value->s_discount}}%</td>
                                            @if ($value->shop)
                                            <td>Active</td>   
                                            @endif

                                            @if (!$value->shop)
                                            <td>Deactive</td>  
                                            @endif 

                                            <td>{{$value->s_status}}</td>
                                            <td><a href="{{ route('admin.updateShopsGet',$value->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                
                                            <a href="{{ route('admin.delateShops',$value->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></a></td>                                                                       
                                          </tr>
                            @endforeach              
                            </tbody>
                        </table>
                  </div>
                  </form>  
          </div>  
</div> 


<script>
      function bannerPreview(input){
          var file = $("input[type=file]").get(0).files[0];
          if(file){
              var reader = new FileReader();
              reader.onload = function(){
                  $("#previewBanner").attr("src",reader.result);
              }
              reader.readAsDataURL(file);
          }
      }
/*
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
*/      

</script>


@endsection