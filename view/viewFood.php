<br>
<div class="container">
    <div class="card">
        <div class="card-header">Food</div>
        <div class="card-body">
        <div class="table-responsive">
            <div class="badge bg-dark text-wrap">Lunch</div>
            <table class="table table-bordered">
            <th>Aliment</th><th>Kcal</th><th>Lipides</th><th>Glucides</th><th>Protéines</th>
            <?php echo $lunchHTML; ?>
            </table>

            <div class="badge bg-dark text-wrap">Dinner</div>
            <table class="table table-bordered">
            <th>Aliment</th><th>Kcal</th><th>Lipides</th><th>Glucides</th><th>Protéines</th>
            <?php
                echo $dinnerHTML;
            ?>
            </table>

            <div class="badge bg-dark text-wrap">Total</div>
            <table class="table table-bordered">
            <th>Kcal</th><th>Lipides</th><th>Glucides</th><th>Protéines</th>
            <?php
                echo $totalHTML;
            ?>
            </table>
        </div>
    </div>
</div>
<br>