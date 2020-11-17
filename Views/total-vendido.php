<?php
    include('header.php');
    include('nav-bar.php');
?>

<!--
scripts de busqueda
-->

<script>
    function goBack(){
        window.history.back();
    }
    function submitSearch(){
		document.getElementById("searchForm").submit();
	}
</script>

<div id="listarTotales">
    <section id="admin-totales">
        <div class="container">
            <div class="listmovie-container">
                <div class="row">
                    <div class="col-12">
                        <h2>Resultado de Ventas</h2>
                    </div>
                </div>

                <hr>
                
                <form id="searchForm" name="searchForm" class="inline-form" method="GET" action="<?php echo FRONT_ROOT."Showtime/Totals"?>">
                    <label for="cinema" >Por Cine</label><input class="" type="radio" name="filter" value="cinema" id="cinema" <?php echo $filter=="cinema"?"checked='checked'" : "" ?> />
                    <label for="movie" >Por Película</label><input class="" type="radio" name="filter" value="movie" id="movie" <?php echo $filter=="cinema"? "": "checked='checked'" ?>/>
                    <span class="h5 inline-form">Entre Fechas&nbsp;
                    <input class="form-control" type="date" name="dateFrom" value="<?php echo date("Y-m-d",$dateFrom!=null?strtotime($dateFrom):time()) ?>"/>
                    &nbsp;
                    <input class="form-control" type="date" name="dateTo" value="<?php echo date("Y-m-d",$dateTo!=null?strtotime($dateTo):time()) ?>"/>
                    &nbsp;</span>

                    <span class="h4 mouse-activate" onclick="submitSearch();"><i class="fa fa-search" aria-hidden="true"></i></span>
                </form>
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col"><?php echo $filter=="cinema"?"Cine" : "Pelicula" ?></th>
                            <th scope="col">Total vendido</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($totalList as $total){?>
                            <tr>
                                <td><?php echo $filter=="cinema"? $total["cinema"]->getName() : $total["movie"]->getTitle() ?></td>
                                <td><?php echo $total["total"]?></td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>



    





</div>