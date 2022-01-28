<?php
include "DatabaseController.php";
$db = new DatabaseController();
$db->query("SELECT * FROM mercedes_amg WHERE id = :id");
$db->bind(':id', $_GET['id']);
$item = $db->single();

?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Material kit CSS -->
	<!-- Bootstrap CSS -->

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
	      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
	      crossorigin="anonymous">

	<title>PDO Workbench</title>
</head>
<body>
<div class="container" style="width: 45rem">
	<h1 class="text-center">Edit de auto</h1>
	<form method="post" action="update.php">
		<input hidden name="id" value="<?=$_GET['id']?>">
		<div class="row mb-2">
			<div class="col">
				<label style="width: 100%">
					Model
					<select class="form-select" name="model">
						<option <?php if ($item['model'] == "A-Class") echo "selected"; ?>>A-Class</option>
						<option <?php if ($item['model'] == "B-Class") echo "selected"; ?>>B-Class</option>
						<option <?php if ($item['model'] == "C-Class") echo "selected"; ?>>C-Class</option>
						<option <?php if ($item['model'] == "D-Class") echo "selected"; ?>>D-Class</option>
						<option <?php if ($item['model'] == "F-Class") echo "selected"; ?>>F-Class</option>
					</select>
				</label>
			</div>
		</div>

		<div class="row mb-2">
			<div class="col">
				<label style="width: 100%">
					Optie pakket
					<select class="form-select" name="options">
						<option <?php if ($item['optie'] == "Low") echo "selected" ?>>Low</option>
						<option <?php if ($item['optie'] == "Simple") echo "selected" ?>>Simple</option>
						<option <?php if ($item['optie'] == "Normal") echo "selected" ?>>Normal</option>
						<option <?php if ($item['optie'] == "Better") echo "selected" ?>>Better</option>
						<option <?php if ($item['optie'] == "High") echo "selected" ?>>High</option>
					</select>
				</label>
			</div>
		</div>

		<div class="row mb-2">
			<div class="col">
				<label style="width: 100%">
					Kleur
					<input name="color" type="color" style="width: 100%" class="form-control form-control-color" value="<?=$item['color']?>">
				</label>
			</div>
		</div>

		<div class="row mb-2">
			<div class="col">
				<div class="form-check form-switch">
					<label class="form-check-label" for="flexSwitchCheckDefault">Trekhaak</label>
					<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"
					       name="trekhaak" <?=$item['trekhaak'] ? "checked" : "" ?>>
				</div>
			</div>
		</div>

		<div class="row mb-2">
			<div class="col">
				<label style="width:100%">
					Maximaal vermogen
					<input class="form-control" type="number" name="max_vermogen" value="<?=$item['max_vermogen']?>">
				</label>
			</div>
		</div>

		<div class="row mb-2">
			<div class="col">
				<label style="width:100%">
					Maximaal koppel</label>
				<input style="width:100%" class="form-control" type="number" name="max_koppel" value="<?=$item['max_koppel']?>">
				</label>
			</div>
		</div>

		<div class="row mb-2">
			<div class="col gap-2">
				<button class="btn btn-danger" type="button" name="back" value="back"
				        onclick="window.location.href = './show.php' ">Back
				</button>
				<button class="btn btn-primary" type="submit" name="submit" value="Submit">Save</button>
			</div>
		</div>
	</form>
</div>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

<script>
    function back() {
        window.back();
    }

</script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>
</html>

