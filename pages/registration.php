<div class="container">

    <h3 class="display-5 mt-3" style="font-family:tahoma;">
        <span style="color:#ff9933">Register </span>
        <span style="color:#34AD54">Form</span>

    </h3>


    <?php

	$err  = $ok = 0;
	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = strip_tags($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	if (isset($_POST['btnsave'])) {

		$full_name = test_input($_POST['txtname']);
		$email     = test_input($_POST['txtemail']);
		$user	   = test_input($_POST['txtuser']);
		$pass	   = test_input($_POST['txtpass']);
		$confirm   = test_input($_POST['txtconfpass']);

		if ($confirm == $pass) {

			$query = "SELECT name, email FROM users WHERE name = '$user' OR email = '$email'";
			$result = mysqli_query($conn, $query);
			if (mysqli_num_rows($result) > 0) {
				$err++;
				$msg = 'username or email already exist';
			} else {

				$query = "INSERT INTO users (name, email, password, full_name) VALUES ('$user','$email','$pass','$full_name')";

				if (mysqli_query($conn, $query)) {
					$ok = 1;
					$msg = 'Your registration is successful';
				} else {

					$err = 1;
					$msg = 'Sorry! Your data cannot be saved';
				}
			} //---- end of nested else------
		} //------end of passwprd section-----
		else {

			$err = 1;
			$msg = 'Password Not Match';
		}
	} //-----------isset-----



	// ------------------Output-----------------      

	if ($ok > 0) {

		echo '<font color="green" size="+2">' . $msg . '</font>';
	} else {

		echo '<font color="red" size="+2">' . $msg . '</font>';
	}

	?>

    <form action="" method="post" class="mt-3">

        <input type="text" class="form-control form-control-lg mt-3" placeholder="Full Name" name="txtname" required>

        <input type="email" class="form-control form-control-lg mt-3" placeholder="Email" name="txtemail" required>

        <input type="text" class="form-control form-control-lg mt-3" placeholder="Username" name="txtuser" required>

        <input type="password" class="form-control form-control-lg mt-3" placeholder="password" name="txtpass" required>

        <input type="password" class="form-control form-control-lg mt-3" placeholder="confirm password"
            name="txtconfpass" required>

        <input name="btnsave" type="submit" class="btn btn-outline-warning btn-lg mt-3" value="Save">


    </form>

</div>