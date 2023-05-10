<?php include_once('header.php') ?>
<div class="container">


<?php if(isset($register)){
		
	// print registration errors
	foreach ($register->errors as $error) { ?>
		<p class="alert alert-danger" role="alert">
			<?= $error ?>
		</p>
	<?php }

} ?>
	

	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="register-panel panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Create an Account</h3>
				</div>
				<div class="panel-body">
					<form role="form" method="post" action="register.php">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="username" type="text" autofocus>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<!-- <div class="form-group">
								<input class="form-control" placeholder="Confirm Password" name="confirm_password" type="password" value="">
							</div> -->
							<button type="submit" class="btn btn-lg btn-success btn-block">Register</button>
						</fieldset>
					</form>
					<a href="/">Back to index</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include_once('footer.php') ?>