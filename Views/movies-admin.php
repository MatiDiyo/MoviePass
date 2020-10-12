<?php
    include('header.php');
    include('nav-bar.php');
?>

<div id="listarPeliculasAdmin">
    <form id="refreshMovies" method="POST" action="<?php echo FRONT_ROOT."Movie/RefreshData"?>">
            <section id="admin-movie">
                <div class="container">
                    <div class="listmovie-container">
                        <div class="row">
                            <div class="col-6">
                                <h3>MoviePass</h3>
                                <p>Las peliculas del momento, en tu cine mas cercano.</p>
                            </div>
                            <div class="col-3">
                                <!--espaciado?-->
                            </div>
                            <div class="col-3">
                            <!--<button type="submit" class="btn btn-dark">Refrescar API</button>-->
                            </div>
                        </div>

                    </div>
                    
                </div>
            </section>

            <div id="galery" class="container">

                <div class="row">
                    <?php
                            foreach($movieList as $movie){
                    ?>

                        <div class="col-3">
                            <div class="movie-container">
                                <div class="movie-details">
                                    <a href="">
                                        <h3><?php echo $movie->getTitle() ?></h3>
                                    </a>
                                </div>
                                <a href="">
                                <img src="<?php echo 'https://image.tmdb.org/t/p/w500'.$movie->getPosterPath() ?>" class="img-fluid" alt="movie 1">
                                </a>
                            </div>
                        </div>
                    
                
                    <?php
                        }
                    ?>

                </div>

            </div>
    </form>
        
</div>
