<table  class='table table-bordered table-condensed' style='font-size:12px'>
        <tr>
            <td>Account Type</td>
            <td>
                <select class="form-control" id="type" required>
                    <option value="">Select Category</option>
                    <?php foreach ($data['catdata'] as $get){   ?>
                        <option><?php echo $get->category   ?></option>
                    <?php }  ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Account Name</td>
            <td><input type='text' class='form-control' id='name' required /></td>
        </tr>
        <tr>
            <td>Is it a sub-Ledger ?</td>
            <td>
                <select class="form-control subledger" id="subledger" required>
                    <option value="">Select Option</option>
                    <option value="sub">Yes</option>
                    <option value="main">No</option>
                </select>
            </td>
        </tr>

        <tr id="parentaccountarea">
            <td>Select Parent Account</td>
            <td>
                <select class="form-control" name="parentaccount" id="parentaccount">
                    <option value="">Select Account</option>
                    <?php foreach ($data['parentaccountdata'] as $get){   ?>
                        <option><?php echo $get->ledger   ?></option>
                    <?php }  ?>
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
