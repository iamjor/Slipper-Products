<!DOCTYPE html>
<!--
 - Author: Jomar Oliver Reyes
 - Author URL: https://www.jomaroliverreyes.com
-->

<!-- Page that displays the lists of slipper products along with their id, name, price and status. -->
<html>
<head>
	<title><?php echo $title; ?></title>
</head>
<body>
	<h1><?php echo $title; ?></h1>
	<!-- Add style to flash data variables -->
	<p style="color:<?php echo $this->session->flashdata('statusColor');?>">
		<?php echo $this->session->flashdata('statusMessage'); ?>
	</p>
	<table>
		<thead>
			<tr>
                <!-- Titles of columns -->
				<th>ID</th>
				<th>Name</th>
				<th>Price</th>
				<th>Status</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<!-- Display slipper id, name, price, availabiilty status and actions -->
			<?php foreach($slippers as $slipper): ?>
			<tr>
				<td><?php echo $slipper["slipper_id"]; ?></td>
				<td><?php echo $slipper["slipper_name"]; ?></td>
				<td><?php echo $slipper["price"]; ?></td>
				<!-- if isAvailable is equal to 1, it is set to Available, if 0, it is set to Not Available -->
				<td><?php echo $slipper["isAvailable"] == 1 ? 'Available' : 'Not Available'; ?></td>
				<td>
					<!-- Goes to http://localhost/project_folder/Lab6/Slippers-App/slippers/edit/[slipper_id] -->
					<a href="<?php echo base_url('slippers/edit/'.$slipper["slipper_id"])?>">Edit</a>
					<!-- Deletes row or all of slipper product information -->
					<a href="<?php echo base_url('slippers/delete/'.$slipper["slipper_id"])?>" onclick="return confirm('Are you sure?');">Delete</a>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>

</body>
</html>