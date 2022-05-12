<div class="modal" id="modalInscription" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Devenez un Héro !</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="form-signin form-horizontal" role="form" action="../authentification/traitementInscription.php" method="post">
                    <div class="form-group">
                        <div class="mb-3">
                            <input type="text" name="nom" class="form-control" placeholder="Votre nom" required="" autofocus="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <input type="text" name="prenom" class="form-control" placeholder="Votre prénom" required="" autofocus="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <input type="text" name="nomUtilisateur" class="form-control" placeholder="Votre nom d'utilisateur" required="" autofocus="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <input type="password" name="mdp" class="form-control" placeholder="Votre mot de passe" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Votre email" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 d-flex justify-content-center">
                            <button type="submit" class="btn btn-default btn-primary m-1"><span class="glyphicon glyphicon-log-in"></span> S'inscrire </button>
                            <button type="button" class="btn btn-secondary m-1" data-bs-dismiss="modal"> Annuler </button>
                        </div>
                    </div>
                </form>
</div>
    </div>
  </div>
</div>


