<?php 
 include('header.php');
 include('nav-bar.php');

 
?>


<div id="listaCines">
    <div class="container">
        <div class="listcinema-container"><h2>LISTA DE CINES</h2>
            <?php
                foreach($cinemaList as $cine){
            ?>
                    <div>
                        <span>Cine: <?php echo $cine->getName() ?></span><br/>
                        <span>Direccion: <?php echo $cine->getAddress() ?></span><br/>
                        <span>Capacidad: <?php echo $cine->getCapacity() ?></span><br/>
                        <span>Precio: <?php echo $cine->getPrice() ?></span>
                    </div>
                    <hr/>
            <?php
                 }
            ?>

            <div>
                <a href="<?php echo FRONT_ROOT."Cinema/ShowAddView"?>"><i class="fa fa-plus-square" style="font-size:100px"></i></a>
            </div>
        </div>

    </div>
    

</div>

<?php
 
 
 include('footer.php');
?>