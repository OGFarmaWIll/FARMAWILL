<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - FARMA PRO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"> </script>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <style>
        body {
            background: url('https://www.farmanuario.com/wp-content/uploads/2020/06/farmacia-1.jpg') no-repeat center center;
            background-size: cover;
            height: 100vh;
        }
        .login-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            max-width: 400px;
        }
        .login-logo {
            width: 80px;
            margin-bottom: 10px;
        }
        .info-text {
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center">
    <div class="login-container text-center shadow">
        <img src="https://cdn-icons-png.flaticon.com/512/2913/2913973.png" class="login-logo">
        <h3><strong>FARMAWILL </strong></h3>
        <p class="info-text">
            <strong>Usuario:</strong>
             admin 
             <br>
             <strong>Contraseña:</strong> admin <br> 
           </p>
       
            <div class="mb-3">
                <input type="text" class="form-control" id="name">
                <span class="text-danger" id="error_name" > </span>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" id="password" >
                <span class="text-danger" id="error_password" > </span>
            </div>
            <span id="error_login" class="text-danger "></span>
            <button type="button" class="btn btn-primary w-100" id="btnAcceder" >Acceder</button>
      
    </div>

    <script src="{{asset ('js/login/login.js') }}" > </script>

</body>
</html>
