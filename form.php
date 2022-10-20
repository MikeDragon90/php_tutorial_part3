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