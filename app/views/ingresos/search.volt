
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("ingresos/index", "Go Back") }}
        </td>
        <td align="right">
            {{ link_to("ingresos/new", "Create ") }}
        </td>
    </tr>
</table>

<table class="browse" align="center">
    <thead>
        <tr>
            <th>Idingresos</th>
            <th>Id Of Categoria</th>
            <th>Monto</th>
            <th>Descripcion</th>
            <th>Fecha Of Transaccion</th>
            <th>Estado</th>
            <th>Id Of User</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for ingreso in page.items %}
        <tr>
            <td>{{ ingreso.getIdingresos() }}</td>
            <td>{{ ingreso.getIdCategoria() }}</td>
            <td>{{ ingreso.getMonto() }}</td>
            <td>{{ ingreso.getDescripcion() }}</td>
            <td>{{ ingreso.getFechaTransaccion() }}</td>
            <td>{{ ingreso.getEstado() }}</td>
            <td>{{ ingreso.getIdUser() }}</td>
            <td>{{ link_to("ingresos/edit/"~ingreso.getIdingresos(), "Edit") }}</td>
            <td>{{ link_to("ingresos/delete/"~ingreso.getIdingresos(), "Delete") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("ingresos/search", "First") }}</td>
                        <td>{{ link_to("ingresos/search?page="~page.before, "Previous") }}</td>
                        <td>{{ link_to("ingresos/search?page="~page.next, "Next") }}</td>
                        <td>{{ link_to("ingresos/search?page="~page.last, "Last") }}</td>
                        <td>{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
