
{{ form("usuarios_data/create", "method":"post") }}

<table width="100%">
    <tr>
        <td align="left">{{ link_to("usuarios_data", "Go Back") }}</td>
        <td align="right">{{ submit_button("Save") }}</td>
    </tr>
</table>

{{ content() }}

<div align="center">
    <h1>Create usuarios_data</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="id_usuarios">Id Of Usuarios</label>
        </td>
        <td align="left">
            {{ text_field("id_usuarios", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="nombres">Nombres</label>
        </td>
        <td align="left">
            {{ text_field("nombres", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="apellidos">Apellidos</label>
        </td>
        <td align="left">
            {{ text_field("apellidos", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="pais">Pais</label>
        </td>
        <td align="left">
            {{ text_field("pais", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="ciudad">Ciudad</label>
        </td>
        <td align="left">
            {{ text_field("ciudad", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="telefono">Telefono</label>
        </td>
        <td align="left">
            {{ text_field("telefono", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="fecha_nacimiento">Fecha Of Nacimiento</label>
        </td>
        <td align="left">
            {{ text_field("fecha_nacimiento", "size" : 30) }}
        </td>
    </tr>

    <tr>
        <td></td>
        <td>{{ submit_button("Save") }}</td>
    </tr>
</table>

</form>
