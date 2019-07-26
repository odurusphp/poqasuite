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
    .dtrg-level-0{
        background: #0b2c89 !important;
        color: #fff !important;
        font-weight: 700 !important;
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
                                    <table id="example" class="display" style="width:100%">

                                        <thead>
                                        <tr style="display: none">
                                            <th>Main Category</th>
                                            <th>Parent Account</th>
                                            <th>Ledger</th>
                                            <th>Category</th>

                                        </tr>
                                        </thead>
                                        <?php

                                        foreach($data['legdata'] as $get):

                                            ?>
                                            <tr>
                                                <td><?php  echo $get->ledger  ?> </td>
                                                <td><?php  echo $get->parentaccount  ?> </td>
                                                <td><?php  echo $get->category  ?> </td>
                                                <td><?php  echo $get->maincategory  ?> </td>
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
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            orderFixed: [3, 'asc'],
            rowGroup: {
                dataSrc: 3
            },
            "info":true
        } );
    } );
</script>
