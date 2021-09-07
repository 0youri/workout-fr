<div class="container" id="blockworkout">
    <?php
        echo $workoutHTML;
    ?>
    <br>
</div>


<!-- Edit Workout -->
<div class="modal fade" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="h5-workout-name"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="formEditWorkout" action="index.php?page=workout">
                    <div>
                        <label>Muscle</label>
                        <select class="form-select" onchange="editForm(0);"
                        id="select-edit-muscle" name="select-edit-muscle">
                        </select>
                    </div>
                    <br>
                    <div>
                        <label>Exercise</label>
                        <input type="text" class="form-control"
                        id="input-edit-exercise" name="input-edit-exercise" disabled>
                    </div>
                    <br>
                    <div>
                        <label>No. series</label>
                        <input type="text" class="form-control" 
                        id="input-edit-series" name="input-edit-series" disabled>
                    </div>
                    <br>
                    <div>
                        <label>No. repetitions</label>
                        <input type="text" class="form-control"
                        id="input-edit-repetitions" name="input-edit-repetitions" disabled>
                    </div>
                    <br>
                    <div>
                        <label>Weight</label>
                        <input type="text" class="form-control"
                        id="input-edit-weight" name="input-edit-weight" disabled>
                    </div>
                    <br>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox"
                        id="checkbox-edit" name="checkbox-edit">
                        <label class="form-check-label" for="flexCheckDefault">
                            Delete stats
                        </label>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Reset</button>
                <button type="button" class="btn btn-primary" 
                onclick="sumbitForm('formEditWorkout');">Edit</button>
            </div>
        </div>
    </div>
</div>


<!-- Add Workout -->
<!--
<div class="modal fade" id="modalAddWorkout">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="h5-workout-name">Add Workout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="formEditWorkout" action="index.php?page=workout">
                    <div>
                        <label>Muscle</label>
                        <select class="form-select" onchange="editForm(0);"
                        id="select-edit-muscle" name="select-add-muscle">
                        </select>
                    </div>
                    <br>
                    <div>
                        <label>Exercice</label>
                        <input type="text" class="form-control"
                        id="input-edit-exercice" name="input-edit-exercice" disabled>
                    </div>
                    <br>
                    <div>
                        <label>Nb séries</label>
                        <input type="text" class="form-control" 
                        id="input-edit-series" name="input-edit-series" disabled>
                    </div>
                    <br>
                    <div>
                        <label>Nb répétitions</label>
                        <input type="text" class="form-control"
                        id="input-edit-repetitions" name="input-edit-repetitions" disabled>
                    </div>
                    <br>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox"
                        id="checkbox-edit" name="checkbox-edit">
                        <label class="form-check-label" for="flexCheckDefault">
                            Supprimer les statistiques
                        </label>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Reset</button>
                <button type="button" class="btn btn-primary" 
                onclick="sumbitForm('formEditWorkout');">Edit</button>
            </div>
        </div>
    </div>
</div>


-->