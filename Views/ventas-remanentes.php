<?php
    include('header.php');
    include('nav-bar.php');
?>

<!--
scripts de busqueda
-->

<div id="listarVentasyRemanentes">
    <section id="admin-ventas">
        <div class="container">
            <div class="listmovie-container">
                <div class="row">
                    <div class="col-12">
                        <h2>Ventas y Remanentes</h2>
                    </div>
                </div>

                <hr>

                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Pelicula</th>
                            <th scope="col">Cine</th>
                            <th scope="col">Sala</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Entradas vendidas</th>
                            <th scope="col">Entradas disponibles</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($showtimeList as $showtime){?>
                            <tr>
                                <td><?php echo $showtime->getMovie()->getTitle()?></td>
                                <td><?php foreach($cinemaList as $cinema){
                                            if($cinema->getId() == $showtime->getRoom()->getCinema()->getId()){
                                                echo $cinema->getName();
                                            }else{
                                                //echo $showtime->getRoom()->getCinema()->getId();
                                            }
                                        }  
                                ?></td>
                                <td><?php echo $showtime->getRoom()->getName()?></td>
                                <td><?php echo $showtime->getShowtimeDate()?></td>
                                <td><?php echo $showtime->getShowtimeTime()?></td>
                                <td><?php ?>-0-</td>
                                <td><?php echo $showtime->getRoom()->getCapacity()?></td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>



    





</div>