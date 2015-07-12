{{ content() }}
{{ form("deudas/save", "method":"post") }}

<table width="100%">
    <tr>
        <td align="left">{{ link_to("deudas", "Go Back") }}</td>
        <td align="right">{{ submit_button("Save") }}</td>
    </tr>
</table>

<div align="center">
    <h1>Edit deudas</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="id_deudas">Id Of Deudas</label>
        </td>
        <td align="left">
            {{ text_field("id_deudas", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="id_usario">Id Of Usario</label>
        </td>
        <td align="left">
            {{ text_field("id_usario", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="descripcion">Descripcion</label>
        </td>
        <td align="left">
            {{ text_field("descripcion", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="monto_total">Monto Of Total</label>
        </td>
        <td align="left">
            {{ text_field("monto_total", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="cantidad_abonos">Cantidad Of Abonos</label>
        </td>
        <td align="left">
            {{ text_field("cantidad_abonos", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="duracion_deuda">Duracion Of Deuda</label>
        </td>
        <td align="left">
            {{ text_field("duracion_deuda", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="fecha_primer_acono">Fecha Of Primer Of Acono</label>
        </td>
        <td align="left">
            {{ text_field("fecha_primer_acono", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="fecha_ultimo_abono">Fecha Of Ultimo Of Abono</label>
        </td>
        <td align="left">
            {{ text_field("fecha_ultimo_abono", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="estado">Estado</label>
        </td>
        <td align="left">
            {{ text_field("estado", "type" : "numeric") }}
        </td>
    </tr>

    <tr>
        <td>{{ hidden_field("id") }}</td>
        <td>{{ submit_button("Save") }}</td>
    </tr>
</table>

</form>
