function AfficherCollapse(element)
{
    if ( document.getElementById(`${element}`).style.display === "none" )
        document.getElementById(`${element}`).style.display = "block";
    else document.getElementById(`${element}`).style.display = "none";
}

function sumbitFormAdd()
{
    let compteur = 0; let i = 1;
    while ( document.getElementById(`serie${i}`) )
    {
        if ( document.getElementById(`serie${i}`) && document.getElementById(`serie${i}`).value == "" )
        {
            document.getElementById(`serie${i}`).classList.remove("border-dark");
            document.getElementById(`serie${i}`).classList.add("border-danger");
            document.getElementById(`serie${i}`).classList.add("border-2");
            compteur++;
        }
        else
        {
            document.getElementById(`serie${i}`).classList.add("border-dark");
            document.getElementById(`serie${i}`).classList.remove("border-danger");
            document.getElementById(`serie${i}`).classList.remove("border-2");
        }
        i++;
    }

    if ( compteur === 0 ) sumbitForm("formAdd");

}

function sumbitForm(id)
{
    document.getElementById(id).submit();
}



// Changement poids

function editPoids(id, rank, muscle)
{
    let td_poids = document.getElementById(`td-weight-${id}-${rank}`);
    let td_poids_boutons = document.getElementById(`td-weight-button-${id}-${rank}`);
    const value = td_poids.innerHTML;
    td_poids.innerHTML = 
    `
        <form method="POST" id="formEditPoids" action="index.php?page=workout">
        <input style="display:none;" name="w" value="${id}">
        <input style="display:none;" name="rank" value="${rank}">
        <input style="display:none;" name="muscle" value="${muscle}">
        <input name="editP" class="form-control" size="1" id="editP" class="border border-dark" value="${value}">
        </form>
    `;
    td_poids_boutons.innerHTML = `
    <div class="d-grid gap-2 d-md-block">
    <button type="button" class="btn btn-success bi bi-check-circle-fill" 
    onclick="sumbitForm('formEditPoids');"></button>
    <button type="button" class="btn btn-danger bi bi-x-circle-fill" 
    onclick="resetForm(${id},${rank},'${muscle}');"></button>
    </div>
    `;
}

function resetForm(id, rank, muscle)
{
    let td_poids = document.getElementById(`td-weight-${id}-${rank}`);
    let td_poids_boutons = document.getElementById(`td-weight-button-${id}-${rank}`); 

    const value = document.getElementById(`editP`).value;

    td_poids.innerHTML = `${value}`;
    td_poids_boutons.innerHTML = `
    <button class='btn btn-dark bi bi-gear-fill' type='button' 
    onclick="editPoids(${id},${rank},'${muscle}');"></button>
    `;
}

// Changement infos workout

function editWorkout(id)
{
    document.getElementById('formEditWorkout').innerHTML += 
    `<input style="display:none;" name="w" value="${id}">`;
    // Entete du formulaire
    document.getElementById('h5-workout-name').innerHTML = 
    `Edit workout ${document.getElementById(`strong-workout-name-${id}`).innerHTML}`;
    // Options select Muscle du formulaire
    let rank = 1;
    document.getElementById('select-edit-muscle').innerHTML = 
    '<option value="-1" selected disabled>Choose</option>';
    while ( document.getElementById(`td-muscle-${id}-${rank}`) )
    {
        let muscle = document.getElementById(`td-muscle-${id}-${rank}`).innerHTML;
        document.getElementById('select-edit-muscle').innerHTML +=
        `<option value="${rank}-${muscle}">#${rank} ${muscle}</option>`;
        rank++;
    }
    document.getElementById(`select-edit-muscle`).
    setAttribute('onchange',`editForm('${id}');`);
}

function editForm(id)
{
    const rank = document.getElementById('select-edit-muscle').value
    .split("-")[0]; 
    // Pointeur sur input
    let inputExercise = document.getElementById('input-edit-exercise');
    let inputSeries = document.getElementById('input-edit-series');
    let inputReps = document.getElementById('input-edit-repetitions');
    let inputWeight = document.getElementById('input-edit-weight');
    // Recup infos
    let tdExercise = document.getElementById(`td-exercise-${id}-${rank}`).innerHTML;
    let tdNo = document.getElementById(`td-no-${id}-${rank}`).innerHTML;
    let tdWeight = document.getElementById(`td-weight-${id}-${rank}`).innerHTML;
    // Séparation séries et répétitions ( [0] = séries [1] = répétitions )
    tdNo = tdNo.split("x"); 
    inputExercise.disabled = inputSeries.disabled = 
    inputReps.disabled = inputWeight.disabled =false;
    inputExercise.value = tdExercise;
    inputSeries.value = tdNo[0];
    inputReps.value = tdNo[1];
    inputWeight.value = tdWeight;
}

function resetWorkout()
{
    let h5 = document.getElementById('h5-workout-name');
    let selectMuscle = document.getElementById('select-edit-muscle');
    let inputExercise = document.getElementById('input-edit-exercise');
    let inputSeries = document.getElementById('input-edit-series');
    let inputReps = document.getElementById('input-edit-repetitions');
    let inputWeight = document.getElementById('input-edit-weight');
    h5.innerHTML = selectMuscle.innerHTML = inputExercise.value =
    inputSeries.value = inputReps.value = inputWeight.value = "";
    inputExercise.disabled = inputSeries.disabled = inputReps.disabled = 
    inputWeight.disabled = true;
}

// Edit Food

function selectMeal(id)
{

}

// Page choisie
 
document.addEventListener('DOMContentLoaded', () => 
{
    const url = document.location.href;
    if ( url === "https://workout-fr.herokuapp.com/index.php?page=workout" )
    {
        document.getElementById('nav-workout').classList.add('active');
        document.getElementById('nav-food').classList.remove('active');
    }
    else if ( url === "https://workout-fr.herokuapp.com/index.php?page=food" )
    {
        document.getElementById('nav-food').classList.add('active');
        document.getElementById('nav-workout').classList.remove('active');
    }
}); 



