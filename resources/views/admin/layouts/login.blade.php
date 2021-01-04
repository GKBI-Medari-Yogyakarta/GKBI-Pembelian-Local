<!DOCTYPE html>
<html lang="en">
<head>
	<title>Loginadmin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{ asset('login/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/animate/animate.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('login/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>
  {% if error %}
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title align-center" id="exampleModalLabel"><strong>Login Gagal</strong></h5>
		</div>
		<div class="modal-body">
			<p class=error><strong>Error:</strong> {{ error }}
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		</div>
	  </div>
	</div>
  </div>
  {% endif %}

	<div class="limiter">
		<div class="container-login100" style="background-image: url('{{ asset("login/images/sma1.jpeg") }}');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Account Login
				</span>
				<form action="/" method="POST" class="login100-form validate-form p-b-33 p-t-5">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="User name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>
					<div class="container-login100-form-btn m-t-32">
						<!-- <button id="btncancel">Cancel</button> -->
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	<!-- <div id="myModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Subscribe our Newsletter</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					{% if error %}
					<p>{{ error }}</p>
					{% endif %}
				</div>
			</div>
		</div>
	</div> -->


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="{{ asset('login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('login/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('login/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login/js/main.js') }}"></script>
	<script>
		document.querySelectorAll("#btncancel")[0].addEventListener("click", (e) => {
			e.preventDefault();
			document.querySelectorAll("input").forEach((e) => {
				if (e.value !== "Login") {
					e.value = "";
				}

			})
		});
	</script>
	<script>
		$(document).ready(function(){
			var messages = "{{ error }}";
			if(typeof messages != 'undefined' && messages != '[]'){
				$("#myModal").modal();
			}
		});
	</script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
        box-sizing:border-box;
        }
        $font-stack: 14px Helvetica, sans-serif;
        $primary-color: #666;

        main {
        width:50em;
        margin:0 auto;
        }

        form {
        z-index:999;
        font: $font-stack;
        color: $primary-color;
        margin:20px auto;
        width: 400px;
        height: 400px;
        border: 1px solid #cecece;
        border-radius: 50%;
        padding:20px;
        display:grid;
        box-shadow:0px 0px 4px #cecece;
        justify-items:center;
        position:relative;
        background:#fff;
        top:-27em;
        }


        label {
        margin:0 0 10px 0;
        }

        input[type="text"], input[type="password"], {
        height:45px;
        width:100%;
        padding:5px;
        border:0;
        border-bottom:1px solid #ccc;
        outline:none;
        }

        .forgot-text,
        a,
        a:link,
        a:hover,
        a:active {
        font:11px sans-serif;
        color:#71def2;
        margin:7px 0 15px 3px;
        text-decoration:none;
        }

        a:hover {
        transition:color .25s ease-in-out;
        text-decoration:underline;
        color:#3d828e;
        }

        input:focus {
        background: #e8f9fc;
        transition: all .15s ease-in-out;
        }


        .keep-logged-in {
        width:100%;
        text-align:center;
        }


        input[type="submit"] {
        width: 70px;
        height:70px;
        border-radius:100px;
        border:1px solid #3d828e;
        background:#54b7c9;
        margin:0 auto;
        color: #fff;
        text-transform:uppercase;
        margin-top: 20px;
        padding:0;
        justify-items:center;
        }

        input[type="submit"]:hover {
        background:#71def2;
        transition:all .15s ease-in-out;
        cursor: pointer;
        }

        input[type="submit"]:focus {
        font-weight:bold;
        background:#71def2;
        width: 90px;
        transition: all .25s ease-in;
        }

        form div {
        width:90%;
        margin:10px 0;

        }
        .circle {
        width: 400px;
        height: 400px;
        border: 1px solid #cecece;
        border-radius: 50%;
        padding:20px;
        display:grid-inline;
        box-shadow:0px 0px 4px #cecece;
        position:relative;
        }

        .circle-lime {
        z-index:1;
        background:#A8F781;
        top:.6em;
        left:11em;
        filter: opacity(70%);
        }

        .circle-aqua {
        z-index:2;
        background:#71def2;
        left:14.4em;
        top:-48em;
        filter: opacity(70%);
        }
    </style>
</head>

<body>
    <main>
        <div class="circle circle-lime"></div>
        <form action=" {{ URL::route('post.login') }}" method="POST">
            {{ csrf_field() }}
            {{-- @csrf --}}
            <h1>Login</h1>
            <div class="form-group">
                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                <input type="text" name="name" id="name" placeholder="Your Name"/>
                @if ($errors->has('name'))
                    <span class="error">
                    {{ $errors->first('name') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="inputPassword"><i class="zmdi zmdi-lock"></i></label>
                <input type="password" name="password" id="inputPassword" placeholder="Password"/>
                @if ($errors->has('password'))
                  <span class="error">
                    {{ $errors->first('password') }}
                  </span>
                @endif
            </div>
            <div class="keep-logged-in">
                <input type="checkbox" value="Go!"></input>
                <label>Keep me logged in.</label>
            </div>
            <input type="submit" value="Go!"></input>
        </form>
        <div class="circle circle-aqua"></div>
    </main>
</body>

</html>
