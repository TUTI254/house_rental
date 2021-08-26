<?php
 include_once "partials/header.php";
 require_once "../database/dbh.inc.php";
 $statement=$pdo->prepare("SELECT * FROM payments_records ORDER BY id");
 $statement->execute();
 $payments=$statement->fetchAll(PDO::FETCH_ASSOC);
 
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
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Room Number</th>
                <th scope="col">Amount Paid</th>
                <th scope="col">Balance</th>
                <th scope="col">Date Paid</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($payments as $i => $payment):{?>
                <tr>
                    <?php 
                    $tenantq=$pdo->prepare("SELECT * FROM tenants WHERE id=:tid");
                    $tenantq->bindValue(":tid",$payment["tid"]);
                    $tenantq->execute();
                    $tenant=$tenantq->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <td><?php echo $tenant['first_name']?></td>
                    <td><?php echo $tenant['last_name']?></td>
                    <td><?php echo $tenant['room_number']?></td>
                    <td><?php echo $payment['paid']?></td>
                    <td><?php echo $payment['paid']?></td>
                    <td><?php echo $payment['date_pay']?></td>
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