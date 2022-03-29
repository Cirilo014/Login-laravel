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
   
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h4>Bem vindo a Dashboard</h4>
                <hr>

                <table class="table">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <td><a href="logout">Logout</a></td>
                        </tr>
                        

                    </tbody>
                </table>
                
            </div>
        </div>
    </div>

</body>
</html>