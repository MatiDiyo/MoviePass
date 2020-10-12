<?php
    include('header.php');
    include('nav-bar.php');
?>

<script>
	function submitSearch(){
		document.getElementById("searchForm").submit();
	}
	
	function submitRefresh(){
		document.getElementById("refreshMovies").submit();
	}
</script>

<div id="listarPeliculasAdmin">
	<section id="admin-movie">
		<div class="container">
			<div class="listmovie-container">
				<div class="row">
					<div class="col-9">
						<h2>MoviePass</h3>
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
			
			
	<div id="galery-container">
		<div id="searchbar" class="container">
			<div class="row">
				<div class="col-auto align-self-start">
					
				</div>
				
				<div class="col"></div>
				
				<div class="col-auto align-self-end">
					<form id="searchForm" name="searchForm" class="inline-form" method="GET" action="<?php echo FRONT_ROOT."Movie/Search"?>">
						<div class="form-inline">
							<span class="h5 inline-form">Buscar&nbsp;</span>
							<input class="form-control" type="datetime-local" name="date" value="<?php echo date("Y-m-d\Th:m") ?>"/>
							&nbsp;
							<select class="form-control" name="theme">
								<?php foreach($themeList as $id => $name){?>
								<option value="<?php echo $id ?>"><?php echo $name ?></option>
								<?php }?>
							</select>
							&nbsp;
							<span class="h4 mouse-activate" onclick="submitSearch();"><i class="fa fa-search" aria-hidden="true"></i></span>
						</div>
					</form>
				</div>
			</div>
		</div>
				
		<div id="galery" class="container">
			<div class="row">
				<div class="col-auto">
					<form class="inline-form" id="refreshMovies" method="POST" action="<?php echo FRONT_ROOT."Movie/RefreshData"?>">
						<span class="h3">Cartelera</span>
						<span class="h4 mouse-activate" onclick="submitRefresh();"><i class="fa fa-refresh" aria-hidden="true"></i></span>
					</form>
				</div>
			</div>
			<div class="row">
				<?php
						foreach($movieList as $movie){
				?>
					<div class="col-3">
						<div class="movie-container">
							<div class="movie-details">
								<a href="">
									<h3 class="border-text"><?php echo $movie->getTitle() ?></h3>
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
	</div>
</div>
