<?php
 include_once "partials/header.php";
 require_once "../database/dbh.inc.php";
 $statement=$pdo->prepare("SELECT * FROM comments");
 $statement->execute();
 $complains=$statement->fetchAll(PDO::FETCH_ASSOC);
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
           <a  class=" mx-3 btn btn-success" href="send.php" >Send Message</a>
            <table class=" mx-3 my-3 table">
          
            <thead>
            
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">House Number</th>
                <th scope="col">Branch Name</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($complains as $i => $complain):{?>
                <tr>
                    <td><?php echo $i +1?></td>
                    <td><?php echo $complain["name"]?></td>
                    <td><?php echo $complain['house_number']?></td>
                    <td><?php echo $complain['branch_name']?></td>
                    <td>
                    <a href="comp_view.php?cid=<?php echo $complain["id"]?>" class="btn btn-sm btn-primary">View</a>
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