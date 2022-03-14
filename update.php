<?php
include"config.php";

// konek ke database
if(isset($_POST['update'])){
$id            = $_POST['id'];
$email     = $_POST['email'];
$username    = $_POST['username'];
$password    = $_POST['password'];
 
$data = mysqli_query($conn, "UPDATE tbregis SET email='$email', username='$username', password='$password' WHERE id='$id'") or die ("data salah : ".mysqli_error($mysqli));
 
if ($data) {
    header('location: dbshow.php');
    echo "<script> alert('Data has been Updated..') </script>";
} else {
    $message = "Updated data failed.";
    echo "<script type='text/javascript'>alert('$message');</script>";
}
}
?>

<!-- DESAIN -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update</title>
    
    <!-- BOOSTRAP -->
    <link rel="stylesheet" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <!-- FONT awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body style="background-color: aliceblue;">
	<?php
	include"config.php";
	$data = mysqli_query($conn, "SELECT * FROM tbregis WHERE id='$_GET[id]'");
	$datashow = mysqli_fetch_array($data);
	?>
	
	<!-- CREATE  -->
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="text-align: center; font-size: 2rem; font-weight: 800;">Update</p>
			<input type="hidden" name="id"  value="<?php echo $datashow['id']; ?>">
            <div class="input-group mb-3">
                <input type="text" name="email" placeholder="Email" value="<?php echo $datashow['email']; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
            </div>
            <div class="input-group mb-3">
                <input type="text" name="username" placeholder="Username" value="<?php echo $datashow['username']; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
            </div>
            <div class="input-group mb-3">
                <input type="password" name="password" placeholder="Password" value="<?php echo $datashow['password']; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
            </div>
            <div class="input-group">
                <button name="update" type="submit"  class="btn btn-primary">Update</button>
            </div>
            <center>
                <p class="login-register-text"><a href="dbshow.php">Back</a></p>
            </center>
        </form>
    </div>

    <style>
        .container {
            width: 400px;
            min-height: 400px;
            background: #FFF;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0,0,0,.3);
            padding: 40px 30px;
        }
    </style>

</body>
</html>