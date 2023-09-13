<div class="col-s-4 col-4 ">
</div>
<div class="col-s-4 col-4 ">
	<div class="sf">	
<h2 class="tc p1 ">Login</h2>
<br>
	<?php if (isset($error)):?>
		<div class="errors"><?=$error;?></div>
		<?php endif; ?>
		<form method="post" action="">
			<label for="email">Your email address</label>
			<input type="text" id="email" name="email">
			
			<label for="password">Your password</label>
			<input type="password" id="password" name="password">
			
			<input type="submit" name="login" value="Log in">
		</form>
	</div>
</div>
		<div class="col-s-4 col-4 ">
		</div>