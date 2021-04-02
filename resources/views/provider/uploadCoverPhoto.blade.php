<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cover Photo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>

     <div class="container" style="padding-top:70px;">
         <div class="row">
             <div class="col-md-6 offset-md-3">
                 <div class="card">
                     <div class="card-header">
                         Cover Photo
                     </div>
                     <div class="card-body">
                         <form method="POST" action="{{route('doctor.storecover')}}" enctype="multipart/form-data">
                             @csrf

                             <div class="form-group">
                                 <label for="id">ID</label>
                                 <input type="text" name="id" value="{{$doctor->id}}" class="form-control"/>
                             </div>

                             <div class="form-group">
                                 <label for="email">Email</label>
                                 <input type="text" name="email" value="{{$doctor->email}}" class="form-control"/>
                             </div>


                             <div class="form-group">
                                 <input type="file" name="c_file" class="form-control" onchange="coverPreview(this)"/>
                                 <img id="previewCover" style="max-width:130px; margin-top:20px;"/>
                             </div>

                             <input type="submit"  class="btn btn-primary float-right" value="Update"/>                                                                                                                                               
                            <!-- <a href="/doctor-cover-delete/{{$doctor->id}}"  class="btn btn-danger float-left">Delete</a> -->
                         </form>
                     </div>
                 </div>
             </div>    
         </div>
     </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script>
      function coverPreview(input){
          var file = $("input[type=file]").get(0).files[0];
          if(file){
              var reader = new FileReader();
              reader.onload = function(){
                  $("#previewCover").attr("src",reader.result);
              }
              reader.readAsDataURL(file);
          }
      }
</script>

</body>
</html>