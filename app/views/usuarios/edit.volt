{{ content() }}
{{ form("usuarios/save", "method":"post") }}

<table width="100%">
    <tr>
        <td align="left">{{ link_to("usuarios", "Go Back") }}</td>
        <td align="right">{{ submit_button("Save") }}</td>
    </tr>
</table>

<div align="center">
    <h1>Edit usuarios</h1>
</div>

<table>
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
        <td>{{ hidden_field("id") }}</td>
        <td>{{ submit_button("Save") }}</td>
    </tr>
</table>

</form>
