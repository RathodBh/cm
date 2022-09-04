<?php
$title = "Contact";
include('include/header.php');

if (isset($_POST['contactus'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $mes = md5($_POST['mes']);


    date_default_timezone_set('Asia/Kolkata'); // change according timezone
    $currentTime = date('d-m-Y h:i:s A', time());

    $query = mysqli_query($con, "insert into contactus(name,email,contact,mes,iDate) values('$name','$email','$contact','$mes','$currentTime')");
    if ($query) {
        echo "<script>alert('Your response is added');location.href='contact.php';</script>";
    } else {
        echo "<script>alert('something went wrong');</script>";
    }
}
?>

<div class="container my-4">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-7 col-12">
            <form action="" method="POST">
                <h1 class="text-green">Contact Us</h1>
                <div class="form-group mt-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required />
                </div>
                <div class="form-group mt-3">
                    <label for="Email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="Email" name="email" placeholder="Enter email" required />
                </div>
                <div class="form-group mt-3">
                    <label for="Mobile" class="form-label">Contact Number</label>
                    <input type="number" class="form-control" id="Mobile" name="contact" placeholder="Mobile Number" required />
                </div>
                <div class="form-group mt-3">
                    <label for="mes" class="form-label">Message</label>
                    <textarea name="mes" id="mes" placeholder="Enter Message" class="form-control" required></textarea>
                </div>
                <button class="btn btn-success mt-3" type="submit" name="contactus">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php
include('include/footer.php');
?>