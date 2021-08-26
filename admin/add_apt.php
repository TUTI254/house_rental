<?php
 include_once "partials/header.php";
 require_once "../database/dbh.inc.php";
 if($_SERVER['REQUEST_METHOD']=='POST'){
    $apt_name=$_POST['apt_name'];
    $location=$_POST['location'];
    $capacity=$_POST['capacity'];
    $statement=$pdo->prepare("INSERT INTO apartments(name,location,capacity) VALUES(:name,:location,:capacity)");
    $statement->bindValue(':name',$apt_name);
    $statement->bindValue(':location',$location);
    $statement->bindValue(':capacity',$capacity);
    $statement->execute();
 }
 
?>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include_once "partials/sidebar.php"?>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <?php include_once "partials/topbar.php"?>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    
    <form action="" method="POST">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <label class="form-label">Name Of Apartment</label>
        <input type="text" class="form-control" name="apt_name"?>
        
    </div>
    <div class="col-sm-6 mb-3 mb-sm-0">
        <label class="form-label">Capacity</label>
       <input type="text" class="form-control" name="capacity">
    </div>
    <div class="col-sm-6 mb-3 mb-sm-0">
        <label class="form-label">Location</label>
        <select class="form-control" id="exampleFormControlSelect1" name="location">
         <option>Nairobi</option>
        <option>Limuru</option>
        <option>Nakuru</option>
        <option>Naivasha</option>
        <option>Kisumu</option>
    </select>
    </div>
    <button type="submit" class="btn btn-primary my-2 mx-2">Submit</button>
    </form>
            </div>
  </body>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Tuti 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
<?php include_once "partials/footer.php"?>