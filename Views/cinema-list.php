<?php 
 include('header.php');
 include('nav-bar.php');

 
?>


<div id="listaCines">
    <div class="container">
        <div class="listcinema-container"><h2>Administraci&oacute;n de Cines</h2>
            <div class="row">
                <?php
                    foreach($cinemaList as $cine){
                ?>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-img-top cinema-card container">
                                    <div class="row" style="height:inherit">
                                        <div class="col align-self-center">
                                            <span class="h2 border-text"><?php echo $cine->getName() ?></span>
                                        </div>
                                    </div>
                            </div>
                            <div class="card-body">
                                <!--<span class="h5 card-title"><?php echo $cine->getName() ?></span><br/>-->
                                <span class="h5 card-title">Direccion: <?php echo $cine->getAddress() ?></span><br/>
                                <span class="p card-text">Capacidad: <?php echo $cine->getCapacity() ?></span><br/>
                                <span class="p card-text">Precio: <?php echo $cine->getPrice() ?></span>
                            </div>    
                        </div>
                    </div>
                <?php
                    }
                ?>
            </div>
            <hr/>
            <div>
                <a href="<?php echo FRONT_ROOT."Cinema/ShowAddView"?>"><i class="fa fa-plus-square" style="font-size:80px"></i></a>
            </div>
        </div>

    </div>
    

</div>

<?php
 
 
 include('footer.php');
?>