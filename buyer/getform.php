<?php  include 'session.php';
	include 'connection.php';
	$sellerid=$_GET['q']; ?>

	<form method="post" action="">

		<div class="row">
			<div class="form-group col-md-8">
			<h4>Comment</h4>
			<input type="text" name="comment" placeholder="Enter your comment" class="form-control" required> 
			</div>
		</div>

		<div class="form-group">
			<input type="submit" name="Send" value="Send" class="btn btn-warning">
		</div>
	</form>




