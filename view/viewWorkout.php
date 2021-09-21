<div class="container" id="blockworkout">
    <?php
        echo $workoutHTML;
    ?>
    <br>
    <div class="container card-body bg-dark border rounded" style="text-align: center"
        data-bs-toggle="modal" data-bs-target="#modalAddWorkout">
        <a class="container btn-dark bi bi-plus-circle-fill"  href="#"></a>
    </div>
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
                        <label>Workout ID</label>
                        <input type="text" class="form-control"
                        id="input-edit-workout-id" name="input-edit-workout-id">
                    </div>
                    <br>
                    <div>
                        <label>Workout type</label>
                        <input type="text" class="form-control"
                        id="input-edit-workout-type" name="input-edit-workout-type">
                    </div>
                    <br>
                    <div>
                        <label>Muscle</label>
                        <select class="form-select" onchange="editForm(0);"
                        id="select-edit-muscle" name="select-edit-muscle">
                        </select>
                    </div>
                    <br>
                    <div>
                        <label>Rank</label>
                        <input type="text" class="form-control"
                        id="input-edit-rank" name="input-edit-rank" disabled>
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
<div class="modal fade" id="modalAddWorkout">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="h5-workout-name">Add Workout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="formAddWorkout" action="index.php?page=workout">
                    <div>
                        <label>Workout type</label>
                        <input type="text" class="form-control"
                        id="input-add-workout-type" name="input-add-workout-type">
                    </div>
                    <div>
                        <label>Rank</label>
                        <input type="text" class="form-control"
                        id="input-add-workout-rank" name="input-add-workout-rank">
                    </div>
                    <br>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Reset</button>
                <button type="button" class="btn btn-success"
                onclick="sumbitForm('formAddWorkout');">Add</button>
            </div>
        </div>
    </div>
</div>


<!-- Add Exercise -->
<div class="modal fade" id="modalAddWorkout">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="h5-workout-name">Add Workout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="formAddExercise" action="index.php?page=workout">
                    <div>
                        <label>Type</label>
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