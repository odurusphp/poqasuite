<table class="table table-bordered">

    <tr style="font-weight: 700; font-size:15px">
        <td>Date</td>
        <td>Description</td>
        <td>Amount</td>
    </tr>
    <?php if(isset($data['opendata']->balancedate)) {   ?>
    <tr>
        <td><?php echo $data['opendata']->balancedate   ?></td>
        <td>Opening Balance</td>
        <td><?php echo number_format($data['opendata']->amount, 2)  ?></td>
    </tr>
    <?php  } ?>

    <?php foreach($data['ledgerdata'] as $get) {   ?>
    <tr>
        <td><?php echo $get->transactiondate   ?></td>
        <td><?php echo $get->description   ?></td>
        <td><?php echo number_format($get->amount,2)  ?></td>
    </tr>
    <?php } ?>

    <tr style="font-weight: 700; font-size:20px">
        <td></td>
        <td align="right">Total:</td>
        <td align="left"><?php  echo number_format(Transactions::getTotalLedgerAmount($data['ledger'], $data['ledgerid'] ), 2); ?></td>
    </tr>
</table>