<!DOCTYPE html>
<html>
	<head>
		<title>Internships | Submit a Review</title>
		<link rel="stylesheet" href="style.css">
		<script type="text/javascript">
			function showEmployerDropdown(){
				document.getElementById('employerFields').style.display = 'none';
				document.getElementById('employerDropdown').style.display = 'block';
			}
			function showEmployerFields(){
				document.getElementById('employerDropdown').style.display = 'none';
				document.getElementById('employerFields').style.display = 'inline';
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
			<h1>Submit an Internship Review</h1>
		</div>
		<div class="employerInfo">
			<h2>Employer Information</h2>
			<center>
			<input type="radio" name="tab" value="findemployer" checked="checked" class="radio" onclick="showEmployerDropdown();" />Select Existing Employer
			<input type="radio" name="tab" value="addemployer" class="radio "onclick="showEmployerFields();" />Input Employer Info Manually
			</center>
			<div id="employerDropdown" class="dropdownEmployers">
				<center>
				<select>
					<option>SimVentions</option>
					<option>Naval Surface Warfare Center, Dahlgren Division</option>
					<option>Tech Wizards</option>
					<option>CACI</option>
				</select>
				</center>
			</div>
			<div id="employerFields" class="employerInfoHidden">
				<p>Employer Name</p>
				<input type="text" class="field" size="30" /> <br>
				<p>Address Line 1</p>
				<input type="text" class="field" size="45" /> <br>
				<p>Address Line 2</p>
				<input type="text" class="field" size="45" /> <br>
				<div style="display: inline-block;">
					<p>City</p>
					<input type="text" class="field" size="35" /> <br>
				</div>
				<div style="display: inline-block;">
					<p>State</p>
					<input type="text" class="field" size="2" /> <br>
				</div>
				<div style="display: inline-block;">
					<p>Zip Code</p>
					<input type="text" class="field" size="10" /> <br>
				</div>
				<p>Brief Description</p>
				<textarea class="field" rows="3" cols="71"></textarea>
				<p>Website</p>
				<input type="text" class="field" size="45" /> <br>
				<p>Handshake</p>
				<input type="text" class="field" size="45" /> <br>
			</div>
		</div>
		<div class="reviewInfo">
			<h2>Review</h2>
			<p>Review Title</p>
			<input type="text" class="field" size="50" /> <br>
			<p>Score</p>
			<select class="field">
				<option>Select</option>
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
			</select>
			<p>Pay</p>
			<input type="text" class="field" size="6" /> dollars per hour <br>
			<p>Comments</p>
			<textarea class="field" rows="7" cols="71"></textarea>
			<div style="display: inline-block;">
				<p>Start Date</p>
				<input type="date" class="field" /> <br>
			</div>
			<div style="display: inline-block;">
				<p>End Date</p>
				<input type="date" class="field" /> <br>
			</div>
			<p>Reviewer Email</p>
			<input type="text" class="field" size="35" style="margin-bottom: 20px;" /> <br>
			<center>
				<img src="not-a-robot.png" alt="captcha" width="350" height="100">
				<form action="review_submitted.html" style="margin-top: 20px; margin-bottom: 20px;">
					<input type="submit" value="Submit Review" class="submit" />
				</form>
			</center>
		</div>
	</body>
</html>