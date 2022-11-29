<div class="container mt-3">


    <h3 class="display-5 mt-3" style="font-family:roboto;">
        <span style="color:#ff9933">Login </span>
        <span style="color:#34AD54">Form</span>

    </h3>


    <?php 


	if (isset($_POST['btnlogin'])) {
		$err = $ok = 0;
		$user = $_POST['txtuser'];
		$pass = $_POST['txtpass'];

		$query = "SELECT full_name, name, password FROM users WHERE name='$user' AND password='$pass'";

		
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result) > 0) {


			$_SESSION['is_active'] = 1;
			echo '<script>location.href="?a=panel"</script>';

		}
		else {

			$err = 1;
			$msg = 'Invalid username and password';
		}
	}

	if ($err > 0) {

        echo '<font color="red" size="+2">'.$msg.'</font>';
                    
     } 


 ?>


    ?>

    <form action="" method="post" class="mt-3">

        <input type="text" class="form-control form-control-lg mt-3" placeholder="Username" name="txtuser" required>
        <input type="password" class="form-control form-control-lg mt-3" placeholder="password" name="txtpass" required>
        <input name="btnlogin" type="submit" class="btn btn-dark btn-lg mt-3" value="Sign-in">
        <a href="?p=registration" class="btn btn-success btn-lg mt-3">Register</a>


    </form>

</div>