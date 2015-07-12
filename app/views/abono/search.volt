
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("abono/index", "Go Back") }}
        </td>
        <td align="right">
            {{ link_to("abono/new", "Create ") }}
        </td>
    </tr>
</table>

<table class="browse" align="center">
    <thead>
        <tr>
            <th>Id Of Abono</th>
            <th>Id Of Deuda</th>
            <th>Monto</th>
            <th>Fecha</th>
            <th>Estado</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for abono in page.items %}
        <tr>
            <td>{{ abono.getIdAbono() }}</td>
            <td>{{ abono.getIdDeuda() }}</td>
            <td>{{ abono.getMonto() }}</td>
            <td>{{ abono.getFecha() }}</td>
            <td>{{ abono.getEstado() }}</td>
            <td>{{ link_to("abono/edit/"~abono.getIdAbono(), "Edit") }}</td>
            <td>{{ link_to("abono/delete/"~abono.getIdAbono(), "Delete") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("abono/search", "First") }}</td>
                        <td>{{ link_to("abono/search?page="~page.before, "Previous") }}</td>
                        <td>{{ link_to("abono/search?page="~page.next, "Next") }}</td>
                        <td>{{ link_to("abono/search?page="~page.last, "Last") }}</td>
                        <td>{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
