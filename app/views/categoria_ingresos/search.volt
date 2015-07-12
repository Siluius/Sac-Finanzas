
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("categoria_ingresos/index", "Go Back") }}
        </td>
        <td align="right">
            {{ link_to("categoria_ingresos/new", "Create ") }}
        </td>
    </tr>
</table>

<table class="browse" align="center">
    <thead>
        <tr>
            <th>Id Of Categoria Of Ingresos</th>
            <th>Descripcion</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for categoria_ingreso in page.items %}
        <tr>
            <td>{{ categoria_ingreso.getIdCategoriaIngresos() }}</td>
            <td>{{ categoria_ingreso.getDescripcion() }}</td>
            <td>{{ link_to("categoria_ingresos/edit/"~categoria_ingreso.getIdCategoriaIngresos(), "Edit") }}</td>
            <td>{{ link_to("categoria_ingresos/delete/"~categoria_ingreso.getIdCategoriaIngresos(), "Delete") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("categoria_ingresos/search", "First") }}</td>
                        <td>{{ link_to("categoria_ingresos/search?page="~page.before, "Previous") }}</td>
                        <td>{{ link_to("categoria_ingresos/search?page="~page.next, "Next") }}</td>
                        <td>{{ link_to("categoria_ingresos/search?page="~page.last, "Last") }}</td>
                        <td>{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
