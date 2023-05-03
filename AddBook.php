<!DOCTYPE html>
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
    <?php
    if (isset($_REQUEST['AddBook'])) {
        $xml = new DOMDocument();
        $xml->load("biblio.xml");
        $biblio = $xml->getElementsByTagName("biblio")->item(0);
        $livre = $xml->createElement("livre");
        $biblio->appendChild($livre);
        $new_id = uniqid("item_");
        $livre->setAttribute("id", $new_id);
        $titre=$xml->createElement("titre",$_REQUEST['titre']);
        $livre->appendChild($titre);
        $auteurs=$xml->createElement("auteurs");
        $livre->appendChild($auteurs);        
        $auteur=$xml->createElement("auteur");
        $auteurs->appendChild($auteur);
        $nom=$xml->createElement("nom",$_REQUEST['nom']);
        $auteur->appendChild($nom);
        $prenom=$xml->createElement("prenom",$_REQUEST['prenom']);
        $auteur->appendChild($prenom);
        $categorie=$xml->createElement("categorie",$_REQUEST['categorie']);
        $livre->appendChild($categorie);
        $info=$xml->createElement("Info_Emput");
        $livre->appendChild($info);
        $edition=$xml->createElement("edition",$_REQUEST['edition']);
        $info->appendChild($edition);
        $date=$xml->createElement("date_Emprunt",$_REQUEST['date_Emprunt']);
        $info->appendChild($date);
        $image=$xml->createElement("image");
        $src=$image->setAttribute("src","img/".$_REQUEST['image']);
        $livre->appendChild($image);
        $description=$xml->createElement("description",$_REQUEST['description']);
        $livre->appendChild($description);
        $xml->save("biblio.xml");
    }
    ?>
    <!-- Spinner End -->
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
    <!-- Navbar End -->

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Form</h6>
                <h1 class="mb-5">Add A Book</h1>
            </div>
            <div class="collg4 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <form id="myForm" method="post">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="form-floating">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                                    <label class="btn btn-outline-primary" for="btnradio1"><a href="/AddBook.html" style="color: black;">Book</a></label>
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="btnradio2"><a href="/AddReports.html" style="color: black;">Reports</a></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="titre" id="title" placeholder="Book Title">
                                <label for="subject">Book Title</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="nom" id="Fname" placeholder="Author FName">
                                <label for="name">Author FName</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="prenom" id="Lname" placeholder="Author LName">
                                <label for="name">Author LName</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="category" name="categorie" placeholder="Category">
                                <label for="category">Category</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="date" class="form-control" name="date_Emprunt" id="date" placeholder="Date">
                                <label for="date">Date Emprunt</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <select class="form-select" aria-label="Default select example" id="edition" name="edition" placeholder="Edition">
                                    <option selected>Check Edition</option>
                                    <option value="1st Edition">1st Edition</option>
                                    <option value="2nd Edition">2nd Edition</option>
                                    <option value="3rd Edition">3rd Edition</option>
                                    <option value="4th Edition">4th Edition</option>
                                    <option value="More ...">More ...</option>
                                </select>
                                <label for="Edition">Edition</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="file" class="form-control" name="image" id="img">
                                <label for="img">Image</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a message here" id="description" name="description" style="height: 150px"></textarea>
                                <label for="description">Description</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit" name="AddBook">Add Book</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>

</html>