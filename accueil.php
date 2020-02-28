<?php include ('./include/connexion_db.php');?>
<script>
function show(articleId) {
	document.getElementById('card'+articleId).classList.remove('limit_text', 'card-text');
	document.getElementById('btnshow'+articleId).style.display='none';
	document.getElementById('btnhide'+articleId).style.display='inline-block';
}
function hide(articleId) {
	document.getElementById('card'+articleId).classList.add('limit_text', 'card-text');
	document.getElementById('btnshow'+articleId).style.display='inline-block';
	document.getElementById('btnhide'+articleId).style.display='none';
}
</script>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
  <div id="carousel-2" class="carousel slide carousel-fade" data-ride="carousel" data-interval="6000">
        <ol class="carousel-indicators">
            <li data-target="#carousel-2" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-2" data-slide-to="1"></li>
            <li data-target="#carousel-2" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">

            <div class="carousel-item active">
                <a href="https://bootstrapcreative.com/">

                 <img src="images/cochon2.jpg" alt="responsive image" class="d-block img-fluid">

                    <div class="carousel-caption">
                        <div>
                            <p>Ce cochon vous donnera enti&egrave;re satisfaction</p>
                            <span class="btn btn-sm btn-warning">Cochon 1</span>
                        </div>
                    </div>
                </a>
            </div>
            <!-- /.carousel-item -->


            <div class="carousel-item">
                <a href="https://bootstrapcreative.com/">
                 <img src="images/cochon-japonais-buta.jpg" alt="responsive image" class="d-block img-fluid">

                    <div class="carousel-caption justify-content-center align-items-center">
                        <div>

                            <p>Un cochon exotique</p>
                            <span class="btn btn-sm btn-warning">Cochon 2</span>
                        </div>
                    </div>
                </a>
            </div>
            <!-- /.carousel-item -->
            <div class="carousel-item">
                <a href="https://bootstrapcreative.com/">

                 <img src="./images/All_animals.jpg" alt="responsive image" class="d-block img-fluid">


                    <div class="carousel-caption justify-content-center align-items-center">
                        <div>

                            <p>L'&eacute;levage constitue notre coeur de m&eacute;tier</p>
                            <span class="btn btn-sm btn-warning">Cochon 3</span>
                        </div>
                    </div>
                </a>
            </div>
            <!-- /.carousel-item -->
        </div>
        <!-- /.carousel-inner -->
        <a class="carousel-control-prev" href="#carousel-2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- /.carousel -->
</div>
</div>
</div>


<nav class="nav nav-tabs">
  <a class="nav-item nav-link active" href="#p1" data-toggle="tab">Cat&eacute;gorie 1</a>
  <a class="nav-item nav-link" href="#p2" data-toggle="tab">Cat&eacute;gorie 2</a>
</nav>
<div class="tab-content">
  <div class="tab-pane active" id="p1">
  <div class="container">
  	<div class="row">
  		<div class="col-sm-10">
  <div data-role="page">
    <div data-role="header">
    </br>
      <h3>Intervalles de poids</h3>
    </div>
    </br>
    <div data-role="main" class="ui-content">
      <form method="post" action="/action_page_post.php">
        <div data-role="rangeslider">
          <label for="poids-min">Poids:</label>
          <input type="range" name="poids-min" id="poids-min" value="200" min="0" max="1000">
          <label for="poids-max"></label>
          <input type="range" name="poids-max" id="poids-max" value="800" min="0" max="1000">
        </div>
          <input type="submit" data-inline="true" value="Submit">
          <p></p>
        </form>
    </div>
  </div>
  </div>
  </div>
  </div>
  </div>

  <div class="tab-pane" id="p2">Panneau 2</div>
</div>





