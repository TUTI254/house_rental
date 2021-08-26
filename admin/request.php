<?php
 include_once "partials/header.php";
 require_once "../database/dbh.inc.php";
 $statement=$pdo->prepare("SELECT * FROM requests");
 $statement->execute();
 $requests=$statement->fetchAll(PDO::FETCH_ASSOC);
 /*
 echo '<pre>';
 var_dump($requests);
 echo '<pre>';
 exit
 */
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
          
            <thead>
            
                <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Room Type</th>
                <th scope="col">Location</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($requests as $i => $request):{?>
                <tr>
                    <td><?php echo $i +1?></td>
                    <td><?php echo $request['first_name']?></td>
                    <td><?php echo $request['last_name']?></td>
                    <td><?php echo $request['email']?></td>
                    <td><?php echo $request['room_type']?></td>
                    <td><?php echo $request['location']?></td>
                    <td>
                    <a href="tenant.php?rid=<?php echo $request['id'] ?>"class="btn btn-sm btn-primary">Add Tenant</a>
                    
                    <form action="delete.php" method="POST" style="display:inline-block;">
                    <input type="hidden" name="id" value="<?php echo $request['id'] ?>">
                    <button type="submit" class="btn btn-sm btn-danger">Deny</button>
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