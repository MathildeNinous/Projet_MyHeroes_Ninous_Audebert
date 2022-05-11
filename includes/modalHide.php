
<div class="modal" id="modalHide" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Dissimulation de l'histoire</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <p>Êtes-vous sûr de vouloir cacher cette histoire ?</p>
      </div>
      <div class="modal-footer">
        <form method="post" action="../src/supprimerHistoire.php">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <input type="hidden" id="idHistoireACacher" name="idHistoireCache" value="">
          <button type="submit" name="hide" class="submit btn btn-primary">Confirmer</button>
        </form>
      </div>
    </div>
  </div>
</div>