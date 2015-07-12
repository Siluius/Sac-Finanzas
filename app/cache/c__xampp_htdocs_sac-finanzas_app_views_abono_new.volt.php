
<?php echo $this->tag->form(array('abono/create', 'method' => 'post')); ?>

<table width="100%">
    <tr>
        <td align="left"><?php echo $this->tag->linkTo(array('abono', 'Go Back')); ?></td>
        <td align="right"><?php echo $this->tag->submitButton(array('Save')); ?></td>
    </tr>
</table>

<?php echo $this->getContent(); ?>

<div align="center">
    <h1>Create abono</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="id_deuda">Id Of Deuda</label>
        </td>
        <td align="left">
            <?php echo $this->tag->textField(array('id_deuda', 'type' => 'numeric')); ?>
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="monto">Monto</label>
        </td>
        <td align="left">
            <?php echo $this->tag->textField(array('monto', 'type' => 'numeric')); ?>
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="fecha">Fecha</label>
        </td>
        <td align="left">
            <?php echo $this->tag->textField(array('fecha', 'size' => 30)); ?>
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
        <td></td>
        <td><?php echo $this->tag->submitButton(array('Save')); ?></td>
    </tr>
</table>

</form>
