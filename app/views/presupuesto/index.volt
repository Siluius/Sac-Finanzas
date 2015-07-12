
{{ content() }}

<div align="right">
    {{ link_to("presupuesto/new", "Create presupuesto") }}
</div>

{{ form("presupuesto/search", "method":"post", "autocomplete" : "off") }}

<div align="center">
    <h1>Search presupuesto</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="id_presupuesto">Id Of Presupuesto</label>
        </td>
        <td align="left">
            {{ text_field("id_presupuesto", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="id_usuar">Id Of Usuar</label>
        </td>
        <td align="left">
            {{ text_field("id_usuar", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="nombre">Nombre</label>
        </td>
        <td align="left">
            {{ text_field("nombre", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="fecha_inicial">Fecha Of Inicial</label>
        </td>
        <td align="left">
            {{ text_field("fecha_inicial", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="fecha_final">Fecha Of Final</label>
        </td>
        <td align="left">
            {{ text_field("fecha_final", "size" : 30) }}
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
