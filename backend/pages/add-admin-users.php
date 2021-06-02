<?php

//echo "<pre>";
//print_r($_POST);
//echo "</pre>";

$error = [
        'full_name' => '',
        'username' => '',
        'email' => '',
        'password' => '',
        'confirm_password' => '',
        'gender' => ''
];

$oldValue = [
    'full_name' => '',
    'username' => '',
    'email' => '',
    'gender' => ''
];

if (!empty($_POST) && $_SERVER['REQUEST_METHOD'] == "POST"){
    foreach ($_POST as $key => $value) {
        if (empty($_POST[$key])) {
            $error[$key] = $key . ' filed is required';
        }else{
            $oldValue[$key]= $value;
        }
    }
    $password = md5($_POST['password']);
    $cPassword = md5($_POST['confirm_password']);
    if ($password != $cPassword){
        $error['password'] = "Password not match";
    }

    $email = $_POST['email'];
    if (!filter_var($email,FILTER_VALIDATE_EMAIL))
    $error['email'] = "Invalid email Please enter valid email";

    if (!array_filter($error)) {
//        echo "done";
        $fullName = $_POST['full_name'];
        $userName = $_POST['username'];
        $email = $_POST['email'];
        $pass = $password;
        $gender = $_POST['gender'];
        $createdAt = date('y-m-d h-i-s');
        $updateAt = date('y-m-d h-i-s');

//        insert query
        $query = "INSERT INTO admins(full_name,username,email,password,gender,
                 created_at,update_at) VALUES('$fullName','$userName',
                 '$email','$pass','$gender','$createdAt','$updateAt')";

            $result= mysqli_query($connection, $query);
            if ($result){
                $_SESSION['success'] = "data was inserted";
              redirect_to('backend/show-admin-users');
            }else{
                $_SESSION['error'] = "data was not inserted";
                redirect_back();
            }
    }

}

?>

<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="btn-primary">
                    <i class="fa fa-plus"></i> Add Admin Users</h1>
                <hr>
                <?= messages();?>
            </div>

            <div class="col-md-12 bg-color-green">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="full_name">Full Name:
                                <a style="color: red;"><?= $error['full_name']?></a> </label>
                                <input type="text" name="full_name" id="full_name"
                                       value="<?= $oldValue['full_name']?>" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Username:
                                 <a style="color: red;"><?= $error['username']?></a></label>
                                <input type="text" name="username" id="username"
                                       value="<?= $oldValue['username']?>"class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:
                         <a style="color: red;"><?= $error['email']?></a></label>
                        <input type="text" name="email" id="email"
                               value="<?= $oldValue['email']?>"class="form-control">
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password:
                                 <a style="color: red;"><?= $error['password']?></a></label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="confirm_password">Confrim-Password:
                                 <a style="color: red;"><?= $error['confirm_password']?></a></label>
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="gender">Gender:
                         <a style="color: red;"><?= $error['gender'];?></a></label>
                       <select name="gender" id="gender" class="form-control">
                           <option value="" readonly>--- Select Gender ---</option>
                           <option <?= $oldValue['gender'] == 'male' ? 'selected' : '';?> value="male">Male</option>
                           <option <?= $oldValue['gender'] == 'female' ? 'selected' : '';?> value="female">Female</option>
                       </select>
                    </div>

                    <div class="form-group">
                        <label for="image">Profile Picture</label>
                        <input type="file" name="image" id="image" class="btn btn-default">
                    </div>

                    <div class="form-group">
                       <button class="btn btn-danger">
                           <i class="fa fa-plus"></i> Add Record</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /. PAGE INNER  -->
</div>