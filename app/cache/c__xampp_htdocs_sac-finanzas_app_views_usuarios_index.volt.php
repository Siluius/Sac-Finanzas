
<?php echo $this->getContent(); ?>

<div align="right">
    <?php echo $this->tag->linkTo(array('usuarios/new', 'Create usuarios')); ?>
</div>

<?php echo $this->tag->form(array('usuarios/search', 'method' => 'post', 'autocomplete' => 'off')); ?>

<div align="center">
    <h1>Search usuarios</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="idusuarios">Idusuarios</label>
        </td>
        <td align="left">
            <?php echo $this->tag->textField(array('idusuarios', 'type' => 'numeric')); ?>
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="login">Login</label>
        </td>
        <td align="left">
            <?php echo $this->tag->textField(array('login', 'size' => 30)); ?>
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="password">Password</label>
        </td>
        <td align="left">
            <?php echo $this->tag->textField(array('password', 'size' => 30)); ?>
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="nickname">Nickname</label>
        </td>
        <td align="left">
            <?php echo $this->tag->textField(array('nickname', 'size' => 30)); ?>
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="email">Email</label>
        </td>
        <td align="left">
            <?php echo $this->tag->textField(array('email', 'size' => 30)); ?>
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="facebook_id">Facebook</label>
        </td>
        <td align="left">
            <?php echo $this->tag->textField(array('facebook_id', 'size' => 30)); ?>
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="google_id">Google</label>
        </td>
        <td align="left">
            <?php echo $this->tag->textField(array('google_id', 'size' => 30)); ?>
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="estado">Estado</label>
        </td>
        <td align="left">
            <?php echo $this->tag->textField(array('estado', 'type' => 'numeric')); ?>
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="fecha_ingreso">Fecha Of Ingreso</label>
        </td>
        <td align="left">
            <?php echo $this->tag->textField(array('fecha_ingreso', 'size' => 30)); ?>
        </td>
    </tr>

    <tr>
        <td></td>
        <td><?php echo $this->tag->submitButton(array('Search')); ?></td>
    </tr>
</table>

</form>
