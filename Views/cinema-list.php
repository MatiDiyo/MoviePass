<?php 
 include('header.php');
 include('nav-bar.php');

 
?>

<h2>LISTA DE CINES</h2>
<div id="listaCines">
    <?php
        foreach($cinemaList as $cine){
    ?>
            <div>
                <span>CINE <?php echo $cine->getName() ?></span><br/>
                <span>Direccion: <?php echo $cine->getAddress() ?></span><br/>
                <span>Capacidad: <?php echo $cine->getCapacity() ?></span>
            </div>
            <hr/>
    <?php
        }
    ?>

    <div>
        <a href="<?php echo FRONT_ROOT."Cinema/ShowAddView"?>"><i class="fa fa-plus-square" style="font-size:100px"></i></a>
    </div>

</div>

<?php
 
 
 include('footer.php');
?>