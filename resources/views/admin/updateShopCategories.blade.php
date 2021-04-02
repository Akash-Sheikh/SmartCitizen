<title>Update Shop Categories</title>

@extends('admin/layouts.adminapp')


@section('content')

<div class="row justify-content-center">
       
        <div class="col-sm-3">

        <h6 class="text-center" style="font-weight: bold;">Update Shop Categories!</h6>

          <form class="text-left border border-dark p-2" method="POST" action="{{ route('admin.updateShopCategoriesPost') }}" enctype="multipart/form-data">         
               @csrf
               <input type="text" name="s_id" class="form-control mb-4" value="{{$shop_categories->id}}" hidden >
               <a class = "label label-left">Shop Category</a>
               <input type="text" name="s_name" class="form-control mb-4" value="{{$shop_categories->name}}" required>
               <!-- Send button -->
               <button class="btn btn-success" type="submit">Update</button><br>               
          </form>  
          </div>  
</div> 

@endsection