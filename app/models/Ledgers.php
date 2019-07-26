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

    public static function getledgerid($ledger){
        global $payrolldb;
        $query = "Select ac_nid from ac_ledgers  where ledger = '$ledger' ";
        $payrolldb->prepare($query);
        return $payrolldb->fetchColumn();
    }

    public static function getledgerbyparent($parentaccount){
        global $payrolldb;
        $query = "Select * from ac_ledgers  where parentaccount = '$parentaccount' ";
        $payrolldb->prepare($query);
        return $payrolldb->resultSet();
    }


    public static function getsubaccounts(){
        global $payrolldb;
        $query = "Select * from ac_ledgers  where classification = 'sub' ";
        $payrolldb->prepare($query);
        return $payrolldb->resultSet();
    }

    public static function insertopeningbalance($lid, $amount, $balancedate){
        global $payrolldb;
        $query = "INSERT INTO ac_openbalance (ac_nid, amount, balancedate) values ($lid, $amount, '$balancedate' ) ";
        $payrolldb->prepare($query);
        $payrolldb->execute();
    }

    public static function getopeningbalance($ledger){
        global $payrolldb;
        $query = "Select openingbalance, opendate from ac_ledgers  where ledger = '$ledger'  ";
        $payrolldb->prepare($query);
        return $payrolldb->singleRecord();
    }

    public static function getopeningbalancecount($ledger){
        global $payrolldb;
        $query = "Select openingbalance, opendate from ac_ledgers  where ledger = '$ledger' and openingbalance   ";
        $payrolldb->prepare($query);
        return $payrolldb->fetchColumn();
    }



}