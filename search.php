<?php
session_start ();
?>
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
<script src="http://code.jquery.com/jquery-latest.js"
	type="text/javascript"></script>
<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<link rel="stylesheet" href="css/ie10-viewport-bug-workaround.css">

<!-- Custom styles for this template -->
<link rel="stylesheet" href="css/justified-nav.css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
</style>

<script type="text/javascript">

</script>

</head>

<body>

	<div class="container">

		 <?php
			include 'navi-bar.php';
			?>
		<p></p>
		<div class="container col-md-7">
			<form action="" method="post">
				<p></p>
				<div class="btn-group-vertical col-md-5" role="group"
					aria-label="Vertical button group" id="cityButton">
					<input type="submit" name="city" value="Adelaide"
						class="btn btn-default">
					</button>
					<input type="submit" name="city" value="Albany"
						class="btn btn-default">
					</button>
					<input type="submit" name="city" value="Alice Springs"
						class="btn btn-default">
					</button>
					<input type="submit" name="city" value="Bendigo"
						class="btn btn-default">
					</button>
					<input type="submit" name="city" value="Brisbane"
						class="btn btn-default">
					</button>
					<input type="submit" name="city" value="Broken Hill"
						class="btn btn-default">
					</button>
					<input type="submit" name="city" value="Broome"
						class="btn btn-default">
					</button>
					<input type="submit" name="city" value="Cairns"
						class="btn btn-default">
					</button>
					<input type="submit" name="city" value="Canberra"
						class="btn btn-default">
					</button>
					<input type="submit" name="city" value="Darwin"
						class="btn btn-default">
					</button>
				</div>
				<div class="btn-group-vertical col-md-5" role="group"
					aria-label="Vertical button group" id="cityButton">
					<input type="submit" name="city" value="Hobart"
						class="btn btn-default">
					</button>
					<input type="submit" name="city" value="Kalgoorlie"
						class="btn btn-default">
					</button>
					<input type="submit" name="city" value="Launceston"
						class="btn btn-default">
					</button>
					<input type="submit" name="city" value="Melbourne"
						class="btn btn-default">
					</button>
					<input type="submit" name="city" value="Mt Isa"
						class="btn btn-default">
					</button>

					<input type="submit" name="city" value="Newcastle"
						class="btn btn-default">
					</button>
					<input type="submit" name="city" value="Perth"
						class="btn btn-default">
					</button>
					<input type="submit" name="city" value="Pt Augusta"
						class="btn btn-default">
					</button>
					<input type="submit" name="city" value="Rockhampton"
						class="btn btn-default">
					</button>
					<input type="submit" name="city" value="Sydney"
						class="btn btn-default">
					</button>

				</div>
			</form>

		</div>
		<div class="container col-md-5">
			<form action="searchResult.php" method="post">

	<?php
	if (isset ( $_POST ["city"] ) && ! empty ( $_POST ["city"] )) {
		echo '<br /><h2>You selected ' . $_POST ['city'] . '</h2><br />';
		
		$_SESSION ['citySelected'] = $_POST ['city'];
		
		echo "<br /><input type='submit' name='searchTypeFrom' value='Search As Departure' class='btn btn-default btn-lg col-md-8'><br /><br />";
		echo "<br /><input type='submit' name='searchTypeTo' value='Search As Destination' class='btn btn-default btn-lg col-md-8'><br /><br />";
		echo "<br /><input type='submit' name='searchTypeBoth' value='Search All' class='btn btn-default btn-lg col-md-8'><br /><br />";
	}
	?>
	</form>

		</div>
	</div>
	<!-- /container -->


	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>


</body>
<span class="gr__tooltip"> <span class="gr__tooltip-content"></span> <i
	class="gr__tooltip-logo"></i> <span class="gr__triangle"></span>
</span>
</html>
