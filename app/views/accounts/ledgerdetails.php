<table class="table table-bordered">

    <tr style="font-weight: 700; font-size:15px">
        <td>Date</td>
        <td>Description</td>
        <td>Amount</td>
    </tr>

    <tr>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <?php foreach($data['ledgerdata'] as $get) {   ?>
    <tr>
        <td><?php echo $get->transactiondate   ?></td>
        <td><?php echo $get->description   ?></td>
        <td><?php echo $get->amount   ?></td>
    </tr>
    <?php } ?>

    <tr style="font-weight: 700; font-size:20px">
        <td></td>
        <td align="right">Total:</td>
        <td align="left"><?php  echo number_format(Transactions::getTotalLedgerAmount($data['ledger']), 2); ?></td>
    </tr>
</table>