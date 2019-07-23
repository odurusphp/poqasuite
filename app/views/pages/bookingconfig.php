<?php require APPROOT .'/views/inc/header.php';  ?>
<?php require APPROOT .'/views/inc/side_nav.php' ; ?>

<style>
tr, td{
  padding:2px
}
.form-control{
  border: 1px solid #800080;
  padding:2px;
}

</style>


  <!-- Commhr content goes here -->
  <div class="content-wrapper" style="background: #fafafa">
  

  <div class="container-fluid main_container" style='margin-top:-10px'>

      <div class="row">
        <div class="col-12">
          <h1 style='color:#800080; font-weight:700' class="page-title"> BOOKING CONFIGURATION </h1>
        </div>
   </div>
      
      <hr/>
     
      <div id='placeholder'>


      <?php require APPROOT .'/views/inc/dash.php' ; ?>


      </div>



<div class="row" style="margin-bottom:20px">  


     <div class="col-lg-4 col-md-4 col-sm-12">
     <form method='post'>

     <fieldset style='border:1px solid #000;'>
     <legend style='border:1px solid #000; font-size:15px; font-weight:700; 
     padding:5px; width:200px; margin-left:10px; color:#800080'>Add Booking Config</legend>
      <table  class='table table-bordered table-condensed' style='font-size:12px'>
      
       <tr>
       <td>Booking Name</td>
       <td><input type='text' class='form-control' name='bookingname'></td>
      </tr>

      <tr>
       <td>Type</td>
       <td>
       <select type='form-control' name='bookingtype'>
        <option value=''>-- Select --</option>
        <option>Monthly</option>
        <option>Daily</option>
        <option></option>
       </select>
       
       </td>
      </tr>

      <tr>
       <td>Max. No. of Days / Mths</td>
       <td><input type='text' class='form-control' name='period'></td>
      </tr>

      <tr>
       <td></td>
       <td><button class='btn btn-danger' type='submit' name='addbooking' > Add </button></td>
      </tr>

      </table>
      
      </fieldset>
      </form>
     
      </div>

      <div class="col-lg-8 col-md-8 col-sm-8">
      
      <div>
      <div class="container">
      <br/>
      <div align='center'>



      <table  class='table table-bordered table-condensed table-striped apptables' style='font-size:12px'>
       <thead>
       <tr>
       <td>Name</td>
       <td>Type </td>
       <td>Max. No of Days / Mths</td>
       <!-- <td>Edit </td> -->
       <td>Delete</td>
      </tr>
      </thead>

       <?php
        foreach($data as $get):
       ?>
       <tr>
       <td><?php  echo $get->bookingname  ?></td>
       <td><?php  echo $get->bookingtype  ?></td>
       <td><?php  echo $get->period  ?></td>
       <!-- <td><a href='#'<i class='fa fa-pencil'></i></a></td> -->
       <td><a href='#' class='deletebooking' serviceid='<?php echo $get->bookconfigid ?>'><i class='fa fa-trash'></i></a></td>
     
      </tr>
       <?php
       endforeach;
       ?>


      </table>
      </div>
     </div>
     </div>
    
      </div>


      </div>


      

      <!-- End of first upper row -->


      <div class="row" style="margin-bottom:20px">

      

    
      </div>
    </div>   <!-- End of Placeholder -->

    </div>
    </div>
   

  <!--Footer and JS directies -->
  
  <?php require APPROOT .'/views/inc/footer.php'  ?>




