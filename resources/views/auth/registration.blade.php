<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
    
    <div class="container">
        <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h4>Registration</h4>
            <hr>
              

            <form method="post" action="{{route('register-user')}}">
                 {{-- Apresentação de msg de sucesso caso cadastrar--}}

                @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif

                {{-- Apresentação de mensagem caso haja falhas--}}
                @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                
                @csrf
                <div class="form-group">
                    <label class="form-label" for="name">Full name</label>
                    <input class="form-control" name="name" id="name" type="text" placeholder="Name" value="{{old('name')}}">
                    
                    <span class="text-danger">@error('name') {{$message}} @enderror </span>
                </div>

                <div class="form-group">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" name="email" id="email" type="email" placeholder="Email" value="{{old('email')}}">
                    <span class="text-danger">@error('email') {{$message}} @enderror </span>
                    
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control" name="password" id="password" type="password" placeholder="Password" value="{{old('password')}}">
                    <span class="text-danger">@error('password') {{$message}} @enderror </span>
                    
                </div>

                <div class="form-group">
                    <button class="btn btn-block btn-primary mt-2">Register</button>
                </div>
                <br>
                <a href="/login">Already Registered!! Login Here!</a>

            </form>
        </div>
        </div>
    </div>

</body>
</html>