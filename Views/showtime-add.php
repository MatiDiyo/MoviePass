<?php 
 include('header.php');
 include('nav-bar.php');

 $editing = $showtime != null && $showtime->getId() != null;
 
?>
<script>
    function goBack(){
        window.location = "<?php echo FRONT_ROOT."Showtime/ShowListView?cinemaId=".$cinemaId."&roomId=".$roomId?>";
    }

    function formSubmit(){
        var myForm = document.getElementById("showtimeForm");

        if(!$("[name='movieId']:checked").val()){
            alert("Debe elegir una película");
        }else{
            myForm.submit();
        }
    }
</script>
<div id="addshowtime" class="">
    <div class="container">
        <div class="row">
            <div class="col-12 listcinema-container">
                <?php if(!$editing){ ?>
                    <h3><b>Agregar una nueva Funcion.</b></h3>
                    <p>Por favor ingrese fecha y hora de la funci&oacute;n y la seleccione la pel&iacute;cula presentar.</p>
                <?php }else{?>
                    <h3><b><?php echo 'Editando Función: '.$showtime->getShowtimeDate()." - ".$showtime->getShowtimeTime() ?></b></h3>
                    <p>No olvides guardar los cambios.</p>
                <?php }?>
            </div>
        </div>
        <form id="showtimeForm" class="" method="POST" action="<?php echo $editing ? FRONT_ROOT."Showtime/Edit" : FRONT_ROOT."Showtime/Add"?>"> 
            <div class="row">
                <div class="col-6">
                
                    <input type="hidden" name="roomId" value="<?php echo $roomId ?>"/> 
                    <?php if($editing){ ?>
                        <input type="hidden" name="showtimeId" value="<?php echo $showtime->getId()?>"/> 
                    <?php } ?>
                    <div class="row">
                        <div class="col-md-12">
                            <h4><?php echo $editing? 'Edición de Función' : 'Nueva Función' ?></h4>
                            <div class="form-group">
                                <input type="date" class="form-control" name="showtimeDate" id="fecha"  required
                                    value="<?php echo ($editing ? $showtime->getShowtimeDate() : date("Y-m-d") ) ?>" /> 
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="time" class="form-control" name="showtimeTime" id="hora" required 
                                value="<?php echo ($editing ? $showtime->getShowtimeTime() : date("h:m") ) ?>" /> 
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <input type="button" class="btn btn-dark" onclick="formSubmit();" value="<?php echo $editing? 'Guardar cambios' : 'Crear función' ?>"/>
                        </div>
                        <div class="col-md-6 ">
                            <input type="button" class="btn btn-danger" value="Cancelar" onclick="goBack();"/>
                        </div>
                    </div>
                    
                </div>
                <div class="col-6">
                    <ul class="list-group">
                        <span class="h6">Pel&iacute;culas</span>
                        <?php foreach($movieList as $movie){?>
                                <div class="card" >
                                    <div class="row" >
                                        <div class="col-8 card-body">
                                            <span class="h5 card-title" style="vertical-align:middle"><?php echo $movie->getTitle()?></span>
                                        </div>
                                        <div class="col-4">
                                            <input type="radio" name="movieId" style="margin:10%" value="<?php echo $movie->getId()?>" class="to-the-right big-radio" required
                                            <?php echo (($editing && $showtime->getMovie()->getId() == $movie->getId()) ? "checked='checked'" : "") ?>
                                            />
                                        </div>
                                    </div>
                                </div>
                        <?php }?>
                    </ul>
                </div>
                

            </div>
        </form>
    </div>
</div>
<?php
 include('footer.php');
?>