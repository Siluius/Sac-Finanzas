
{{ content() }}

<div align="right">
    {{ link_to("usuarios/new", "Create usuarios") }}
</div>

{{ form("usuarios/search", "method":"post", "autocomplete" : "off") }}

<div align="center">
    <h1>Search usuarios</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="idusuarios">Idusuarios</label>
        </td>
        <td align="left">
            {{ text_field("idusuarios", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="login">Login</label>
        </td>
        <td align="left">
            {{ text_field("login", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="password">Password</label>
        </td>
        <td align="left">
            {{ text_field("password", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="nickname">Nickname</label>
        </td>
        <td align="left">
            {{ text_field("nickname", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="email">Email</label>
        </td>
        <td align="left">
            {{ text_field("email", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="facebook_id">Facebook</label>
        </td>
        <td align="left">
            {{ text_field("facebook_id", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="google_id">Google</label>
        </td>
        <td align="left">
            {{ text_field("google_id", "size" : 30) }}
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
            <label for="fecha_ingreso">Fecha Of Ingreso</label>
        </td>
        <td align="left">
            {{ text_field("fecha_ingreso", "size" : 30) }}
        </td>
    </tr>

    <tr>
        <td></td>
        <td>{{ submit_button("Search") }}</td>
    </tr>
</table>

</form>
