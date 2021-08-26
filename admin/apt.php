<?php
 include_once "partials/header.php";
 require_once "../database/dbh.inc.php";
 $statement=$pdo->prepare("SELECT * FROM apartments ORDER BY id");
 $statement->execute();
 $apartments=$statement->fetchAll(PDO::FETCH_ASSOC);
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
                    
                    
            <a href="add_apt.php" class="btn btn-success mb-3 mx-2">Add Apartments</a>
            <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Capacity</th>
                <th scope="col">Number Of Rooms</th>
                <th scope="col">Location</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($apartments as $i => $apartment):{?>
                <tr>
                    <td><?php echo $i+1?></td>
                    <td><?php echo $apartment['name']?></td></a>
                    <td><?php echo $apartment['capacity']?></td></a>
                    <td><?php echo $apartment['capacity']?></td></a>
                    <td><?php echo $apartment['location']?></td></a>
                    <td>
                    <a href="branch_view.php?bid=<?php echo $apartment['id'] ?>"class="btn btn-sm btn-primary">View Branch</a>
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