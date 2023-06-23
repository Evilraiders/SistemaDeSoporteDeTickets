<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="row justify-content-center mt-5">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Registro</h1>
                </div>
                <div class="card-body">
                    @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                    @endif
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Cristano Ronaldo" required>
                        </div>
                        <div class="mb-3">
                            <label for="Rol_ID" class="form-label">Rol</label>
                            <select class="form-select form-select-sm" name="Rol_ID" id="Rol_ID" aria-label="Rol_ID .form-select-sm" required>
                                <option selected>Selecciona un Rol</option>
                                <option value="1">Usuario</option>
                                <option value="2">Agente</option>
                                <option value="3">Administrador</option>
                              </select>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electronico</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Cristiano@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                        <div class="mb-3">
                            <div class="d-grid">
                                <button class="btn btn-primary">Registrase</button>
                            </div>
                        </div>
                    </form>

                    <div class="mt-3">
                        <a href="{{ url('/UserAdmin') }}">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>