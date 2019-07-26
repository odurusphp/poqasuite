<?php
/**
 * Created by PhpStorm.
 * User: oduru
 * Date: 7/26/2019
 * Time: 5:01 AM
 */

class Accountsubcategories extends tableDataObject
{
   const TABLENAME = 'ac_subcategories';

    public static function getcategory($subcategory){
        global $payrolldb;
        $query = "Select category from  ac_subcategories  where subcategory = '$subcategory' ";
        $payrolldb->prepare($query);
        return $payrolldb->fetchColumn();
    }
}