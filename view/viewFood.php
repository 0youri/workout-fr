<br>
<div class="container">
    <div class="card">
        <div class="card-header">
            Food <button class="btn btn-sm bbi bi-pencil-square" type="button"></button>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <div class="badge bg-dark text-wrap">Lunch</div>
            <table class="table table-bordered">
            <tr class="table-light"><th>Aliment</th><th>Kcal</th><th>Lipides</th><th>Glucides</th><th>Protéines</th></tr>
            <?php echo $lunchHTML; ?>
            </table>

            <div class="badge bg-dark text-wrap">Dinner</div>
            <table class="table table-bordered">
            <tr class="table-light"><th>Aliment</th><th>Kcal</th><th>Lipides</th><th>Glucides</th><th>Protéines</th></tr>
            <?php
                echo $dinnerHTML;
            ?>
            </table>

            <div class="badge bg-dark text-wrap">Total</div>
            <table class="table table-bordered">
            <tr class="table-light"><th>Kcal</th><th>Lipides</th><th>Glucides</th><th>Protéines</th></tr>
            <?php
                echo $totalHTML;
            ?>
            </table>
        </div>
    </div>
</div>
<br>