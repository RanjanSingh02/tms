<!-- Ranjan Update File -->
<?php
error_reporting(0);
if(isset($_POST['submit']))
{
    $fname=$_POST['fname'];
    $mnumber=$_POST['mobilenumber'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $sql="INSERT INTO tblusers(FullName,MobileNumber,EmailId,Password) VALUES(:fname,:mnumber,:email,:password)";
    $sql =$dbh->prepare($sql);
    $query->bindParam(':fname',$fname,PDO::PARAM_STR);
    $query->bindParam(':mnumber',$mnumber,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->bindParam(':password',$password,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->$lastInsertId();
    if($lastInsertId)
    {
        $_SESSION['msg']="You are Successfully Registered. Now you can Login";
        header('location:thankyou.php');
    }
    else
    {
        $_SESSION['msg']="Somthing went wrong. Please try again";
        header('location:thankyou.php');
    }
}
?>
<!-- Javascript for check email availabilty and loader -->
 <script>
    function checkAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url:"check_availability.php",
            data:'emailid='+$("#email").val(),
            type: "POST",
            success:function(data){
                $("user-availability-status").html(data);
                $("#loaderIcon").hide();
            },
            error:function (){}
        });
    }
 </script>

 <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <section>
                <div class="modal-body modal-spa">
                    <div class="login-grid">
                        <div class="login">
                            <div class="login-right">
                                <form>
                                    <h3>Create Your Account</h3>
                                    <input type="text" name="Fullname" placeholder="Enter Your Fullname" autocomplete="off" required="">
                                    <input type="text" name="mobilenumber" placeholder="Enter Your Mobile No." maxlength="10" autocomplete="off" required="">
                                    <input type="text" name="emailid" placeholder="Enter Your Email ID" autocomplete="off" id="email" onBlur="checkAvailability()" required="">
                                    <span id="user-availability-status" style="font-size:12px;"></span>
                                    <input type="password" placeholder="Enter Your Password" required="">
                                    <input type="submit" name="submit" id="submit" value="CREATE ACCOUNT">
                                </from>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <p>By Logging in you agree to our <a href="page.php?type=terms">Term and Condition</a> and <a href="page.php?type=privacy">Privacy Policy</a></p>
                    </div>
                </div>
            </section>
        </div>
    </div>
 </div>