<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="QuillPro is multipurpose Bootstrap 4 Admin Dashboard Template that allows you build and launch your projects in the quickest time possible.">
	<meta name="author" content="Base5Builder">
	<link rel="icon" href="assets/img/favicon.png">

	<title>IRS Batch 2007</title>

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700&amp;subset=latin-ext" rel="stylesheet">

	<!-- CSS - REQUIRED - START -->
	<!-- Batch Icons -->
	<link rel="stylesheet" href="assets/fonts/batch-icons/css/batch-icons.css">
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css">
	<!-- Material Design Bootstrap -->
	<link rel="stylesheet" href="assets/css/bootstrap/mdb.min.css">
	<!-- Custom Scrollbar -->
	<link rel="stylesheet" href="assets/plugins/custom-scrollbar/jquery.mCustomScrollbar.min.css">
	<!-- Hamburger Menu -->
	<link rel="stylesheet" href="assets/css/hamburgers/hamburgers.css">

	<!-- CSS - REQUIRED - END -->

	<!-- CSS - OPTIONAL - START -->

	<!-- CSS - DEMO - START -->
	<link rel="stylesheet" href="assets/demo/css/ui-icons-batch-icons.css">
	<!-- CSS - DEMO - END -->

	<!-- CSS - OPTIONAL - END -->

	<!-- QuillPro Styles -->
	<link rel="stylesheet" href="assets/css/quillpro/quillpro.css">
</head>

<body>

	<div class="container-fluid">
		<div class="row">
			<div class="right-column sisu">
				<div class="row <!-- mx-0 -->">
					<!-- <div class="col-md-7 order-md-2 signin-right-column px-5 bg-dark">
						<a class="signin-logo d-sm-block d-md-none invisible" data-qp-animate-type="fadeInDown" data-qp-animate-delay="0" href="#">
							<img src="assets/img/logo-white.png" width="145" height="32.3" alt="QuillPro">
						</a>
						<h1 class="display-4 invisible" data-qp-animate-type="fadeInDown" data-qp-animate-delay="300">Login In To get Started</h1>
						<p class="lead mb-5 invisible" data-qp-animate-type="fadeInDown" data-qp-animate-delay="750">
							
						</p>
					</div> -->
					<div class="col-md-5 order-md-1 signin-left-column bg-white px-5" style="margin: 0 auto;">
						<a class="signin-logo d-sm-none d-md-block invisible" data-qp-animate-type="fadeIn" data-qp-animate-delay="300" href="#">
							<!--img src="assets/img/logo-dark.png" width="145" height="32.3" alt="QuillPro"--> 
						</a>
						<form class="invisible-children" data-qp-animate-type="fadeIn" data-qp-animate-delay="300" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
							<div class="form-group{{ $errors->has('membership_no') ? ' has-error' : '' }}">
								<label for="membership_no">Membership Number</label>
								<input type="text" class="form-control" id="membership_no" name="membership_no" placeholder="Membership Number" value="{{ old('membership_no') }}" required autofocus>
                                @if ($errors->has('membership_no'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('membership_no') }}</strong>
                                </span>
                                @endif
							</div>
							<div class="form-group">
								<label for="phone_no">Phone No</label>
								<input type="text" class="form-control" id="phone_no" placeholder="Phone Number">
                            </div>

							<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
								<label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="form-check">
								<label class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" name="remember" {{ old('remember') ? 'checked' : '' }}>
									<span class="custom-control-indicator"></span>
									<span class="custom-control-description"> Keep Me Signed In</span>
								</label>
                            </div>
							<button type="submit" class="btn btn-primary btn-block">
								<i class="batch-icon batch-icon-key"></i>
								Log in
							</button>
							<hr>
							<p class="text-center">
								Account Approved? <a href="#">Register here</a>
                            </p>
                            <!--a class="btn btn-link" href="{{ route('password.request') }}">
									Forgot Your Password?
									{{ route('register') }}
                                </a-->
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- SCRIPTS - REQUIRED START -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- Bootstrap core JavaScript -->
	<!-- JQuery -->
	<script type="text/javascript" src="assets/js/jquery/jquery-3.1.1.min.js"></script>
	<!-- Popper.js - Bootstrap tooltips -->
	<script type="text/javascript" src="assets/js/bootstrap/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="assets/js/bootstrap/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="assets/js/bootstrap/mdb.min.js"></script>
	<!-- Velocity -->
	<script type="text/javascript" src="assets/plugins/velocity/velocity.min.js"></script>
	<script type="text/javascript" src="assets/plugins/velocity/velocity.ui.min.js"></script>
	<!-- Custom Scrollbar -->
	<script type="text/javascript" src="assets/plugins/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
	<!-- jQuery Visible -->
	<script type="text/javascript" src="assets/plugins/jquery_visible/jquery.visible.min.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script type="text/javascript" src="assets/js/misc/ie10-viewport-bug-workaround.js"></script>

	<!-- SCRIPTS - REQUIRED END -->

	<!-- SCRIPTS - OPTIONAL START -->
	<!-- Image Placeholder -->
	<script type="text/javascript" src="assets/js/misc/holder.min.js"></script>
	<!-- SCRIPTS - OPTIONAL END -->

	<!-- QuillPro Scripts -->
	<script type="text/javascript" src="assets/js/scripts.js"></script>
</body>

</html>