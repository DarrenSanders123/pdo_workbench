<?php include "DatabaseController.php"; ?>
<?php

if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo "<a href='./'>go back</a>";
    exit;
} else {
    $auth_user = array('username' => 'admin', 'password' => 'admin');

    if (!($auth_user['username'] == $_SERVER['PHP_AUTH_USER']) || !($auth_user['password'] == $_SERVER['PHP_AUTH_PW'])) {
        header('WWW-Authenticate: Basic realm="My Realm"');
        header('HTTP/1.0 401 Unauthorized');
    }
}

?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Material kit CSS -->
	<link href="assets/css/material-kit.css" rel="stylesheet">
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
	      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

	<title>PDO Workbench</title>
</head>
<body>
<div class="container" style="width: 80rem">
	<div class="row">
		<div class="col">
			<h1 class="text-center">PDO Workbench</h1>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<?php
            $db = new DatabaseController();
            $db->query('SELECT count(*) as count FROM mercedes_amg');
			if ($db->single()['count'] == 0) {
				die ('<br><br><br><h3 class="text-center">No orders in Database</h3>');
			}
			?>
			<table class="table">
				<thead>
				<tr>
					<th scope="col" class="text-center">#</th>
					<th scope="col" class="text-center">Model</th>
					<th scope="col" class="text-center">Option</th>
					<th scope="col" class="text-center">Color</th>
					<th scope="col" class="text-center">Trekhaak</th>
					<th scope="col" class="text-center">Max Vermogen</th>
					<th scope="col" class="text-center">Max Koppel</th>
					<th scope="col" class="text-center">Edit</th>
					<th scope="col" class="text-center">Delete</th>
				</tr>
				</thead>
				<tbody>
                <?php
                $db = new DatabaseController();
                $db->query('SELECT * FROM mercedes_amg');
                foreach ($db->resultset() as $item) {
					$trekhaak = $item['trekhaak'] ? "Ja" : "Nee";
                    echo "<tr>
					<th scope='row' class='text-center'>$item[id]</th>
					<td class='text-center'>$item[model]</td>
					<td class='text-center'>$item[optie]</td>
					<td class='text-center ' style='width: 5rem'><input type='color' class='form-control-sm form-control-color disabled' style='width: 100%' disabled value='$item[color]'></td>
					<td class='text-center'>$trekhaak </td>
					<td class='text-center'>$item[max_vermogen]</td>
					<td class='text-center'>$item[max_koppel]</td>
					<td class='text-center'><i class='bx bx-edit' style='cursor: pointer' onmouseover='makeSolid(this, `edit`)' onmouseleave='makeHollow(this, `edit`)' onclick='edit($item[id])'></i></td>
					<td class='text-center'><i class='bx bx-trash' style='cursor: pointer' onmouseover='makeSolid(this, `trash`)' onmouseleave='makeHollow(this, `trash`)' onclick='deleteItem($item[id])'></i></td>
				  </tr>";
                }
                ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="modal fade" id="delete--modal" tabindex="-1">
	<div class="modal-dialog" >
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Are you sure?</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<p>Are you sure you want to delete this order?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" id="delete--modal--confirm" class="btn btn-danger">Confirm</button>
			</div>
		</div>
	</div>
</div>


<!-- Optional JavaScript; choose one of the two! -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

<script>
	function showModal(modalName, id) {
        const __targetModalName = `${modalName}--modal`;
        let __targetModal = new bootstrap.Modal(document.getElementById(__targetModalName));
        __targetModal.show();

        let modalButton = $(`#${__targetModalName}--confirm`);

        modalButton.click(function () {
            __targetModal.hide();
            window.location.href = `./delete.php?id=${id}`
        });
	}

	function edit(id) {
		window.location.href = `./edit.php?id=${id}`;
	}
    function deleteItem(id) {
        showModal("delete", id);
	}

    function makeSolid(me, icon) {
        me.classList.replace(`bx-${icon}`, `bxs-${icon}`)
    }
    function makeHollow(me, icon) {
        me.classList.replace(`bxs-${icon}`, `bx-${icon}`)
    }
</script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>
</html>