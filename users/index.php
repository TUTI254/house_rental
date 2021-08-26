<?php include_once "partials/header.php";
require_once "../database/dbh.inc.php";
$uid=$_SESSION["id"];
$statement=$pdo->prepare("SELECT * FROM users WHERE id=:id");
$statement->bindValue(":id",$uid);
$statement->execute();
$info=$statement->fetch(PDO::FETCH_ASSOC);

$stmt=$pdo->prepare("SELECT * FROM tenants WHERE uid=:uid");
$stmt->bindValue(':uid',$info["id"]);
$stmt->execute();
$tenant_info=$stmt->fetch(PDO::FETCH_ASSOC);


$tenant_name=$tenant_info["first_name"].' '.$tenant_info["last_name"];
$_SESSION["name"]=$tenant_name;
$_SESSION["room_number"]=$tenant_info["room_number"];
$_SESSION["id_no"]=$tenant_info["national_id"];
$_SESSION["email"]=$tenant_info["email"];
$_SESSION["bid"]=$tenant_info["branch_id"];
$_SESSION["tid"]=$tenant_info["id"];
$_SESSION["image"]=$info["user_image"];

$pay=$pdo->prepare("SELECT * FROM payments WHERE tid=:tid");
$pay->bindValue(":tid",$_SESSION["tid"]);
$pay->execute();
$payment=$pay->fetch(PDO::FETCH_ASSOC);

$rep=$pdo->prepare("SELECT * FROM replies WHERE tid=:tid");
$rep->bindValue(":tid",$tenant_info["id"]);
$rep->execute();
$replies=$rep->fetchAll(PDO::FETCH_ASSOC);
?>
<body class="">
  <div class="wrapper ">
   <?php include_once "partials/sidebar.php"?>
    <div class="main-panel">
      <!-- Navbar -->
     <?php include_once "partials/nav.php"?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
          <?php if($payment>0):{?>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  
                  <p class="card-category">PAID</p>
                
                  <h3 class="card-title"><?php echo number_format($payment["paid"])." ksh"?>
                 
                  </h3>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                 
                  <p class="card-category">Balance</p>
                  <h3 class="card-title"><?php echo number_format($payment["balance"]).' ksh'?></h3>
                </div>
              </div>
            </div>
            <?php } endif ;?>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                 
                  <p class="card-category">House Num</p>
                  <h3 class="card-title"><?php echo $_SESSION["room_number"]?></h3>
                </div>
               
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                 
                  <p class="card-category">Rent</p>
                  <h3 class="card-title">24,000</h3>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">INBOX:</span>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="profile">
                      <table class="table">
                        <tbody>
                          
                          <?php foreach($replies as $reply):{ ?>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="">
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td><?php echo $reply["reply"] ?? "NULL" ?>
                            </td>
                            <td class="td-actions text-right">
                            <?php echo $reply["time"]?>
                            </td>
                            
                            
                          </tr>
                         <?php }endforeach; ?>
                        </tbody>
                      </table>
                      
                    </div>
                   
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">OUTBOX:</span>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="profile">
                      <table class="table">
                        <tbody>
                          
                          <?php foreach($replies as $reply):{ ?>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="">
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                           
                            <td><?php echo $reply["mess"]?>
                            </td>
                            <td class="td-actions text-right">
                              <?php echo $reply["time"]?>
                            </td>
                          
                          </tr>
                         <?php }endforeach; ?>
                        </tbody>
                      </table>
                      
                    </div>
                   
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
            <!--  <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="https://creative-tim.com/presentation">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
              <li>
                <a href="https://www.creative-tim.com/license">
                  Licenses
                </a>
              </li>-->
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Filters</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger active-color">
            <div class="badge-colors ml-auto mr-auto">
              <span class="badge filter badge-purple" data-color="purple"></span>
              <span class="badge filter badge-azure" data-color="azure"></span>
              <span class="badge filter badge-green" data-color="green"></span>
              <span class="badge filter badge-warning" data-color="orange"></span>
              <span class="badge filter badge-danger" data-color="danger"></span>
              <span class="badge filter badge-rose active" data-color="rose"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="header-title">Images</li>
        <li class="active">
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="assets/img/sidebar-1.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="assets/img/sidebar-2.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="assets/img/sidebar-3.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="assets/img/sidebar-4.jpg" alt="">
          </a>
        </li>
          <!--<li class="button-container">
          <a href="https://www.creative-tim.com/product/material-dashboard" target="_blank" class="btn btn-primary btn-block">Free Download</a>
        </li>
       <li class="header-title">Want more components?</li>
            <li class="button-container">
                <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-warning btn-block">
                  Get the pro version
                </a>
            </li> 
        <li class="button-container">
          <a href="https://demos.creative-tim.com/material-dashboard/docs/2.1/getting-started/introduction.html" target="_blank" class="btn btn-default btn-block">
            View Documentation
          </a>
        </li>
        <li class="button-container github-star">
          <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
        </li>
        <li class="header-title">Thank you for 95 shares!</li>
        <li class="button-container text-center">
          <button id="twitter" class="btn btn-round btn-twitter"><i class="fa fa-twitter"></i> &middot; 45</button>
          <button id="facebook" class="btn btn-round btn-facebook"><i class="fa fa-facebook-f"></i> &middot; 50</button> -->
          <br>
          <br>
        </li>
      </ul>
    </div>
  </div>
  <?php include_once "partials/footer.php"?>