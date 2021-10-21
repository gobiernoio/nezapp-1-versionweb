<div class="cuadro_emergente">

<p>Esta &aacute;rea es de uso restringido, porfavor coloca tu usuario y contrase&ntilde;a para accesar al sitio.</p>

<form action="validar_usuario.php" method="post" enctype="multipart/form-data">
    Nombre:<br />
    <input type="text" name="usuario" class=":required" /><br />
    Password:<br />
    <input type="hidden" name="url_destino" value="<?php echo '..'.$_SERVER['PHP_SELF']; ?>" />
    <input type="password" name="password" class=":required" /><br />
    <input type="submit" value="entrar" />
</form>
</div>