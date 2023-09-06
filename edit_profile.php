<?php
include "config/conn.php";
session_start();
if(isset($_SESSION['email'])){ 
    $email =  $_SESSION['email'];
    $row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM user WHERE email='$email'"));
    $id = $row['id'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Edit Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/profile_style.css" rel="stylesheet">
  </head>
<body>
  <div class="container-xl px-4 mt-4">
    <nav class="nav nav-borders">
      <a class="nav-link active ms-0" href="">Profile</a>
      <a class="nav-link" href="security.php">Security</a>
      <!-- <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-billing-page" target="__blank">Billing</a> -->
      <!-- <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-edit-notifications-page" target="__blank">Notifications</a> -->
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
      <div class="col-md-12">
          <div class="col-md-12">

          <div class="card mb-4">
            <div class="card-header">Account Details</div>
            <div class="card-body">
              <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
              <div class="row gx-3 mb-3">
                <div class="md-3">
                  <label class="small mb-1" for="inputFirstName">Full name</label>
                  <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your Full name" name="name" value="<?php echo $row['name'] ?>" required>
                </div>

                <div class="mb-3">
                  <label class="small mb-1" for="inputEmailAddress">About Yourself</label>
                  <input class="form-control" id="inputEmailAddress" type="text" placeholder="Something about Yourself" name="about" value="<?php echo $row['about'] ?>" required>
                </div>

                <div class="row gx-3 mb-3">
                  <div class="col-md-6">
                    <label class="small mb-1" for="inputOrgName">Website</label>
                    <input class="form-control" id="inputOrgName" type="text" placeholder="Have any Website? Give your website link" value="<?php echo $row['website'] ?>" name="website" required>
                  </div>

                  <div class="col-md-6">
                    <label class="small mb-1" for="inputLocation">Location</label>
                    <input class="form-control" id="inputLocation" type="text" placeholder="New York, USA" value="<?php echo $row['location']; ?>" name="location" required>
                  </div>
                </div>

                <div class="mb-3">
                  <label class="small mb-1" for="inputEmailAddress">Email address</label>
                  <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="<?php echo $row['email']; ?>" name="email" required>
                </div>

                <div class="row gx-3 mb-3">

                  <div class="col-md-6">
                    <label class="small mb-1" for="inputPhone">Phone number</label>
                    <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" value="<?php echo $row['phone']; ?>" name="phone" required>
                  </div>

                  <div class="col-md-6">
                    <label class="small mb-1" for="inputBirthday">Birthday</label>
                    <input class="form-control" id="inputBirthday" type="date" name="dob" placeholder="06/10/1988" value="<?php echo $row['dob'] ?>" required>
                  </div>

                  <div class="mb-3">
                    <label class="small mb-1" for="inputEmailAddress">Age</label>
                    <input class="form-control" id="inputEmailAddress" type="number" placeholder="Your age" value="<?php echo $row['age'] ?>" name="age" required>
                  </div>

                  <div class="mb-3">
                    <label class="small mb-1" for="inputEmailAddress">Profession</label>
                    <input class="form-control" id="inputEmailAddress" type="text" placeholder="Your Profession" value="<?php echo $row['profession'] ?>" name="profession" required>
                  </div>

                  <div class="mb-3">
                    <label class="small mb-1" for="inputEmailAddress">About Profession</label>
                    <input class="form-control" id="inputEmailAddress" type="text" placeholder="Say something about your Profession" value="<?php echo $row['about_profession'] ?>" name="about_profession" required>
                  </div>
                </div>
                <button class="btn btn-primary" type="submit" name="submit">Save changes</button>
      </form>
          <?php
            // include "config/conn.php";
            if(isset($_POST['submit'])){

            //   $profile_pic_name = $_FILES["profile_photo"]["name"];
            //   $tempname_1 = $_FILES["profile_photo"]["tmp_name"];
            //   $folder = "assets/img/profile_img/" . $profile_pic_name;

            //   $cover_photo_name = $_FILES["cover_photo"]["name"];
            //   $tempname_2 = $_FILES["cover_photo"]["tmp_name"];
            //   $folder_2 = "assets/img/cover_img/" . $cover_photo_name;
              
              $name           = $_POST['name'];
              $about            = $_POST['about'];
              $profession       = $_POST['profession'];
              $about_profession = $_POST['about_profession'];
              $dob              = $_POST['dob'];
              $age              = $_POST['age'];
              $email_change     = $_POST['email'];
              $location         = $_POST['location'];
              $website          = $_POST['website'];
              $phone            = $_POST['phone'];

              $query = "UPDATE user SET name='$name', about='$about', profession='$profession', about_profession='$about_profession', dob='$dob' ,  age='$age', email='$email_change', location='$location', website='$website', phone='$phone' WHERE id='$id'";
              $insert = mysqli_query($conn,$query);


              if($insert){
                // move_uploaded_file($tempname_1,$folder);
                // move_uploaded_file($tempname_2,$folder_2);
                echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
              }else{
                echo "<meta http-equiv='refresh' content='0;URL=edit_profile.php'>";
              }
            }
          ?>
        </div>
      </div>
    </div>
    </div>
  </div>
</body>
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.umd.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
</html>
<?php
}else{
    header("location:login.php");
}
?>