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
                <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                <input type="text" name="email" id="email" placeholder="Your Name"/>
                @if ($errors->has('email'))
                <span class="error">
                  {{ $errors->first('email') }}
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
