<?php
include('dbconnect.php');
if (isset($_POST['btnsave'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $msg = $_POST['message'];

    $sql = "INSERT INTO contact (name, email, subject, msg)
  VALUES ('$name', '$email', '$subject', '$msg')";


    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>



<!--Section heading-->
<h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
<!--Section description-->
<p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us
    directly. Our team will come back to you within
    a matter of hours to help you.</p>
<div class="row">
    <div class="col-md-6 mb-md-0 mb-5 mx-5">
        <form action="?p=contact" class=" row g-3" method="post">
            <input class="form-control col-md-6" type="text" name="name"><br>
            <input class="form-control" type="text" name="email"><br>
            <input class="form-control" type="text" name="subject"><br>
            <textarea name="message" class="form-control" cols="30" rows="10"></textarea>
            <br>
            <input type="submit" class="btn btn-warning" name="btnsave" value="btnsave">
        </form>


        <!-- <div class="status"></div> -->
    </div>
    <div class="col-md-5 text-center">
        <ul class="list-unstyled mb-0 text-white">
            <li><i class="fas fa-map-marker-alt fa-2x"></i>
                <p>Afsar Uddin Road, Dhanmondi 15, Dhaka.</p>
            </li>

            <li><i class="fas fa-phone mt-4 fa-2x"></i>
                <p>+ 01 234 567 89</p>
            </li>

            <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                <p>arifurrahman4149@gmail.com</p>
            </li>
        </ul>
    </div>
</div>
<!--Grid column-->