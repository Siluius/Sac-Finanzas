
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("presupuesto/index", "Go Back") }}
        </td>
        <td align="right">
            {{ link_to("presupuesto/new", "Create ") }}
        </td>
    </tr>
</table>

<table class="browse" align="center">
    <thead>
        <tr>
            <th>Id Of Presupuesto</th>
            <th>Id Of Usuar</th>
            <th>Nombre</th>
            <th>Fecha Of Inicial</th>
            <th>Fecha Of Final</th>
            <th>Estado</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for presupuesto in page.items %}
        <tr>
            <td>{{ presupuesto.getIdPresupuesto() }}</td>
            <td>{{ presupuesto.getIdUsuar() }}</td>
            <td>{{ presupuesto.getNombre() }}</td>
            <td>{{ presupuesto.getFechaInicial() }}</td>
            <td>{{ presupuesto.getFechaFinal() }}</td>
            <td>{{ presupuesto.getEstado() }}</td>
            <td>{{ link_to("presupuesto/edit/"~presupuesto.getIdPresupuesto(), "Edit") }}</td>
            <td>{{ link_to("presupuesto/delete/"~presupuesto.getIdPresupuesto(), "Delete") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("presupuesto/search", "First") }}</td>
                        <td>{{ link_to("presupuesto/search?page="~page.before, "Previous") }}</td>
                        <td>{{ link_to("presupuesto/search?page="~page.next, "Next") }}</td>
                        <td>{{ link_to("presupuesto/search?page="~page.last, "Last") }}</td>
                        <td>{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
