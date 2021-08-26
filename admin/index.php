<?php
include_once "partials/header.php";
require_once "../database/dbh.inc.php";

if(!isset($_SESSION['id'])){
    header('Location: ../public/login.php?message=login');
}

$statement=$pdo->prepare("SELECT * FROM tenants ORDER BY date_in LIMIT 6");
$statement->execute();
$tenants=$statement->fetchAll(PDO::FETCH_ASSOC);

$rooms=$pdo->prepare("SELECT * FROM rooms");
$rooms->execute();
$room=$rooms->fetchAll(PDO::FETCH_ASSOC);


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
                <div class="card-body">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>           
                    </div>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <a href="tenant.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i>Add Tenant</a>
                                           
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Paid (Monthly)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Deficite Amount</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <!--Tenant Info begin-->
                    <div class="card shadow">
                    <div class="card-header py-3"> <h6 class="m-0 font-weight-bold text-primary">Tenant Information</h6></div>
                    <div class="row px-2 mb-2">
                        
                        <div class="col-xl-3 col-md-6 mb-4 py-3">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-sucess text-uppercase mb-1">
                                              Total Tenats</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo sizeof($tenants)?></div>
                                            <a href="tenant_table.php">View All</a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-list fa-3x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4 py-3">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-sucess text-uppercase mb-1">
                                               Number of Rooms</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo sizeof($room)?></div>
                                            <a class="py-5" href="apt.php">View All</a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!--Tenant Info Row end-->
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Area Chart -->
                        <!-- Pie Chart -->
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <table class="table table-striped">
            <a disabled class="btn btn-primary mx-2 py-3 my-5">NEW TENANTS</a>
            <thead>
            
                <tr>
                <th scope="col">#</th>
                <th scope="col">Branch</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Date IN</th>
                <th scope="col">Room</th>
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
                    <td><?php echo $i+1?></td>
                    <td><?php echo $branch['name']?></td>
                    <td><?php echo $tenant['first_name']?></td>
                    <td><?php echo $tenant['last_name']?></td>
                    <td><?php echo $tenant['date_in']?></td>
                    <td><?php echo $tenant['room_number']?></td>
                </tr>
            <?php } endforeach; ?>
                
            </tbody>
            </table>
                                <!-- Card Body -->

                            </div>
                        </div>
                    </div>
                    <!-- Content Row -->
                    
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
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