<?php
$n = new User($_SESSION['uid']);
$role =  $n->recordObject->role;
?>

<div class="vertical-menu" style="margin-top:15px; font-size:16px">
    <div href="#" > QUICK MENU </div>

    <a href="<?php echo URLROOT  ?>/accounts/journals"> <i  class="fa  fa-user"></i> Journals / Daybooks</a>
    <a href="<?php echo URLROOT  ?>/accounts/ledgers"><i class="fa  fa-user"></i> Ledger Accounts</a>
    <a href="<?php echo URLROOT  ?>/accounts"> <i class="fa  fa-user"></i> General Ledger</a>
    <a href="<?php echo URLROOT  ?>/accounts/chartofaccount"> <i  class="fa  fa-user"></i> Chart of Accounts</a>
    <a href="<?php echo URLROOT  ?>/accounts"> <i  class="fa  fa-user"></i> Financial Reports</a>
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
