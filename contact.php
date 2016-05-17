<!DOCTYPE html>
<html lang="en" class="gr__getbootstrap_com">
<head>
<meta charset="utf-8">
<meta content="IE=edge" http-equiv="X-UA-Compatible">
<meta content="width=device-width, initial-scale=1" name="viewport">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta content="" name="description">
<meta content="" name="author">

<title>Internet Programming - Assingment 1</title>

	<?php
		include 'style.php';
	?>
</head>

<body>

	<div class="container">

		 <?php
			include 'navi-bar.php';
			?>
			<?php
			if (isset ( $_POST ['inputEmail'] )) {
				$email = $_POST ['inputEmail'];
				
				$subject = "Confirmation";
				$txt = "We have received your E-mail! Thank you!";
				$headers = "From: 11914595@student.uts.edu.au";
				
				mail ( $email, $subject, $txt, $headers );
				
				if (isset ( $_POST ['inputSubject'] ) && isset ( $_POST ['inputContent'] )) {
					$email2 = "11914595@student.uts.edu.au";
					$subject2 = $_POST ['inputSubject'];
					$txt2 = $_POST ['inputContent'];
					$headers2 = "From: " . $email;
					mail ( $email2, $subject2, $txt2, $headers2 );
				}
			}
			?>
		<form action="" method="post">
			<p></p>
			<p></p>
			<div class="form-group">
				<label for="exampleInputSubject">Subject</label> <input type="text"
					class="form-control" id="exampleInputSubject" placeholder="Subject"
					name="inputSubject" required>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail">Your E-mail Address</label> <input
					type="email" class="form-control" id="exampleInputEmail"
					name="inputEmail" placeholder="Email" required>
			</div>
			<div class="form-group">
				<label for="exampleInputFirstName">Your First Name</label> <input
					type="text" id="exampleInputFirstName" class="form-control"
					placeholder="FirstName">
			</div>
			<div class="form-group">
				<label for="exampleInputLastName">Your Last Name</label> <input
					type="text" id="exampleInputLastName" class="form-control"
					placeholder="LastName">
			</div>
			<div class="form-group">
				<label for="inputContent">Content</label>
				<textarea id="inputContent" class="form-control" rows="3" name="inputContent" required></textarea>
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
		</form>



	</div>
	<!-- /container -->

<?php
include 'script.php';
?>
</body>
<span class="gr__tooltip"> <span class="gr__tooltip-content"></span> <i
	class="gr__tooltip-logo"></i> <span class="gr__triangle"></span>
</span>
</html>
