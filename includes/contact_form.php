<h3> LET'S TALK </h3>
	<p class="subtitle">Need to discuss your project, fill the form below and our strategist will call you in few moments</p>
	<br><br><br>
	<div class="container">
		<div class="col-lg-2">
	</div>
			

<form action method="post" onSubmit="return formSubmit();">

	<div class="col-lg-4">
			  <div class="form-group">
				<label for="exampleInputEmail1">NAME</label>
				<input type="text" name="name" id="fullname" class="form-control" id="exampleInputname" placeholder="enter your name" required>
			  </div>
			  <div class="form-group">
				<label for="exampleInputPassword1">EMAIL</label>
				<input type="email" name="email" id="email" class="form-control" id="exampleInputemail" placeholder="enter your email" required>
			  </div>
			  <div class="form-group">
				<label for="exampleInputPassword1">PHONE</label>
				<input type="text" name="phone" id="phone" class="form-control" id="exampleInputphone" placeholder="enter your phone" required>
			  </div>
	</div>
		
	<div class="col-lg-4">
				
			  <div class="form-group">
				<label for="exampleInputEmail1">QUERY TYPE</label>
				<select  id="qrytype" name="query" class="form-control" id="exampleInputquery" required>
				  <option>Select your query</option>
				  <option>IOS App Development</option>
				  <option>Anroid App Development</option>
				  <option>Mobile Game Development</option>
				  <option>Web Development</option>
				</select>
			  </div>
			  
			  <div class="form-group">
			  <label for="exampleInputEmail1">Enter brief description of your project</label>
			  <textarea class="form-control" id="comments" placeholder="enter your project brief" rows="3" required></textarea>
			  </div>
			  
			  <div class="full">
	    <a href="#dialog_submit" id="modaltrigger" style="display:none">Check</a> <!-- added by JS -->
	     <button type="submit" class="btn btn-default">SUBMIT</button>
	  <!-- <p class="sm-text">Initial Designs in just 48 hours</p> -->
	  </div>
	<!-- <button type="submit" class="btn btn-default">SUBMIT</button> -->

	</div>

</form>

      	<div id="dialog_submit" style="display: none;">Your message has been successfully submitted!</div>
			<div class="col-lg-2">
			</div>
		
		</div>