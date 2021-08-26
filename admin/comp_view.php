<?php

include_once "partials/header.php";
include_once "../database/dbh.inc.php";

$statement=$pdo->prepare("SELECT * FROM comments WHERE id=:id");
$statement->bindValue(":id",$_GET["cid"]);
$statement->execute();
$complain=$statement->fetch(PDO::FETCH_ASSOC);


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
        
    <form>
    <div class="col-sm-6 mb-3 mb-sm-0">
        <label class="form-label">Name Of tenant</label>
        <input disabled value ="<?php echo $complain["name"]?>"type="text" class="form-control" name="room_number"?>
        
    </div>
    <div class="col-sm-6 mb-3 mb-sm-0">
        <label class="form-label">Room Number</label>
       <input disabled value="<?php echo $complain["house_number"]?>" type="text" class="form-control" name="room_capacity">
    </div>
    <div class="col-sm-6 mb-3 mb-sm-0">
        <label class="form-label">Branch Name</label>
       <input disabled value="<?php echo $complain["branch_name"]?>"type="text" class="form-control" name="room_type">
    </div>
    <div class="col-sm-6 mb-3 mb-sm-0">
        <label class="form-label">Message</label>
       <textarea disabled value="" class="form-control" name="" id="" cols="4" rows="4"><?php echo $complain["complain"]?></textarea>
    </div>
    <a href="reply.php?tid=<?php echo $complain["tid"]?>&name=<?php echo $complain["name"]?>&mess=<?php echo $complain["complain"]?>&cid=<?php echo $_GET["cid"]?>" class="btn btn-success my-2 mx-2 px-5">Reply</a>
    <a href="complains.php" class="btn btn-danger my-2 mx-2 px-5">Go Back</a>
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