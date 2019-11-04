<!DOCTYPE html>
<html>
	<head>
		<title>Internships | Home</title>
		<link rel="stylesheet" href="style.css">
		<script type="text/javascript">
			function displayRow1(){
				document.getElementById('row1').style.display = 'block';
			}
		</script>
	</head>
	<body>
		<div class="nav">
			<ul>
  				<li><a href="internship_home.html">Internships Home</a></li>
  				<li><a href="add_review.html">Submit an Internship Review</a></li>
			</ul> 
		</div>
		<div class="title">
			<h1>UMW Computer Science Internships</h1>
			<p>This is a resource for exploring reviews and testimonies from current students and alumni about their computer science internship experiences.<br> Select an employer from the table or a pin on the map to view employer details or leave a review.</p>
		</div>
		<div class="employerList">
			<table>
				<tr>
					<th>Employer</th>
					<th>City</th>
				</tr>
				<tr onclick="displayRow1()">
					<td>SimVentions</td>
					<td>Fredericksburg, VA</td>
					<div id="row1" class="dropdownHidden">
						<ul>
							<li><a href="employer_profile.html">View Employer Details</a></li>
							<li><a href="add_review.html">Submit a Review</a></li>
						</ul>
					</div>
				</tr>
				<tr>
					<td>Naval Surface Warfare Center, Dahlgren Division</td>
					<td>Dahlgren, VA</td>
				</tr>
				<tr>
					<td>Tech Wizards</td>
					<td>Dahlgren, VA</td>
				</tr>
				<tr>
					<td>CACI</td>
					<td>Arlington, VA</td>
				</tr>
			</table>
		</div>
		<div class="map">
			<a href="employer_profile.html"><img src="map.PNG" alt="interactive map" height="350" width="425" border="3"></a>
		</div>
	</body>
</html>