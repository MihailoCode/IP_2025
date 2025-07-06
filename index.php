<?php
$cookie_name = "user";
$cookie_value = "Milan Milanovic";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 dan
?>
<!DOCTYPE html>
<html>
<body>

<?php
if(!isset($_COOKIE[$cookie_name])) {
     echo "Dobrodosli prvi put na nas sajt!";
} else {
     echo "Postojeci korisnik'" . $cookie_name . "'!<br>";
     echo "Vrednost: " . $_COOKIE[$cookie_name];
}
?>

<p><strong>Napomena:</strong> Da bi videli vrednost cookie-a mora se ponovo doci na stranicu.</p>

</body>
</html>
