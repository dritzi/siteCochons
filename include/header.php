
<nav id="my_nav_bar " class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark">

  <a id="logo" class="navbar-brand" href="" ></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link text-warning <?=($pageId=='accueil'?'active':'') ?>" href="index.php?pageId=accueil">
          <i class="fa fa-home"></i>
          Accueil
          </a>
      </li>
      <li class="nav-item">
         <a class="nav-link text-warning <?=($pageId=='cochons'?'active':'') ?>" href="index.php?pageId=admin&item=cochon">
          <i class="fa fa-envelope-o"></i>
          Cochons
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-warning <?=($pageId=='societe'?'active':'') ?>" href="index.php?pageId=accueil">
          <i class="fa fa-envelope-o"></i>
          Soci&eacute;t&eacute
        </a>
      </li>
     <li class="nav-item">
         <a class="nav-link text-warning <?=($pageId=='contact'?'active':'') ?>" href="index.php?pageId=contact">
           <i class="fa fa-envelope-o"></i>
            Contact
         </a>
       </li>
       </ul>

       <ul class="navbar-nav ml-auto">
       		<li class="nav-item">
                     <a class="nav-link text-danger<?=($pageId=='gestion'?'active':'') ?>" href="index.php?pageId=admin">
                       <i class="fa fa-envelope-o"></i>
                        Gestion
                     </a>
       		</li>
         </ul>
  </div>
</nav>
