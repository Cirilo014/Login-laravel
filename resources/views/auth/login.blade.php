<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Faça o seu login</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">

</head>
<body>
   
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h4>Login</h4>
                <hr>

                <form action="{{route('login-user')}}" method="post">
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
                    <label class="form-label" for="email">Email:</label>
                    <input class="form-control" name="email" value="{{old('email')}}" id="email" type="email" placeholder="Email">
                    <span class="text-danger">@error('email') {{$message}} @enderror </span>
                    
                </div>

                

                <div class="form-group">
                    <label class="form-label" for="password">Password:</label>
                    <input class="form-control" name="password" value="{{old('password')}}" id="password" type="password" placeholder="Password">
                    <span class="text-danger">@error('password') {{$message}} @enderror </span>
                    
                </div>


                {{-- BUTTON --}}

                <div class="form-group">                   
                    <button class="form-control btn-primary mt-2">Login</button>
                </div>
                

                {{-- LINKS --}}

                <div class="form-group links mt-2"  >
                    <a class="" href="/registration">New User!! register Here !!</a>
                </div>


                                



                </form>
            </div>
        </div>
    </div>

</body>
</html>