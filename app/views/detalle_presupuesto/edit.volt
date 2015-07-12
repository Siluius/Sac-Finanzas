{{ content() }}
{{ form("detalle_presupuesto/save", "method":"post") }}

<table width="100%">
    <tr>
        <td align="left">{{ link_to("detalle_presupuesto", "Go Back") }}</td>
        <td align="right">{{ submit_button("Save") }}</td>
    </tr>
</table>

<div align="center">
    <h1>Edit detalle_presupuesto</h1>
</div>

<table>
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
        <td>{{ hidden_field("id") }}</td>
        <td>{{ submit_button("Save") }}</td>
    </tr>
</table>

</form>
