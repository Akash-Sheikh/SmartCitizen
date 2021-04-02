<title>Update Products</title>

@extends('admin/layouts.adminapp')


@section('content')

<div class="row justify-content-center">
       
        <div class="col-sm-6">

        <h6 class="text-center" style="font-weight: bold;">Update Products!</h6>

          <form class="text-left border border-dark p-2" method="POST" action="{{ route('admin.updateProductsPost') }}" enctype="multipart/form-data">         
               @csrf

               <input type="text" name="p_id" class="form-control mb-4" value="{{$product->id}}" hidden >

                                     <div class="form-group">
                                        <label for="Shop Category">Category</label>
                                        <select class="form-control" name="p_category" required id="product_category">                                       
                                            @foreach($product_category as $value)
                                                <option value="{{ $value->name }}" {{$value->name == $product->p_category  ? 'selected' : ''}} >{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                      </div> 

                                      <div class="form-group">
                                       <label for="Shop Category">Shop</label>
                                        <select class="form-control" name="p_shop" required id="product_category">     
                                            @foreach($shops as $value)
                                                <option value="{{ $value->id }}" {{$value->id == $product->shop_id  ? 'selected' : ''}} >{{ $value->s_name }}</option>
                                            @endforeach
                                        </select>
                                      </div> 

                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control" name="p_name" value="{{$product->p_name}}" aria-describedby="emailHelp" required>
                                      </div>


                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Price</label>
                                        <input type="number" class="form-control" name="p_price" value="{{$product->p_price}}" step="any" min="0" aria-describedby="emailHelp" required>
                                      </div>

                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Discount</label>
                                        <input type="number" min="0" max="50" class="form-control" name="p_discount"  value="{{$product->p_discount}}" step="any" min="0" aria-describedby="emailHelp" required>
                                      </div>

                                      <div class="form-group">
                                         <label for="comment">Description:</label>
                                         <textarea class="form-control" rows="5"  name="p_description" required>{{$product->p_description}}</textarea>
                                      </div>

                                      <div class="form-group">
                                        <label for="Shop Category">Availability</label>
                                        <select class="form-control" name="p_availability" required id="product_category">
                                                <option value="In Stock" {{$product->p_availability == "In Stock"  ? 'selected' : ''}} >In Stock</option>
                                                <option value="Limited Stock" {{$product->p_availability == "Limited Stock"  ? 'selected' : ''}} >Limited Stock</option>
                                                <option value="Out Of Stock" {{$product->p_availability == "Out Of Stock"  ? 'selected' : ''}} >Out Of Stock</option>
                                        </select>
                                      </div>

                                      <div class="form-group">
                                            <label for="exampleInputPassword1">Active Time</label><br>
                                          HH <input type="number" min="1" max="23" value="{{$product->a_hh}}" style=" max-width: 40px; border: 0px solid #e5eaef; background-color: rgba(255, 255, 255, 0.2); color: #fff !important;" name="a_hh"  placeholder="HH" >
                                          MM <input type="number" min="0" max="59" value="{{$product->a_mm}}" style=" max-width: 42px; border: 0px solid #e5eaef; background-color: rgba(255, 255, 255, 0.2); color: #fff !important;" name="a_mm"  placeholder="MM" >                                      
                                      </div> 

                                      <div class="form-group">
                                            <label for="exampleInputEmail1">Deactive Time</label><br>                          
                                            HH <input type="number" min="1" max="23" value="{{$product->d_hh}}" style=" max-width: 40px; border: 0px solid #e5eaef; background-color: rgba(255, 255, 255, 0.2); color: #fff !important;" name="d_hh"  placeholder="HH" >                          
                                            MM <input type="number" min="0" max="59" value="{{$product->d_mm}}" style="  max-width: 42px; border: 0px solid #e5eaef; background-color: rgba(255, 255, 255, 0.2); color: #fff !important;" name="d_mm"  placeholder="MM" >    
                                      </div>                                       

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product</label>
                                        <select class="form-control" name="product" required id="shops">                   
                                                    <option value="0" {{$product->product == 0  ? 'selected' : ''}} >Deactive</option>
                                                    <option value="1" {{$product->product == 1  ? 'selected' : ''}} >Active</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Status</label>
                                        <select class="form-control" name="p_status" required id="shops">                   
                                                    <option value="Pending" {{$product->p_status == "Pending"  ? 'selected' : ''}} >Pending</option>
                                                    <option value="Accepted" {{$product->p_status == "Accepted"  ? 'selected' : ''}} >Accepted</option>
                                                    <option value="Reject" {{$product->p_status == "Reject"  ? 'selected' : ''}} >Reject</option>
                                        </select>
                                    </div>              

                                      <div class="form-group">
                                        <input  type="text"  name="pp_img_1" value="{{$product->p_img_1}}" hidden/>
                                        <img id="previewBanner" src="{{$product->p_img_1}}" style="max-width:68px; margin-top:10px;"/><br><br>
                                        <label for="exampleInputPassword1">Image</label><br>
                                        <input  type="file" name="img_1" placeholder="Image" onchange="bannerPreview(this)"/>
                                      </div> 

                                        <input type="text" class="form-control" name="status" value="Pending" hidden>                                       

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