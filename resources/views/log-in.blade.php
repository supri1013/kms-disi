<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>KMS-DISI - Login</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/login.js"></script>
	<!-- /theme JS files -->

</head>

<body class="login-container login-cover">

	<div class="page-container pb-20">

		<div class="page-content">

			<div class="content-wrapper">

				<form action="poslogin" method="POST">
                    {{csrf_field()}}
                    <div class="panel panel-body login-form">
						   
                      <div class="text-center">
						<div class="icon-object border-orange-400 text-orange-400"><i class="icon-people"></i>
			
						</div>
                        <h5 class="content-group-lg text-bold">Login KMS-DISI</h5>
                      </div>
					  @if (session('sukses'))
							<div class="alert alert-warning no-border">
								<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
								{{session('sukses')}}
							</div> 
   						@endif
                      <div class="form-group has-feedback has-feedback-left " {{$errors->has('email') ? 'has-error':''}}>
                        <input name="email" type="email" class="form-control border-teal" placeholder="Email" >
							@if($errors->has('email'))
							<span style="color: red" class="help-block">{{$errors->first('email')}}</span>
							@endif
                        <div class="form-control-feedback">
                          <i class="icon-user text-muted"></i>
                        </div>
							
                      </div>
          
                      <div class="form-group has-feedback has-feedback-left" {{$errors->has('password') ? 'has-error':''}}>
                        <input name="password" type="password" class="form-control border-teal" placeholder="Password" >
							@if($errors->has('email'))
							<span style="color: red" class="help-block">{{$errors->first('email')}}</span>
							@endif
                        <div class="form-control-feedback">
                          <i class="icon-lock2 text-muted"></i>
                        </div>							
                      </div>
          
                      <div class="form-group login-options">
                        <div class="row">
                          <div class="col-sm-6">
                            <label class="checkbox-inline">
                              <input type="checkbox" class="styled border-teal" checked="checked">
                              Remember
                            </label>
                          </div>
                        </div>
                      </div>
          
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<div class="form-group">
									<a href="/" class="btn bg-danger btn-block btn-sm">Kembali</a>
								  </div>
							  </div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<button type="submit" class="btn bg-primary btn-block btn-sm">Masuk</button>
							  </div>
						</div>	
					</div>

                    </div>
                  </form>
			</div>
		</div>
	</div>
</body>
</html>