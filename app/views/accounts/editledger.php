<table  class='table table-bordered table-condensed' style='font-size:12px'>
    <input type="hidden" name="accid" id='accid' value="<?= $data['ledger']->ac_nid?>">

        <tr>
            <td>Account Type</td>
            <td>
                <select class="form-control" id="type" required>
                    <option ><?= $data['ledger']->category?></option>
                    <?php foreach ($data['catdata'] as $get){   ?>
                        <option><?php echo $get->category   ?></option>
                    <?php }  ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Account Name</td>
            <td><input type='text' class='form-control' id='name'  value = "<?= $data['ledger']->ledger ?>" required /></td>
        </tr>
        <tr>
            <td>Is it a sub-Ledger ?</td>
            <td>
                <select class="form-control subledger" id="subledger" required>
                    <option value="">Select Option</option>
                    <option <?= ($data['ledger']->classification == 'sub') ? 'selected': '' ?> value="sub">Yes</option>
                    <option <?= ($data['ledger']->classification == 'main') ? 'selected': '' ?> value="main">No</option>
                </select>
            </td>
        </tr>

        <tr style="display:<?= ($data['ledger']->parentaccount=='') ? 'none' :''?>" id="parentaccountarea">
            <td>Select Parent Account</td>
            <td>
                <select class="form-control" name="parentaccount" id="parentaccount">
                    <option ><?= $data['ledger']->parentaccount?></option>
                    <?php foreach ($data['parentaccountdata'] as $get){   ?>
                        <option><?php echo $get->ledger   ?></option>
                    <?php }  ?>
                </select>
            </td>
        </tr>

        <tr>
            <td>Opening Balance</td>
            <td><input type='text' class='form-control' value="<?= $data['ledger']->openingbalance?>" id='openingbalance' /></td>
        </tr>

        <tr>
            <td>Balance Date</td>
            <td><input type='text' class='form-control alldate' value="<?= $data['ledger']->opendate?>" id='openbalancedate'/></td>
        </tr>
        <tr>
            <td></td>
            <td><button class='btn btn-danger' type='button' id='addaccount' > Update </button>
            <button class='btn ' style="background:red" type='button' id='deleteaccount'  accid="<?= $data['ledger']->ac_nid?>"> Delete </button>
            </td>
        </tr>

</table>


<script>
  $(".alldate").datepicker({inline: true,
    changeMonth: true, changeYear: true, yearRange: "1920:2080", dateFormat: 'yy-mm-dd' });
  
</script>