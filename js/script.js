function AfficherCollapse(element)
{
    if ( document.getElementById(`${element}`).style.display === "none" )
        document.getElementById(`${element}`).style.display = "block";
    else document.getElementById(`${element}`).style.display = "none";
}

function sumbitFormAdd()
{
    let nbSeries;
    if ( document.getElementById(`serie4`) ) nbSeries = 4;
    else nbSeries = 3;
    let compteur = 0;
    for (let i = 1; i <= nbSeries; i++)
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
    }

    if ( compteur === 0 ) sumbitForm("formAdd");

}

function sumbitForm(id)
{
    document.getElementById(id).submit();
}

function resetForm(id,muscle)
{
    let td_poids = document.getElementById(`td-poids${id}`);
    let td_poids_boutons = document.getElementById(`td-poids-boutons${id}`); 

    const value = document.getElementById(`editP`).value;

    td_poids.innerHTML = `${value}`;
    td_poids_boutons.innerHTML = `
    <button class='btn btn-dark bi bi-gear-fill' type='button' 
    onclick="editPoids('${id}','${muscle}');"></button>
    `;
}

function editPoids(id, muscle)
{
    let td_poids = document.getElementById(`td-poids${id}`);
    let td_poids_boutons = document.getElementById(`td-poids-boutons${id}`);
    const value = td_poids.innerHTML;
    td_poids.innerHTML = 
    `
        <form method="POST" id="formEdit" action="index.php?page=workout">
        <input style="display:none;" name="w" value="${id[0]}">
        <input style="display:none;" name="muscle" value="${muscle}">
        <input name="editP" class="form-control" size="1" id="editP" class="border border-dark" value="${value}">
        </form>
    `;
    td_poids_boutons.innerHTML = `
    <div class="d-grid gap-2 d-md-block">
    <button type="button" class="btn btn-success bi bi-check-circle-fill" 
    onclick="sumbitForm('formEdit');"></button>
    <button type="button" class="btn btn-danger bi bi-x-circle-fill" 
    onclick="resetForm('${id}','${muscle}');"></button>
    </div>
    `;
}

function editWorkout(id)
{
    // Entete du formulaire
    document.getElementById('h5-workout-name').innerHTML = 
    `Edit workout ${document.getElementById(`strong-workout-name-${id}`).innerHTML}`;
    // Options select Muscle du formulaire
    let nb = 1;
    document.getElementById('select-edit-muscle').innerHTML = 
    '<option value="-1" selected disabled>Choisir</option>';
    while ( document.getElementById(`td-muscle-${id}-${nb}`) )
    {
        let muscle = document.getElementById(`td-muscle-${id}-${nb}`).innerHTML;
        document.getElementById('select-edit-muscle').innerHTML +=
        `<option value="${muscle}">${muscle}</option>`;
        nb++;
    }
    document.getElementById(`select-edit-muscle`).
    setAttribute('onchange',`editForm('${id}');`);
}

function editForm(id)
{
    const muscle = document.getElementById('select-edit-muscle').value;
    let inputExercice = document.getElementById('input-edit-exercice');
    let inputSeries = document.getElementById('input-edit-series');
    let inputReps = document.getElementById('input-edit-repetitions');
    let tdExercice = document.getElementById(`td-exercice-${id}-${muscle}`).innerHTML;
    let tdNb = document.getElementById(`td-nb-${id}-${muscle}`).innerHTML;
    // Séparation séries et répétitions ( [0] = séries [1] = répétitions )
    tdNb = tdNb.split("x"); 
    inputExercice.disabled = inputSeries.disabled = inputReps.disabled = false;
    inputExercice.value = tdExercice;
    inputSeries.value = tdNb[0];
    inputReps.value = tdNb[1];
}

function resetWorkout()
{
    let h5 = document.getElementById('h5-workout-name');
    let selectMuscle = document.getElementById('select-edit-muscle');
    let inputExercice = document.getElementById('input-edit-exercice');
    let inputSeries = document.getElementById('input-edit-series');
    let inputReps = document.getElementById('input-edit-repetitions');
    h5.innerHTML = selectMuscle.innerHTML = inputExercice.innerHTML =
    inputSeries.innerHTML = inputReps.innerHTML = "";
    inputExercice.disabled = inputSeries.disabled = inputReps.disabled = true;
}

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



