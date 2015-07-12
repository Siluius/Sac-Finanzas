
{{ form("usuarios_log/create", "method":"post") }}

<table width="100%">
    <tr>
        <td align="left">{{ link_to("usuarios_log", "Go Back") }}</td>
        <td align="right">{{ submit_button("Save") }}</td>
    </tr>
</table>

{{ content() }}

<div align="center">
    <h1>Create usuarios_log</h1>
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
        <td>{{ submit_button("Save") }}</td>
    </tr>
</table>

</form>
