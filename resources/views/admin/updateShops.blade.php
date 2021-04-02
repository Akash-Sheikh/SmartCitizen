<title>Update Shops</title>

@extends('admin/layouts.adminapp')


@section('content')

<div class="row justify-content-center">
       
        <div class="col-sm-6">

        <h6 class="text-center" style="font-weight: bold;">Update Shops!</h6>

          <form class="text-left border border-dark p-2" method="POST" action="{{ route('admin.updateShopsPost') }}" enctype="multipart/form-data">         
               @csrf

               <input type="text" name="s_id" class="form-control mb-4" value="{{$shops->id}}" hidden >

                   <div class="form-group">
                         <label for="Shop Category">Shop Category</label>
                              <select class="form-control" name="shop_category" required id="shop_category">       
                                 @foreach($shop_categories as $value)
                                      <option value="{{ $value->name }}" {{$value->name == $shops->s_category  ? 'selected' : ''}} >{{ $value->name }}</option>
                                 @endforeach
                              </select>
                    </div>

                    <div class="form-group">
                          <label for="exampleInputEmail1">Shop Name</label>
                          <input type="text" class="form-control" name="s_name" value="{{$shops->s_name}}" aria-describedby="emailHelp" >
                    </div>

                    <div class="form-group">
                          <label for="exampleInputPassword1">Open Time</label><br>
                        HH <input type="number" min="0" max="23" style=" max-width: 50px; border: 0px solid #e5eaef; background-color: rgba(255, 255, 255, 0.2); color: #fff !important;" name="o_hour" value="{{$shops->open_hh}}" placeholder="HH" >
                        MM <input type="number" min="0" max="59" style=" max-width: 50px; border: 0px solid #e5eaef; background-color: rgba(255, 255, 255, 0.2); color: #fff !important;" name="o_min" value="{{$shops->open_mm}}" placeholder="MM" >                                      
                   </div> 

                    <div class="form-group">
                          <label for="exampleInputEmail1">Close Time</label><br>                          
                          HH <input type="number" min="0" max="23" style=" max-width: 50px; border: 0px solid #e5eaef; background-color: rgba(255, 255, 255, 0.2); color: #fff !important;" name="c_hour" value="{{$shops->close_hh}}" placeholder="HH" >                          
                          MM <input type="number" min="0" max="59" style=" max-width: 50px; border: 0px solid #e5eaef; background-color: rgba(255, 255, 255, 0.2); color: #fff !important;" name="c_min" value="{{$shops->close_mm}}" placeholder="MM" >    
                    </div> 

                    <div class="form-group">
                            <label for="exampleInputEmail1">Shop Discount</label>                 
                            <input type="number" min="0" max="50" class="form-control" name="s_discount" step="any" value="{{$shops->s_discount}}" aria-describedby="emailHelp">                       
                    </div>

                    <div class="form-group">
                          <label for="exampleInputEmail1">Shop Brance</label>
                          <select class="form-control" name="s_brance" required id="shops">                   
                                <option value="Pangsha" {{$shops->s_brance == "Pangsha"  ? 'selected' : ''}} >Pangsha</option>
                                <option value="Dhaka" {{$shops->s_brance == "Dhaka"  ? 'selected' : ''}} >Dhaka</option>
                          </select>
                    </div>        

                    <div class="form-group">
                          <label for="exampleInputEmail1">Shop</label>
                          <select class="form-control" name="shop" required id="shops">                   
                                      <option value="0" {{$shops->shop == 0  ? 'selected' : ''}} >Deactive</option>
                                      <option value="1" {{$shops->shop == 1  ? 'selected' : ''}} >Active</option>
                         </select>
                    </div>

                    <div class="form-group">
                          <label for="exampleInputEmail1">Status</label>
                          <select class="form-control" name="status" required id="shops">                   
                                      <option value="Pending" {{$shops->s_status == "Pending"  ? 'selected' : ''}} >Pending</option>
                                      <option value="Accepted" {{$shops->s_status == "Accepted"  ? 'selected' : ''}} >Accepted</option>
                                      <option value="Reject" {{$shops->s_status == "Reject"  ? 'selected' : ''}} >Reject</option>
                         </select>
                    </div>                 

                    <div class="form-group">
                         <input  type="text"  name="ss_banner" value="{{$shops->s_banner}}" hidden/>
                         <img id="previewBanner" src="{{$shops->s_banner}}" style="max-width:68px; margin-top:10px;"/><br><br>
                         <label for="exampleInputPassword1">Shop Banner</label><br>
                         <input  type="file"  name="s_banner" placeholder="Shop Banner" onchange="bannerPreview(this)"/>
                    </div>                                        

               <!-- Send button -->
               <button class="btn btn-success" type="submit">Update</button><br>               
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