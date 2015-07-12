
{{ content() }}

<div align="right">
    {{ link_to("gastos/new", "Create gastos") }}
</div>

{{ form("gastos/search", "method":"post", "autocomplete" : "off") }}

<div align="center">
    <h1>Search gastos</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="id_gastos">Id Of Gastos</label>
        </td>
        <td align="left">
            {{ text_field("id_gastos", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="id_categoria_gast">Id Of Categoria Of Gast</label>
        </td>
        <td align="left">
            {{ text_field("id_categoria_gast", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="id_usuari">Id Of Usuari</label>
        </td>
        <td align="left">
            {{ text_field("id_usuari", "type" : "numeric") }}
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
