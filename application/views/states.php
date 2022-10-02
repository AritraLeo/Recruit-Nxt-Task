<?php require('header.php');
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] != true)
	redirect('/');

if (isset($_SESSION['StateEdit']) &&  $_SESSION['StateEdit'] == true) {
	$StateNameEdit = $_SESSION['StateName'];
	$StateImageEdit = $_SESSION['image'];
	$StateIdEdit = $_SESSION['StateEditId'];
}

if (isset($_POST['submit'])) {
	echo $_POST['StateImgUrl'];
	echo $_POST['State'];
}

?>

<body class="container-fluid col-md-7 mt-4">

	<!-- Table of States -->
	<div class="add-form">
		<a class="btn btn-secondary" href="<?php base_url() ?>Home/removeEdit">Refresh State</a>
		<form action="<?php base_url() ?>Home/<?php if (isset($_SESSION['StateEdit']) &&  $_SESSION['StateEdit'] == true)  echo "editStateAction";  else echo 'addState';?>" method="POST">
			<!-- enctype="multipart/form-data" -->
			<div class="form-group">
				<label for="exampleInputEmail1">State</label>
				<input type="text" class="form-control" name="State" value="
					<?php
					if (!empty($StateNameEdit)) {
						echo set_value('State', $StateNameEdit);
					}
					?>
					" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter State">

			</div>
			<!-- Image Url -->
			<div class="form-group">
				<label for="exampleInputEmail1">Image Url</label>
				<input type="text" class="form-control" name="StateImgUrl" value="
					<?php
					if (!empty($StateImageEdit)) {
						echo set_value('StateImgUrl', $StateImageEdit);
					}
					?>
					" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Image Url">
			</div>

			<!-- <div class="form-group">
				<label for="exampleFormControlFile1">Example file input</label>
				<input type="text" class="form-control-file" name="" value="
					<?php
					// if (!empty($StateImageEdit)) {
					// 	echo $StateImageEdit;
					// }
					?> id=" exampleFormControlFile1">
			</div> -->
		</div>
		<div class="add-btn mb-3"><button type="submit" class="btn <?php if (isset($_SESSION['StateEdit']) && $_SESSION['StateEdit'] == true) {
			echo 'btn-success';
		} else
		echo 'btn-primary'
		?>" name="
			submit
			"
			>
			
			<?php
			if (isset($_SESSION['StateEdit']) && $_SESSION['StateEdit'] == true) {
				echo 'EDIT';
			} else
			echo 'ADD';
			?>
</button>
		</div>
</form>
</div>



	<!-- Table -->
	<table class="table table-dark">
		<thead>
			<tr>
				<th scope="col">SNO</th>
				<th scope="col">Name</th>
				<th scope="col">Image</th>
				<th scope="col" style="
				<?php
				if ($_SESSION['type'] < 2)
					echo 'display: none';
				?>
				">Edit</th>
				<th scope="col" style="
				<?php
				if ($_SESSION['type'] < 3)
					echo 'display: none';
				?>
				">Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$states = $this->db->where('country_id', '101')->get('states')->result_array();
			$stateName = '';
			$stateImag;
			$i = 1;
			foreach ($states as $state) {
			?>
				<tr>
					<th scope="row"><?php echo $i;  ?></th>
					<td><img width="70px" height="60px" src=" <?php echo $state['image']   ?>" alt=" <?php echo $state['image']   ?>"></td>
					<td><?php echo $state['name'];   ?></td>
					<td><?php
						if ($_SESSION['type'] > 1) {
							echo '<a class="btn btn-primary" href="' . base_url() . 'Home/editState/' . $state['id'] . '"> Edit </a>';
						}  ?></td>
					<td><?php
						if ($_SESSION['type'] > 2) {
							echo '<a class="btn btn-danger" href="' . base_url() . 'Home/deleteState/' . $state['id'] . '"> Delete </a>';
						}
						?></td>
				</tr>
			<?php $i++;
			} ?>
		</tbody>
	</table>
</body>

</html>
