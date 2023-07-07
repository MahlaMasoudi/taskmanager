<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Sign up / Login Form</title>
  <link rel="stylesheet" href="{{ asset('admin-assets/auth/register.css') }}">

</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	 <!--if (Session::has('success'))
	<div class="alert alert-section">{{Session::get('success')}}</div>
endif
-->

	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form action="{{route('authregister')}}" method="POST">

					@csrf
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="name" placeholder="User name" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="password" placeholder="Password" required="">
					<button>Sign up</button>
				</form>
			</div>

			<div class="login">
				<a href="{{route('login')}}">
					<button>log in</button>
				</a>
			</div>

			
	</div>
</body>
</html>
<!-- partial -->
  
</body>
</html>
