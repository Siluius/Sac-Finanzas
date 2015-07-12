
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("metas/index", "Go Back") }}
        </td>
        <td align="right">
            {{ link_to("metas/new", "Create ") }}
        </td>
    </tr>
</table>

<table class="browse" align="center">
    <thead>
        <tr>
            <th>Id Of Metas</th>
            <th>Meta</th>
            <th>Monto</th>
            <th>Estado</th>
            <th>Id Of Usuarioo</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for meta in page.items %}
        <tr>
            <td>{{ meta.getIdMetas() }}</td>
            <td>{{ meta.getMeta() }}</td>
            <td>{{ meta.getMonto() }}</td>
            <td>{{ meta.getEstado() }}</td>
            <td>{{ meta.getIdUsuarioo() }}</td>
            <td>{{ link_to("metas/edit/"~meta.getIdMetas(), "Edit") }}</td>
            <td>{{ link_to("metas/delete/"~meta.getIdMetas(), "Delete") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("metas/search", "First") }}</td>
                        <td>{{ link_to("metas/search?page="~page.before, "Previous") }}</td>
                        <td>{{ link_to("metas/search?page="~page.next, "Next") }}</td>
                        <td>{{ link_to("metas/search?page="~page.last, "Last") }}</td>
                        <td>{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
