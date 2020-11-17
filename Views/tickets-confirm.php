<?php 
 include('header.php');
 include('nav-bar.php');

$movie = $showtime->getMovie(); 
?>

<div id="listaTickets">
    <div class="container">
        <div class="listcinema-container">
            <div class="row">
                <div class="col-9">
                    <h2>Confirmaci&oacute;n de compra</h2>
                    <h4>Película: <?php echo $movie->GetTitle() ?></h4>
                </div>
            </div>  
            <hr/>
            <?php
            if($seatList != null && count($seatList) >0){
                ?>
            <div class="row" style="width:75%; margin-left: 12.5%;">
                <div class="col-12">
                        <span class="h3">Usted seleccion&oacute; los siguientes asientos:</span>
                </div>
                <?php
                    foreach($seatList as $seat){
                ?>
                    
                <div class="col-12">
                    <span class="h5">Fila: <?php echo $seat->getRow() ?> - Asiento: <?php echo $seat->getColumn() ?> </span>
                </div>
            <?php
                    }
                ?>
            </div>

            <hr/>
            <h3>Total: $<?php echo $total ?></h3>

            <form method="post" name="ticketsForm" id="ticketsForm" action="<?php echo FRONT_ROOT."Ticket/Confirm"?>" >
                <div class="row form-group" style="width:50%; margin-left: 25%;"> 
                    <input type="hidden" name="showtimeId" id="showtimeId" value="<?php echo $showtime->getId() ?>"/>
                    <input type="hidden" name="tickets" id="tickets" value="<?php echo $tickets ?>"/>    
                    <div class="col-12">
                        <span class="h5">Pagar con Tarjeta</span>
                    </div>
                    <div class="col-12">
                        <input type="text" class="form-control" name="cardNumber" id="cardNumber" placeholder="Numero de la tarjeta" required/>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" name="cardExpDate" id="cardExpDate" placeholder="Fecha de expiración" required/>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" name="cardCVV" id="cardCVV" placeholder="Código de verificación" required/>
                    </div>
                    <div class="col-6">
                        <select name="documentType" class="form-control" placeholder="Tipo de documento" >
                            <option value="dni" >DNI</option>
                            <option value="dni" >LE</option>
                            <option value="dni" >LC</option>
                            <option value="dni" >CI</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" name="documentNumber" id="documentNumber" placeholder="Número de documento" required/>
                    </div>
                    <div class="col-12">
                        <input type="text" class="form-control" name="cardOwner" id="cardOwner" placeholder="Titular de la tarjeta" required/>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-6">
                        <input type="button" class="btn btn-primary" value="Confirmar compra" onclick="submitForm()"/>
                        <input type="button" class="btn btn-danger" value="Cancelar" onclick="window.history.back();"/>
                    </div>
                </div>
            </form>
            <?php
                }
                ?>
                
            <hr/>
        </div>

    </div>
</div>
<script src="<?php echo JS_PATH."input.mask.min.js" ?>" ></script>
<script>
    $(document).ready(function(){
        $("#cardNumber").inputmask("(9999-9999-9999-9999)|(9999-999999-999999)");  
        $("#cardExpDate").inputmask("99/99");  
        $("#cardCVV").inputmask("9{3,4}");
        $("#documentNumber").inputmask("99999999");
        //$("#cardOwner").inputmask({mask:"a{1,50}", skipOptionalPartCharacter: " "});
    });

    function submitForm(){
        if(validate()){
            $("#ticketsForm").submit();
        }
    }

    function validate(){
        if( $("#cardNumber").val() == "") { $("#cardNumber").focus(); }
        else if( $("#cardExpDate").val() == "") { $("#cardExpDate").focus(); }
        else if( $("#cardCVV").val() == "") { $("#cardCVV").focus(); }
        else if( $("#documentNumber").val() == "") { $("#documentNumber").focus(); }
        else if( $("#cardOwner").val() == "") { $("#cardOwner").focus(); }
        else {return true;}
        
    }

</script>
<?php
 
 
 include('footer.php');
?>