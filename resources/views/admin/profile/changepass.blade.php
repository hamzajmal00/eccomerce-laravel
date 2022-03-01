@extends('admin.master')
@section('content')

<div class="container">
  <div class="row">

  			<div class="col-12">
  			  <div class="box">

  				<div class="box-header">
  					<h4 class="box-title">Change Password</h4>
  				</div>
  				<div class="box-body">
            <form action="{{ route('admin.profile.storepass') }}" method="post">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-form-label">Cruent Password</label>

                      <input class="form-control" type="text" name="curent_pass">


                  </div>
                </div>


              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-form-label">New Password</label>

                      <input class="form-control" type="text" name="password">


                  </div>
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

@endsection
