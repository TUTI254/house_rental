<?php
include_once "../admin/partials/header.php";
require_once "../database/dbh.inc.php";

$last_id=$_SESSION["lastid"];


$statement=$pdo->prepare("SELECT * FROM apartments");
$statement->execute();
$apartments=$statement->fetchAll(PDO::FETCH_ASSOC);

$stmt=$pdo->prepare("SELECT * FROM rooms");
$stmt->execute();
$rooms=$stmt->fetchAll(PDO::FETCH_ASSOC);

if($_SERVER["REQUEST_METHOD"]=="POST" ){
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $email=$_POST['email'];
    $room_type=$_POST['room_type'];
    $location=$_POST['location'];
    $insert=$pdo->prepare("INSERT INTO requests (first_name,last_name,email,room_type,location,uid) VALUES (:first_name,:last_name,:email,:room_type,:location,:uid)");
    $insert->bindValue(':first_name',$first_name);
    $insert->bindValue(':last_name',$last_name);
    $insert->bindValue(':email',$email);
    $insert->bindValue(':room_type',$room_type);
    $insert->bindValue(':location',$location);
    $insert->bindValue(':uid',$last_id);
    $insert->execute();
    header("Location: login.php?message=becoming");
}
?>


<body class="bg-gradient-secondary">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-black-900 mb-4">Apply For Now</h1>
                            </div>
                            <form class="user" method="POST" action="" >
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input required name="first_name" type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="First Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input required type="text" name="last_name" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input required name="email" type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="email">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <select required class="form-control" name="room_type">
                                    <option value="" disabled selected>Choose Room Type</option>
                                    <?php foreach($rooms as $room):{?>
                                    <option name="room_type" value="<?php echo $room['room_type']?>">
                                    <?php echo $room['room_type']?></option>
                                    <?php }endforeach; ?>
                                    </select>        
                                    </div>
                                </div>
                                <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <select required class="form-control" name="location" id="">
                                    <option name ="location"value="" disabled selected>Choose Location</option>
                                    <?php foreach($apartments as $apartment):{?>
                                    <option value="<?php echo $apartment['location']?>">
                                    <?php echo $apartment['location']?></option>
                                    <?php }endforeach; ?>
                                    </select>        
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-user btn-block" type="submit">Apply Now</button>
                            </form>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php include_once "../admin/partials/header.php"?>