<?php require APPROOT .'/views/inc/header.php';  ?>
<?php require APPROOT .'/views/inc/accounts.php' ; ?>

<style>
    tr, td{
        padding:2px
    }
    .form-control{
        border: 1px solid #FB6600;
        padding:2px;
    }
    .form-control:focus { 
  background: white !important;
}
</style>


<!-- Commhr content goes here -->
<div class="content-wrapper" style="background: #fafafa">

    <div class="container-fluid main_container" style='margin-top:-10px'>

        <div class="row">
            <div class="col-12">
                <h1 style='color:#FB6600; font-weight:700' class="page-title"> ADD  CUSTOMERS </h1>
            </div>
        </div>

        <hr/>

        <div id='placeholder'>


            <?php //require APPROOT .'/views/inc/dash.php' ; ?>


        </div>



        <div class="row" style="margin-bottom:20px">


            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class = 'card'>
                    <form method='post' enctype="multipart/form-data">

                        <table  class='table table-bordered table-condensed' style='font-size:12px'>

                            <tr>
                                <td>Customer </td>
                                <td><input type='text' style="<?=(isset($data['cid']))? 'background:lightgreen':'' ?>" value="<?=(isset($data['cid']))? $data['customers']->name:'' ?>" class='form-control' name='name' required></td>
                            </tr>

                            <input type="hidden" name="cid" value="<?=(isset($data['cid']))? $data['cid']:'add' ?>">

                            <tr>
                                <td>Category</td>
                                <td>
                                    <select class="form-control" style="<?=(isset($data['cid']))? 'background:lightgreen':'' ?>" name="category" required>
                                        <option value="">Select Category</option>
                                        <option <?=(isset($data['cid']) && $data['customers']->category =='Debtor')? 'selected':'' ?>>Debtor</option>
                                        <option <?=(isset($data['cid']) && $data['customers']->category =='Creditor')? 'selected':'' ?> >Creditor</option>
                                    </select>

                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td><button class='btn btn-danger' style="font-size: 12px;" type='submit'
                                            name='addconfig' > <?=(isset($data['cid']))? 'Update':'Add' ?> </button>
                                    <?php if(isset($data['cid'])){?>
                                    <a class='btn btn-danger' style="font-size: 12px;background-color:grey" href="<?=URLROOT?>/accounts/config">back</a>
                                    <?php }?>
                                </td>
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
                                foreach($data['listdata'] as $get):
                                    ?>
                                    <tr>
                                        <td><?php  echo $get->name  ?></td>
                                        <td><?php  echo $get->category  ?></td>
                                        <td><a href='<?=URLROOT?>/accounts/config/<?= $get->ac_cid?>'><i class='fa fa-pencil'></i></a></td>
                                        <td><a href='#' class='deletecustomer' customerid='<?php echo $get->ac_cid  ?>'><i class='fa fa-trash'></i></a></td>

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
