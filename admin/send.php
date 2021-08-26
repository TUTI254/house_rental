<?php 

include_once "partials/header.php";
include_once "../database/dbh.inc.php";

$stmt=$pdo->prepare("SELECT * FROM tenants");
$stmt->execute();
$tenants=$stmt->fetchAll(PDO::FETCH_ASSOC);
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $reply=$_POST["reply"];
    $tid=$_POST["tid"];
    $mess=$_POST["mess"] ?? ' ';
    $statement=$pdo->prepare("INSERT INTO replies (tid,reply,mess) VALUES (:tid,:reply,:mess)");
    $statement->bindValue(":tid",$tid);
    $statement->bindValue(":reply",$reply);
    $statement->bindValue(":mess",$mess);
    $statement->execute();

    $stmt=$pdo->prepare("DELETE FROM comments WHERE id=:id");
    $stmt->bindValue(":id",$_GET["cid"]);
    $stmt->execute();
    header("Location: complains.php");
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
        <label class="form-label">Choose Tenant</label>
        <select name="tid" required class="form-control" id="exampleFormControlSelect1" name="location">
        <?php foreach($tenants as $tenant):{?>
        <option value="<?php echo $tenant["id"]?>"><?php echo $tenant["first_name"].' '.$tenant["last_name"].'---'.$tenant["room_number"]?></option>
        <?php } endforeach;?>
    </select>
    </div>
    <div class="col-sm-6 mb-3 mb-sm-0">
        <label class="form-label">Message</label>
       <textarea value="" style="resize:none;"class="form-control" name="reply" id="" cols="4" rows="4"></textarea>     
    </div>
    <button type="submit" class="btn btn-success my-2 mx-2 px-5">Send</button>
    <a href="complains.php" class="btn btn-danger my-2 mx-2 px-5">Cancel</a>
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