
{{ content() }}

<div align="right">
    {{ link_to("categoria_gastos/new", "Create categoria_gastos") }}
</div>

{{ form("categoria_gastos/search", "method":"post", "autocomplete" : "off") }}

<div align="center">
    <h1>Search categoria_gastos</h1>
</div>

<table>
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
            <label for="descripcion">Descripcion</label>
        </td>
        <td align="left">
            {{ text_field("descripcion", "size" : 30) }}
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
