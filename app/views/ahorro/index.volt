
{{ content() }}

<div align="right">
    {{ link_to("ahorro/new", "Create ahorro") }}
</div>

{{ form("ahorro/search", "method":"post", "autocomplete" : "off") }}

<div align="center">
    <h1>Search ahorro</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="id_ahorro">Id Of Ahorro</label>
        </td>
        <td align="left">
            {{ text_field("id_ahorro", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="id_userr">Id Of Userr</label>
        </td>
        <td align="left">
            {{ text_field("id_userr", "type" : "numeric") }}
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
