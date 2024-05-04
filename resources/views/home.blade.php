{{--@extends('layouts.app')
    
@section('content')--}}
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestión de Fertilidad</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #d8b7ff; /* Color de fondo lila claro */
                display: flex;
                flex-direction: column;
                align-items: center;
                height: 100vh; /* Ajusta la altura al 100% de la ventana */
            }

            .header {
                background-image: url('<?php echo asset("images/imagen-cabecera.png"); ?>'); /* Aquí se referencia la imagen en la carpeta images */
                background-size: cover;
                background-position: center;
                height: 200px; /* Reducimos la altura de la cabecera */
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                color: #ffffff;
                text-align: center;
                font-size: 24px;
            }

            .center-content {
                text-align: center;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                flex-grow: 1; /* Para expandir este contenedor y ocupar el espacio disponible */
            }

            .center-image {
                background-image: url('<?php echo asset("images/imagen-centro.jpeg"); ?>'); /* Aquí se referencia la imagen en la carpeta images */
                background-size: cover;
                background-position: center;
                width: 300px; /* Ajustamos el ancho de la imagen central */
                height: 300px; /* Ajustamos la altura de la imagen central */
                margin-bottom: 20px;
            }

            .login-button {
                background-color: #8a2be2; /* Cambia el color de fondo del botón a lila oscuro */
                color: white; /* Cambia el color del texto a blanco para que contraste */
                padding: 15px 20px;
                border: none;
                border-radius: 5px;
                font-size: 16px;
                cursor: pointer;
                transition: background-color 0.3s;
            }

            .login-button:hover {
                background-color: #4b0082; /* Cambia el color de fondo del botón a lila más oscuro al pasar el mouse */
            }

        </style>
    </head>
    <body>
        <div class="header">
            <h1>Bienvenido a la Gestión de Fertilidad</h1>
        </div>

        <div class="center-content">
            <img src="<?php echo asset('images/imagen-centro.jpeg'); ?>" class="center-image" alt="Imagen Centro"> <!-- Aquí se referencia la imagen en la carpeta images -->
            <button class="login-button">Iniciar Sesión</button>
        </div>

        <!-- Elemento para mostrar la fecha y la hora -->
        <div id="fecha-hora" style="position: fixed; top: 10px; right: 10px; color: white; font-size: 18px;"></div>

        <!-- Script para actualizar la fecha y hora actual -->
        <script>
            // Función para obtener la fecha y hora actual y actualizar el elemento HTML correspondiente
            function actualizarFechaHora() {
                var ahora = new Date();
                var fechaHora = ahora.toLocaleString('es-ES'); // Formatear la fecha y hora según el idioma local

                // Actualizar el contenido del elemento con el ID "fecha-hora"
                document.getElementById('fecha-hora').textContent = fechaHora;
            }

            // Llamar a la función inicialmente para mostrar la fecha y la hora actual
            actualizarFechaHora();

            // Actualizar la fecha y hora cada segundo
            setInterval(actualizarFechaHora, 1000);
        </script>
    </body>
    </html>
{{--@endsection--}} 

