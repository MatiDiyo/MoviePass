<?php
    include('header.php');
    include('nav-bar.php');
?>

<div id="listarPeliculasAdmin">
    <form id="refreshMovies" method="POST" action="<?php echo FRONT_ROOT."Movie/RefreshData"?>">
        <div class="container form-cine">
            <div class="row">
                <div class="col-6">
                    <h2>Administrar peliculas</h2>
                </div>
                <div class="col-3">
                    <!--espaciado?-->
                </div>
                <div class="col-3">
                <button type="submit" class="btn btn-dark">Refresh Data</button>
                </div>
            </div>
        </div>
</form>


    <?php
        foreach($movieList as $movie){
    ?>
         <div>
            <span>TITULO:<?php echo $movie->getTitle() ?></span> <br>
            <span>OVERVIEW:<?php echo $movie->getOverview() ?></span><br>
            <span>ID:<?php echo $movie->getId() ?></span>
            <img src="<?php echo 'https://image.tmdb.org/t/p/w500'.$movie->getPosterPath() ?>" alt="">
         </div>
         <hr>
    <?php
        }
    ?>
        
        <div>
           
        </div>

</div>
