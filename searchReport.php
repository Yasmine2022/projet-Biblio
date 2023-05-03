<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>eLEARNING - eLearning HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="style.module.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0" style="color: #2C547C;"><i style="padding-right: 15px;"><img src="img/logo.png" style="vertical-align: bottom;" width="40px" height="35px"/></i>BiblioNet</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.html" class="nav-item nav-link">Acceuil</a>
                <a href="about.html" class="nav-item nav-link">About</a>
                <a href="Book.php" class="nav-item nav-link">Books</a>
                <a href="Report.php" class="nav-item nav-link">Reports</a>
                <a href="contact.html" class="nav-item nav-link">Contact</a>
            </div>
            <a href="ViewAll.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">View All<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <div class="container">
    <br><br>
        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" >
            <label class="btn btn-outline-primary" for="btnradio1"><a href="/searchBook.php" style="color: black;">Book</a></label>
            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" checked>
            <label class="btn btn-outline-primary" for="btnradio2"><a href="/searchReport.php" style="color: black;">Reports</a></label>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Search Report</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required class="form-control" placeholder="Search data">
                                        <select name="search_field">
                                            <option value="titre">Titre</option>
                                            <option value="specialite">Specialite</option>
                                            <option value="stage">Stage</option>
                                            <option value="date">Date</option>
                                            <option value="encadreur">Encadreur</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Titre</th>
                                    <th>Specialite</th>
                                    <th>Stage</th>
                                    <th>Date</th>
                                    <th>Encadreur</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $search_query = $_GET['search'];
                                $search_field = $_GET['search_field'];
                                $xml = simplexml_load_file('reports.xml');
                                $result = '';

                                foreach ($xml->report as $report) {
                                    $enc=$report->jury->encadreurs;
                                    if (strtolower($report->$search_field) == strtolower($search_query) || strtolower($enc->$search_field) == strtolower($search_query)) {
                                        $result .= '<tr><td>'.$report->titre . '</td><td> ' . $report->specialite . '</td><td> ' . $report->stage . '</td><td>'.$report->date.'</td><td>'.$enc->encadreur.'</td></tr>';
                                    }
                                }

                                if ($result) {
                                    echo $result;
                                } else {
                                    echo 'No results found.';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>