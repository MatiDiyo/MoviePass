<?php
    include('header.php');
    include('nav-bar.php');
?>

<h2>Administras peliculas</h2>
<div id="listarPeliculas">

    <?php
        foreach($movieList as $movie){
    ?>
         <div>
            <span>TITULO:<?php echo $movie->getTitle() ?></span> <br>
            <span>OVERVIEW:<?php echo $movie->getOverview() ?></span><br>
            <span>ID:<?php echo $movie->getId() ?></span>
         </div>
         <hr>
    <?php
        }
    ?>
        
        <div>
           <button type="submit" class="btn btn-primary full-width"><a href="<?php echo FRONT_ROOT."Movie/RefreshData"?>">Refresh Data</a></button>
        </div>

</div>
