
{{ content() }}

<div align="right">
    {{ link_to("metas/new", "Create metas") }}
</div>

{{ form("metas/search", "method":"post", "autocomplete" : "off") }}

<div align="center">
    <h1>Search metas</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="id_metas">Id Of Metas</label>
        </td>
        <td align="left">
            {{ text_field("id_metas", "type" : "numeric") }}
        </td>
    </tr>
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
        <td>{{ submit_button("Search") }}</td>
    </tr>
</table>

</form>
