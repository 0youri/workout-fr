<br>
<div class="container">
    <div class="card">
        <div class="card-header">
            Food 
            <button class="btn bi bi-gear-wide-connected" type="button"  
            data-bs-toggle="modal"  data-bs-target="#modalFood"></button>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <div class="badge bg-dark text-wrap">Lunch</div>
            <table class="table table-bordered">
            <tr class="table-light">
                <th>Food</th>
                <th>Kcal</th>
                <th>Fats</th>
                <th>Carbs</th>
                <th>Protein</th>
                <th>Amount (g)</th>
            </tr>
            <?php echo $lunchHTML; ?>
            </table>

            <div class="badge bg-dark text-wrap">Dinner</div>
            <table class="table table-bordered">
            <tr class="table-light">
                <th>Food</th>
                <th>Kcal</th>
                <th>Fats</th>
                <th>Carbs</th>
                <th>Protein</th>
                <th>Amount (g)</th>
            </tr>
            <?php
                echo $dinnerHTML;
            ?>
            </table>

            <div class="badge bg-dark text-wrap">Total</div>
            <table class="table table-bordered">
            <tr class="table-light"><th>Kcal</th><th>Fats</th><th>Carbs</th><th>Protein</th></tr>
            <?php
                echo $totalHTML;
            ?>
            </table>
        </div>
    </div>
</div>
<br>



<!-- Edit Food Modal -->
<div class="modal fade" id="modalFood">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Food</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="formFood" action="index.php?page=food">
                    <div>
                        <label>Meal</label>
                        <select class="form-select" onchange="selectMeal(0);"
                        id="select-edit-meal" name="select-edit-meal">
                            <option value="-1">Choose</option>
                            <option value="Lunch">Lunch</option>
                            <option value="Dinner">Dinner</option>
                        </select>
                    </div>
                    <br>
                    <div>
                        <label>Food</label>
                        <select class="form-select" onchange="selectFood(0);"
                        id="select-edit-food" name="select-edit-food">
                        </select>
                    </div>
                    <br>
                    <div>
                        <label>Type of change</label>
                        <select class="form-select" onchange="selectTypeChange(0);"
                        id="select-edit-food" name="select-edit-food">
                            <option value="-1">Choose</option>
                            <option value="Edit">Edit</option>
                            <option value="Delete">Delete</option>                        
                        </select>
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