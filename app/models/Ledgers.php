<?php
/**
 * Created by PhpStorm.
 * User: oduru
 * Date: 7/23/2019
 * Time: 2:39 PM
 */

class Ledgers extends tableDataObject
{
    const TABLENAME  = 'ac_ledgers';


    public static function getmainaccounts(){
        global $payrolldb;
        $query = "Select * from ac_ledgers  where classification = 'main' ";
        $payrolldb->prepare($query);
        return $payrolldb->resultSet();
    }

    public static function getledgerbyparent($parentaccount){
        global $payrolldb;
        $query = "Select * from ac_ledgers  where parentaccount = '$parentaccount' ";
        $payrolldb->prepare($query);
        return $payrolldb->resultSet();
    }
}