
{{ content() }}

<div align="right">
    {{ link_to("abono/new", "Create abono") }}
</div>

{{ form("abono/search", "method":"post", "autocomplete" : "off") }}

<div align="center">
    <h1>Search abono</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="id_abono">Id Of Abono</label>
        </td>
        <td align="left">
            {{ text_field("id_abono", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="id_deuda">Id Of Deuda</label>
        </td>
        <td align="left">
            {{ text_field("id_deuda", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="monto">Monto</label>
        </td>
        <td align="left">
            {{ text_field("monto", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="fecha">Fecha</label>
        </td>
        <td align="left">
            {{ text_field("fecha", "size" : 30) }}
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
        <td></td>
        <td>{{ submit_button("Search") }}</td>
    </tr>
</table>

</form>
