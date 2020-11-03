<?php 
 include('header.php');
 include('nav-bar.php');

 
?>


<div id="listaCines">
    <div class="container">
        <div class="listcinema-container">
            <div class="row">
                <div class="col-9">
                    <h2>Sucursales</h2>
                </div>
                <div class="col-3">
                    <form method="get" action="<?php echo FRONT_ROOT."Cinema/ShowAddView"?>">
                        <button type="submit" class="btn btn-dark" >Agregar nuevo cine</button>
                    </form>                        
                </div>
            </div>  
            <hr/>
            <?php
                    if($cinemaList != null){
                ?>
            <div class="row">
                <?php
                    foreach($cinemaList as $cinema){
                ?>
                    <div class="col-3" style="margin-bottom:20px;">
                        <div class="card">
                            <div class="card-img-top cinema-card container">
                                    <div class="row" style="height:inherit">
                                        <div class="col align-self-center">
                                            <span class="h2 border-text"><?php echo $cinema->getName() ?></span>
                                        </div>
                                    </div>
                            </div>
                            <div class="card-body">
                                <span class="h5 card-title">Direccion: <?php echo $cinema->getAddress() ?></span><br/>

                                <span class="p card-text">Precio: $<?php echo $cinema->getPrice() ?></span>
                                <hr/>
                                <div class="row">
                                    <form class="col" method="POST" action="<?php echo FRONT_ROOT."Cinema/ShowEditView"?>">
                                        <button type="submit" name="id" class="btn-dark btn-sm btn-block" value="<?php echo $cinema->getId() ?>">Administrar</button>
                                    </form>
                                    <form class="col-5" method="POST" action="<?php echo FRONT_ROOT."Cinema/Remove"?>">
                                        <button type="submit" name="id" class="btn-danger btn-sm btn-block" value="<?php echo $cinema->getId() ?>">Eliminar</button>
                                    </form>
                                </div>
                            </div>    
                        </div>
                    </div>
            <?php
                    }
                ?>
            </div>
            <?php
                }else{
            ?>
            <div class="row">
                <div clasS="col-12">
                    <span class="h6">No se han encontrado cines. Ingrese uno desde el botón "Agregar nuevo cine".</span>
                </div>
            </div>
            <?php
                }
            ?>
            <hr/>
        </div>

    </div>
</div>

<?php
 
 
 include('footer.php');
?>