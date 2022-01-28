<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Bestel uw Mercedes AMG</title>
</head>
<body>
<?php
if (isset($_GET['msg']) && $_GET['msg'] == 'success') {
    echo "<div class='alert alert-success' id='alert' role='alert'>
                Data has been successfully send to the database!
		   </div><script>window.history.pushState({}, document.title, '/pdo_sandbox');</script>";
} elseif (isset($_GET['msg']) && $_GET['msg'] == 'fail') {
    echo "<div class='alert alert-danger' id='alert' role='alert'>
                Something went wrong saving your data!
		   </div><script>window.history.pushState({}, document.title, '/pdo_sandbox');</script>";
}
?>
<div class="container" style="width: 45rem">
    <h1 class="text-center">Bestel uw Mercedes AMG</h1>
    <form method="post" action="save.php">
        <div class="row mb-2">
            <div class="col">
                <label style="width: 100%">
                        Model
                    <select class="form-select" name="model">
                        <option>A-Class</option>
                        <option>B-Class</option>
                        <option>C-Class</option>
                        <option>D-Class</option>
                        <option>F-Class</option>
                    </select>
                </label>
            </div>
        </div>

        <div class="row mb-2" >
            <div class="col">
                <label style="width: 100%">
                        Optie pakket
                    <select class="form-select" name="options">
                        <option>Low</option>
                        <option>Simple</option>
                        <option>Normal</option>
                        <option>Better</option>
                        <option>High</option>
                    </select>
                </label>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col">
                <label style="width: 100%">
                    Kleur
                    <input name="color" type="color" style="width: 100%" class="form-control form-control-color">
                </label>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col">
                <div class="form-check form-switch">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Trekhaak</label>
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="trekhaak">
                </div>
            </div>
        </div>

        <div class="row mb-2">
                <div class="col">
                    <label style="width:100%">
                        Maximaal vermogen
                        <input class="form-control" type="number" name="max_vermogen">
                    </label>
                </div>
        </div>

        <div class="row mb-2">
                <div class="col">
                    <label style="width:100%">
                        Maximaal koppel</label>
                        <input  style="width:100%" class="form-control" type="number" name="max_koppel">
                    </label>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col">
                <button class="btn btn-primary" style="width:100%" type="submit" name="submit">Verstuur</button>
            </div>
        </div>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    setTimeout(function() {
        $('#alert').fadeOut('fast');
    }, 1000); // <-- time in milliseconds
</script>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>
</html>

