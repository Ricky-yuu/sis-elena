<?php include 'templates/header.php' ?>
<?php
  $id = $_SESSION["user"];/* userid of the user */
  $con = mysqli_connect('localhost','root','','sis_elena') or die('Unable To connect');
  if(count($_POST)>0) {
    $result = mysqli_query($con,"SELECT *from siswa WHERE nis='" . $id . "'");
    $row=mysqli_fetch_array($result);
    if($_POST["currentPassword"] == $row["password"] && $_POST["newPassword"] ) {
      mysqli_query($con,"UPDATE siswa set password='" . $_POST["newPassword"] . "' WHERE nis='" . $id . "'");
      $message = "Password Changed Sucessfully";
    } else{
      $message = "Password is not correct";
    }
  }
?>
<!DOCTYPE html>
<center>
<title>Change Password</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
<script>
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
	currentPassword.focus();
	document.getElementById("currentPassword").innerHTML = "required";
	output = false;
}
else if(!newPassword.value) {
	newPassword.focus();
	document.getElementById("newPassword").innerHTML = "required";
	output = false;
}
else if(!confirmPassword.value) {
	confirmPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "required";
	output = false;
}
if(newPassword.value != confirmPassword.value) {
	newPassword.value="";
	confirmPassword.value="";
	newPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "not same";
	output = false;
}
return output;
}
</script>
<body>
    <form name="frmChange" method="post" action=""
        onSubmit="return validatePassword()">
        <div style="width: 500px;">
            <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
            <table border="0" cellpadding="10" cellspacing="0"
                width="500" align="center" class="tblSaveForm">
                <tr class="bg-success">
                    <td colspan="2">Change Password</td>
                </tr>
                <tr>
                    <td width="40%"><label>Current Password</label></td>
                    <td width="60%"><input type="password"
                        name="currentPassword" class="txtField" /><span
                        id="currentPassword" class="required"></span></td>
                </tr>
                <tr>
                    <td><label>New Password</label></td>
                    <td><input type="password" name="newPassword"
                        class="txtField" /><span id="newPassword"
                        class="required"></span></td>
                </tr>
                <td><label>Confirm Password</label></td>
                <td><input type="password" name="confirmPassword"
                    class="txtField" /><span id="confirmPassword"
                    class="required"></span></td>
                </tr>
                <tr align = center>
                    <td colspan="2"><input type="submit" name="submit"
                        value="Submit" class="btnSubmit"></td>
                </tr>
            </table>
        </div>
    </form>
</body>
</html>
<?php include 'templates/footer.php'?>
