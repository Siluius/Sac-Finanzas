
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("usuarios_log/index", "Go Back") }}
        </td>
        <td align="right">
            {{ link_to("usuarios_log/new", "Create ") }}
        </td>
    </tr>
</table>

<table class="browse" align="center">
    <thead>
        <tr>
            <th>Idusuarios Of Log</th>
            <th>Id Of Usuarios</th>
            <th>Fecha Of Proceso</th>
            <th>Ip</th>
            <th>Descripcion</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for usuarios_log in page.items %}
        <tr>
            <td>{{ usuarios_log.getIdusuariosLog() }}</td>
            <td>{{ usuarios_log.getIdUsuarios() }}</td>
            <td>{{ usuarios_log.getFechaProceso() }}</td>
            <td>{{ usuarios_log.getIp() }}</td>
            <td>{{ usuarios_log.getDescripcion() }}</td>
            <td>{{ link_to("usuarios_log/edit/"~usuarios_log.getIdusuariosLog(), "Edit") }}</td>
            <td>{{ link_to("usuarios_log/delete/"~usuarios_log.getIdusuariosLog(), "Delete") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("usuarios_log/search", "First") }}</td>
                        <td>{{ link_to("usuarios_log/search?page="~page.before, "Previous") }}</td>
                        <td>{{ link_to("usuarios_log/search?page="~page.next, "Next") }}</td>
                        <td>{{ link_to("usuarios_log/search?page="~page.last, "Last") }}</td>
                        <td>{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
