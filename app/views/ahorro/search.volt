
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("ahorro/index", "Go Back") }}
        </td>
        <td align="right">
            {{ link_to("ahorro/new", "Create ") }}
        </td>
    </tr>
</table>

<table class="browse" align="center">
    <thead>
        <tr>
            <th>Id Of Ahorro</th>
            <th>Id Of Userr</th>
            <th>Monto</th>
            <th>Descripcion</th>
            <th>Fecha</th>
            <th>Estado</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for ahorro in page.items %}
        <tr>
            <td>{{ ahorro.getIdAhorro() }}</td>
            <td>{{ ahorro.getIdUserr() }}</td>
            <td>{{ ahorro.getMonto() }}</td>
            <td>{{ ahorro.getDescripcion() }}</td>
            <td>{{ ahorro.getFecha() }}</td>
            <td>{{ ahorro.getEstado() }}</td>
            <td>{{ link_to("ahorro/edit/"~ahorro.getIdAhorro(), "Edit") }}</td>
            <td>{{ link_to("ahorro/delete/"~ahorro.getIdAhorro(), "Delete") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("ahorro/search", "First") }}</td>
                        <td>{{ link_to("ahorro/search?page="~page.before, "Previous") }}</td>
                        <td>{{ link_to("ahorro/search?page="~page.next, "Next") }}</td>
                        <td>{{ link_to("ahorro/search?page="~page.last, "Last") }}</td>
                        <td>{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
