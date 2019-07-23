<?php
/**
 * Created by PhpStorm.
 * User: oduru
 * Date: 7/23/2019
 * Time: 11:25 AM
 */

class Accounts extends Controller
{

    public function dashboard(){
        $this->view('accounts/accountdashboard');
    }

    public function config(){

        if(isset($_POST['addconfig'])){
            $cr  = new AccountCustomers();
            $cr->recordObject->name = $_POST['name'];
            $cr->recordObject->category = $_POST['category'];
            $cr->store();
            $listdata = AccountCustomers::listAll();
            $data = ['listdata'=>$listdata];
            $this->view('accounts/config', $data);
            exit;
        }

        $listdata = AccountCustomers::listAll();
        $data = ['listdata'=>$listdata];
        $this->view('accounts/config', $data);
    }

    public function journals(){

        if(isset($_POST['addjournal'])){
            $cj  = new Journals();
            $cj->recordObject->journal = $_POST['name'];
            $cj->recordObject->category = 'Configured';
            $cj->store();
            $listjournals  = Journals::listAll();
            $customers = AccountCustomers::listAll();
            $data = ['journals'=> $listjournals, 'customers'=>$customers];
            $this->view('accounts/journals', $data);
            exit;
        }

        $listjournals  = Journals::listAll();
        $customers = AccountCustomers::listAll();
        $data = ['journals'=> $listjournals, 'customers'=>$customers];
        $this->view('accounts/journals', $data);
    }


    public function addledgers(){
         $cr  = new Ledgers();
         print_r($cr->recordObject);

        $cr->recordObject->ledger = $_POST['name'];
        $cr->recordObject->category = $_POST['type'];
        $cr->recordObject->openingbalance = $_POST['openingbalance'];
        $cr->recordObject->classification = $_POST['subledger'];
        $cr->recordObject->parentaccount = $_POST['parentaccount'];
        $cr->recordObject->datecreated = date('Y-m-d H:i:s');
        $cr->recordObject->opendate  = date('Y-m-d');
        $cr->store();
    }

    public function ledgers(){
        $catdata = Accountcategory::listAll();
        $legdata = Ledgers::listAll();
        $parentaccountdata = Ledgers::getmainaccounts();
        $data = ['catdata'=>$catdata, 'legdata'=>$legdata, 'parentaccountdata'=>$parentaccountdata];
        $this->view('accounts/addledger', $data);
    }


    public function chartofaccount(){
        $catdata = Accountcategory::listAll();
        $legdata = Ledgers::listAll();
        $parentaccountdata = Ledgers::getmainaccounts();
        $data = ['catdata'=>$catdata, 'legdata'=>$legdata, 'parentaccountdata'=>$parentaccountdata];
        $this->view('accounts/ledgers', $data);
    }

}