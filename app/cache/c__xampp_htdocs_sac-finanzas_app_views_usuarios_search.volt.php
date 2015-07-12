
<?php echo $this->getContent(); ?>

<table width="100%">
    <tr>
        <td align="left">
            <?php echo $this->tag->linkTo(array('usuarios/index', 'Go Back')); ?>
        </td>
        <td align="right">
            <?php echo $this->tag->linkTo(array('usuarios/new', 'Create ')); ?>
        </td>
    </tr>
</table>

<table class="browse" align="center">
    <thead>
        <tr>
            <th>Idusuarios</th>
            <th>Login</th>
            <th>Password</th>
            <th>Nickname</th>
            <th>Email</th>
            <th>Facebook</th>
            <th>Google</th>
            <th>Estado</th>
            <th>Fecha Of Ingreso</th>
         </tr>
    </thead>
    <tbody>
    <?php if (isset($page->items)) { ?>
    <?php foreach ($page->items as $usuario) { ?>
        <tr>
            <td><?php echo $usuario->getIdusuarios(); ?></td>
            <td><?php echo $usuario->getLogin(); ?></td>
            <td><?php echo $usuario->getPassword(); ?></td>
            <td><?php echo $usuario->getNickname(); ?></td>
            <td><?php echo $usuario->getEmail(); ?></td>
            <td><?php echo $usuario->getFacebookId(); ?></td>
            <td><?php echo $usuario->getGoogleId(); ?></td>
            <td><?php echo $usuario->getEstado(); ?></td>
            <td><?php echo $usuario->getFechaIngreso(); ?></td>
            <td><?php echo $this->tag->linkTo(array('usuarios/edit/' . $usuario->getIdusuarios(), 'Edit')); ?></td>
            <td><?php echo $this->tag->linkTo(array('usuarios/delete/' . $usuario->getIdusuarios(), 'Delete')); ?></td>
        </tr>
    <?php } ?>
    <?php } ?>
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td><?php echo $this->tag->linkTo(array('usuarios/search', 'First')); ?></td>
                        <td><?php echo $this->tag->linkTo(array('usuarios/search?page=' . $page->before, 'Previous')); ?></td>
                        <td><?php echo $this->tag->linkTo(array('usuarios/search?page=' . $page->next, 'Next')); ?></td>
                        <td><?php echo $this->tag->linkTo(array('usuarios/search?page=' . $page->last, 'Last')); ?></td>
                        <td><?php echo $page->current . '/' . $page->total_pages; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
