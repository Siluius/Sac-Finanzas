
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("gastos/index", "Go Back") }}
        </td>
        <td align="right">
            {{ link_to("gastos/new", "Create ") }}
        </td>
    </tr>
</table>

<table class="browse" align="center">
    <thead>
        <tr>
            <th>Id Of Gastos</th>
            <th>Id Of Categoria Of Gast</th>
            <th>Id Of Usuari</th>
            <th>Monto</th>
            <th>Descripcion</th>
            <th>Fecha</th>
            <th>Estado</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for gasto in page.items %}
        <tr>
            <td>{{ gasto.getIdGastos() }}</td>
            <td>{{ gasto.getIdCategoriaGast() }}</td>
            <td>{{ gasto.getIdUsuari() }}</td>
            <td>{{ gasto.getMonto() }}</td>
            <td>{{ gasto.getDescripcion() }}</td>
            <td>{{ gasto.getFecha() }}</td>
            <td>{{ gasto.getEstado() }}</td>
            <td>{{ link_to("gastos/edit/"~gasto.getIdGastos(), "Edit") }}</td>
            <td>{{ link_to("gastos/delete/"~gasto.getIdGastos(), "Delete") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("gastos/search", "First") }}</td>
                        <td>{{ link_to("gastos/search?page="~page.before, "Previous") }}</td>
                        <td>{{ link_to("gastos/search?page="~page.next, "Next") }}</td>
                        <td>{{ link_to("gastos/search?page="~page.last, "Last") }}</td>
                        <td>{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
