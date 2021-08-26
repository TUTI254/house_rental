<?php include_once "partials/header.php";
require_once "../database/dbh.inc.php";
$stmt=$pdo->prepare("SELECT * FROM requests WHERE id=:id");
$stmt->bindValue(':id',$_GET["rid"]);
$stmt->execute();
$uid=$stmt->fetch(PDO::FETCH_ASSOC);
if($_SERVER['REQUEST_METHOD']=="POST"){
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $gender=$_POST['gender'];
    $marital=$_POST['marital'];
    $phone=$_POST['phone_number'];
    $email=$_POST['email'];
    $national_id=$_POST['national_id'];
    $fam_size=$_POST['fam_size'];
    $agreement=$_FILES['document'];
    $room_no=$_POST['room_no'];
    $date=date('Y-m-d H:i:s');
    $bid=$_POST['bid'];
    $statement=$pdo->prepare("INSERT INTO tenants(first_name,last_name,gender,marital_status,phone_number,email,national_id,fam_size,date_in,form,room_number,branch_id,uid) VALUES (:first_name,:last_name,:gender,:marital_status,:phone_number,:email,:national_id,:fam_size,:date_in,:form,:room_no,:bid,:uid)");
    $statement->bindValue(':first_name',$first_name);
    $statement->bindValue(':last_name',$last_name);
    $statement->bindValue(':gender',$gender);
    $statement->bindValue(':marital_status',$marital);
    $statement->bindValue(':phone_number',$phone);
    $statement->bindValue(':email',$email);
    $statement->bindValue(':national_id',$national_id);
    $statement->bindValue(':fam_size',$fam_size);
    $statement->bindValue(':date_in',$date);
    $statement->bindValue(':form','');
    $statement->bindValue(':room_no',$room_no);
    $statement->bindValue(':bid',$bid);
    $statement->bindValue(':uid',$uid["uid"]);
    $statement->execute();
    unset($statement);
    
    if($_GET["rid"]){
        $del_r=$pdo->prepare("DELETE FROM requests WHERE id=:id");
        $del_r->bindValue(":id",$_GET["rid"]);
        $del_r->execute();
        header('Location: index.php?message=success');
    }
}
$stmt=$pdo->prepare("SELECT * FROM apartments");
$stmt->execute();
$apartments=$stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<body class="bg-gradient-secondary">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Register New Tenant</h1>
                            </div>
                            <form class="user" method="POST" action="" >
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input required name="first_name" type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="First Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" required name="last_name" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="gender" required type="text" class="form-control form-control-user"
                                            placeholder="Pick gender">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="marital" required type="text" class="form-control form-control-user"
                                         placeholder="Marital Status">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="phone_number"  required type="phonenumber" class="form-control form-control-user"
                                          placeholder="Phone Number">
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="email" type="email" required class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="national_id" type="number" required class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Enter National ID">
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="fam_size" type="number" class="form-control form-control-user"
                                            placeholder="Number Of Family members">
                                    </div>
                                </div>
                                <div class="form-group row">
                                <div class="col-sm-6">
                                        <input name="room_no" type="text" class="form-control form-control-user"
                                            placeholder="Room_no">
                                    </div>
                                <div class="col-sm-6">
                                    
                                <select class="form-control" name="bid" id="">
                                    <?php foreach($apartments as $apartment):{?>
                                    <option value="<?php echo $apartment['id']?>">
                                    <?php echo $apartment['name']?></option>
                                    <?php }endforeach; ?>
                                </select>        
                                
                                    </div>
                                </div>
                                
                                
                                <button class="btn btn-primary btn-user btn-block" type="submit">Register Tenant</button>
                                <hr>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php include_once "partials/header.php"?>