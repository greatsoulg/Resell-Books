<?php
// Select a random image index for each category
$bookVar = rand(2, 4);
$waterVar = rand(1, 5);
$nb = rand(1, 5);
?>

<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo "img/book[" . $bookVar . "].jpg"; ?>" class="d-block w-100" alt="Book" width="500" height="300">
      <div class="carousel-caption d-none d-md-block">
        <h5>"I am not afraid of storms, for I am learning how to sail my ship." ...</h5>
        <p>It's the possibility of having a dream come true that makes life interesting.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?php echo "img/water[" . $waterVar . "].jpg"; ?>" class="d-block w-100" alt="Water" width="500" height="300">
      <div class="carousel-caption d-none d-md-block">
        <h5>Water is beautiful as well as necessary !!!!</h5>
        <p>No one can live without water .</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?php echo "img/nb[" . $nb . "].jpg"; ?>" class="d-block w-100" alt="NatureBook" width="500" height="300">
      <div class="carousel-caption d-none d-md-block">
        <h5> Nature !!!!</h5>
        <p>Nature is as valuable as our mother.</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
