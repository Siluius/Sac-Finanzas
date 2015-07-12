
{{ content() }}

<div align="right">
    {{ link_to("usuarios_data/new", "Create usuarios_data") }}
</div>

{{ form("usuarios_data/search", "method":"post", "autocomplete" : "off") }}

<div align="center">
    <h1>Search usuarios_data</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="idusuarios_data">Idusuarios Of Data</label>
        </td>
        <td align="left">
            {{ text_field("idusuarios_data", "type" : "numeric") }}
        </td>
    </tr>
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
        <td>{{ submit_button("Search") }}</td>
    </tr>
</table>

</form>
