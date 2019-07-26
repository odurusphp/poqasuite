<style>
    tr, td{
        padding:2px
    }

    .card-img {
        width: 80% !important
    }

</style>


<?php require APPROOT .'/views/inc/header.php';  ?>
<?php require APPROOT .'/views/inc/accounts.php' ;

$n = new User($_SESSION['uid']);
$role =  $n->recordObject->role;

?>



<div class="content-wrapper">


    <div class="container-fluid main_container">


        <div id='placeholder'>


            <div class="row" style="margin-bottom:20px">
                <?php if($role == 'HR Manager' || $role == 'Administrator' || $role == 'Head of Admin' || $role == 'Site Manager'){
                    ?>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <a href="<?php echo URLROOT.'/pages/employees' ?>">
                            <div class="card">
                                <div class="container">
                                    <h4><b>&nbsp;</b></h4>
                                    <div align='center'  class="img-holder">
                                        <img class="card-img" src="<?php echo URLROOT ?>/img/incomestatement.jpg" /> </div>
                                    <p align="center" class="roboto" >Trial Balance </p>
                                    <h4><b>&nbsp;</b></h4>
                                </div>
                            </div>
                        </a>
                    </div>

                    <?php
                }
                ?>

                <?php if($role == 'HR Manager' || $role == 'Administrator' || $role == 'Head of Admin'){
                    ?>

                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <a href="<?php  echo URLROOT.'/pages/companies';  ?>">
                            <div class="card">
                                <div class="container">
                                    <h4><b>&nbsp;</b></h4>
                                    <div align='center' class="img-holder">
                                        <img class="card-img" src="<?php echo URLROOT ?>/img/financialstatement.jpg"  /> </div>
                                    <p align="center" class="roboto" >Income Statement </p>
                                    <h4><b>&nbsp;</b></h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                }
                ?>

                <?php
                if($role == 'Administrator' || $role == 'Head of Admin' || $role == 'Payroll Manager'){
                ?>
                <div class="col-lg-4 col-md-4 col-sm-12">

                    <div class="card">
                        <a href="<?php echo  URLROOT.'/pages/payperiod';?>">
                            <div class="container">

                                <h4><b>&nbsp;</b></h4>
                                <div align='center' class="img-holder">
                                    <img class="card-img" src="<?php echo URLROOT ?>/img/cashflow.jpg" /> </div>
                                <p align="center" class="roboto" >Payroll Configuarions </p>
                                <h4><b>&nbsp;</b></h4>
                            </div>
                    </div>
                    </a>
                </div>

            </div>

            <?php } ?>
        </div>

        <!-- End of first upper row -->


        <div class="row" style="margin-bottom:20px">

            <div class="col-lg-4 col-md-4 col-sm-12">
                <a href="<?php echo URLROOT ?>/payrollreport/mainpayroll">
                    <div class="card">
                        <div class="container">
                            <h4><b>&nbsp;</b></h4>
                            <div align='center' class="img-holder">
                                <img class="card-img" src="<?php echo URLROOT ?>/img/balancesheet.png" /> </div>
                            <p align="center" class="roboto" >Balance Sheet </p>
                            <h4><b>&nbsp;</b></h4>
                        </div>
                    </div>
                </a>
            </div>


        </div>
    </div>   <!-- End of Placeholder -->

</div>
</div>


<!--Footer and JS directies -->

<?php require APPROOT .'/views/inc/footer.php'  ?>
