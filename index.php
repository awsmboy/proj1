<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">        </script>
     <script src="typeahead.min.js"></script>
    <title>Hello, world!</title>
  </head>
  <body>
 <div class="container pt-5">
  <div class="row justify-content-md-center">
  <div class="col-md-5  ">
 <div class="card">
  <div class="card-body">  
<h2 align="center">Add Order</h2><br>
 
    </head>
    <body>
     

<form>
     <div class="form-group ">
  <!--  <div class="input-group mb-3">
  
  <select class="custom-select" id="inputGroupSelect01">
    <option selected>Choose...</option>
    <option value="1">Existing Customer</option>
    <option value="2">New Customer</option>
    </select> 
</div>   --> 

      <label for="name">Customer Name</label>
      <input type="text" required class="form-control" id="name" placeholder="Name">
    </div>
    
 
  <div class="form-group">
    <label for="pno">Phone Number</label>
    <input type="text" required class="form-control" id="pno" placeholder="ex-888888888">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address </label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div><!--
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div>
  -->
 <div class="form-group">
   <label for="iname">Item Name</label>
     <input type="text" class="form-control typeahead" id="idesc" data-show-subtext="true" data-live-search="true">
 <label for="qty">Quantity</label>
  <input type="Number" class="form-control" id="quantity" name="quantity">
 </div>
 
<div class="form-group">
    

    <table class="table table-bordered table-hover" id="tab_logic">
        <thead>
          
            
            <th class="text-center">
              Name
            </th>
            <th class="text-center">
              quantity
           </th>
          
        </thead>
        <tbody> <tr id='addr0'></tr></tbody>
       
      </table>
    </div>
  </div>
  <button id="add_row" type="submit"class="btn btn-primary " >Add Row</button>
<div class="form-group"></div>
  <button='delete_row1' type="submit"class="btn btn-primary "  onclick="deleteAllRows()">Delete All</button>


</div>

 <!-- <button type="submit" class="btn btn-primary">Sign in</button>
-->
</form>
        
 
</div>
</div>  
</div>
</div>
<script >
       $(document).ready(function(){
      var i=0;
     $("#add_row").click(function(){ 
      $('#addr'+i).html("<td><input name='name"+i+"' type='text' placeholder='Name' class='form-control' value="+document.getElementById('idesc').value+"  > </td><td><input  name='mail"+i+"' type='text' placeholder='Quantity'  value="+document.getElementById('quantity').value+"  class='form-control '></td><td><a id='delete_row' class='btn btn-primary pull-left'onclick='deleteRow(this)'>Delete</a></td>");

      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      i++; 
  });
     

});



</script>
<script>
function deleteRow(r) {
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("tab_logic").deleteRow(i);
}
function deleteAllRows()
{var tableHeaderRowCount = 1;
var table = document.getElementById('tab_logic');
var rowCount = table.rows.length;
for (var i = tableHeaderRowCount; i < rowCount; i++) {
    table.deleteRow(tableHeaderRowCount);


}
  $('#addr0').html("<tbody> <tr id='addr0'></tr></tbody>");
}
</script>
<script>
var $input = $(".typeahead");
$input.typeahead({
  source: [<?php 

       $array = array();
    $con=mysqli_connect("localhost","root","","cafemgmt");
    $query=mysqli_query($con, "select * from item ");
    while($row=mysqli_fetch_assoc($query))
    { echo "{id:"."'".$row['iid']."'".",name:"."'".$row['idesc']."'"."},";
      
    }
echo "],";
?>
  autoSelect: true
});
$input.change(function() {
  var current = $input.typeahead("getActive");
  if (current) {
    // Some item from your model is active!
    if (current.name == $input.val()) {
      // This means the exact match is found. Use toLowerCase() if you want case insensitive match.
    } else {
      // This means it is only a partial match, you can either add a new item
      // or take the active if you don't want new items
    }
  } else {
    // Nothing is active so it is a new value (or maybe empty value)
  }
});
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

  
<script src="bootstrap3-typeahead.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
  
</html>