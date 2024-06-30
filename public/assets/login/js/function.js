function btn_login() {
	var email = document.getElementById('email').value;
	var password = document.getElementById('password').value;
	if ((email == "icchanksn@gmail.com") && (password == "zonacoding123")) {
		alert("Login Berhasil");
	}else{
		alert("Email Dan Kata Sandi Anda Tidak Sesuai!");
	}
}
