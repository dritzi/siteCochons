<?php
include ('./include/connexion.php');

$db=new connexion();

$req="SELECT *
      FROM `cochon`
      WHERE `poids` between '".$_POST["poidsmin"]."' AND '".$_POST["poidsmax"]."'
      ORDER BY `poids` ASC";

$res=$db->query($req);
?>

<div class="container">
<div class="row">

<?php
WHILE ($donnees=$res->fetch())
{
?>
    <div class="card-group mb-5">
                <div class="card">
                    <div class="container w-50">
                        <figure class="figure">
                            <img src="images/cochon7.jpg"  style="100%" class="figure-img img-fluid rounded" alt="Logo HTML w3">
                            <figcaption class="badge badge-secondary">Nos cochons sont élevés en plein air</figcaption>
                        </figure>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Une ligne de texte dans notre première carte.</p>
                        <p class="card-text"><small class="text-muted">Ligne de texte supplémentaire</small></p>
                    </div>
                    <div class="card-footer">Pied de la première carte</div>
                </div>
    </div>
<?php
}?>
</div>
</div>


?>
