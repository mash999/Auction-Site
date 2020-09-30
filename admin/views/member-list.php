
<title>Member List</title>

<style>




</style>


<?php include '../partials/navigations.php';?>


<section class="banished">
	
	<div class="header-h4">
		<h4>Manage Members</h4>
	</div>
	

<div class="container find-mem">          
	<div class="row">

			<div class="col-md-2">
				<h4 class="find">Find Members</h4>
			</div>

        <div class="col-md-3">
            <div id="imaginary_container"> 
                <div class="input-group stylish-input-group">
                    <input type="text" class="form-control"  placeholder="Search" >
                    <span class="input-group-addon">
                        <button type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>  
                    </span>
                </div>
            </div>
        </div>

		<div class="col-md-3">

			<div class="col-md-6" id="ok">
				<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
			</div>
			<div class="col-md-6" id="remove">
				<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
			</div>
			
			
		</div>

	</div>
</div>

	
<div class="container fraud-table">
	<table class="table table-bordered ">
  		<thead>
  			<tr class="th">
  				<th >Name</th>
  				<th>Banished Since</th>
  				<th>Actions</th>
  			</tr>
  		</thead>
  		<tbody>
  			<tr class="tr">
  				<td>Tamanna</td>
  				<td>13.10.13</td>
  				<td><input class="btn btn-default" type="button" value="Banish"></td>
  			</tr>

  			<tr>
  				<td >Mahadi</td>
  				<td>13.05.12</td>
  				<td><input class="btn btn-default" type="button" value="Banish"></td>
  			</tr>


  			 <tr>
  				<td >Ruhul</td>
  				<td>13.10.13</td>
  				<td><input class="btn btn-default" type="button" value="Banish"></td>
  			</tr>

  			  <tr>
  				<td >Ruhul</td>
  				<td>13.10.13</td>
  				<td><input class="btn btn-default" type="button" value="Banish"></td>
  			</tr>
  		</tbody>
	</table>
</div>





<div class="sign">
	
			<div class="col-md-6" >
				<span class="glyphicon glyphicon-ok" aria-hidden="true" id="des"></span>
				<h5>Valid Members</h5>
			</div>
			<div class="col-md-6" >
				<span class="glyphicon glyphicon-remove" aria-hidden="true" id="des"></span>
				<h5>Banished Members</h5>
			</div>
</div>


<div class="rights">
	<p>All rights reserved. Developed By Nsu Cse</p>
</div>










</section> 







