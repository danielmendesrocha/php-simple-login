<?php include_once('header.php') ?>
<div class="container">
	<?php 
	if(isset($login)){
		
		// print login errors
		foreach ($login->errors as $error) { ?>
			<p class="alert alert-danger" role="alert">
				<?= $error ?>
			</p>
		<?php }

		// print messages
		foreach ($login->messages as $msg) { ?>
			<p class="alert alert-success" role="alert">
				<?= $msg ?>
			</p>
		<?php }
		
	} 
	?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Please Sign In</h3>
				</div>
				<div class="panel-body">
					<form role="form" method="post" action="index.php">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="username" type="text" autofocus>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
						</fieldset>
					</form>
					<p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include_once('footer.php') ?>