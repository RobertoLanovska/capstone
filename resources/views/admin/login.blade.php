<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Page</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">


</head>
<body>

<section class="vh-100">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 text-black">

        <div class="px-5 ms-xl-4 pt-4">
          <img src="{{ asset('img/logo.png') }}" alt="Logo" style="width: 50px; height: 50px;  margin: 0 auto 24px auto;">

          <span class="h1 fw-bold mb-0 fs-4">Jaya Accu</span>
        </div>

 
        <div class="px-5 ms-xl-4 mt-5 pt-4" style="max-width: 400px;">
          <h3 class="fw-normal mb-2" style="letter-spacing: 1px;">Log in</h3>
          <p class="text-muted mb-4">Masuk dengan akun anda yang sudah didaftarkan.</p>

          @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
          @endif

          @error('loginError')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror

          <form action="/login" method="POST">
            @csrf

            <div class="form-outline mb-3">
              <input type="text" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Email" />
              @error('email')
                <div class="text-danger small">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-outline mb-3">
              <input type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Password" />
              @error('password')
                <div class="text-danger small">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <button class="btn btn-info btn-lg btn-block w-100" type="submit">Login</button>
            </div>

            
            <a href="{{ route('password.form') }}">Ubah Password</a>
          </form>
        </div>


      </div>

      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="{{ asset('img/motor.jpeg') }}"
             alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
      </div>
    </div>
  </div>
</section>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>
</html>
