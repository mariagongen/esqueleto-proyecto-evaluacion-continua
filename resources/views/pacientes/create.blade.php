<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Paciente</title>
</head>
<body>
    <div class="container">
        <h1>Crear Paciente</h1>

        <form action="{{ route('pacientes.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
    </div>

    <div class="form-group">
    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="apellido" required>
    </div>

    <div class="form-group">
    <label for="password">Contraseña:</label>
    <input type="text" id="password" name="password" required>
    </div>

    <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    </div>

    <div class="form-group">
    <label for="nuhsa">NUHSA:</label>
    <input type="text" id="nuhsa" name="nuhsa">
    </div>

    <div class="form-group">
    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento">
    </div>

    <div class="form-group">
    <label for="telefono">Teléfono:</label>
    <input type="text" id="telefono" name="telefono">
    </div>

    <div class="form-group">
    <label for="direccion">Dirección:</label>
    <input type="text" id="direccion" name="direccion">
    </div>

    <button type="submit">Guardar</button>
</form>

    </div>
</body>
</html>
