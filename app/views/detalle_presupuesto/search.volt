
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("detalle_presupuesto/index", "Go Back") }}
        </td>
        <td align="right">
            {{ link_to("detalle_presupuesto/new", "Create ") }}
        </td>
    </tr>
</table>

<table class="browse" align="center">
    <thead>
        <tr>
            <th>Id Of Detalle Of Presupuesto</th>
            <th>Id Of Presupuesto</th>
            <th>Id Of Categoria Of Gastos</th>
            <th>Monto</th>
            <th>Estado</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for detalle_presupuesto in page.items %}
        <tr>
            <td>{{ detalle_presupuesto.getIdDetallePresupuesto() }}</td>
            <td>{{ detalle_presupuesto.getIdPresupuesto() }}</td>
            <td>{{ detalle_presupuesto.getIdCategoriaGastos() }}</td>
            <td>{{ detalle_presupuesto.getMonto() }}</td>
            <td>{{ detalle_presupuesto.getEstado() }}</td>
            <td>{{ link_to("detalle_presupuesto/edit/"~detalle_presupuesto.getIdDetallePresupuesto(), "Edit") }}</td>
            <td>{{ link_to("detalle_presupuesto/delete/"~detalle_presupuesto.getIdDetallePresupuesto(), "Delete") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("detalle_presupuesto/search", "First") }}</td>
                        <td>{{ link_to("detalle_presupuesto/search?page="~page.before, "Previous") }}</td>
                        <td>{{ link_to("detalle_presupuesto/search?page="~page.next, "Next") }}</td>
                        <td>{{ link_to("detalle_presupuesto/search?page="~page.last, "Last") }}</td>
                        <td>{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
