<!DOCTYPE html>
<html>
<head>
    <style>
        p {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 20px;

        }
    </style>
</head>

<body>
    <p>
    {{$response->Status}}
    <br/>
    @foreach ($response->Errors as $error)
        Code {{$error->Code }}
        <br/>
        Message {{$error->Message}}
        <br/>
        Detail {{$error->Detail}}
    @endforeach
    </p>
</body>
</html>