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
                        <span class="h5">Funci&oacute;n: <?php echo $showtime->getShowtimeDate()." ".$showtime->getShowtimeTime() ?></span>
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
                                        <div class="qrcode" id="<?php echo $ticket->getId() ?>" data-row="<?php echo $ticket->getRow() ?>" data-column="<?php echo $ticket->getColumn() ?>" >
                                        </div>
                                    </div>
                                    <div class="col-2 card-body">
                                        <span class="h3 card-title">Fila: <?php echo $ticket->getRow() ?></span>
                                    </div>
                                    <div class="col-3 card-body">
                                        <span class="h3 card-title">Fila: <?php echo $ticket->getColumn() ?></span>
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
                <a href="javascript:window.print()">
                    <span class="btn btn-primary">
                    <svg width="80px" height="80px" viewBox="0 0 16 16" class="bi bi-printer" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 2H5a1 1 0 0 0-1 1v2H3V3a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2h-1V3a1 1 0 0 0-1-1zm3 4H2a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h1v1H2a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1z"/>
                        <path fill-rule="evenodd" d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1zM5 8a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H5z"/>
                        <path d="M3 7.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                    </svg>
                    Imprimir Tickets</span>
                </a>
            <hr/>
        </div>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/davidshimjs-qrcodejs@0.0.2/qrcode.min.js"></script>
<script>
    $(document).ready(function(){
        $(".qrcode").each(function(){
            new QRCode($(this).attr("id"), {
                width: 128,
                height: 128,
                colorDark : "#000000",
                colorLight : "#ffffff",
            }).makeCode("Funcion: <?php echo $showtime->getId() ?> - Ticket:"+$(this).attr("id")+".\nFila: "+$(this).data("row")+" - Columna: "+$(this).data("column"));
        })
    });
</script>

<?php
 
 
 include('footer.php');
?>