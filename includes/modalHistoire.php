<?php
    include 'modalDelete.php';
?>

<div class="modal" id="modalHistoire" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger idHistoire" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#modalDelete" >Supprimer</button>
        <button type="button" class="submit btn btn-primary">Voir</button>
      </div>
    </div>
  </div>
</div>