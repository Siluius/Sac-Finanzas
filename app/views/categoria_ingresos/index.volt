
{{ content() }}

<div align="right">
    {{ link_to("categoria_ingresos/new", "Create categoria_ingresos") }}
</div>

{{ form("categoria_ingresos/search", "method":"post", "autocomplete" : "off") }}

<div align="center">
    <h1>Search categoria_ingresos</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="id_categoria_ingresos">Id Of Categoria Of Ingresos</label>
        </td>
        <td align="left">
            {{ text_field("id_categoria_ingresos", "type" : "numeric") }}
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
        <td></td>
        <td>{{ submit_button("Search") }}</td>
    </tr>
</table>

</form>
