<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registered</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="{{asset('../Css/Frontend/login.css')}}"> 
    <link rel="stylesheet" href="{{asset('../Css/Frontend/global.css')}}"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    
      <div class="login">
            <div class="row justify-content-center h-100 w-100 align-items-center">
                <div class="col-xxl-4 col-lg-6 col-sm-8 col-10">
                        <div class="form-login">
                            <h1 class="text-center mb-5">
                                <img class="bg-login" src="{{ asset('Images/logonik-hd.png') }}" alt="">
                            </h1>
                            <form class="text-white">
                                <div class="mb-3">
                                    <input type="email" class="form-control input-login" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control input-login" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control input-login" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <button type="submit" class="btn w-100 rgb-red text-white">Register</button>
                                <div class="registered d-flex justify-content-center gap-2 my-3">
                                    <p>sudah punya akun?</p>
                                    <a href="{{ route('login') }}" class="text-decoration-none text-danger fw-bold">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>