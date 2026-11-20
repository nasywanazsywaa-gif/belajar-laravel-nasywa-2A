<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <style type="text/css">
        body {
            font-family: sans-serif;
            background-color: #f8fafc;
            margin: 0;
            padding: 40px 0;
        }

        h2 {
            text-align: center;
            color: salmon;
            font-weight: bolder;
            margin-bottom: 20px;
        }

        .form-login {
            border: 2px solid skyblue;
            width: 320px;
            max-width: 90%;
            margin: 20px auto;
            border-radius: 30px;
            box-shadow: 5px 8px 3px 2px navy;
            padding: 30px 20px;
            background-color: #ffffff;
            box-sizing: border-box;
        }

        .input {
            width: 90%;
            height: 40px;
            border-radius: 20px;
            font-size: 15px;
            color: #333;
            padding: 4px 14px;
            border: 1px solid #cbd5e1;
            box-sizing: border-box;
            margin-bottom: 16px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .input:focus {
            outline: none;
            border-color: skyblue;
        }

        .tombol {
            width: 60%;
            height: 45px;
            border-radius: 20px;
            background-color: lightsalmon;
            color: white;
            font-weight: bolder;
            font-size: 15px;
            border: none;
            cursor: pointer;
            display: block;
            margin: 10px auto 0;
            transition: background-color 0.2s;
        }

        .tombol:hover {
            background-color: #f87171;
        }

        .alert-error {
            background-color: #fee2e2;
            border: 1px solid #f87171;
            color: #b91c1c;
            padding: 10px 14px;
            border-radius: 12px;
            width: 300px;
            margin: 10px auto;
            font-size: 14px;
            text-align: center;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <h2 class="judul">Login Users</h2>
    <center>
        @if (session('error'))
            <div class="alert-error">{{ session('error') }}</div>
        @endif

        <form method="POST" action="/login">
            @csrf
            <div class="form-login">
                <p>
                    <input type="text" class="input" name="email" placeholder="Masukan Email" required value="{{ old('email') }}">
                </p>
                <p>
                    <input type="password" class="input" name="password" placeholder="Password Anda" required>
                </p>
                <p>
                    <button class="tombol" type="submit">LOGIN</button>
                </p>
            </div>
        </form>
    </center>
</body>
</html>
