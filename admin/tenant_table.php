<?php
 include_once "partials/header.php";
 require_once "../database/dbh.inc.php";
 $statement=$pdo->prepare("SELECT * FROM tenants ORDER BY date_in");
 $statement->execute();
 $tenants=$statement->fetchAll(PDO::FETCH_ASSOC);
 
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
                <div class="">
           
            <table class="table">
            <a href="tenant.php" class="btn btn-primary mx-2 my-2">Add Tenant</a>
            <thead>
            
                <tr>
                <th scope="col">Branch</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Date IN</th>
                <th scope="col">Room</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($tenants as $i => $tenant):{?>
                <?php $stmt=$pdo->prepare("SELECT * FROM apartments WHERE id=:bid");
                      $stmt->bindValue(':bid',$tenant['branch_id']);
                      $stmt->execute();
                      $branch=$stmt->fetch(PDO::FETCH_ASSOC);
                ?>
                <tr>
                    <td><?php echo $branch['name']?></td>
                    <td><?php echo $tenant['first_name']?></td>
                    <td><?php echo $tenant['last_name']?></td>
                    <td><?php echo $tenant['date_in']?></td>
                    <td><?php echo $tenant['room_number']?></td>
                    <td>
                    <a href="update.php?id=<?php echo $product['id'] ?>"class="btn btn-sm btn-primary">View</a>
                    
                    <form action="delete.php" method="POST" style="display:inline-block;">
                    <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
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