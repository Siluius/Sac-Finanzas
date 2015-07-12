
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("categoria_gastos/index", "Go Back") }}
        </td>
        <td align="right">
            {{ link_to("categoria_gastos/new", "Create ") }}
        </td>
    </tr>
</table>

<table class="browse" align="center">
    <thead>
        <tr>
            <th>Id Of Categoria Of Gastos</th>
            <th>Descripcion</th>
            <th>Estado</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for categoria_gasto in page.items %}
        <tr>
            <td>{{ categoria_gasto.getIdCategoriaGastos() }}</td>
            <td>{{ categoria_gasto.getDescripcion() }}</td>
            <td>{{ categoria_gasto.getEstado() }}</td>
            <td>{{ link_to("categoria_gastos/edit/"~categoria_gasto.getIdCategoriaGastos(), "Edit") }}</td>
            <td>{{ link_to("categoria_gastos/delete/"~categoria_gasto.getIdCategoriaGastos(), "Delete") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("categoria_gastos/search", "First") }}</td>
                        <td>{{ link_to("categoria_gastos/search?page="~page.before, "Previous") }}</td>
                        <td>{{ link_to("categoria_gastos/search?page="~page.next, "Next") }}</td>
                        <td>{{ link_to("categoria_gastos/search?page="~page.last, "Last") }}</td>
                        <td>{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
