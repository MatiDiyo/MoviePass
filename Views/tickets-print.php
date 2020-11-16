<?php 
 include('header.php');
 include('nav-bar.php');

 
?>

<div id="listaTickets">
    <div class="container">
        <div class="listcinema-container">
                <div class="row">
                    <div class="col-9">
                        <h2>Operacion exitosa!</h2>
                    </div>
                </div>  
                <hr/>
                <?php
                        if($ticketList != null && count($ticketList) >0){
                    ?>
                <div class="row">
                    <div class="col-12">
                        <span class="h4">N&uacute;mero de operaci&oacute;n: <?php echo $operation->getId() ?></span>
                    </div>
                    <div class="col-12">
                        <span class="h5">Funci&oacute;n: <?php echo $showtime->getShowtimeDate()." ".$showtime->getShowtimeDate() ?></span>
                    </div>
                </div>
                <div class="row">
                    <?php
                        foreach($ticketList as $ticket){
                    ?>
                        <div class="col-12" style="margin-bottom:20px;">
                            <div class="card" >
                                <div class="row" style="vertical-align:middle" >
                                    <div class="col-2 card-body">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-upc-scan" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"/>
                                            <path d="M3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-7zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7z"/>
                                        </svg>
                                    </div>
                                    <div class="col-2 card-body">
                                        <span class="h6 card-title">Fila: <?php echo $ticket->getRow() ?></span>
                                    </div>
                                    <div class="col-3 card-body">
                                        <span class="h6 card-title">Fila: <?php echo $ticket->getColumn() ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                        }
                    ?>
                </div>
                <?php
                    }
                ?>
            <hr/>
        </div>

    </div>
</div>
<script>
</script>

<?php
 
 
 include('footer.php');
?>