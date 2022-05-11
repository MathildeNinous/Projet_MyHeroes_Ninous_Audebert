
<div class="modal" id="modalDelete" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Suppression de l'histoire</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <p>Êtes-vous sûr de vouloir supprimer cette histoire ?</p>
      </div>
      <div class="modal-footer">
        <form method="post" action="../src/supprimerHistoire.php">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <input type="hidden" id="idHistoireASupprimer" name="idHistoire" value="">
          <button type="submit" name="delete" class="submit btn btn-primary">Confirmer</button>
        </form>
      </div>
    </div>
  </div>
</div>