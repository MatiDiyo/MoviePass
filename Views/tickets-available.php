<?php 
 include('header.php');
 include('nav-bar.php');

 
?>

<div id="listaFunciones">
    <div class="container">
        <div class="listcinema-container">
            <form method="post" name="ticketForm" id="ticketForm" action="<?php echo FRONT_ROOT."Ticket/SelectTickets"?>" >
                <input type="hidden" name="showtimeId" id="showtimeId"  />
                <div class="row">
                    <div class="col-9">
                        <h2>Funciones para la Película: <?php echo $movie->GetTitle() ?></h2>
                    </div>
                </div>  
                <hr/>
                <?php
                        if($showtimeList != null && count($showtimeList) >0){
                    ?>
                <div class="row">
                    <?php
                        foreach($showtimeList as $showtime){
                    ?>
                        <div class="col-12" style="margin-bottom:20px;">
                            <div class="card" >
                                <div class="row" style="vertical-align:middle" >
                                    <div class="col-2 card-body">
                                        <span class="h6 card-title"><?php echo $showtime->getShowtimeDate() ?></span>
                                    </div>
                                    <div class="col-2 card-body">
                                        <span class="h6 card-title"><?php echo $showtime->getShowtimeTime() ?></span>
                                    </div>
                                    <div class="col-3 card-body">
                                        <span class="h6 card-title" ><?php echo $showtime->getRoom()->getCinema()->getName()?></span>
                                    </div>
                                    <div class="col-3 card-body">
                                        <span class="h6 card-title" ><?php echo $showtime->getRoom()->getName()?></span>
                                    </div>
                                    <div class="col-2 card-body">
                                        <input class="btn-primary" type="button" value="Comprar entradas" onclick="buyTickets('<?php echo $showtime->getId()?>');" />
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
            </form>
            <hr/>
        </div>

    </div>
</div>
<script>

function buyTickets(showtimeId){
    console.log("Comprando tickets para la funcion:"+ showtimeId);
    $("#showtimeId").val(showtimeId);
    $("#ticketForm").submit();
}
</script>

<?php
 
 
 include('footer.php');
?>