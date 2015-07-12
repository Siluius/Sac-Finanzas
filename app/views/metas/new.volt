
{{ form("metas/create", "method":"post") }}

<table width="100%">
    <tr>
        <td align="left">{{ link_to("metas", "Go Back") }}</td>
        <td align="right">{{ submit_button("Save") }}</td>
    </tr>
</table>

{{ content() }}

<div align="center">
    <h1>Create metas</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="meta">Meta</label>
        </td>
        <td align="left">
            {{ text_field("meta", "size" : 30) }}
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
        <td align="right">
            <label for="id_usuarioo">Id Of Usuarioo</label>
        </td>
        <td align="left">
            {{ text_field("id_usuarioo", "type" : "numeric") }}
        </td>
    </tr>

    <tr>
        <td></td>
        <td>{{ submit_button("Save") }}</td>
    </tr>
</table>

</form>
