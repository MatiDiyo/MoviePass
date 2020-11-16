<?php 
 include('header.php');
 include('nav-bar.php');

$movie = $showtime->getMovie(); 
?>

<div id="listaButacas">
    <div class="container">
        <div class="listcinema-container">
            <form method="post" name="ticketsForm" id="ticketsForm" action="<?php echo FRONT_ROOT."Ticket/BuyTickets"?>" >
                <input type="hidden" name="showtimeId" id="showtimeId" value="<?php echo $showtime->getId()?>" />
                <input type="hidden" name="seats" id="seats" />
                <div class="row">
                    <div class="col-9">
                        <h2>Asientos disponibles</h2>
                        <h4>Película: <?php echo $movie->GetTitle() ?></h4>
                    </div>
                </div>  
                <hr/>
                <?php
                if($seats != null && count($seats) >0){
                    ?>
                <div class="row justify-content-center" style="width:50%; margin-left: 25%;">
                    <div class="col-12" style="padding:5px;">
                        <div class="card" >
                            <div class="col-12 card-body" style="text-align:center">
                                <span class="h4 card-title" >PANTALLA</span>
                            </div>
                        </div>
                    </div>
                    <?php
                        foreach($seats as $idx => $seat){
                            $seatRow = floor($idx/12);
                            $seatColumn = $idx%12;
                    ?>
                        <div class="col-1" style="padding:1px;">
                            <a href="javascript:selectSeat('<?php echo ($seatRow+1)."-".($seatColumn+1)?>');">
                                <img class="seat" id="<?php echo ($seatRow+1)."-".($seatColumn+1)?>" src="<?php echo IMG_PATH."seat.svg" ?>" width="40px"></img>
                            </a>
                        </div>
                <?php
                        }
                    ?>
                </div>
                <?php
                    }
                ?>
            <hr/>
            <div class="row justify-content-center">
                <div class="col-6">
                    <input type="button" class="btn btn-primary" value="Comprar entradas" onclick="buyTickets()"/>
                    <input type="button" class="btn btn-danger" value="Cancelar" onclick=""/>
                </div>
            </div>
            </form>
        </div>

    </div>
</div>
<script>
    function selectSeat(seat){
        $("#"+seat).toggleClass("selected");
    }

    function buyTickets(){
        var tickets = $(".selected");
        if(!tickets.length > 0){
            alert("Debe seleccionar los asientos para continuar");
        }else{
            //Convierto los asientos en un string separado por coma
            var seats ="";
            tickets.toArray().forEach((element)=>{
                seats += element.id + ',';
            });
            $("#seats").val(seats);
            $("#ticketsForm").submit();
        }
    }

</script>
<?php
 
 
 include('footer.php');
?>