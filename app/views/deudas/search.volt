
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("deudas/index", "Go Back") }}
        </td>
        <td align="right">
            {{ link_to("deudas/new", "Create ") }}
        </td>
    </tr>
</table>

<table class="browse" align="center">
    <thead>
        <tr>
            <th>Id Of Deudas</th>
            <th>Id Of Usario</th>
            <th>Descripcion</th>
            <th>Monto Of Total</th>
            <th>Cantidad Of Abonos</th>
            <th>Duracion Of Deuda</th>
            <th>Fecha Of Primer Of Acono</th>
            <th>Fecha Of Ultimo Of Abono</th>
            <th>Estado</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for deuda in page.items %}
        <tr>
            <td>{{ deuda.getIdDeudas() }}</td>
            <td>{{ deuda.getIdUsario() }}</td>
            <td>{{ deuda.getDescripcion() }}</td>
            <td>{{ deuda.getMontoTotal() }}</td>
            <td>{{ deuda.getCantidadAbonos() }}</td>
            <td>{{ deuda.getDuracionDeuda() }}</td>
            <td>{{ deuda.getFechaPrimerAcono() }}</td>
            <td>{{ deuda.getFechaUltimoAbono() }}</td>
            <td>{{ deuda.getEstado() }}</td>
            <td>{{ link_to("deudas/edit/"~deuda.getIdDeudas(), "Edit") }}</td>
            <td>{{ link_to("deudas/delete/"~deuda.getIdDeudas(), "Delete") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("deudas/search", "First") }}</td>
                        <td>{{ link_to("deudas/search?page="~page.before, "Previous") }}</td>
                        <td>{{ link_to("deudas/search?page="~page.next, "Next") }}</td>
                        <td>{{ link_to("deudas/search?page="~page.last, "Last") }}</td>
                        <td>{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
