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
                    <select class="form-select" id="select-edit-muscle">
                    </select>
                </div>
                <br>
                <div>
                    <label>Exercice</label>
                    <input type="text" class="form-control" id="input-edit-exercice" disabled>
                </div>
                <div>
                    <label>Nb séries</label>
                    <input type="text" class="form-control" id="input-edit-series" disabled>
                </div>
                <div>
                    <label>Nb répétitions</label>
                    <input type="text" class="form-control" id="input-edit-repetitions" disabled>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-primary" id="modifquiz">Engresister</button>
            </div>
        </div>
    </div>
</div>