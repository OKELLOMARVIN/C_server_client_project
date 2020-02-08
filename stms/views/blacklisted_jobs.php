<?php if(!isset($_SESSION['username'])) {

	echo '<p class="alert alert-danger">You are not logged in, please log in first!<p>';
	echo '<meta http-equiv="refresh" content="2;url=?page=login.php" />';
}else {?>

	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">

					<center><h3 id="heading">BLACKLISTED JOBS</h3></center>

<table class='table table-bordered table-hover' border='1'>
	<thead>
		<tr>
			<th>USER ID</th>
			<th>JOB TYPE</th>
			<th>JOB</th>
			<th>REASON</th>
		</tr>
	</thead>
<tbody>

<?php

		$q="SELECT *FROM blacklisted_job";
			$r=mysqli_query($conn,$q);

			if ($r->num_rows>0) {

			while ($row=$r->fetch_assoc()) {
				$userId=$row['userId'];
				$job=$row['job'];
				$jobtype=$row['jobType'];
				$reason=$row['reason'];


						echo "<tr>
								<td>$userId</td>
								<td>$jobtype</td>
								<td>$job</td>
								<td>$reason</td>
							</tr>";
				}
			}
			else{
				echo "<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>";

				echo '<p class="alert alert-danger">No jobs available as yet!</p>';
			}
?>
</tbody>
<tfoot></tfoot>
</table>

				</div>
			</div>
		</div>
	</div>


<?php } ?>
