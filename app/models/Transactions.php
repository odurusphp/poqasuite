<?php
/**
 * Created by PhpStorm.
 * User: oduru
 * Date: 7/24/2019
 * Time: 11:54 AM
 */

class Transactions extends tableDataObject
{
   const TABLENAME = 'ac_transactions';

    public static function getsumofledger($ledger){
        global $payrolldb;
        $query = "Select sum(amount) as total from ac_transactions where  ledger = '$ledger' ";
        $payrolldb->prepare($query);
        return $payrolldb->fetchColumn();
    }

    public static function getopeningbalance($ledgerid){
        global $payrolldb;
        $query = "Select amount from ac_openbalance where  ac_nid = '$ledgerid' ";
        $payrolldb->prepare($query);
        return $payrolldb->fetchColumn();
    }


    public static function getTotalLedgerAmount($ledger, $ledgerid){
        $sumofledgers = self::getsumofledger($ledger);
        $openbalance =  self::getopeningbalance($ledgerid);
        $total = $sumofledgers + $openbalance;
        return $total;
    }

    public static function getAllLdegerdetails($ledger){
        global $payrolldb;
        $query = "Select * from ac_transactions where  ledger = '$ledger' ";
        $payrolldb->prepare($query);
        return $payrolldb->resultSet();
    }



}