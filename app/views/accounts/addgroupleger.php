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
        <td></td>
        <td><button class='btn btn-danger' type='button' id='addgroupaccount' > Add </button></td>
    </tr>

</table>


