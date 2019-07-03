<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>welcome mail</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container mt-5">
        <form action="{{ route('mail.sellersub')}}" method="POST">
            @csrf
            <input type="text" class="form-control" placeholder="input nama toko..." name="shop" required>
            <br>
            <input type="email" class="form-control" placeholder="input email..." name="email" required>
            <br>
            <input type="submit" value="Kirim" class="btn btn-primary">
        </form>
    </div>
    
</body>
</html>