<div class="container" id="blockworkout">
    <?php
        echo $workoutHTML;
    ?>
    <br>
</div>


<div class="modal fade" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="h5-workout-name"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <label>Muscle</label>
                    <select class="form-select" onchange="editForm(0);"
                    id="select-edit-muscle" name="select-edit-muscle">
                    </select>
                </div>
                <br>
                <div>
                    <label>Exercice</label>
                    <input type="text" class="form-control"
                    id="input-edit-exercice" name="input-edit-exercice" disabled>
                </div>
                <div>
                    <label>Nb séries</label>
                    <input type="text" class="form-control" 
                    id="input-edit-series" name="input-edit-series" disabled>
                </div>
                <div>
                    <label>Nb répétitions</label>
                    <input type="text" class="form-control"
                    id="input-edit-repetitions" name="input-edit-repetitions" disabled>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="input-check">
                    <label class="form-check-label">Supprimer les statistiques</label>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-primary" id="modifquiz">Engresister</button>
            </div>
        </div>
    </div>
</div>