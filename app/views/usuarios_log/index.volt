
{{ content() }}

<div align="right">
    {{ link_to("usuarios_log/new", "Create usuarios_log") }}
</div>

{{ form("usuarios_log/search", "method":"post", "autocomplete" : "off") }}

<div align="center">
    <h1>Search usuarios_log</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="idusuarios_log">Idusuarios Of Log</label>
        </td>
        <td align="left">
            {{ text_field("idusuarios_log", "type" : "numeric") }}
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
            <label for="fecha_proceso">Fecha Of Proceso</label>
        </td>
        <td align="left">
            {{ text_field("fecha_proceso", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="ip">Ip</label>
        </td>
        <td align="left">
            {{ text_field("ip", "size" : 30) }}
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
