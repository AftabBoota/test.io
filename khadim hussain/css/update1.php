<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <?php
    
    include 'conn.php';

    $id = $_GET['id'];

    $display = "SELECT * FROM `first` WHERE id='$id'";

    $query = mysqli_query($conn, $display);

    $data = mysqli_fetch_array($query);

    

if(isset($_POST['submit'])){



    $firstname= ($_POST['fistname']);
    $update = $_GET['id'];
        $lastname= ($_POST['lastname']);
        $email= ($_POST['email']);
        $password =($_POST['password']);
        $conforimpassword =($_POST['cpassword']);
        $dob =($_POST['dob']);
        $contury = ($_POST['contury']);
        $image = $_FILES['userimage'];
        $filename = $image['name'];
        move_uploaded_file($image['tmp_name'],'upload/'.$filename);
       
         
    //   $update=  "UPDATE `first` SET `firstname`='$firstname',`lastname`
    //     ='$lastname',`email`='$email,`password`='$password',`conforimpassword`
    //     ='$conforimpassword',`dob`='$dob',`contury`='$contury',`file`='$filename' WHERE id='$update'";

    
$update=  "UPDATE `first` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`password`='$password',`conforimpassword`='$conforimpassword',`dob`='$dob',`contury`='$contury',`file`='$filename'  WHERE id='$update'";




    $query = mysqli_query($conn, $update);

        header('location: display.php');
    

}
    ?>

    <div class="container ">
        <div class="row">
            <h1 class="text-center bg-success p-3 text-white">Update Data</h1>
            <div class="col-10 mt-5">

                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Enter your Name</label>
                    <input type="text" name="fistname" value="<?php echo $data['firstname']; ?>"> <br><br>


                    <input type="text" name="lastname" value="<?php echo $data['lastname']; ?>"> <br><br>

                    <label for="">Enter your Email</label>
                    <input type="text" name="email" value="<?php echo $data['email']; ?>"> <br><br>

                    <label for="">password</label>
                    <input type="text" name="password" value="<?php echo $data['password']; ?>"> <br><br>

                    <label for="">password</label>
                    <input type="password" name="cpassword" value="<?php echo $data['conforimpassword']; ?>"> <br><br>

                    <label for="">dob</label>
                    <input type="date" name="dob" value="<?php echo $data['dob']; ?>"> <br><br>


                    <select name="contury" id="" value="<?php echo $data['contury']; ?>">
                        <option value="">choose contury</option>
                        <option value="pakistan">Pakistan</option>
                        <option value="uk">UK</option>
                        <option value="india">India</option>
                        <option value="us">Us</option>
                    </select>

                    <label for="">
                        <h5>Upload Your image</h5>
                    </label>
                    <input type="file" name="userimage" value="<?php echo $data['file'];?> "><br><br>

                    <input type="submit" value="update" name="submit">
                </form>
            </div>
        </div>
      </div>
    


                <script src=""></script>
</body>

</html>