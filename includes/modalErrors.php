<?php
include '../includes/modalConnexion.php';?>

<div class="modal" id="modalError" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Vous n'êtes pas connecté</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Connectez vous pour lire une histoire</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="submit btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#modalConnexion">Connexion</button>
      </div>
    </div>
  </div>
</div>