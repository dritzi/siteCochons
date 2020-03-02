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
                    <img src="images/cochon5.jpg" alt="responsive image" class="d-block img-fluid">
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
                    <img src="./images/cochon6.jpeg" alt="responsive image" class="d-block img-fluid">
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
</div>
</div>

 <!-- /.carousel -->


<!--------------------------Section Catégories----------------------------------------------->
<!-- Nav tabs -->
<ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#p1" role="tab" aria-controls="home" aria-selected="true">CATEGORIE 1</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#p2" role="tab" aria-controls="profile" aria-selected="false">CATEGORIE 2</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="p1" role="tabpanel" aria-labelledby="home-tab">
    <div class="container">
          <div class="row">
                 <div class="col-sm-5" id="p1">
                        <div class="input-group">
                                <div class="input-group-btn">
                                 <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                    <li><a href="#" title="Lien 1">Lien 1</a></li>
                                    <li><a href="#" title="Lien 2">Lien 2</a></li>
                                    <li><a href="#" title="Lien 3">Lien 3</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#" title="Lien 4">Lien 4</a></li>
                                    </ul>
                                </div>
                        <input type="text" class="form-control" aria-label="...">
                        </div>
                 </div>
                 <div class="col-sm-5" id="p1">
                        <div class="input-group">
                                  <div class="input-group-btn">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                        <li><a href="#" title="Lien 1">Lien 1</a></li>
                                        <li><a href="#" title="Lien 2">Lien 2</a></li>
                                        <li><a href="#" title="Lien 3">Lien 3</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#" title="Lien 4">Lien 4</a></li>
                                        </ul>
                                  </div>
                        <input type="text" class="form-control" aria-label="...">
                        </div>
                 </div>


          </div>
          </br>
          <button type="button" class="btn btn-sm btn-primary">Soumettre</button>
    </div>
  </div>

  <div class="tab-pane" id="p2" role="tabpanel" aria-labelledby="profile-tab">
        <div class="container" >
              <div class="row" >
                      <div class="col-sm-10" id="p2">
                              <div data-role="page">
                                       <div data-role="header">
                                        </br>
                                        <h3>Intervalles de poids</h3>
                                         </br>
                                       </div>

                                       <div data-role="main" class="ui-content" id="ui-content">
                                       <form method="post" action="/action_page_post.php">
                                           <div data-role="rangeslider" >
                                           <label for="poids-min">Poids:</label>
                                           <input type="range" name="poids-min" id="poids-min" value="200" min="0" max="1000">
                                           <label for="poids-max"></label>
                                           <input type="range" name="poids-max" id="poids-max" value="800" min="0" max="1000">
                                       </div>

                                       <button type="button" class="btn btn-sm btn-primary">Soumettre</button>
                                       </form>
                              </div>
                      </div>
              </div>
        </div>
  </div>
</div>


 <!---------------------------------------Section cartes--------------------------------------------------->
 <div class="col-12 mt-3">
       <div class="card">
               <div class="card-horizontal" >
               <div class="use-cover-background square" style="background-image: url(images/cochon2.jpg)"></div>
                        <!--<div class="img-square-wrapper" >
                             <img class="" src="http://via.placeholder.com/300x180" alt="Card image cap">
                        </div>-->
                        <div class="card-body">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content
                            </p>
                                <div class="d-flex justify-content-around" id ="btnbck1">
                                    <button type="submit" class="btn btn-sm md-auto">CONTACT</button>
                                    <button type="submit" class="btn btn-sm md-auto" >DETAILS</button>
                                </div>
                        </div>
               </div>
       </div>
  </div>
         <div class="col-12 mt-3">
                <div class="card">
                        <div class="card-horizontal" >
                        <div class="use-cover-background square" style="background-image: url(images/cochon5.jpg)"></div>
                                 <!--<div class="img-square-wrapper" >
                                      <img class="" src="http://via.placeholder.com/300x180" alt="Card image cap">
                                 </div>-->
                                 <div class="card-body">
                                     <h4 class="card-title">Card title</h4>
                                     <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content
                                     </p>
                                         <div class="d-flex justify-content-around" id ="btnbck1">
                                             <button type="submit" class="btn btn-sm md-auto">CONTACT</button>
                                             <button type="submit" class="btn btn-sm md-auto" >DETAILS</button>
                                         </div>
                                 </div>
                        </div>
                </div>
           </div>




