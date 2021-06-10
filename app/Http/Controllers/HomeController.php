<?php

namespace App\Http\Controllers;

use App\Bank;
use Illuminate\Http\Request;
use App\Notifications\ApproveInvoice;
use App\Invoice;
use App\Organization;
use App\Setting;
use App\Workflow;
use App\InvoiceReview;
use App\Notifications;
use Seguce92\DomPDF\PDF;
use \App\Notifications\emailInvoice;
use App\Mail\SendInvoice;
use Mail;
//use App\Models\Invoice;

class HomeController extends Controller
{

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function viewReset()
    {
        return view('auth.passwords.resetPassword');
    }
    public function addvat($id)
    {
        Invoice::where('id', $id)->update(['hasvat' => '1']);
        return redirect()->back();
    }

    public function removevat($id)
    {
        Invoice::where('id', $id)->update(['hasvat' => '0']);
        return redirect()->back();
    }

        public function send_mail()
    {
        
        $count = \App\User::where('type', 'admin_user')->get();
        foreach ($count as $admin_user) 
        {
            $sender = \Auth::user()->email;  
            $name = $admin_user->name;           
            $message =  $admin_user->name.",  There is an Invoice pending review, submitted by ". \Auth::user()->name." .";

            // \Auth::user()->notify(new emailInvoice( $message, $sender, $name));
            $admin_user->notify(new emailInvoice($message, $sender, $name));
        }
    }

    public function send_approveMail($invoice_id)
    {
        $invoice = Invoice::find($invoice_id);
        $owner_id = $invoice->created_by; 
        $count = \App\User::where('id', $owner_id)->get(); 
        foreach ($count as $user) 
        {
            $sender = \Auth::user()->email;   
            $name = $user->name;         
            $message =  $name.",  The pending Quote has been Approved to Invoice by ". \Auth::user()->name." .";

                // \Auth::user()->notify(new emailInvoice( $message, $sender, $name));
            $user->notify(new emailInvoice($message, $sender, $name));
        }
    }
    //
    public function about()
    {
        return view('about');
    }
    public function manageOrg()
    {
    	$org = \App\Organization::orderBy('id', 'desc')->get();

        return view('horizontal.manageOrg', compact('org'));
    }

    public function addOrg(Request $request)
    {
    	$add_org = \App\Organization::updateOrCreate
    	(['id' => $request->id],
    		[
    			'orgName' => $request->orgName,
    			'orgAddress' => $request->orgAddress,
    			'orgEmail' => $request->orgEmail,
    			'country' => $request->country
    		]
    );
        $notification = array(
            'message' => 'Success! New Organization created Successfully',
            'alert-type' => 'success'
        );
        // session()->flash('notif', 'New Organization has been added successfully');
        return redirect()->route('manageOrg')->with($notification);
    }

    public function editOrganization(Request $request)
    {
    	$edit_org = \App\Organization::where('id', $request->id)->first();
    	
        return view('organization.modals.editOrganization', compact('edit_org'));
    }

    public function editItem(Request $request)
    {
    	$edit_item = \App\Item::where('id', $request->id)->first();

    	return view('organization.modals.editItem', compact('edit_item'));
    }

    public function editPurchase(Request $request)
    {
    	$edit_purchase = \App\PurchaseItem::where('id', $request->id)->first();

    	return view('organization.modals.editPurchase', compact('edit_purchase'));
    }

    public function editSub(Request $request)
    {
    	$edit_sub = \App\Item::where('id', $request->id)->first();

    	return view('organization.modals.editSub', compact('edit_sub'));
    }

    public function manageInvoice(Request $request)
    {
        if($request->has('search')){
            $search=$request->search;
            $inv = \App\Invoice::orderBy('id', 'desc')->where('invoiceName','like','%'.$search.'%')->get();
        }
        else {
            $search='';
            $inv = \App\Invoice::orderBy('id', 'desc');   
            	if($request->has('org_id')){
				$inv=$inv->where('orgid',$request->org_id);
    		}
    	    $inv=$inv->paginate('10');
        }
    	
    	$organ_ddl = \App\Organization::orderBy('orgName', 'asc')->get();
    	$banks=Bank::all();
        return view('horizontal.manageInvoice', compact('inv', 'organ_ddl','search','banks'));
    }
    public function viewPurchaseOrders()
    {
        $organ_ddl = \App\Organization::orderBy('orgName', 'asc')->get();
        $data = \App\PurchaseOrder::orderBy('name', 'asc')->get();
        return view('horizontal.purchaseOrder',compact('organ_ddl','data'));
    }

    public function addInvoice(Request $request)
    {
        if (!$request->filled('bank_id')){
            $request->bank_id=3;
        }
    	$orgid = \App\Invoice::updateOrCreate
    	(['id' => $request->id],
    		[
    			'invoiceName' => $request->invoiceName,
    			'orgid' => $request->orgid,
    			'product_description' => $request->product_description,
    			'invoice_id' => $request->id,
    			'bank_id' => $request->bank_id,
                'created_by' => \Auth::user()->id,
    			
    		]
    );
    	session()->flash('notif', 'New invoice has been added successfully');
        return redirect()->back()->with('info', 'New Item has been added successfully');
    }

    public function addPurchase(Request $request)
    {
    	$orgid = \App\PurchaseOrder::updateOrCreate
    	(['id' => $request->id],
    		[
    			'name' => $request->name,
    			'orgid' => $request->orgid,
    			'number' => $request->number,
    		]
    );
    	session()->flash('notif', 'New Purchase Order has been added successfully');
        return redirect()->back()->with('info', 'New Item has been added successfully');
    }

    public function addItem(Request $request)
    {
     
    	$additem = \App\Item::where('invoice_id',$request->id)->orderBy('id', 'asc')->get();
    	$invoice_id = $request->id;
    	$organ_get = \App\Organization::where('id',$this->getOrganisation($invoice_id))->first();
    	$invoice = Invoice::where('id', $request->id)->first();
        
    	// dd($invoice);
    	
        return view('horizontal.addItem', compact('additem','invoice_id','organ_get', 'invoice'));
    }

    public function viewPurchaseItems(Request $request)
    {
        $items = \App\PurchaseItem::where('poid', $request->id)->orderBy('id','asc')->get();
        $po_id = $request->id;
    	$organ_get = \App\Organization::where('id',$this->getOrg($po_id))->first();
    	$purchaseNum = \App\PurchaseOrder::where('id',$request->id)->first();

    	
        return view('addPurchaseItem',compact('po_id','organ_get', 'items','purchaseNum'));
    }

    public function delete(Request $request)
    {
        $delete = \App\Item::where('id',$request->id)->delete();
        $deleteQuote = \App\Invoice::where('id',$request->id)->delete();
        return redirect()->back()->with('info', 'New Item has been added successfully');
    }
    public function deletePurchase(Request $request)
    {
        $deletepurchase = \App\PurchaseItem::where('id', $request->id)->delete();
        return redirect()->back()->with('info', 'New Item has been added successfully');

    }

    public function getOrganisation($invoice_id){
    	return \App\Invoice::where('id',$invoice_id)->value('orgid');
    }




    public function getOrg($po_id){
    	return \App\PurchaseOrder::where('id',$po_id)->value('orgid');
    }

    public function add_item(Request $request)
    {
    	$org_total = \App\Item::where('org_id', $request->orgid);
    	$add = \App\Item::updateOrCreate
    	(['id' => $request->id],
    		[
                'currency' => $request->currency,
                'rate' => $request->rate,
    			'productName' => $request->productName,
                'description' => $request->description,
				'quantity' => $request->quantity,
    			'unitcost' => $request->unitcost,
    			'discount' => $request->discount,
    			'total' => $request->rate * $request->quantity * $request->unitcost,
                'dtotal' => $request->total - $request->total*$request->unitcost*$request->quantity*$request->discount,
    			'invoice_id' => $request->invoice_id,
    			
    		]
        );
    	
     	// session()->flash('notif', 'New Item has been added successfully');
        return redirect()->back()->with('info', 'New Item has been added successfully');
    }

    public function addPurchaseItems(Request $request)
    {
        $add = \App\PurchaseItem::updateOrCreate
        (['id' => $request->id],
        [
            'description' => $request->description,
            'unitcost' => $request->unitcost,
            'quantity' => $request->quantity,
            'total' => $request->quantity * $request->unitcost,
            'dtotal' => $request->total,
            'poid' => $request->poid
        ]);
        return redirect()->back()->with('info', 'New Item has been added successfully');
    }

    public function generateInvoice()
    {
    	return view('generateInvoice');
    }

    public function pdf(Request $request)
    {
    	$additem = \App\Item::where('invoice_id',$request->id)->orderBy('id', 'asc')->get();
     $invoice_id = $request->id;
     $organ_get = \App\Organization::where('id',$this->getOrganisation($invoice_id))->first();
     $invoice = Invoice::where('id', $request->id)->first();
    	
    	return view('pdftwo', compact('invoice_id','additem','organ_get','invoice'));
    }
    public function quote(Request $request)
    {
        $additem = \App\Item::where('invoice_id',$request->id)->orderBy('id', 'asc')->get();
     $invoice_id = $request->id;
    $invoice_description = \App\Invoice::where('id', $request->id)->orderBy('id','asc')->get();  
     $organ_get = \App\Organization::where('id',$this->getOrganisation($invoice_id))->first();
       $invoice = Invoice::where('id', $request->id)->first(); 
        return view('quote', compact('invoice_id','additem','organ_get','invoice_description','invoice'));
    }

    public function subPDF(Request $request)
    {
        $additem = \App\Item::where('invoice_id',$request->id)->orderBy('id', 'asc')->get();
     $invoice_id = $request->id;
     $organ_get = \App\Organization::where('id',$this->getOrganisation($invoice_id))->first();
    	
    	return view('subPDF', compact('invoice_id','additem','organ_get'));
    }

    public function subQuote(Request $request)
    {
        $additem = \App\Item::where('invoice_id',$request->id)->orderBy('id', 'asc')->get();
     $invoice_id = $request->id;
     $organ_get = \App\Organization::where('id',$this->getOrganisation($invoice_id))->first();
    	
    	return view('subQuote', compact('invoice_id','additem','organ_get'));
    }

    public function popdf(Request $request)
    {
        $items = \App\PurchaseItem::where('poid', $request->id)->orderBy('id','asc')->get();
        $po_id = $request->id;
    	$organ_get = \App\Organization::where('id',$this->getOrg($po_id))->first();
    	        $purchaseNum = \App\PurchaseOrder::where('id',$request->id)->first();
    	
        return view('POpdf',compact('po_id','organ_get', 'items', 'purchaseNum'));
    }

    public function invoiceCount(Request $request)
    {
    	$count = \App\Invoice::count();
    	$countOrg = \App\Organization::count();
    	$countInv = \App\Invoice::where('status',0)->count();
    	$countApp = \App\Invoice::where('status',1)->count();
        $countUsers = \App\User::count();
        $inv = \App\Invoice::orderBy('id', 'desc');
        $pending_inv = \App\Invoice::where('status', 0)->limit(5)->orderBy('id', 'desc')->get();
        $count_pending_inv = \App\Invoice::where('status', 0)->orderBy('id', 'desc')->get();
        $approved_inv = \App\Invoice::where('status', 1)->where('created_by', \Auth::user()->id)->limit(5)->orderBy('id', 'desc')->get();
        $count_approved_inv = \App\Invoice::where('status', 1)->where('created_by', \Auth::user()->id)->orderBy('id', 'desc')->get();
        $offset_ = 1;
        $inv_per = ($countInv / $count) * 100;
        $app_per = ($countApp / $count) * 100;
        if($request->has('org_id'))
        {
           $inv=$inv->where('orgid',$request->org_id);
        }
        $inv=$inv->paginate('10');
        $organ_ddl = \App\Organization::orderBy('orgName', 'asc')->get();
    	return view('horizontal.index', compact('count','countOrg','countInv','countApp','countUsers', 'inv','pending_inv','organ_ddl','approved_inv','count_approved_inv','count_pending_inv', 'inv_per', 'app_per', 'offset_'));
    }
    
    public static function showcompanyName($id){
       $company = \App\Organization::find($id);
       return $company->orgName;
    }

    static function showInvoiceStatus($n){
        if ($n == 0){
            return "pending";
        }else{
            return "approved";
        }
    }
    public function reviewInvoice(Request $request)
    {
    	$invoice = Invoice::find($request->invoice_id);
        self::send_mail();
        session()->flash('notif', 'Invoice has been submitted for review');
        return redirect()->route('invoiceCount')->with('info', 'Invoice has been Submitted for Review');

    }

    public function approveInvoice(Request $request)
    {
    	try
     {   
        
          $data = array
          (
              'status' => '1', 'updated_at' => date('Y-m-d h:i:s')
          );
          \App\Invoice::where('id', $request->id)->update($data);

        self::send_approveMail($request->id);
        return redirect()->back()->with('info', 'Invoice Approved successfully');
      }
      catch (\Exception $e) 
      {
            return  response()->json(['status'=>'error', 'info'=>'Sorry, An Error Occured Please Try Again. ' .$e->getMessage()]);
      }

    }

    public function viewUserList()
    {
       if(request()->user()->type=='normal_user'){
           return redirect('/');
       }
        $userView = \App\User::orderBy('id', 'desc')->get();
        return view('horizontal.userList', compact('userView'));
    }

    public function changeUserType(Request $request)
    {
        
       try {
        $data = array('type' => 'admin_user', 'updated_at' => date('Y-m-d h:i:s')
        );
        \App\User::where('id', $request->id)->update($data);   
        session()->flash('notif', 'User Type has been changed successfully');
        return redirect()->back()->with('info', 'User Type changed successfully');
       }

       catch(\Exception $e)
       {
            return response()->json(['status'=>'error', 'info'=>'Sorry, An Error Occured Please Try Again. ' .$e->getMessage()]);
       }
    }

    public function download(Request $request){
    $additem = \App\Item::where('invoice_id',$request->id)->orderBy('id', 'asc')->get();
     $invoice_id = $request->id;
     $organ_get = \App\Organization::where('id',$this->getOrganisation($invoice_id))->first();
     $pdf = PDF::loadView('pdftwo',compact('invoice_id','organ_get','additem')); //load view page
    return $pdf->download('snapnetInvoice.pdf'); // download pdf file
    }
    
    public function addUpdateuser(){
        $data=request()->all();
         if(request()->id==''){
             $data['password']=\Hash::make(request()->password);
         }
            
        $addUser=\App\User::updateOrCreate(['email'=>request()->email],$data);
        return redirect()->back();
    }

    public function sendToOrg(Request $request)
    {   
        $additem = \App\Item::where('invoice_id',$request->id)->orderBy('id', 'desc')->get();
     $invoice_id = $request->id;
    $organ_get = \App\Organization::where('id',$this->getOrganisation($invoice_id))->first();
    $organ_id=$this->getOrganisation($invoice_id);
     
       Mail::to($organ_get)->send(new SendInvoice($invoice_id,$organ_id));
       session()->flash('notif', 'Invoice has been Mailed to Customer Successfully!');
       return redirect()->back()->with('info', 'Invoice Sent successfully');
    }

    public function viewSub(Request $request)
    {
        $inv = \App\Invoice::where('type', 'subscription')->orderBy('id', 'desc');
            if($request->has('org_id')){
                $inv=$inv->where('orgid',$request->org_id);
            }
        $inv=$inv->paginate('10');
        $organ_ddl = \App\Organization::orderBy('orgName', 'asc')->get();
        return view('viewSubInvoice',compact('inv','organ_ddl'));
    }

    public function addSubInvoice(Request $request)
    {
        $orgid = \App\Invoice::updateOrCreate
        (['id' => $request->id],
            [
                'invoiceName' => $request->invoiceName,
                'type' => $request->type,
                'orgid' => $request->orgid,
                'invoice_id' => $request->id,
                'created_by' => \Auth::user()->id,
                
            ]
    );
        session()->flash('notif', 'New invoice has been added successfully');
        return redirect()->back()->with('info', 'New Item has been added successfully');
    }

    public function viewSubAddItem(Request $request)
    {
        $additem = \App\Item::where('invoice_id',$request->id)->orderBy('id', 'asc')->get();
        $invoice_id = $request->id;
        $organ_get = \App\Organization::where('id',$this->getOrganisation($invoice_id))->first();
        $invoice = Invoice::where('id', $request->id)->first();
        
        // dd($invoice);
        
        return view('addNewSubInvoice', compact('additem','invoice_id','organ_get', 'invoice','delete'));
    }

    public function getUserDetails(Request $request){
        $details = DB::table('users')->where('id', $request->id);
        //print_r($details);
        $detail = $details->get();
        foreach($detail as $det){
            $email = $det->email;
            $id = $det->id;
            $name = $det->name;
        }
        return response()->json(['id' => $id, 'name' => $name, 'email' => $email,]);
    }
    public function deleteUserById(Request $request){
        $del = DB::table('users')->where('id', $request->id);
        $done = $del->delete();
        if($done){
            return "account deleted";
        }else{
            return "operation failed";
        }
    }

}
