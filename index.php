<?php
	require_once 'nav.php';
?>
<style>
	.error {
		color: red;
		padding: 0;
		margin:
	}
</style>
<?php 
/*
	// Data Types 
	$firstName = 'Mike'; // String
	$age = 24; // Integer
	$height = 1.86; // Float
	$male = TRUE; // Boolean
	$traits = [
		'handsome', 'smart', 'successful'
	]; // Array
	$person = new StdClass(); // Object
	$person->name = $firstName . ' ' . 'Presley';
	echo $person->name; 
	$hairColor = NULL; // NULL

	echo '<br />';
	echo $age;
?>
<div>
	<p style="font-size: 24px;background: red; padding: 2rem;color: white;">
		<?php echo 'I am a paragraph! Wooho!'; ?>
	</p>
</div>

<?php 

$weather = 'cloudy';
if ($weather == 'hot') {
	echo 'It\'s hot!';
} else if($weather == 'cloudy') {
	echo 'It\'s cloudy';
} else {
	echo 'It\'s not hot bro!';
}

$number = '2';
if ($number === 2) {
	echo 'TRUE';
}

// Functions
function sayHi(string $something, string $something2) {
	echo 'I am a ' . $something . ' ' . $something2;
	return TRUE;
}

echo '<pre>';
echo '<br />';
sayHi('robot', 'something else');
echo '<br />';

// echo count($traits);
// echo $traits[0];
// echo $traits[1];
// echo $traits[2];
# For loop
for ($x = 0; $x < count($traits); $x++) {
	echo $traits[$x] . '<br />';
}

$fruits = ['Apples', 'Oranges', 'Bananas', 'Kiwis'];
foreach($fruits as $fruit) {
	echo '<p style="font-weight:bold;">' . $fruit . '</p>';
}

define('WEBSITE_NAME', 'www.google.com');
define('NAMES', ['John', 2]);

echo WEBSITE_NAME;
echo '<br />';
var_dump(NAMES);
print_r(NAMES);

# Single line comment 1
// Single line comment 2
// Comment 3 

echo strtolower('Mike');
echo '<br />';
// echo str_replace('Test','world', 'Hello Test');
echo count(NAMES);

$color = 'green';

switch ($color) {
	case 'green':
		echo 'I AM GREEN';
		break;
	case 'red':
		echo 'I AM RED';
		break;
}

echo '<br />';
echo date('Y-m-d h:i:s');
echo '<br />';
echo date('l');
echo rand();
echo '<br />';
echo round(10.4); 

// Superglobals
$GLOBALS; // Contains all global variables
$_SERVER; // Contains info about the server
$_COOKIE; // Contains cookies
// $_SESSION; // Contains session
$_POST; // Contains post data
$_GET; // Contains get data
$_FILES; // Contains files

$GLOBALS['app_name'] = 'HousingProject';

function getAppName() {
	echo $GLOBALS['app_name'];
}

getAppName();

debug($_SERVER['DOCUMENT_ROOT']);
setcookie('mainCookie', '30', time() + 3600);
debug($_COOKIE);
session_start();
$_SESSION['firstname'] = 'Mike';
$_SESSION['lastname'] = 'Dragon';
$_SESSION['email'] = 'md@md.com';
session_destroy();

echo 'Hello ' . $_SESSION['firstname'] . ' ' . $_SESSION['lastname'];
*/
?>
<?php 
$firstName = $lastName = $password = '';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	if (isset($_POST['firstname']) && !empty($_POST['firstname'])) {
		$firstName = validateInput($_POST['firstname']);
		if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST['firstname'])) {
			$errors['firstName'] = "Only letters and white space allowed";
		}
	}
	else {
		$errors['firstName'] = 'Firstname is required';
	}
	if (isset($_POST['lastname']) && !empty($_POST['lastname'])) {
		$lastName = validateInput($_POST['lastname']);
		if (!preg_match("/^[\p{L}\p{P}\p{Zs}]+$/", $_POST['lastname'])) {
			$errors['lastName'] = "Only letters and white space allowed";
		}
	}
	else {
		$errors['lastName'] = 'Lastname is required';
	}
	if (isset($_POST['email']) && !empty($_POST['email'])) {
		$lastName = validateInput($_POST['email']);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errors['email'] = "Invalid email format";
		}
	}
	else {
		$errors['lastName'] = 'Lastname is required';
	}
	if (isset($_POST['password']) && !empty($_POST['password'])) 
	{
		$password = validateInput($_POST['password']);
		if (!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/', $password))
		{
			$errors['password'] = 'Password has to be:
			1. At least one lowercase char
			2. At least one uppercase char
			3. At least one digit
			4. At least one special sign of @#-_$%^&+=§!?';
		}
	} 
	else {
		$errors['password'] = 'Password is required';
	}
debug($errors);
if (!$errors) {
	echo 'Form submitted successfully!';
}
}
function validateInput($validatedInput) {
	$validatedInput = trim($validatedInput);
	$validatedInput = stripslashes($validatedInput);
	$validatedInput = htmlspecialchars($validatedInput);
	return $validatedInput;
}

function debug($array) {
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}

?>

<hr />
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
	<label>Firstname</label>
	<div class="error"><?php echo (isset($errors['firstName']) ? $errors['firstName'] : ''); ?></div>
	<input type="text" name="firstname" />
	<br />
	<label>Lastname</label>
	<div class="error"><?php echo (isset($errors['lastName']) ? $errors['lastName'] : ''); ?></div>
	<input type="text" name="lastname" />
	<br />
	<label>Email</label>
	<div class="error"><?php echo (isset($errors['email']) ? $errors['email'] : ''); ?></div>
	<input type="email" name="email" required />
	<br />
	<label>Password</label>
	<div class="error"><?php echo (isset($errors['password']) ? $errors['password'] : ''); ?></div>
	<input type="password" name="password" />
	<br />
	<input type="submit" name="submit" />
</form>

<?php require_once 'footer.php'; ?>