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





// Edit Exercise

function initFormEditExercise(id)
{
    const type = document.getElementById(`span-workout-type-${id}`).innerHTML;
    
    document.getElementById('input-formeditexercise-exercise-id').value = id;
    // Entete du formulaire
    document.getElementById('h5-formeditexercise-workout-name').innerHTML = 
    `Edit workout #${id} - ${type}`;
    
    // Input/Options select Muscle du formulaire
    let rank = 1;
    document.getElementById('select-formeditexercise-muscle').innerHTML = 
    '<option value="-1" selected disabled>Choose</option>';
    while ( document.getElementById(`td-rank-${id}-${rank}`) )
    {
        const muscle = document.getElementById(`td-muscle-${id}-${rank}`).innerHTML;
        const exercise = document.getElementById(`td-exercise-${id}-${rank}`).innerHTML;
        document.getElementById('select-formeditexercise-muscle').innerHTML +=
        `<option value="${rank}-${muscle}">#${rank} - ${muscle} - ${exercise}</option>`;
        rank++;
    }
    document.getElementById(`select-formeditexercise-muscle`).
    setAttribute('onchange',`changeFormEditExerciseSelect('${id}');`);
}

function changeFormEditExerciseSelect(id)
{
    const rank = document.getElementById('select-formeditexercise-muscle').value
    .split("-")[0]; 
    // Pointeur sur input
    let inputExercise = document.getElementById('input-formeditexercise-exercise');
    let inputSeries = document.getElementById('input-formeditexercise-series');
    let inputReps = document.getElementById('input-formeditexercise-repetitions');
    let inputWeight = document.getElementById('input-formeditexercise-weight');
    let inputRank = document.getElementById('input-formeditexercise-rank');
    let inputTime = document.getElementById('input-formeditexercise-time');
    let checkboxDS = document.getElementById('checkbox-formeditexercise-delete-stats');
    let checkboxDE = document.getElementById('checkbox-formeditexercise-delete-exercise');
    // Recup infos
    let tdExercise = document.getElementById(`td-exercise-${id}-${rank}`).innerHTML;
    let tdNo = document.getElementById(`td-no-${id}-${rank}`).innerHTML;
    let tdWeight = document.getElementById(`td-weight-${id}-${rank}`).innerHTML;
    let tdTime = document.getElementById(`td-time-${id}-${rank}`).innerHTML;
    // Séparation séries et répétitions ( [0] = séries [1] = répétitions )
    tdNo = tdNo.split("x"); 
    inputExercise.disabled = inputSeries.disabled = inputReps.disabled 
    = inputWeight.disabled = inputRank.disabled = inputTime.disabled =
    checkboxDE.disabled = checkboxDS.disabled = false;
    inputExercise.value = tdExercise;
    inputSeries.value = tdNo[0];
    inputReps.value = tdNo[1];
    inputWeight.value = tdWeight;
    inputRank.value = rank;
    inputTime.value = tdTime;
}

function sumbitFormEditExercise()
{
    let inputExercise = document.getElementById('input-formeditexercise-exercise');
    let inputSeries = document.getElementById('input-formeditexercise-series');
    let inputReps = document.getElementById('input-formeditexercise-repetitions');
    let inputWeight = document.getElementById('input-formeditexercise-weight');
    let inputRank = document.getElementById('input-formeditexercise-rank');
    let inputTime = document.getElementById('input-formeditexercise-time');
    let checkboxDE = document.getElementById('checkbox-formeditexercise-delete-exercise');

    let id = document.getElementById('input-formeditexercise-exercise-id').value;
    let rank = 1;
    while ( document.getElementById(`td-rank-${id}-${rank}`) )
    {
        rank++;
    }
    alert(rank);
    if ( inputExercise.value != "" && inputWeight.value != "" && inputTime.value != "" &&
    Number(inputSeries.value) !== 0  && Number(inputReps.value) !== 0 && 
    ( Number(inputRank.value) !== 0) && inputRank.value <= rank )
        sumbitForm('formEditExercise');
    else
    {
        // Verif input Exercise
        if ( inputExercise.value == "" )
        {
            inputExercise.classList.add("border-danger");
            inputExercise.classList.add("border-2");
        }
        else
        {
            inputExercise.classList.remove("border-danger");
            inputExercise.classList.remove("border-2");
        }

        // Verif input Weight
        if ( inputWeight.value == "" )
        {
            inputWeight.classList.add("border-danger");
            inputWeight.classList.add("border-2");
        }
        else
        {
            inputWeight.classList.remove("border-danger");
            inputWeight.classList.remove("border-2");
        }
 
        // Verif input Rest period
        if ( inputTime.value == "" )
        {
            inputTime.classList.add("border-danger");
            inputTime.classList.add("border-2");
        }
        else
        {
            inputTime.classList.remove("border-danger");
            inputTime.classList.remove("border-2");
        }

        // Verif input Rank
        if ( Number(inputRank.value) === 0 )
        {
            inputRank.classList.add("border-danger");
            inputRank.classList.add("border-2");
        }
        else
        {
            inputRank.classList.remove("border-danger");
            inputRank.classList.remove("border-2");
        }

        // Verif input Series
        if ( Number(inputSeries.value)  === 0 )
        {
            inputSeries.classList.add("border-danger");
            inputSeries.classList.add("border-2");
        }
        else
        {
            inputSeries.classList.remove("border-danger");
            inputSeries.classList.remove("border-2");
        }

        // Verif input Repetitions
        if ( Number(inputReps.value) === 0  )
        {
            inputReps.classList.add("border-danger");
            inputReps.classList.add("border-2");
        }
        else
        {
            inputReps.classList.remove("border-danger");
            inputReps.classList.remove("border-2");
        }
    }
}

function resetFormEditExercise()
{
    let h5 = document.getElementById('h5-formeditexercise-workout-name');
    let selectMuscle = document.getElementById('select-formeditexercise-muscle');
    let inputExercise = document.getElementById('input-formeditexercise-exercise');
    let inputSeries = document.getElementById('input-formeditexercise-series');
    let inputReps = document.getElementById('input-formeditexercise-repetitions');
    let inputWeight = document.getElementById('input-formeditexercise-weight');
    let inputRank = document.getElementById('input-formeditexercise-rank');
    let inputTime = document.getElementById('input-formeditexercise-time');
    let checkboxDS = document.getElementById('checkbox-formeditexercise-delete-stats');
    let checkboxDE = document.getElementById('checkbox-formeditexercise-delete-exercise');
    h5.innerHTML = selectMuscle.innerHTML = inputExercise.value = inputRank.value =
    inputSeries.value = inputReps.value = inputWeight.value = inputTime.value = "";
    inputExercise.disabled = inputSeries.disabled = inputReps.disabled = 
    inputWeight.disabled = inputRank.disabled = inputTime.disabled =
    checkboxDS.disabled = checkboxDE.disabled = true;
}

// Add Exercise
function sumbitFormAddExercise()
{ 
    let inputRank = document.getElementById('input-add-rank');
    let inputSeries = document.getElementById('input-add-series');
    let inputReps = document.getElementById('input-add-repetitions');
    let inputMuscle = document.getElementById('input-add-muscle');
    let inputExercise = document.getElementById('input-add-exercise');
    let inputWeight = document.getElementById('input-add-weight');
    let inputTime = document.getElementById('input-add-time');

    if ( Number(inputRank.value) !== 0 && Number(inputSeries.value) !== 0 && Number(inputReps.value) !== 0
    && inputMuscle.value != "" && inputExercise.value != "" && inputWeight.value != "" && inputTime.value != "" )
        sumbitForm('formAddExercise');
    else
    {
        // Verif input Muscle
        if ( inputMuscle.value == "" )
        {
            inputMuscle.classList.add("border-danger");
            inputMuscle.classList.add("border-2");
        }
        else
        {
            inputMuscle.classList.remove("border-danger");
            inputMuscle.classList.remove("border-2");
        }

        // Verif input Exercise
        if ( inputExercise.value == "" )
        {
            inputExercise.classList.add("border-danger");
            inputExercise.classList.add("border-2");
        }
        else
        {
            inputExercise.classList.remove("border-danger");
            inputExercise.classList.remove("border-2");
        }

        // Verif input Weight
        if ( inputWeight.value == "" )
        {
            inputWeight.classList.add("border-danger");
            inputWeight.classList.add("border-2");
        }
        else
        {
            inputWeight.classList.remove("border-danger");
            inputWeight.classList.remove("border-2");
        }
 
        // Verif input Rest period
        if ( inputTime.value == "" )
        {
            inputTime.classList.add("border-danger");
            inputTime.classList.add("border-2");
        }
        else
        {
            inputTime.classList.remove("border-danger");
            inputTime.classList.remove("border-2");
        }

        // Verif input Rank
        if ( Number(inputRank.value) === 0 )
        {
            inputRank.classList.add("border-danger");
            inputRank.classList.add("border-2");
        }
        else
        {
            inputRank.classList.remove("border-danger");
            inputRank.classList.remove("border-2");
        }

        // Verif input Series
        if ( Number(inputSeries.value)  === 0 )
        {
            inputSeries.classList.add("border-danger");
            inputSeries.classList.add("border-2");
        }
        else
        {
            inputSeries.classList.remove("border-danger");
            inputSeries.classList.remove("border-2");
        }

        // Verif input Repetitions
        if ( Number(inputReps.value) === 0  )
        {
            inputReps.classList.add("border-danger");
            inputReps.classList.add("border-2");
        }
        else
        {
            inputReps.classList.remove("border-danger");
            inputReps.classList.remove("border-2");
        }
    }
}

function resetFormAddExercise(id)
{
    let inputRank = document.getElementById('input-add-rank');
    let inputSeries = document.getElementById('input-add-series');
    let inputReps = document.getElementById('input-add-repetitions');
    let inputMuscle = document.getElementById('input-add-muscle');
    let inputExercise = document.getElementById('input-add-exercise');
    let inputWeight = document.getElementById('input-add-weight');
    let inputTime = document.getElementById('input-add-time');
    let inputID = document.getElementById('input-add-workout-id');

    // Drop red color and border on input
    inputRank.classList.remove("border-danger");
    inputRank.classList.remove("border-2");
    inputSeries.classList.remove("border-danger");
    inputSeries.classList.remove("border-2");
    inputReps.classList.remove("border-danger");
    inputReps.classList.remove("border-2");
    inputMuscle.classList.remove("border-danger");
    inputMuscle.classList.remove("border-2");
    inputExercise.classList.remove("border-danger");
    inputExercise.classList.remove("border-2");
    inputWeight.classList.remove("border-danger");
    inputWeight.classList.remove("border-2");
    inputTime.classList.remove("border-danger");
    inputTime.classList.remove("border-2");

    // Drop input value 
    inputRank.value = inputSeries.value = inputReps.value = inputMuscle.value = 
    inputExercise.value = inputWeight.value = inputTime.value = "";

    inputID.value = id;
}

// Edit Food

function selectMeal(id)
{

}

// Delete Workout

function deleteWorkout(id)
{
    let strongDW = document.getElementById('strong-delete-workout');
    let inputDW = document.getElementById('input-delete-workout-id');
    let type = document.getElementById(`span-workout-type-${id}`).innerHTML;
    let rank = document.getElementById(`span-workout-rank-${id}`).innerHTML;
    strongDW.innerHTML = `Are you sure you want to delete workout #${rank} ${type} ?`;
    inputDW.value = id;
}

// Selected page 
 
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



