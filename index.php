<!DOCTYPE html>

<html>
<head>
    <title>Validacija forme</title>
    <style type="text/css">
    	.error{
    		color: red;
    	}
    </style>
</head>
<?php
$firstName="";
$lastName="";
$email="";
$age="";
$website="";

if(isset($_POST["submit"])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["firstName"])) {
      $firstNameErr = "First name is required";
   }
   else {
      $firstName = test_input($_POST["firstName"]);
   }
   if (empty($_POST["lastName"])) {
      $lastNameErr = "Last name is required";
   }
   else {
      $lastName = test_input($_POST["lastName"]);
   }
   if (empty($_POST["email"])) {
      $emailErr = "Email is required";
   }
   else {
      $email = test_input($_POST["email"]);
   }
   if (is_numeric ($_POST["age"]))  {}
   else { $ageErr ="Age must be numeric";
     }

}
}

<!—KOD ZA PROVERU I FROMATIRANJE UNOSA PODATAKA KROZ FORMU -->

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

?>

<!—PRIKAZIVANJE PORUKE O GRESCI -->

<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
First Name: <input type="text" name="firstName" placeholder="*First Name" />  <small class="error">
	<?php if(isset($firstNameErr)) echo $firstNameErr; ?></small><br>
Last Name: <input type="text" name="lastName" placeholder="*Last Name" /><small class="error">
	<?php if(isset($lastNameErr)) echo $lastNameErr;?></small><br>
Email: <input type="text" name="email" placeholder="*Email" /><small class="error">
	<?php if(isset($emailErr)) echo $emailErr; ?></small><br>
Age: <input type="text" name="age" placeholder="Age" /><small class="error">
	<?php if(isset($ageErr)) echo $ageErr; ?></small><br>
Website: <input type="text" "name="website" placeholder="Website" /><br>
<input type="submit" name="submit" value="Submit" />
</form>
<h2>Ispis </h2>
</body>
</html>

<!—ISPIS ISPRAVNO UNETIH VREDNOSTI -->

<?php
echo $firstName;
echo "<br>";
echo $lastName;
echo "<br>";
echo $email;
echo "<br>";
echo $age;
?> 
