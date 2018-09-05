<?php 
require "admin_header.php";
if (isset($_SESSION['user_type'])) {?>
	

<body class="admin_home_body">
	


	<div class="row mt-4">
	
	<div class="col-12 col-sm-3 col-md-2 col-lg-2">
		<div class="jumbotron">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate vel libero porro cum ad nisi illo dignissimos inventore culpa quod natus excepturi reprehenderit id mollitia corporis est sunt, doloribus, dolorem fugiat. 
		</div>
		
	</div>
	<div class="col-12 col-sm-12 col-md-5 col-lg-5 " id="main_div">
			<div class="card card2">
  <div class="card-header bg-secondary text-light" align="center">Post Homework</div>
  <div class="card-body"> 

	<form action="postproject" method="POST" enctype="multipart/form-data" >
<div class="form-group">

	<label for="category" class="text-success"><strong>Select Subject &darr;</strong></label>
<select class="selectpicker form-control" name="category" id="category">

  <option>Applied Sciences</option>
  <option>Biology</option>
  <option>Business Finance</option>
  <option>Chemistry</option>
  <option>Computer Science</option>
  <option>Engineering</option>
  <option>English</option>
  <option>History</option>
  <option>Law</option>
  <option>Mathematics</option>
  <option>Nursing</option>
  <option>Psychology</option>
  <option>Other</option>
</select>
</div>
<div class="form-group">
	<label for="topic" class="text-success"><strong>Topic &darr;</strong></label>
	<input type="text" name="topic" class="form-control">
</div>	
<div class="form-group">
	<label for="due_date" class="text-success"><strong>Deadline Date & Time &darr;(EAT time zone)</strong></label>
	<input type="datetime-local" name="due_date" min="2018-04-02" class="form-control">
</div>

<div class="form-group">
	<label for="message" class="text-success"><strong>Details &darr;</strong></label>
	<textarea cols="30" rows="10" name="details" class="form-control" id="message"></textarea>

</div>
<div class="form-group">
	<label for="filesToUpload" class="text-success"><strong>Add files if any &darr;</strong></label>
	<input type="file" name="file[]" class="form-control" id="filesToUpload" multiple/>
</div>
<div id="filename" class="mb-3"></div>
<input type="Submit" value="Submit" name="submit" class="form-control btn btn-outline-success">

</form>

   </div> 

        </div>
			

	</div>
	<div class="col-12 col-sm-12 col-md-5 col-lg-5"></div>
</div>
<?php include("scripts/text_box.js"); ?>

  <script>
  	var inputbtn=document.getElementById("filesToUpload");
  	inputbtn.onchange=function(){
  		var items="";
  		
  		for( var i=0; i< inputbtn.files.length; i++){
  			items +='<li class="list-group-item">' + inputbtn.files[i].name + '</li>'
  		};
  		var filename = document.getElementById("filename");
  		filename.innerHTML='<center> <b class="text-success text-uppercase"> files to be uploaded &darr;</b> <br> <hr> <ul class="list-group"> </center> '  + items +'</ul> <hr>' ;
  	};
  </script>
     	

</body>


<?php }else{
	header("LOCATION:admin");
}
 ?>
