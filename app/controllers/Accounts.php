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

    public function config($cid=null){

        if(isset($_POST['addconfig'])){
            $cid= $_POST['cid']=='add'? null : $_POST['cid'];

            $cr  = new AccountCustomers($cid);
            $cr->recordObject->name = $_POST['name'];
            $cr->recordObject->category = $_POST['category'];
            $cr->store();
            $listdata = AccountCustomers::listAll();
            $data = ['listdata'=>$listdata];
            Redirecting::location('accounts/config');
          
        }

        // edits
        if(isset($cid)){
            $cr  = new AccountCustomers($cid);
           $accountCustomers = &$cr->recordObject;
            $listdata = AccountCustomers::listAll();
            $data = ['listdata'=>$listdata,'cid'=>$accountCustomers->ac_cid,'customers'=>$accountCustomers];
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
            exit;
        }

        // edits
        if(isset($jid)){
            $cj  = new Journals($jid);
            $journal = $cj->recordObject->journal;
            $listjournals  = Journals::listAll();
            $customers = AccountCustomers::listAll();
            $subaccounts  = Ledgers::listAll();
            $data = ['journals'=> $listjournals, 'customers'=>$customers,'journal'=>$journal,
                     'jid'=>$jid, 'subaccounts'=>$subaccounts];
            $this->view('accounts/journals', $data);
            exit;

        }

        //making journal transactions

        if(isset($_POST['addtransaction'])){

            $ac_nid = Ledgers::getledgerid($_POST['jaccount']);
            $ts = new Transactions();
            $ts->recordObject->transactiondate = $_POST['entrydate'];
            $ts->recordObject->journal = $_POST['journalname'];
            $ts->recordObject->ledger = $_POST['jaccount'];
            $ts->recordObject->description = $_POST['jdescription'];
            $ts->recordObject->amount = $_POST['jamount'];
            $ts->recordObject->ac_nid = $ac_nid;
            $ts->store();

            $listjournals  = Journals::listAll();
            $customers = AccountCustomers::listAll();
            $subaccounts  = Ledgers::listAll();
            $transactiodata = Transactions::listAll();
            $data = ['journals'=> $listjournals, 'customers'=>$customers,'subaccounts'=>$subaccounts,
                     'transactiondata'=> $transactiodata];
            $this->view('accounts/journals', $data);
            exit;

        }

        $listjournals  = Journals::listAll();
        $subaccounts  = Ledgers::listAll();
        $customers = AccountCustomers::listAll();
        $transactiodata = Transactions::listAll();
        $data = ['journals'=> $listjournals, 'customers'=>$customers,'subaccounts'=>$subaccounts,
                  'transactiondata'=> $transactiodata];
        $this->view('accounts/journals', $data);
    }


    public function addledgers(){
        $accid = $_POST['accid']=='' ? null : $_POST['accid'];
         $cr  = new Ledgers($accid);
 $maincategory = Accountsubcategories::getcategory($_POST['type']);
        $cr->recordObject->ledger = $_POST['name'];
        $cr->recordObject->category = $_POST['type'];

        $cr->recordObject->classification = $_POST['subledger'];
        $cr->recordObject->parentaccount = $_POST['parentaccount'];
        $cr->recordObject->datecreated = date('Y-m-d H:i:s');
        $cr->recordObject->maincategory = $maincategory;

        if($cr->store()){
            $ac_nid = $cr->recordObject->ac_nid;

            //Insert Opening Balalnce
            Ledgers::insertopeningbalance($ac_nid, $_POST['openingbalance'], $_POST['openbalancedate'] );

        }
    }

    public function ledgers(){
        $catdata = Accountcategory::listAll();
        $legdata = Ledgers::listAll();
        $parentaccountdata = GroupLedger::listAll();
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

    public function groupledger(){
        $legdata = GroupLedger::listAll();
        $data = ['legdata'=>$legdata];
        $this->view('accounts/groupledgers', $data);
    }

    public function creategroupledger(){
        $catdata = Accountcategory::listAll();
        $data = ['catdata'=>$catdata];
        $this->view('accounts/addgroupleger', $data);
    }

    public function addgroupledgers(){
        $cr  = new GroupLedger();
        $cr->recordObject->groupledger = $_POST['name'];
        $cr->recordObject->category = $_POST['type'];;
        $cr->recordObject->datecreated = date('Y-m-d H:i:s');
        $cr->store();

    }


    public function chartofaccount(){
        $catdata = Accountcategory::listAll();
        $legdata = Ledgers::listAll();
        $parentaccountdata = GroupLedger::listAll();
        $data = ['catdata'=>$catdata, 'legdata'=>$legdata, 'groupaccount'=>$parentaccountdata];
        $this->view('accounts/ledgers', $data);
    }


    public function generaledger(){
        $subaccounts = Ledgers::listAll();
        $data = ['subaccountdata'=>$subaccounts];
        $this->view('accounts/ledgeraccounts', $data);
    }

    public function ledgerdetails(){
        $ledger = $_POST['ledger'];
        $ledgerid = $_POST['ledgerid'];
        $ledgerdata = Transactions::getAllLdegerdetails($ledger);
        $opendata = Ledgers::getopeningbalancebyledgerid($ledgerid);
        $data = ['ledgerdata'=>$ledgerdata, 'ledger'=>$ledger, 'ledgerid'=>$ledgerid, 'opendata'=>$opendata];
        $this->view('accounts/ledgerdetails', $data);

    }

}
