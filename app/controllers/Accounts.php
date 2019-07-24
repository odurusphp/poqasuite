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

    public function journals($jid=null){

        // save or update
        if(isset($_POST['addjournal'])){
            $jid= $_POST['jid']=='add'? null : $_POST['jid'];
            $cj  = new Journals($jid);
            $cj->recordObject->journal = $_POST['name'];
            $cj->recordObject->category = 'Configured';
            $cj->store();
            Redirecting::location('accounts/journals');
        }

        // edits
        if(isset($jid)){
            $cj  = new Journals($jid);
            $journal = $cj->recordObject->journal;
            $listjournals  = Journals::listAll();
            $customers = AccountCustomers::listAll();
            $data = ['journals'=> $listjournals, 'customers'=>$customers,'journal'=>$journal,'jid'=>$jid ];
            $this->view('accounts/journals', $data);
            exit;

        }

        $listjournals  = Journals::listAll();
        $customers = AccountCustomers::listAll();
        $data = ['journals'=> $listjournals, 'customers'=>$customers];
        $this->view('accounts/journals', $data);
    }


    public function addledgers(){
        $accid = $_POST['accid']=='' ? null : $_POST['accid'];
         $cr  = new Ledgers($accid);
        $cr->recordObject->ledger = $_POST['name'];
        $cr->recordObject->category = $_POST['type'];
        $cr->recordObject->openingbalance = $_POST['openingbalance'];
        $cr->recordObject->classification = $_POST['subledger'];
        $cr->recordObject->parentaccount = $_POST['parentaccount'];
        $cr->recordObject->datecreated = date('Y-m-d H:i:s');
        $cr->recordObject->opendate  = $_POST['opendate'];
        $cr->store();
    }

    public function ledgers(){
        $catdata = Accountcategory::listAll();
        $legdata = Ledgers::listAll();
        $parentaccountdata = Ledgers::getmainaccounts();
        $data = ['catdata'=>$catdata, 'legdata'=>$legdata, 'parentaccountdata'=>$parentaccountdata];
        $this->view('accounts/addledger', $data);
    }

    public function editledgers($lid){
        $cr  = new Ledgers($lid);
        $ledger = &$cr->recordObject;
        $catdata = Accountcategory::listAll();
        $parentaccountdata = Ledgers::getmainaccounts();
        $data = ['catdata'=>$catdata, 'ledger'=>$ledger, 'parentaccountdata'=>$parentaccountdata];
        $this->view('accounts/editledger', $data);
    }


    public function chartofaccount(){
        $catdata = Accountcategory::listAll();
        $legdata = Ledgers::listAll();
        $parentaccountdata = Ledgers::getmainaccounts();
        $data = ['catdata'=>$catdata, 'legdata'=>$legdata, 'parentaccountdata'=>$parentaccountdata];
        $this->view('accounts/ledgers', $data);
    }

}