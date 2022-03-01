@extends('frontend.master')
@section('content')
<div class="body-content">
	<div class="container">
		<div class="row">
			
            @php
            $id = Auth::user()->id;
            $user = App\Models\User::find($id);
        @endphp
        
        
        <div class="col-md-2"><br> 
                        <img class="card-img-top" style="border-radius: 50%" src="{{ (!empty($user->profile_photo_path))? url('upload/user_img/'.$user->profile_photo_path):url('upload/no_image.jpg') }}" height="100%" width="100%"><br><br>
                        
                        <ul class="list-group list-group-flush">
        <a href="" class="btn btn-primary btn-sm btn-block">Home</a>
        
        <a href="{{ route('profile.show') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
        
        <a href="{{ route('user.change.pass') }}" class="btn btn-primary btn-sm btn-block">Change Password </a>

        
        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                            
                        </ul>
                        
                    </div> <!-- // end col md 2 -->

			<div class="col-md-2">
				
			</div> <!-- // end col md 2 -->


			<div class="col-md-6">
  <div class="card">
  	<h3 class="text-center"><span class="text-danger">Hi....</span><strong>{{ Auth::user()->name }}</strong> Welcome To Easy Online Shop </h3>
  	
  </div>


				
			</div> <!-- // end col md 6 -->
			
		</div> <!-- // end row -->
		
	</div>
	
</div>
@endsection