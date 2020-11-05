<?php 
 include('header.php');
 include('nav-bar.php');

 $editing = $cinema != null && $cinema->getId() != null;
 
?>
<script>
    function goBack(){
        window.location = "<?php echo FRONT_ROOT."Cinema/ShowListView"?>";
    }

    function addSala(){
        var form = document.getElementById("roomForm")
        form.action = "<?php echo FRONT_ROOT."Room/ShowAddView"?>";
        form.submit();
    }

    function editSala(){
        var form = document.getElementById("roomForm")
        form.action = "<?php echo FRONT_ROOT."Room/ShowEditView"?>";
        form.submit();
    }

    function showtimes(){
        var form = document.getElementById("roomForm")
        form.action = "<?php echo FRONT_ROOT."Showtime/ShowListView"?>";
        form.submit();
    }

    function deleteSala(){
        if(confirm("Desea eliminar la Sala y todas sus funciones asociadas?"))
        var form = document.getElementById("roomForm")
        form.action = "<?php echo FRONT_ROOT."Room/Remove"?>";
        form.submit();
    }

    function setRoomId(id){
        var roomId = document.getElementById("roomId");
        roomId.value = id;
    }

    function doSubmit(){
        var form = document.getElementById("cinemaForm");
        var validate = true;
        var nombreCine = document.getElementById("nombre").value;
        var direccionCine = document.getElementById("direccion").value;
        var precioCine = document.getElementById("precio").value;
        if(nombreCine == ""){
            alert("El nombre del Cine no puede estar vacío.");
            validate = false;
        }else if(direccionCine == ""){
            alert("La dirección del Cine no puede estar vacía.");
            validate = false;
        }else if(precioCine <= 0){
            alert("El precio de la entrada tiene que ser mayor a 0.");
            validate = false;
        }
        if(validate){
            form.submit();
        }
    }

    <?php if( $cinema != null && count($cinema->getRoomList())>0){ ?>
    $(document).ready(function(){
        $("#roomId").val($("[id^=roomId_]").prop("id").replace("roomId_",""));
        $("#roomCarousel").on("slide.bs.carousel",function(evt){
            var roomId = $(evt.relatedTarget).prop("id").replace("roomId_","");
            $("#roomId").val(roomId);
            //console.log(roomId);
        });
    });
    <?php } ?>
</script>
<div id="addcinema" class="">
    <div class="container">
        <div class="row">
            <div class="col-12 listcinema-container">
                <?php if(!$editing){ ?>
                    <h3><b>Ingresar un nuevo Cine.</b></h3>
                    <p>En esta parte podes ingresar nuevas sucursarles. Para hacer el registro <br>de la sucursal no olvides llenar cada parte del formulario.</p>
                <?php }else{?>
                    <h3><b><?php echo 'Editando Cine: '.$cinema->getName() ?></b></h3>
                    <p>No olvides guardar los cambios.</p>
                <?php }?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mt-4">
                
                <form id="cinemaForm" class="" method="POST" action="<?php echo $editing ? FRONT_ROOT."Cinema/Edit" : FRONT_ROOT."Cinema/Add"?>"> 
                    <?php if($editing){ ?>
                        <input type="hidden" name="cinemaId" value="<?php echo $cinema->getId()?>"/> 
                    <?php } ?>
                    <div class="row">
                        <div class="col-md-12">
                        <h4><?php echo $editing? 'Edición de Cine' : 'Nuevo Cine' ?></h4>
                            <div class="form-group">
                                <input type="text" class="form-control" name="cinemaName" id="nombre" placeholder="Nombre de Sucursal" required
                                    value="<?php echo $editing? $cinema->getName() : '' ?>"
                                    /> 
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="cinemaAddress" id="direccion" placeholder="Direcci&oacute;n" required 
                                    value="<?php echo $editing? $cinema->getAddress() : '' ?>"/> 
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="number" class="form-control" name="cinemaPrice" id="precio" placeholder="Valor de entradas" required 
                                    value="<?php echo $editing? $cinema->getPrice() : '' ?>"/> 
                            </div>
                        </div>

                    </div>
                    <div class="row">
                            <div class="col-md-6 ">
                                <input type="button" class="btn btn-dark" value="<?php echo $editing? 'Guardar cambios' : 'Registrar cine' ?>" onclick="doSubmit()"/>
                            </div>
                            <div class="col-md-6 ">
                                <input type="button" class="btn btn-danger" value="Cancelar" onclick="goBack();"/>
                            </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 mt-4 ">
                <form id="roomForm" class="" method="POST" action=""> 
                    <input type="hidden" id="cinemaId" name="cinemaId" value="<?php echo $cinema->getId() ?>" />
                    <input type="hidden" id="roomId" name="roomId" value="" />
                    <div class="row">
                        <div class="col-12">
                            <span class="h5">Salas</span>
                            <span class="to-the-left">
                                <input type="button" class="btn-sm btn-primary col-auto" value="Agregar Sala" onclick="addSala()" />
                                <?php if(count($cinema->getRoomList()) > 0) { ?>
                                    <input type="button" class="btn-sm btn-secondary col-auto" value="Editar Sala" onclick="editSala()" />
                                    <input type="button" class="btn-sm btn-info" value="Funciones"  onclick="showtimes()" />
                                    <input type="button" class="btn-sm btn-danger" value="Eliminar" onclick="deleteSala()" />
                                <?php }?>
                            </span>
                        </div>
                        <div class="col-12">
                            <?php 
                                if($cinema!= null && count($cinema->getRoomList()) > 0){?>
                                <div id="roomCarousel" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <?php foreach($cinema->getRoomList() as $idx => $room){  ?>
                                            <li data-target="#roomCarousel" data-slide-to="<?php echo $idx?>" class="<?php echo $idx == 0? "active":"" ?>"></li>
                                        <?php }?>
                                    </ol>
                                    <div class="carousel-inner">
                                        <?php
                                        foreach($cinema->getRoomList() as $idx => $room){  ?>
                                            <div class="<?php echo "carousel-item".($idx == 0? " active":"") ?>" id="roomId_<?php echo $room->getId()?>">
                                                <img src="https://upload.wikimedia.org/wikipedia/en/6/67/ELO_Time_expanded_album_cover.jpg" class="d-block w-100" alt="...">
                                                <div class="carousel-caption d-none d-sm-block">
                                                    <h4 class="border-text"><?php echo $room->getName()?></h5>
                                                    <h5 class="border-text"><?php echo 'Capacidad: '.$room->getCapacity().' personas'?></h5>
                                                </div>
                                            </div>
                                        <?php 
                                        } ?>
                                    </div>
                                    <a class="carousel-control-prev" href="#roomCarousel" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#roomCarousel" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            <?php 
                                }else{?>
                                <div>
                                    <span class="h5">El cine no cuenta con salas registradas.</span><br/>
                                    Puede crear nuevas salas desde el boton <span class="h6">Agregar Sala</span>
                                </div>
                            <?php }?>
                        </div>
                        
                </form>
            </div>
        </div>
    </div>
</div>
<?php
 include('footer.php');
?>