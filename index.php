<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Crud Oop Project</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
   
  </head>
  <body>
  	<div class="container">
  	 <div class='jumbotron'>
   	    <h1>Medicine Stock</h1>
     </div>
  	</div>

  	<div class="container">
  		<div class="row">
  			<div class="col-md-3"></div>
  			<div class="col-md-6">	
			  <div class="panel panel-primary">
			    <div class="panel-heading">Enter Medicine Detail</div>
			    <div class="panel-body">
			      <form method="post" action="action.php">
			      	<table class="table table-hover">
					    <tbody>
					      <tr>
					      	<td>
						      <div class="row">
							    <div class="col-md-3">
							      <label>Medicine Name</label>
							    </div>
							    <div class="col-md-9">
							      <input type='text' name='medicine'placeholder="Enter medicine name" class="form-control">
							    </div>
					 	       </div>
					        </td>
					      </tr>

					       <tr>
					      	<td>
						      <div class="row">
							     <div class="col-md-3">
							       <label>Quantity</label>
							     </div>
							     <div class="col-md-9">
							      	<input type='text' name='quantity' placeholder="Enter quantity" class="form-control">
							     </div>
					 	       </div>
					        </td>
					      </tr>
         
                          <tr>
					      	<td>
						      <div class="row">
							    <div class="col-md-3 col-sm-offset-4">
							      <input type='submit' class="form-control btn btn-primary" name="submit" value="Store">
							    </div>
							       
					 	      </div>
					        </td>
					      </tr>
					    </tbody>
					  </table>
			      </form>
			    </div>
			  </div>
  			</div>
  			<div class="col-md-3"></div>
  		</div>
  	</div>
     

            <div class="container"> 
	             <div class='row'>
	             	<div class="col-md-2"></div>
	             	<div class="col-md-8">
	             		 <table class="table table-bordered">
						    <thead>
						      <tr>
						        <th>#</th>
						        <th>Medicine Name</th>
						        <th>STock Quantity</th>
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						      </tr>
						    </thead>
						    <tbody>
						      <tr>
						        <td>1</td>
						        <td>Doeewererwe</td>
						        <td>john@example.com</td>
						        <td><a href=""class="btn btn-primary">Edit</a></td>
						        <td><a href=""class="btn btn-danger">Delete</a></td>
						      </tr>
						      
						    </tbody>
						  </table>
	             	</div>
	             	<div class="col-md-2"></div>
	             </div>          
            </div>
 
  </body>
</html>
