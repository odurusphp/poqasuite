<?php
$n = new User($_SESSION['uid']);
$role =  $n->recordObject->role;
?>

<div class="vertical-menu" style="margin-top:15px; font-size:16px">
    <div href="#" > QUICK MENU </div>

    <a href="<?php echo URLROOT  ?>/accounts/groupledger"> <i  class="fa  fa-folder-open"></i> Group Ledgers</a>
    <a href="<?php echo URLROOT  ?>/accounts/journals"> <i  class="fa  fa-cog"></i> Journals / Daybooks</a>
    <a href="<?php echo URLROOT  ?>/accounts/generaledger"> <i class="fa  fa-file"></i> General Ledger</a>
    <a href="<?php echo URLROOT  ?>/accounts/chartofaccount"> <i  class="fa  fa-link"></i> Chart of Accounts</a>
    <a href="<?php echo URLROOT  ?>/accounts/financedashboard"> <i  class="fa  fa-bars"></i> Financial Statements</a>
</div>


<div class="vertical-menu" style="margin-top:15px; font-size:16px">
    <div href="#" > CONFIGURATIONS</div>

    <a href="<?php echo URLROOT  ?>/accounts/config"> <i  class="fa  fa-users"></i> Add Customers</a>

</div>

</ul>


<ul class="navbar-nav ml-auto">
    <li class="nav-item" style="te">
        <a class="nav-links">

            <img class="notification_icon" src="<?php echo URLROOT ?>/asset/notification.png" alt="">
        </a>
    </li>
</ul>
</div>
</nav>
