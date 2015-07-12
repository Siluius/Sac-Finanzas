{{ content() }}
{{ form("categoria_ingresos/save", "method":"post") }}

<table width="100%">
    <tr>
        <td align="left">{{ link_to("categoria_ingresos", "Go Back") }}</td>
        <td align="right">{{ submit_button("Save") }}</td>
    </tr>
</table>

<div align="center">
    <h1>Edit categoria_ingresos</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="descripcion">Descripcion</label>
        </td>
        <td align="left">
            {{ text_field("descripcion", "size" : 30) }}
        </td>
    </tr>

    <tr>
        <td>{{ hidden_field("id") }}</td>
        <td>{{ submit_button("Save") }}</td>
    </tr>
</table>

</form>
