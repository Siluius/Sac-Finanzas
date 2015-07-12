
{{ form("ingresos/create", "method":"post") }}

<table width="100%">
    <tr>
        <td align="left">{{ link_to("ingresos", "Go Back") }}</td>
        <td align="right">{{ submit_button("Save") }}</td>
    </tr>
</table>

{{ content() }}

<div align="center">
    <h1>Create ingresos</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="id_categoria">Id Of Categoria</label>
        </td>
        <td align="left">
            {{ text_field("id_categoria", "type" : "numeric") }}
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
            <label for="descripcion">Descripcion</label>
        </td>
        <td align="left">
            {{ text_field("descripcion", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="fecha_transaccion">Fecha Of Transaccion</label>
        </td>
        <td align="left">
            {{ text_field("fecha_transaccion", "size" : 30) }}
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
        <td align="right">
            <label for="id_user">Id Of User</label>
        </td>
        <td align="left">
            {{ text_field("id_user", "type" : "numeric") }}
        </td>
    </tr>

    <tr>
        <td></td>
        <td>{{ submit_button("Save") }}</td>
    </tr>
</table>

</form>
