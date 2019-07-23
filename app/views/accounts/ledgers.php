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

    .ui-accordion .ui-accordion-header {
        display: block;
        cursor: pointer;
        position: relative;
        margin:0px;
        padding: .5em .5em .5em .7em;
        font-size: 100%;
    }

</style>


<!-- Commhr content goes here -->
<div class="content-wrapper" style="background: #fafafa">

    <div id="empmodal" class="modal fade" role="dialog">
        <div class="modal-dialog" style="width:800px" role="document">

            <div class="modal-content">
                <div class="modal-body" id="ajaxcontainer" >

                </div>

            </div>
        </div>
    </div>

    <div class="container-fluid main_container" style='margin-top:-10px'>
       <br/>
        <div class="row">
            <div class="col-8">
                <h3 style='color:#FB6600; font-weight:700' class="page-title"> ADD LEDGER ACCOUNTS </h3>
            </div>

            <div class="col-4">

                <button class="btn btn-danger pull-right addnewledger">  Add Ledger Account</button>
            </div>
        </div>

        <hr/>

        <div id='placeholder'>


            <?php //require APPROOT .'/views/inc/dash.php' ; ?>


        </div>



        <div class="row" style="margin-bottom:20px">

            <div class="col-lg-12 col-md-12 col-sm-12">

                <div class='card0'>
                    <div class="container">
                        <div>

                            <div id="accordion">
                                <?php
                                foreach($data['parentaccountdata'] as $led):
                                ?>
                                    <h3><?php  echo $led->ledger  ?></></h3>
                                <div>
                                    <table  class='table table-bordered' style='font-size:12px'>
                                        <?php
                                         $subdata  = Ledgers::getledgerbyparent($led->ledger);
                                        foreach($subdata as $get):
                                            ?>
                                            <tr>
                                                <td><?php  echo $get->ledger  ?></td>
                                                <td><?php  echo $get->category  ?></td>

                                            </tr>
                                            <?php
                                        endforeach;
                                        ?>

                                    </table>

                                </div>
                                <?php endforeach; ?>
                            </div>


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
