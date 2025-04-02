<?php
session_start();
if(isset($_POST['signin']))
{
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $sql = "SELECT EmailId,Password FROM tbblusers WHERE EmailId=:enmail and Password=:password";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount()> 0)
    {
        $_SESSION['login']=$_POST['email'];
        echo "<script type='text/javascript'>document.location = 'packagwe-list.php'; </script>
    } else{
     echo "<script>alert('Invalid DEtails');</script>";
     }
}
?>

<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-info">
            
        </div>
    </div>
</div>