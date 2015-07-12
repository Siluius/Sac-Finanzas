
{{ content() }}

<div align="right">
    {{ link_to("detalle_presupuesto/new", "Create detalle_presupuesto") }}
</div>

{{ form("detalle_presupuesto/search", "method":"post", "autocomplete" : "off") }}

<div align="center">
    <h1>Search detalle_presupuesto</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="id_detalle_presupuesto">Id Of Detalle Of Presupuesto</label>
        </td>
        <td align="left">
            {{ text_field("id_detalle_presupuesto", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="id_presupuesto">Id Of Presupuesto</label>
        </td>
        <td align="left">
            {{ text_field("id_presupuesto", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="id_categoria_gastos">Id Of Categoria Of Gastos</label>
        </td>
        <td align="left">
            {{ text_field("id_categoria_gastos", "type" : "numeric") }}
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
