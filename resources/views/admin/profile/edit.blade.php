@extends('admin.master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container">
  <div class="row">

  			<div class="col-12">
  			  <div class="box">

  				<div class="box-header">
  					<h4 class="box-title">Type options</h4>
  				</div>
  				<div class="box-body">
            <form action="{{ route('admin.profile.update') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-form-label">Admin Name</label>

                      <input class="form-control" type="text" name="name" value="{{$admin->name}}">


                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-form-label">Admin E-mail</label>

                      <input class="form-control" type="email" name="email" value="{{$admin->email}}">


                  </div>
                </div>

              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-form-label">Profile Pic</label>

                      <input class="form-control" type="file" name="admin_img" id="image">
                     


                  </div>
                </div>
                <div class="col-md-6">
                  <img id="showImage" src="{{ (!empty($admin->profile_photo_path)) ? url('upload/admin_img/'.$admin->profile_photo_path) : url('upload/admin_img/no_image.jpg') }}" style="width: 100px; height:100px;" alt="">
                </div>

              </div>
          
                <div class="form-group row">

                  
                    <input class="btn btn-rounded btn-secondary mb-5" type="submit" value="submit">

                 
               
              </div>
            </form>

</div>
</div>
</div>
</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
			 $('#showImage').attr('src',e.target.result);	
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>
@endsection
