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





// Changement infos workout

function editWorkout(id)
{
    const type = document.getElementById(`span-workout-type-${id}`).innerHTML;
    document.getElementById('input-edit-workout-id').value = 1;
    document.getElementById('input-edit-workout-type').value = "Full Body";
    document.getElementById('formEditWorkout').innerHTML += 
    `<input style="display:none;" name="w" value="${id}">`;
    // Entete du formulaire
    document.getElementById('h5-edit-workout-name').innerHTML = 
    `Edit workout #${id} - ${type}`;
    // Options select Muscle du formulaire
    let rank = 1;
    document.getElementById('select-edit-muscle').innerHTML = 
    '<option value="-1" selected disabled>Choose</option>';
    while ( document.getElementById(`td-rank-${id}-${rank}`) )
    {
        const muscle = document.getElementById(`td-muscle-${id}-${rank}`).innerHTML;
        const exercise = document.getElementById(`td-exercise-${id}-${rank}`).innerHTML;
        document.getElementById('select-edit-muscle').innerHTML +=
        `<option value="${rank}-${muscle}">#${rank} - ${muscle} - ${exercise}</option>`;
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



