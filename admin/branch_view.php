<?php
include_once "partials/header.php";
require_once "../database/dbh.inc.php";
$bid=$_GET['bid'] ?? '';
if($_GET['bid']){
    $statement=$pdo->prepare("SELECT * FROM rooms WHERE branch_id=:id");
    $statement->bindValue(':id',$bid);
}
else{
    $statement=$pdo->prepare("SELECT * FROM rooms");
}
$statement->execute();
$rooms=$statement->fetchAll(PDO::FETCH_ASSOC);
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
          <?php if($_GET['bid']):{?>
          <a href="add_room.php?bid=<?php echo $bid?>" class="btn btn-success mb-3 mx-2">Add Room</a>
          <?php }endif ;?>  
          <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Room</th>
                <th scope="col">Room Capacity</th>
                <th scope="col">Room Type</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($rooms as $i => $room):{?>
                <tr>
                    <td><?php echo $i+1?></td>
                    <td><?php echo $room['room']?></td>
                    <td><?php echo $room['room_capacity']?></td>
                    <td><?php echo $room['room_type']?></td>
                    <td><?php echo $room['status']?></td>
                    <td>
                    <a href="update.php?id=<?php echo $room['id'] ?>"class="btn btn-sm btn-primary">Edit</a>
                    <form action="delete.php" method="POST" style="display:inline-block;">
                    <input type="hidden" name="id" value="<?php echo $room['id'] ?>">
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                    </td>
                </tr>
            <?php } endforeach; ?>
            
            </tbody>
            </table>
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