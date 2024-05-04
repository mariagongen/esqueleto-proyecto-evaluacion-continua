<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Pacientes</title>
</head>
<body>
    <div class="container">
        <h1>Listado de Pacientes</h1>
        
        <?php if (count($pacientes) > 0): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>NUHSA</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pacientes as $paciente): ?>
                        <tr>
                            <td><?php echo isset($paciente->nombre) ? $paciente->nombre : 'N/A' ?></td>
                            <td><?php echo isset($paciente->apellido) ? $paciente->apellido : 'N/A' ?></td>
                            <td><?php echo isset($paciente->email) ? $paciente->email : 'N/A' ?></td>
                            <td><?php echo isset($paciente->nuhsa) ? $paciente->nuhsa : 'N/A' ?></td>
                            <td><?php echo isset($paciente->fecha_nacimiento) ? $paciente->fecha_nacimiento : 'N/A' ?></td>
                            <td><?php echo isset($paciente->telefono) ? $paciente->telefono : 'N/A' ?></td>
                            <td><?php echo isset($paciente->direccion) ? $paciente->direccion : 'N/A' ?></td>
                            <td>
                                <a href="<?php echo route('pacientes.show', $paciente->id) ?>">Ver</a> |
                                <a href="<?php echo route('pacientes.edit', $paciente->id) ?>">Editar</a> |
                                <form action="<?php echo route('pacientes.destroy', $paciente->id) ?>" method="POST">
                                    <?php echo csrf_field() ?>
                                    <?php echo method_field('DELETE') ?>
                                    <button type="submit" class="btn btn-link">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay pacientes registrados.</p>
        <?php endif; ?>
    </div>
</body>
</html>
