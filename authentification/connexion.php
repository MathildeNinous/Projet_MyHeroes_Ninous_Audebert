<?php 
    require_once '../includes/head.php';
?>


    <body>
    <div class="container">
        <h2 class="text-center">Connexion</h2>
            <div class="well">
                <form class="form-signin form-horizontal" role="form" action="traitementConnexion.php" method="post">
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                            <input type="text" name="nomUtilisateur" class="form-control" placeholder="Entrez votre nom d'utilisateur" required="" autofocus="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                            <input type="password" name="mdp" class="form-control" placeholder="Entrez votre mot de passe" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                            <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-log-in"></span> Se connecter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <script src="lib/jquery/jquery.min.js"></script>
        <script src="lib/bootstrap/js/bootstrap.min.js"></script>

        <!-- Button -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#popup">Afficher le pop-up</button>

<!-- Pop-up -->
  <div id="popup" class="modal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <p> Entête du pop-up </p>
        </div>
        <div class="modal-body">
          <p> Je suis un magnifique pop-up</p>
        </div>
        <div class="modal-footer">
          <p> Footer du pop-up</p>
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer le popup</button>
        </div>
      </div>
    </div>
  </div>
    </body>
</html>




