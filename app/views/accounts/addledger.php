<table  class='table table-bordered table-condensed' style='font-size:12px'>

    <tr>
        <td>Select Group Ledger</td>
        <td>
            <select class="form-control" name="parentaccount" id="parentaccount">
                <option value="">Select Group Ledger</option>
                <?php foreach ($data['parentaccountdata'] as $get){   ?>
                    <option><?php echo $get->groupledger   ?></option>
                <?php }  ?>
                <option value="None">None</option>
            </select>
        </td>
    </tr>

    <tr>
        <td>Account Name</td>
        <td><input type='text' class='form-control' id='name' required /></td>
    </tr>

        <tr>
            <td>Account Type</td>
            <td>
                <select class="form-control" id="type" required>
                    <option value="">Select Category</option>
                    <option>Fixed Asset</option>
                    <option>Current Asset</option>
                    <option>Long-term Liability</option>
                    <option>Current Liability</option>
                    <option>Income</option>
                    <option>Expense</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>Opening Balance</td>
            <td><input type='text' class='form-control' id='openingbalance' /></td>
        </tr>

        <tr>
            <td>Balance Date</td>
            <td><input type='text' class='form-control alldate' id='openbalancedate'/></td>
        </tr>
        <tr>
            <td></td>
            <td><button class='btn btn-danger' type='button' id='addaccount' > Add </button></td>
        </tr>

</table>

<script>
    $('#parentaccountarea').hide();

    $(".alldate").datepicker({inline: true,
        changeMonth: true, changeYear: true, yearRange: "1920:2080", dateFormat: 'yy-mm-dd' });

</script>
