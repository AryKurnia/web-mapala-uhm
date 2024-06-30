<!DOCTYPE html>
<html>
<head>
	<title>Login - MAPALA STMIK HANDAYANI MAKASSAR</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login/css/style.css') }}">
</head>
<body>
@if(Session::has('Message'))
    <script>
        alert("{{ Session::get('Message') }}")
    </script>
@endif
    <div class="box">
		<h1>Login</h1><br>
		<img src="{{ asset('assets/login/img/user.png') }}" width="20px" class="icon1-form">
		<img src="{{ asset('assets/login/img/password.png') }}" width="20px" class="icon2-form">
        <form action="{{ url('login') }}" method="post" id="form"><br>
            @csrf
			<img src="{{ asset('assets/login/img/nama.png') }}" alt="" width="50%"><br>
			<img src="{{ asset('assets/login/img/logo.png') }}" alt="" width="30%"><br></center>
			<input type="text" name="nia" id="username" placeholder="NIA/NIAM" required />
			<input type="password" name="password" id="password" placeholder="PASSWORD" required />
			<input type="submit" name="login" value="Login">
			{{-- <input type="reset" name="reset" value="Batal"> --}}
		</form>	<br>
		<a href="{{ route('home') }}">Kembali</a>
	</div>
</body>
</html>
