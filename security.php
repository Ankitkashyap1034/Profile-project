<?php
session_start();
if($_SESSION['email']){
    $email = $_SESSION['email'];
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="utf-8">
    
    
    <title>Security</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/security_style.css" rel="stylesheet">
    
    </head>
    <body>
        <div class="container-xl px-4 mt-4">
    
            <nav class="nav nav-borders">
                <!-- <a class="nav-link  ms-0" href="profile_edit.php">Profile</a> -->
                <a class="nav-link active" href="">Security</a>
                <!-- <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-billing-page" target="__blank">Billing</a> -->
                <!-- <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-edit-notifications-page" target="__blank">Notifications</a> -->
            </nav>
            <hr class="mt-0 mb-4 ">
            <div class="row">
                <div class="col-lg-8">
    
                    <div class="box">
                        <div class="card mb-4 shadow-lg p-3 mb-5 bg-body rounded">
                            <div class="card-header">Change Password</div>
                            <div class="card-body">
                            <form method="POST" action="">
    
                            <div class="mb-3">
                                <label class="small mb-1" for="currentPassword">Current Password</label>
                                <input class="form-control" id="currentPassword" type="password" placeholder="Enter current password" name="current_pass">
                            </div>
    
                            <div class="mb-3">
                            <label class="small mb-1" for="newPassword">New Password</label>
                            <input class="form-control" id="newPassword" type="password" placeholder="Enter new password" name="npass">
                            </div>
    
                            <div class="mb-3">
                                <label class="small mb-1" for="confirmPassword">Confirm Password</label>
                                <input class="form-control" id="confirmPassword" type="password" placeholder="Confirm new password" name="con_pass">
                            </div>
                            <button class="btn btn-primary" type="submit" name="submit">Save</button>
                            </form>
    
                            <?php
                                include "config/conn.php";
                            
                                if(isset($_POST['submit'])){
                                    $current_pass = md5($_POST['current_pass']);
                                    $password = $_POST['con_pass'];
                                    $password = md5($password);
    
                                    $check = mysqli_query($conn,"SELECT password FROM signup WHERE password='$current_pass'");
                                    if($check){
                                        $change = mysqli_query($conn,"UPDATE signup SET password='$password' WHERE password='$current_pass'");
                                        session_destroy();
                                        header("location:login.php");
                                    }else{
                                        header("location:security.php");
                                    }
                                }
                            ?>
                            </div>
                        </div>
                    </div>
    
                    <!-- <div class="card mb-4 shadow p-3 mb-5 bg-body rounded">
                        <div class="card-header">Security</div>
                        <div class="card-body">
    
                            <h5 class="mb-1">Account Privacy</h5>
                            <p class="small text-muted">By setting your account to private, your profile information and posts will not be visible to users outside of your user groups.</p>
                            <form>
                                <div class="form-check">
                                    <input class="form-check-input" id="radioPrivacy1" type="radio" name="radioPrivacy" checked>
                                    <label class="form-check-label" for="radioPrivacy1">Public (posts are available to all users)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="radioPrivacy2" type="radio" name="radioPrivacy">
                                    <label class="form-check-label" for="radioPrivacy2">Private (posts are available to only users in your groups)</label>
                                </div>
                            </form>
                            <hr class="my-4">
    
                            <h5 class="mb-1">Data Sharing</h5>
                            <p class="small text-muted">Sharing usage data can help us to improve our products and better serve our users as they navigation through our application. When you agree to share usage data with us, crash reports and usage analytics will be automatically sent to our development team for investigation.</p>
                            <form>
                                <div class="form-check">
                                    <input class="form-check-input" id="radioUsage1" type="radio" name="radioUsage" checked>
                                    <label class="form-check-label" for="radioUsage1">Yes, share data and crash reports with app developers</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="radioUsage2" type="radio" name="radioUsage">
                                    <label class="form-check-label" for="radioUsage2">No, limit my data sharing with app developers</label>
                                </div>
                            </form>
                        </div>
                    </div> -->
                </div>
    
                <div class="col-lg-4">
    
                    <!-- <div class="card mb-4">
                        <div class="card-header">Two-Factor Authentication</div>
                        <div class="card-body">
                            <p>Add another level of security to your account by enabling two-factor authentication. We will send you a text message to verify your login attempts on unrecognized devices and browsers.</p>
                            <form>
                                <div class="form-check">
                                    <input class="form-check-input" id="twoFactorOn" type="radio" name="twoFactor" checked>
                                    <label class="form-check-label" for="twoFactorOn">On</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="twoFactorOff" type="radio" name="twoFactor">
                                    <label class="form-check-label" for="twoFactorOff">Off</label>
                                </div>
                                <div class="mt-3">
                                    <label class="small mb-1" for="twoFactorSMS">SMS Number</label>
                                    <input class="form-control" id="twoFactorSMS" type="tel" placeholder="Enter a phone number" value="555-123-4567">
                                </div>
                            </form>
                        </div>
                    </div> -->
    
                    <div class="card mb-4">
                        <div class="card-header">Delete Account</div>
                        <form method="POST" action="">
                            <div class="card-body delete">
                                Deleting your account is a permanent action and cannot be undone. If you are sure you want to delete your account, select the button below.<br><br>
                                <button class="btn btn-danger-soft text-danger" type="submit" name="delete">I understand, delete my account</button>
                            </div>
                        </form>
                    </div>
                    <?php
                        if(isset($_POST['delete'])){
                            $delete = mysqli_query($conn,"DELETE FROM signup WHERE email='$email'");
                            if($delete){
                                session_destroy();
                                echo "<script>window.location.href='signup.php';</script>";
                            }else{
                                echo "<script>window.location.href='security.php';</script>";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>   
    </body>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
    </html>
    <?php
}else{
    header("location:login.php");
}
?>
