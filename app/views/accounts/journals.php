<?php require APPROOT .'/views/inc/header.php';  ?>
<?php require APPROOT .'/views/inc/accounts.php' ; ?>

<style>
    tr, td{
        padding:2px
    }
    .form-control{
        border: 1px solid #FB6600;
        padding:5px;
    }
    input:focus { 
  background: white !important;
}

    button{
        font-size: 12px;
    }


</style>


<!-- Commhr content goes here -->
<div class="content-wrapper" style="background: #fafafa">

    <div class="container-fluid main_container" style='margin-top:-10px'>

        <div class="row">
            <div class="col-12">
                <h1 style='color:#FB6600; font-weight:700' class="page-title"> JOURNAL MANAGEMENT </h1>
            </div>
        </div>

        <hr/>

        <div id='placeholder'>

            <h3>Make Journal Entries</h3>

            <br/>

            <div>
               <table class="table table-bordered">
                   <tr>
                       <td>
                           <input type="text" class="form-control alldate" placeholder="Entry Date" required  />
                       </td>
                       <td>
                           <select class="form-control" required>
                               <option value="">Select Journal</option>
                               <?php foreach($data['journals'] as $get): ?>
                                   <option><?php  echo $get->journal  ?></option>
                               <?php endforeach; ?>
                           </select>
                       </td>

                       <td>
                           <select class="form-control" required>
                               <option value="">Select Particulars</option>
                                <?php foreach($data['customers'] as $get): ?>
                                    <option><?php  echo $get->name  ?></option>
                                 <?php endforeach; ?>
                           </select>
                       </td>
                       <td>
                           <input type="text" class="form-control" placeholder="Description"/>
                       </td>

                       <td>
                           <input type="text" class="form-control" placeholder="Amount" />
                       </td>

                       <td>
                           <button class="btn btn-danger btn-sm" style="font-size: 12px;">Make Entry</button>
                       </td>


                   </tr>


               </table>
            </div>
        </div>



        <div class="row" style="margin-bottom:20px">


            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class = 'card'>
                    <form method='post' enctype="multipart/form-data">

                        <table  class='table table-bordered table-condensed' style='font-size:12px'>

                            <tr>
                                <td>Journal </td>
                                <td><input type='text' style="<?=(isset($data['jid']))? 'background:lightgreen':'' ?>" class='form-control' value="<?=(isset($data['jid']))? $data['journal']:'' ?>" name='name' required></td>
                            </tr>
                                <input type="hidden" name="jid" value="<?=(isset($data['jid']))? $data['jid']:'add' ?>">

                            <tr>
                                <td></td>
                                <td><button class='btn btn-danger' style="font-size: 12px;" type='submit'
                                            name='addjournal' > <?=(isset($data['jid']))? 'Update':'Add' ?> </button></td>
                            </tr>

                        </table>

                    </form>
                </div>

            </div>

            <div class="col-lg-8 col-md-8 col-sm-8">

                <div class='card'>
                    <div class="container">
                        <br/>
                        <div align='center'>

                            <table  class='table table-bordered table-condensed apptables' style='font-size:12px'>
                                <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>Category</td>
                                    <td>Edit </td>
                                    <td>Delete</td>
                                </tr>
                                </thead>
                                <?php
                                foreach($data['journals'] as $get):
                                    ?>
                                    <tr>
                                        <td><?php  echo $get->journal  ?></td>
                                        <td><?php  echo $get->category  ?></td>
                                        <td><a href='<?= URLROOT?>/accounts/journals/<?=$get->ac_jid?>'> <i class='fa fa-pencil'></i></a></td>
                                        <td><a href='#' class='deletejournal' jid='<?php echo $get->ac_jid  ?>'><i class='fa fa-trash'></i></a></td>

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
