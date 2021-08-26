
<?php 
include_once "partials/header.php";
include_once "../database/dbh.inc.php";
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $complain=$_POST["complain"];
  $tenant_name=$_POST["tenant_name"];
  $house_number=$_POST["house_number"];
  $bid=$_POST["bid"];
  $tid=$_POST["tid"];
  $statement=$pdo->prepare("INSERT INTO comments (name,house_number,branch_name,complain,tid) VALUES(:name,:house_number,:branch_name,:complain,:tid)");
  $statement->bindValue(":name",$tenant_name);
  $statement->bindValue(":house_number",$house_number);
  $statement->bindValue(":branch_name",$bid);
  $statement->bindValue(":complain",$complain);
  $statement->bindValue(":tid",$tid);
  $statement->execute();


}
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
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Send A message</h4>
                  <p class="card-category">Feel Free to Communicate</p>
                </div>
                <div class="card-body">
                  <form method="POST" action="">
                   
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Post Your Complain</label>
                          <div class="form-group">
                            <label class="bmd-label-floating"></label>
                            <textarea name="complain" class="form-control" rows="5"></textarea>
                            <input type="hidden" name="house_number" value ="<?php echo $_SESSION["room_number"]?>"class="form-control"type="text">
                            <input type="hidden" name="tenant_name" value="<?php echo $_SESSION["name"]?>" class="form-control"type="text">
                            <input type="hidden" name="bid" value="<?php echo $_SESSION["bid"]?>" class="form-control"type="text">
                            <input type="hidden" name="tid" value="<?php echo $_SESSION["tid"]?>" class="form-control"type="text">
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Send Message</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="javascript:;">
                  
                    <img class="img" src="<?php echo "../partials/".$_SESSION["image"]?>" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray"><span class="btn btn-info btn-round">My Info</span></h6>
                  <h4 class="card-title"><span class="btn btn-success btn-round"><?php echo '<span>EMAIL</span>: '.$_SESSION["email"]?></span></h4>
                  <h4 class="card-title"><span class="btn btn-success btn-round"><?php echo 'NAME: '.$_SESSION["name"]?></span></h4>
                  <h4 class="card-title"><span class="btn btn-success btn-round"><?php echo 'Room: '. $_SESSION["room_number"]?></span></h4>
                  <h4 class="card-title"><span class="btn btn-success btn-round"><?php echo 'ID: '. $_SESSION["id_no"]?></span></h4>
                  <p class="card-description">
                    
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    
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
        <li class="button-container">
          <a href="https://www.creative-tim.com/product/material-dashboard" target="_blank" class="btn btn-primary btn-block">Free Download</a>
        </li>
        <!-- <li class="header-title">Want more components?</li>
            <li class="button-container">
                <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-warning btn-block">
                  Get the pro version
                </a>
            </li> -->
        <li class="button-container">
          <a href="https://demos.creative-tim.com/material-dashboard/docs/2.1/getting-started/introduction.html" target="_blank" class="btn btn-default btn-block">
            View Documentation
          </a>
        </li>
        <li class="button-container github-star">
          <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
        </li>
      </ul>
    </div>
  </div>
 <?php include_once "partials/footer.php"?>