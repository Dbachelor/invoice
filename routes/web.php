<?php

namespace App;
//use App\Http\Controllers\Auth\login;
//use App\Http\ControllersHomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\category;
use App\Department;
use Illuminate\Http\Request;
use Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
$path = "";



Auth::routes();
// Route::get('/login',"$path\ LoginController");
Route::get('/', $path . 'HomeController@invoiceCount')->name('invoiceCount');
Route::get('/about', $path . 'HomeController@about')->name('about');
Route::get('/manageOrg', $path . 'HomeController@manageOrg')->name('manageOrg');
Route::get('/send_invoice', $path . 'HomeController@sendToOrg')->name('sendToOrg');
//puchase orders
Route::get('/viewPurchaseOrders', $path . 'HomeController@viewPurchaseOrders')->name('viewPurchaseOrders');
Route::post('/addPurchase', $path . 'HomeController@addPurchase')->name('addPurchase');
Route::get('/viewPurchaseItems', $path . 'HomeController@viewPurchaseItems')->name('viewPurchaseItems');
Route::post('/addPurchaseItems', $path . 'HomeController@addPurchaseItems')->name('addPurchaseItems');
Route::get('/popdf', $path . 'HomeController@popdf')->name('popdf');

Route::delete('/deletePurchase/{id}', $path . 'HomeController@deletePurchase')->name('deletePurchase');

Route::post('/addOrg', $path . 'HomeController@addOrg')->name('addOrg');
Route::get('/organization/modals/editOrganization', $path . 'HomeController@editOrganization')->name('editOrg');
Route::get('/manageInvoice', $path . 'HomeController@manageInvoice')->name('manageInvoice');
Route::post('/addInvoice', $path . 'HomeController@addInvoice')->name('addInvoice');
Route::get('/addItem', $path . 'HomeController@addItem')->name('addItem');
Route::get('/organization/modals/editItem', $path . 'HomeController@editItem')->name('editItem');
Route::post('/add_item', $path . 'HomeController@add_item')->name('add_item');
Route::get('/generateInvoice', $path . 'HomeController@generateInvoice')->name('generateInvoice');
Route::get('/downloadPDF', $path . 'HomeController@downloadPDF');
Route::get('/pdf', $path . 'HomeController@pdf');
Route::get('/quote', $path . 'HomeController@quote');
Route::get('/download', $path . 'HomeController@download')->name('download');
Route::get('workflows/alter-status', $path . 'WorkflowController@alterStatus')->name('workflows.alter-status');
Route::resource('workflows', $path . 'WorkflowController',['names'=>['create'=>'workflows.create','index'=>'workflows','store'=>'workflows.save','edit'=>'workflows.edit','update'=>'workflow.update','show'=>'workflows.view','destroy'=>'workflows.delete']]);
Route::get('/reviewInvoice', $path . 'HomeController@reviewInvoice')->name('reviewInvoice');
Route::post('/approve_invoice', $path . 'HomeController@approveInvoice')->name('approveInvoice');
Route::get('/userList', $path . 'HomeController@viewUserList')->name('userList');
Route::post('/addUpdateuser', $path . 'HomeController@addUpdateuser')->name('addUpdateuser');
Route::post('/approve_change', $path .'HomeController@changeUserType')->name('changeUserType');
Route::get('/organization/modals/changeUserType', $path . 'HomeController@changeUserType')->name('changeUserType');
Route::delete('/delete/{id}', $path . 'HomeController@delete')->name('delete');
Route::delete('/deleteQuote/{id}', $path . 'HomeController@delete')->name('deleteQuote');
Route::get('/add-vat/{id}', $path . 'HomeController@addvat')->name('add.vat');
Route::get('/remove-vat/{id}', $path . 'HomeController@removevat')->name('remove.vat');
Route::get('/getUserDetails', $path . 'HomeController@getUserDetails')->name('getDetails');
Route::get('/deleteUserAccount', $path . 'HomeController@deleteUserById')->name('deleteUserById');














// ##### proposal ##### //
Route::get('proposal-templates', $path . 'ProposalController@proposalTemplates')->name('proposal-templates');
Route::get('erp-template', $path . 'ProposalController@erpTemplate')->name('erp-template');
Route::get('create-proposal', $path . 'ProposalController@createProposal')->name('create-proposal');
Route::get('generate-proposal/{type}', $path . 'ProposalController@generateProposal')->name('generate-proposal');
Route::get('proposal-signature', $path . 'ProposalController@proposalSignature')->name('proposal-signature');
Route::get('dollar-rate', $path . 'ProposalController@dollarRate')->name('dollar-rate');
Route::get('proposal-complete', $path . 'ProposalController@proposalComplete')->name('proposal-complete');

Route::get('getProposalTemplateDetails',$path . 'ProposalController@getProposalTemplateDetails');
Route::get('getProposalSectionDetails',$path . 'ProposalController@getProposalSectionDetails');
Route::get('getProposalConstantDetails',$path . 'ProposalController@getProposalConstantDetails');
Route::get('getSavedData',$path . 'ProposalController@getSavedData');
Route::get('getProposalDocument',$path . 'ProposalController@getProposalDocument');
Route::post('/add-proposal-template',$path . 'ProposalController@addProposalTemplate')->name('add-proposal-template');
Route::post('/add-proposal-documents',$path . 'ProposalController@addProposalDocuments')->name('add-proposal-documents');
Route::get('getCompanyDetails',$path . 'ProposalController@getCompanyDetails');
Route::post('/add-proposal-company-details',$path . 'ProposalController@addProposalCompanyDetails')->name('add-proposal-company-details');
Route::post('/add-subscription',$path . 'ProposalController@addSubscription')->name('add-subscription');
Route::get('getProposalIncludes',$path . 'ProposalController@getProposalIncludes');
Route::post('/add-proposal-includes',$path . 'ProposalController@addProposalIncludes')->name('add-proposal-includes');
Route::post('/add-proposal-additions',$path . 'ProposalController@addProposalAdditions')->name('add-proposal-additions');
Route::post('/add-proposal-section',$path . 'ProposalController@addProposalSection')->name('add-proposal-section');
Route::post('/add-proposal-implementation',$path . 'ProposalController@addProposalImplementation')->name('add-proposal-implementation');
Route::post('/resolve-proposal-placeholder',$path . 'ProposalController@resolveProposalPlaceholder')->name('resolve-proposal-placeholder');
Route::get('reloadPreview',$path . 'ProposalController@reloadPreview');
Route::post('/replace-placeholder',$path . 'ProposalController@replacePlaceholder')->name('replace-placeholder');
Route::post('/generate-placeholder',$path . 'ProposalController@generatePlaceholder')->name('generate-placeholder');
Route::post('/saveSignature',$path . 'ProposalController@saveSignature')->name('saveSignature');
Route::post('/add-dollar-rate',$path . 'ProposalController@addDollarRate')->name('add-dollar-rate');
Route::post('/update-project-duration',$path . 'ProposalController@UpdateProjectDuration')->name('update-project-duration');
Route::post('/upload-profile',$path . 'ProposalController@UploadProfile')->name('upload-profile');

Route::get('/zip-document',$path . 'ProposalController@zipDocument')->name('zip-document');





Route::get('/convertToDoc',$path . 'ProposalController@convertToDoc')->name('convertToDoc');


Route::get('downloadWord',$path . 'ProposalController@downloadWord');

// ##### proposal ##### //

//banks
Route::resource('/banks', $path .'BankController');
Route::get('/kkk', function(){
    return view('horizontal.index');
});

Route::get('/logout', function (Request $req){
    $req->session()->flush();
    return redirect('/')->with('you just logged out');
});

