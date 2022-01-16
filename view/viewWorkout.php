<div class="container" id="blockworkout">
    <br>
<form method="POST" id="formSection" action="index.php?page=workout">
    <select class="form-select" id="select-section-allworkout" name="select-section-allworkout"
    onchange="filterbysection();">
        <?php
            echo $sectionHTML;
        ?>
    </select>
</form>
    <?php
        echo $workoutHTML;
    ?>
    <br>
    <div class="container card-body bg-dark border rounded" style="text-align: center"
        data-bs-toggle="modal" data-bs-target="#modalAddWorkout" onclick="resetFormAddWorkout();">
        <a class="container btn-dark bi bi-plus-circle-fill"  href="#"></a>
    </div>
    <br>
</div>

<!--
    Form Exercise begin
-->


<!-- Edit Exercise -->
<div class="modal fade" id="modalEditExercise">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="h5-formeditexercise-workout-name">Edit Exercise</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="formEditExercise" action="index.php?page=workout">
                    <input style="display:none;"
                    id="input-formeditexercise-id" name="input-formeditexercise-id" value="">
                    <div>
                        <select class="form-select" onchange="changeFormEditExerciseSelect(0);"
                        id="select-formeditexercise-choose" name="select-formeditexercise-choose">
                        </select>
                    </div>
                    <br>
                    <div>
                        <label>Rank</label>
                        <input type="number" class="form-control"
                        id="input-formeditexercise-rank" name="input-formeditexercise-rank" disabled>
                    </div>
                    <div>
                        <label>Muscle</label>
                        <input type="text" class="form-control"
                        id="input-formeditexercise-muscle" name="input-formeditexercise-muscle" disabled>
                    </div>
                    <div>
                        <label>Exercise</label>
                        <input type="text" class="form-control"
                        id="input-formeditexercise-exercise" name="input-formeditexercise-exercise" disabled>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>No. series</label>
                            <input type="number" class="form-control" 
                            id="input-formeditexercise-series" name="input-formeditexercise-series" disabled>
                        </div>
                        <div class="col">
                            <label>No. repetitions</label>
                            <input type="number" class="form-control"
                            id="input-formeditexercise-repetitions" name="input-formeditexercise-repetitions" disabled>
                        </div>
                    </div>
                        <div>
                            <label>Weight</label>
                            <input type="text" class="form-control"
                            id="input-formeditexercise-weight" name="input-formeditexercise-weight" disabled>
                        </div>
                        <div>
                            <label>Rest period</label>
                            <input type="text" class="form-control" 
                            id="input-formeditexercise-time" name="input-formeditexercise-time" disabled>
                        </div>
                    <br>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox"
                        id="checkbox-formeditexercise-delete-stats" name="checkbox-formeditexercise-delete-stats" disabled>
                        <label class="form-check-label" for="flexCheckDefault">
                            Delete stats
                        </label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox"
                        id="checkbox-formeditexercise-delete-exercise" name="checkbox-formeditexercise-delete-exercise"
                        disabled>
                        <label class="form-check-label text-danger" for="flexCheckDefault">
                            Delete exercise <i class="bi bi-exclamation-circle-fill"></i>
                        </label>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Reset</button>
                <button type="button" class="btn btn-primary" 
                onclick="sumbitFormEditExercise();">Edit</button>
            </div>
        </div>
    </div>
</div>

<!-- Add Exercise -->
<div class="modal fade" id="modalAddExercise">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="h5-exercise-name">Add Exercise</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                
            </div>
            <div class="modal-body">
                <form method="POST" id="formAddExercise" action="index.php?page=workout">
                    <input style="display:none;" type="text" class="form-control" 
                    id="input-formaddexercise-id" name="input-formaddexercise-id" value="">
                    <div>
                        <label>Muscle</label>
                        <input type="text" class="form-control"
                        id="input-formaddexercise-muscle" name="input-formaddexercise-muscle" >
                    </div>
                    <br>
                    <div>
                        <label>Exercise</label>
                        <input type="text" class="form-control"
                        id="input-formaddexercise-exercise" name="input-formaddexercise-exercise">
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label>No series</label>
                            <input type="number" class="form-control" 
                            id="input-formaddexercise-series" name="input-formaddexercise-series" >
                        </div>
                        <div class="col">
                            <label>No repetitions</label>
                            <input type="number" class="form-control"
                            id="input-formaddexercise-repetitions" name="input-formaddexercise-repetitions">
                        </div>
                    </div>
                    <br>
                    <div>
                        <label>Weight (kg)</label>
                        <input type="text" class="form-control"
                        id="input-formaddexercise-weight" name="input-formaddexercise-weight">
                    </div>
                    <br>
                    <div>
                        <label>Rest period (min)</label>
                        <input type="text" class="form-control"
                        id="input-formaddexercise-time" name="input-formaddexercise-time">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Reset</button>
                <button type="button" class="btn btn-success" 
                onclick="sumbitFormAddExercise();">Add</button>
            </div>
        </div>
    </div>
</div>


<!--
    Form Exercise end
-->


<!-- 
    Form Workout begin 
-->


<!-- Add Workout -->
<div class="modal fade" id="modalAddWorkout">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="h5-workout-name">Add Workout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="formAddWorkout" name="formAddWorkout" action="index.php?page=workout">
                    <div>
                        <label>Workout type</label>
                        <input type="text" class="form-control"
                        id="input-formaddworkout-type" name="input-formaddworkout-type">
                    </div>
                    <div>
                        <label>Rank</label>
                        <input type="number" class="form-control"
                        id="input-formaddworkout-rank" name="input-formaddworkout-rank">
                    </div>
                    <br>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Reset</button>
                <button type="button" class="btn btn-success"
                onclick="sumbitFormAddWorkout();">Add</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Workout -->
<div class="modal fade" id="modalDeleteWorkout">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="formDeleteWorkout" name="formDeleteWorkout" action="index.php?page=workout">
                    <input style="display:none;" type="text" class="form-control" 
                    id="input-formdeleteworkout-info" name="input-formdeleteworkout-info" value="">
                    <strong class="fs-6" id="strong-delete-workout"></strong>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Reset</button>
                <button type="button" class="btn btn-danger"
                onclick="sumbitForm('formDeleteWorkout');">Delete</button>
            </div>
        </div>
    </div>
</div>


<!--
    Form Workout end
-->

<!--
Delete Exercise 
<div class="modal fade" id="deleteExercise">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="formDeleteWorkout" name="formDeleteWorkout" action="index.php?page=workout">
                    <input style="display:none;" type="text" class="form-control" 
                    id="input-delete-workout-id" name="input-delete-workout-id" value="">
                    <strong class="fs-6" id="strong-delete-workout"></strong>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Reset</button>
                <button type="button" class="btn btn-danger"
                onclick="sumbitForm();">Delete</button>
            </div>
        </div>
    </div>
</div>

-->