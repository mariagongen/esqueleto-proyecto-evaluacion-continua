
    <div class="container">
        <h1>Listado de Pacientes</h1>
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
                        <tr>
                        <td>Maria</td>
                        <td>Gonzalez</td>
                        <td>Genil</td>
                        <td>sd</td>
                        <td>asd</td>
                        <td>sdfgsg</td>
                        <td>gh</td>
                        <td>
                                <a href="a">Ver</a> |
                                <a href="a">Editar</a> |
                                <form action="a" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-link">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                </tbody>
            </table>
    </div>


