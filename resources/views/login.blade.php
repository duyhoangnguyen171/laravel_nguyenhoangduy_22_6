<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Trang Đăng Nhập</title>
  <!-- Toastr CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css"
  crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

  <div class="login-container">
    <h2>Đăng Nhập</h2>
    <form method="post" action="{{ route('website.dologin') }}">
      @csrf
      <div class="form-group">
        <label for="username">Tên đăng nhập</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Tên đăng nhập hoặc email">
      </div>
      <div class="form-group">
        <label for="password">Mật Khẩu</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Mật khẩu">
      </div>
      <button type="submit">Đăng Nhập</button>
    </form>
  </div>

  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        crossorigin="anonymous"></script>

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        crossorigin="anonymous"></script>

  @if (Session::has('message'))
  <script>
    toastr.options = {
      "progressBar": true,
      "closeButton": true,
      "positionClass": "toast-top-right"
    };
    toastr.error("{{ Session::get('message') }}");
  </script>
  @endif

  <!-- Custom CSS -->
  <style>
    body {
      margin: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(120deg, #515328 0%, #183623 100%);
      font-family: Arial, sans-serif;
    }

    .login-container {
      margin-top: -100px;
      width: 400px;
      padding: 20px;
      background-color: #d7e2bed2;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .login-container h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
    }

    .form-group input {
      width: 100%;
      padding: 8px;
      box-sizing: border-box;
    }

    button {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }
  </style>

</body>

</html>