<div class="container-fluid bg-dark">
            <header>
                <h1 class="fw-bold text-white" style="text-align: center">
                    <a class="link-light" style="text-decoration:none" href="index.php?page=workout">workout-fr</a>
                </h1>
            </header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-top">
                <div class="container-fluid">
                    <!--
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                    aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div  class="collapse navbar-collapse" id="navbarSupportedContent">
                    -->
                    <div>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" id="nav-workout" href="index.php?page=workout">Workout</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="nav-food" href="index.php?page=food">Food</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="nav-food" data-bs-toggle="modal"  
                                data-bs-target="#modalRequestSql" href="#">Request SQL</a>
                            </li>
                            <!--
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=test">Test</a>
                            </li>
                            -->
                        </ul>
                    </div>
                </div>
            </nav>
</div> 



<div class="modal fade" id="modalRequestSql">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="h5-workout-name">Form Request SQL</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="formRequestSql" action="index.php">
                    <div>
                        <label>Request SQL</label>
                        <textarea class="form-control" id="input-request-sql" name="input-request-sql"
                        rows="5"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Reset</button>
                <button type="button" class="btn btn-primary" 
                onclick="sumbitForm('formRequestSql');">Edit</button>
            </div>
        </div>
    </div>
</div>