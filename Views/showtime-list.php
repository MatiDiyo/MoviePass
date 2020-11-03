<?php 
 include('header.php');
 include('nav-bar.php');

 
?>

<script>
    
    function editShowtime(id){
        var myForm =document.getElementById("showtimeForm");
        myForm.action = "<?php echo FRONT_ROOT."Showtime/ShowEditView"?>";
        $("#showtimeId").val(id);
        myForm.submit();
    }

    function deleteShowtime(id){
        var myForm =document.getElementById("showtimeForm");
        myForm.action = "<?php echo FRONT_ROOT."Showtime/Remove"?>";
        $("#showtimeId").val(id);
        myForm.submit();
    }
</script>

<div id="listaFunciones">
    <div class="container">
        <div class="listcinema-container">
            <div class="row">
                <div class="col-9">
                    <h2>Funciones para la Sala: <?php echo $room->GetName() ?></h2>
                </div>
                <div class="col-3">
                    <form method="get" action="<?php echo FRONT_ROOT."Showtime/ShowAddView"?>">
                        <input type="hidden" name="roomId" value="<?php echo $room->getId() ?>" />
                        <button type="submit" class="btn btn-dark" >Agregar nueva Funci&oacute;n</button>
                    </form>                        
                </div>
            </div>  
            <hr/>
            <?php
                    if($showtimeList != null && count($showtimeList) >0){
                ?>
            <div class="row">
                    <form method="post" action="" id="showtimeForm">
                        <input type="hidden" id="showtimeId" name="showtimeId" value="" />
                    </form> 
                <?php
                    foreach($showtimeList as $showtime){
                ?>
                    <div class="col-12" style="margin-bottom:20px;">
                        <div class="card" >
                            <div class="row" style="vertical-align:middle" >
                                <div class="col-3 card-body">
                                    <span class="h6 card-title"><?php echo $showtime->getShowtimeDate() ?></span>
                                </div>
                                <div class="col-3 card-body">
                                    <span class="h6 card-title"><?php echo $showtime->getShowtimeTime() ?></span>
                                </div>
                                <div class="col-4 card-body">
                                    <span class="h6 card-title" ><?php echo $showtime->getMovie()->getTitle()?></span>
                                </div>
                                <div class="col-1 card-body">
                                    <a href="javascript:editShowtime('<?php echo $showtime->getId() ?>');">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="col-1 card-body">
                                    <a href="javascript:deleteShowtime('<?php echo $showtime->getId() ?>');">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                        </svg>
                                    </a>
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
                    <span class="h6">No se han encontrado Funciones. Puede crear nuevas Funciones desde el botón "Agregar nueva Función".</span>
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