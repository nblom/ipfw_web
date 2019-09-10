<?
session_start();
if ($_SESSION['l'] != true) {
        header('Location: index.php');
        exit;    
}
if ($_SESSION['d'] != true) {
	file_put_contents('/tmp/ipfw_ip',$_SERVER['REMOTE_ADDR']);
	file_put_contents('/tmp/ipfw_done',0);
	$_SESSION['d'] = true;
}
if ($_GET['check'] == 'status') {
	$status = file_get_contents('/tmp/ipfw_done');

	if ($status == 1) {
		echo '<div class="alert alert-success" role="alert">';
		echo 'Access granted';
		echo '</div>';
	}
	if ($status == 0) {
		echo '<div class="alert alert-warning" role="alert">';
		echo 'Access pending, please wait';
		echo '</div>';
	}

	exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Status</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">
<script   src="https://code.jquery.com/jquery-3.4.1.min.js"   integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="   crossorigin="anonymous"></script>
  </head>
  <body class="text-center">
<form class="form-signin" method="POST" id="status">
<div class="spinner-border" role="status">
  <span class="sr-only">Loading...</span>
</div>

</form>

<script>
function checkstatus() {
	$.get("ip.php?check=status", function(result) {
		$('#status').html(result);
	});		
}
setInterval(function(){
    checkstatus()
}, 2000);
</script>
</body>
