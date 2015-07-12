
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("usuarios/index", "Go Back") }}
        </td>
        <td align="right">
            {{ link_to("usuarios/new", "Create ") }}
        </td>
    </tr>
</table>

<table class="browse" align="center">
    <thead>
        <tr>
            <th>Idusuarios</th>
            <th>Login</th>
            <th>Password</th>
            <th>Nickname</th>
            <th>Email</th>
            <th>Facebook</th>
            <th>Google</th>
            <th>Estado</th>
            <th>Fecha Of Ingreso</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for usuario in page.items %}
        <tr>
            <td>{{ usuario.getIdusuarios() }}</td>
            <td>{{ usuario.getLogin() }}</td>
            <td>{{ usuario.getPassword() }}</td>
            <td>{{ usuario.getNickname() }}</td>
            <td>{{ usuario.getEmail() }}</td>
            <td>{{ usuario.getFacebookId() }}</td>
            <td>{{ usuario.getGoogleId() }}</td>
            <td>{{ usuario.getEstado() }}</td>
            <td>{{ usuario.getFechaIngreso() }}</td>
            <td>{{ link_to("usuarios/edit/"~usuario.getIdusuarios(), "Edit") }}</td>
            <td>{{ link_to("usuarios/delete/"~usuario.getIdusuarios(), "Delete") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("usuarios/search", "First") }}</td>
                        <td>{{ link_to("usuarios/search?page="~page.before, "Previous") }}</td>
                        <td>{{ link_to("usuarios/search?page="~page.next, "Next") }}</td>
                        <td>{{ link_to("usuarios/search?page="~page.last, "Last") }}</td>
                        <td>{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
