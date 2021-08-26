<?php
 include_once "partials/header.php";
 require_once "../database/dbh.inc.php";
 if($_SERVER['REQUEST_METHOD']=='POST'){
    $room_number=$_POST['room_number'];
    $room_capacity=$_POST['room_capacity'];
    $room_type=$_POST['room_type'];
    $statement=$pdo->prepare("INSERT INTO rooms(room,room_capacity,room_type,branch_id) VALUES(:room,:room_capacity,:room_type,:branch_id)");
    $statement->bindValue(':room',$room_number);
    $statement->bindValue(':room_capacity',$room_capacity);
    $statement->bindValue(':room_type',$room_type);
    $statement->bindValue(':branch_id',$_GET['bid']);
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
        <label class="form-label">Room Number</label>
        <input type="text" class="form-control" name="room_number"?>
        
    </div>
    <div class="col-sm-6 mb-3 mb-sm-0">
        <label class="form-label">Room Capacity</label>
       <input type="number" class="form-control" name="room_capacity">
    </div>
    <div class="col-sm-6 mb-3 mb-sm-0">
        <label class="form-label">Room Type</label>
       <input type="text" class="form-control" name="room_type">
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