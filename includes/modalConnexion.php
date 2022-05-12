<?php
include 'modalInscription.php';?>

<div class="modal" id="modalConnexion" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Connexion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form-signin form-horizontal" role="form" action="../authentification/traitementConnexion.php" method="post">
                  
          <div class="mb-3">
              <input type="text" name="nomUtilisateur" class="form-control" placeholder="Entrez votre nom d'utilisateur" required="" autofocus="">
          </div>
          <div class="mb-3">
              <input type="password" name="mdp" class="form-control" placeholder="Entrez votre mot de passe" required="">
          </div>
          <div class="mb-3 d-flex justify-content-center">
              <button type="submit" class="btn btn-primary m-1"><span class="glyphicon glyphicon-log-in"></span> Se connecter </button>
              <button type="reset" class="btn btn-primary m-1"><span class="glyphicon glyphicon-log-in"></span> Tout effacer </button>
          </div>
                  
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" class="submit btn btn-secondary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#modalInscription">Je n'ai pas encore de compte</button>
      </div>
    </div>
  </div>
</div>