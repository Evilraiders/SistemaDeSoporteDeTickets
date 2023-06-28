<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistema de Soporte de Tickets</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


        <!-- Styles -->
        <style>
            /* Estilos personalizados */
            body {
              background-color: #f8f9fa;
            }
        
            .header {
              background-color: #343a40;
              padding: 20px;
              color: #ffffff;
            }
        
            .intro-section {
              background-color: #ffffff;
              padding: 40px;
              text-align: center;
            }
        
            .animation-section {
              background-color: #f8f9fa;
              padding: 40px;
              text-align: center;
            }
        
            .animation-icon {
              font-size: 80px;
              margin-bottom: 20px;
            }
        
            .animation-title {
              font-size: 24px;
              margin-bottom: 10px;
            }
        
            .animation-description {
              font-size: 16px;
              color: #6c757d;
              margin-bottom: 30px;
            }
        
            .ticket-section {
              background-color: #ffffff;
              padding: 40px;
              text-align: center;
            }
        
            .ticket-title {
              font-size: 32px;
              margin-bottom: 20px;
            }
        
            .ticket-description {
              font-size: 16px;
              color: #6c757d;
              margin-bottom: 30px;
            }
        
            .btn-get-started {
              background-color: #007bff;
              color: #ffffff;
              font-weight: bold;
              padding: 12px 30px;
              border: none;
              border-radius: 4px;
              text-transform: uppercase;
              letter-spacing: 1px;
            }
          </style>
        
    </head>
    <body>

        <header class="header">
            @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
              @auth
              <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
              @else
              <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Iniciar Sesión</a>
              @if (Route::has('register'))
              <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Registrarse</a>
              @endif
              @endauth
            </div>
            @endif
          </header>

            <section class="intro-section">
                <div class="container">
                  <h1 class="display-4">Bienvenido al Sistema de Soporte de Tickets</h1>
                  <p class="lead">Un sistema eficiente para gestionar tus tickets de soporte</p>
                </div>
              </section>
            
              <section class="animation-section">
                <div class="container">
                  <div class="row">
                    <div class="col-md-4">
                      <i class="fas fa-ticket-alt animation-icon"></i>
                      <h2 class="animation-title">Gestiona tus tickets</h2>
                      <p class="animation-description">Crea, actualiza y consulta tus tickets de soporte en un solo lugar.</p>
                    </div>
                    <div class="col-md-4">
                      <i class="fas fa-comments animation-icon"></i>
                      <h2 class="animation-title">Comunicación fácil</h2>
                      <p class="animation-description">Mantente en contacto con el equipo de soporte y recibe actualizaciones rápidas.</p>
                    </div>
                    <div class="col-md-4">
                      <i class="fas fa-search animation-icon"></i>
                      <h2 class="animation-title">Búsqueda rápida</h2>
                      <p class="animation-description">Encuentra rápidamente la información que necesitas en tus tickets archivados.</p>
                    </div>
                  </div>
                </div>
              </section>
            
              <section class="ticket-section">
                <div class="container">
                  <h2 class="ticket-title">Solicita asistencia hoy mismo</h2>
                  <p class="ticket-description">Regístrate e inicia sesión para crear tus tickets y recibir soporte personalizado.</p>
                  <a href="#" class="btn btn-get-started">Comenzar</a>
                </div>
              </section>
              <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
              <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
              <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
              <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>        
    </body>
</html>
