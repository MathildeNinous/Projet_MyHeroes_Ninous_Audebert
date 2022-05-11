<div class="modal" id="modalVisible" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Visibilité de l'histoire</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <p>Êtes-vous sûr de vouloir Rendre visible cette histoire ?</p>
      </div>
      <div class="modal-footer">
        <form method="post" action="../src/supprimerHistoire.php">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <input type="hidden" id="idHistoireARendreVisible" name="idHistoireARendreVisible" value="">
          <button type="submit" name="visible" class="submit btn btn-primary">Confirmer</button>
        </form>
      </div>
    </div>
  </div>
</div>