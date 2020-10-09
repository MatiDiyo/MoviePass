<?php 
 include('header.php');
 include('nav-bar.php');

?>
<h2>Nuevo Cine</h2>
<div class="content">
    <form id="cinemaForm" method="POST" action="<?php echo FRONT_ROOT."Cinema/Add"?>">
        <label for="nombre">Nombre</label>
        <input type="text" name="cinemaName" id="nombre" placeholder="Nombre del Cine" required />
        <br/>
        <label for="direccion">Direcci&oacute;n</label>
        <input type="text" name="cinemaAddress" id="direccion" placeholder="Calle y N&uacute;mero" required />
        <br/>
        <label for="capacidad">Capacidad</label>
        <input type="number" name="cinemaCapacidad" id="capacidad" placeholder="100" required />
        <br/>
        <button type="submit" class="btn btn-dark" name="submit" >Agregar Cine</button>
        <input type="button" class="btn btn-danger" name="cancel" value="Cancelar" />

    </form>

</div>

<?php
 include('footer.php');
?>