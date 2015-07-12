
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("usuarios_data/index", "Go Back") }}
        </td>
        <td align="right">
            {{ link_to("usuarios_data/new", "Create ") }}
        </td>
    </tr>
</table>

<table class="browse" align="center">
    <thead>
        <tr>
            <th>Idusuarios Of Data</th>
            <th>Id Of Usuarios</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Pais</th>
            <th>Ciudad</th>
            <th>Telefono</th>
            <th>Fecha Of Nacimiento</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for usuarios_data in page.items %}
        <tr>
            <td>{{ usuarios_data.getIdusuariosData() }}</td>
            <td>{{ usuarios_data.getIdUsuarios() }}</td>
            <td>{{ usuarios_data.getNombres() }}</td>
            <td>{{ usuarios_data.getApellidos() }}</td>
            <td>{{ usuarios_data.getPais() }}</td>
            <td>{{ usuarios_data.getCiudad() }}</td>
            <td>{{ usuarios_data.getTelefono() }}</td>
            <td>{{ usuarios_data.getFechaNacimiento() }}</td>
            <td>{{ link_to("usuarios_data/edit/"~usuarios_data.getIdusuariosData(), "Edit") }}</td>
            <td>{{ link_to("usuarios_data/delete/"~usuarios_data.getIdusuariosData(), "Delete") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("usuarios_data/search", "First") }}</td>
                        <td>{{ link_to("usuarios_data/search?page="~page.before, "Previous") }}</td>
                        <td>{{ link_to("usuarios_data/search?page="~page.next, "Next") }}</td>
                        <td>{{ link_to("usuarios_data/search?page="~page.last, "Last") }}</td>
                        <td>{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
