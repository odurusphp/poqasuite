<style >
tr, td{
  padding:2px
}
</style>


<?php require APPROOT .'/views/inc/header.php';  ?>
<?php require APPROOT .'/views/inc/operationsmenu.php' ; ?>

<div id="viewmodal" class="modal fade" role="dialog">
          <div class="modal-dialog" style="width:400px" role="document">

              <div class="modal-content">
                  <div class="modal-body" id="ajaxcontainer" >

                  </div>

              </div>
          </div>
</div>


<div class="content-wrapper">

  <div style='padding-left:20px; color:#7F400B'><h3><?php echo $data['status']  ?></h3></div>
  <hr/>

    <div class="container-fluid main_container">

      <div id='placeholder' style='margin-top:-30px'>
        <?php //require APPROOT .'/views/inc/analysisbar.php' ; ?>
      <div class="row" style="margin-bottom:20px;">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <a href="#">
        <div class="card"
        <div class="container" style="padding:10px">
          <br/>

          <table  class='table table-bordered table-condensed apptables' style='font-size:12px'>
           <thead>
           <tr>
           <td>Employee</td>
           <td>Department</td>
           <td>Position</td>
           <td>Reported Date</td>
           <td>Status</td>
           <td>View </td>
           <td>Action</td>
          </tr>
          </thead>

           <?php
            foreach($data['listdata'] as $get):
              $em = new Employee($get->employeeid);
              $employeename  = $em->recordObject->fullname;

              $status = $data['status'];
              if($status == 'Transfer'){
                $id = $get->tid ;
              }else{
                  $id = $get->pid ;
              }
           ?>
           <tr>
           <td><?php echo $employeename;  ?></td>
           <td><?php  echo $get->department ?></td>
           <td><?php  echo $get->position ?></td>
           <td><?php  echo $get->reportdate ?></td>
           <td><?php if($get->status == ''){
               echo '<span style="color:orange">Pending</span>';
           }elseif($get->status == 'Approve'){
               echo '<span style="color:green">Approved</span>';
           }elseif($get->status  == 'Decline'){
               echo '<span style="color:red">Declined</span>';
           }
           ?></td>
           <td><a href='<?php  echo URLROOT.'/operations/operationprofile/'.$data['status'].'/'.$id   ?>' >View</a></td>

           <td>
             <?php //if($_SESSION['uid'] == $get->recipientid  ):  ?>
             <a href='#' class='promoactionmodule' status='<?php echo $data['status'] ?>' actionid='<?php echo  $id ?>' >Action</a>
             <?php //endif;  ?>
           </td>

          </tr>
           <?php
           endforeach;
           ?>



          </table>
          <div>

          </div>

        </div>
        </div>
        </a>
      </div>



    </div>   <!-- End of Placeholder -->

    </div>
    </div>


  <!--Footer and JS directies -->

  <?php require APPROOT .'/views/inc/footer.php'  ?>
