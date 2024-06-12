<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Custom CSS -->
  <style>
    body.login {
      background-color: #f3f3f3;
    }

    .login_wrapper {
      width: 300px;
      margin: 0 auto;
      margin-top: 100px;
    }

    .login_form {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .login_content input[type="text"],
    .login_content input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    .login_content input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      border: none;
      color: #fff;
      border-radius: 3px;
      cursor: pointer;
    }

    .login_content input[type="submit"]:hover {
      background-color: #0056b3;
    }

    .text-danger {
      color: #dc3545;
    }
  </style>
</head>

<body class="login">
  <div>
    
    @if ($errors->any())
      <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach   
      </div>
    @endif
    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form action="{{ route('sample.validate_login') }}" method="post">
            @csrf
            <p>
              <input type="text" name="email" class="form-control" placeholder="Email" />
              @if($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
              @endif
            </p>
            <p>
              <input type="password" name="password" class="form-control" placeholder="Password" />
              @if($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
              @endif
            </p>
            <p>
              <input type="submit" value="Sign In" />
            </p>
          </form>
        </section>
      </div>
    </div>
  </div>
</body>
</html>
