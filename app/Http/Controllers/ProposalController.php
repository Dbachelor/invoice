<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Html;
use PhpOffice\PhpWord\IOFactory;
use Illuminate\Support\Facades\Input;
use DB;
use Illuminate\Support\Facades\Session;

class ProposalController extends Controller
{
    //

    public function proposalTemplates(Request $request)
    {
        return view('proposal.templates');
    }

    public function erpTemplate(Request $request)
    {
        $documents = \App\ProposalDocument::orderBy('document_name', 'asc')->get();

        return view('proposal.erp-template', compact('documents'));
    }

    public function createProposal(Request $request)
    {
        $placeholders = \App\ProposalVariable::where('proposal_name', $request->proposal_name)->get();
        $company_details = \App\ProposalCompanyDetail::where('proposal_name', 'Enterprise Resource Planning')->first();
        $documents = \App\ProposalDocument::where('document_type', 'Bid Document')->orderBy('document_name', 'asc')->get();
        $profiles = \App\User::where('profile_path', '<>', NULL)->get();

        return view('proposal.create', compact('placeholders', 'company_details', 'documents', 'profiles'));
    }

    public function generateProposal(Request $request, $route)
    {
        $constants = \App\ProposalConstant::where('proposal_name', 'Enterprise Resource Planning')->get();
        $bid_documents = \App\ProposalInclude::where('proposal_name', 'Enterprise Resource Planning')->where('section', 'Bid')->where('answer', 1)->get();

        if(request()->has('worddoc'))
        {
            header("Content-Type: application/vnd.ms-word");
            header("Expires: 0");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("content-disposition: attachment;filename=ERPProposal.doc");

            return response()->view('proposal.generate', compact('route', 'constants', 'bid_documents'));
                       //             ->withHeaders("Content-Type: application/vnd.ms-word ,Expires: 0 ,Cache-Control: must-revalidate, post-check=0, pre-check=0","content-disposition: attachment;filename=Report.doc","Cache-Control: must-revalidate, post-check=0, pre-check=0"]);

        }
        return view('proposal.generate', compact('route', 'constants', 'bid_documents'));
    }

    public function proposalComplete(Request $request)
    {
        $completed = \App\ProposalSection::where('proposal_name', 'Enterprise Resource Planning')->get();
        if(request()->has('worddoc'))
        {
            header("Content-Type: application/vnd.ms-word");
            header("Expires: 0");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("content-disposition: attachment;filename=ERPProposal.doc");
            return response()->view('proposal.complete', compact('completed'));
            //             ->withHeaders("Content-Type: application/vnd.ms-word ,Expires: 0 ,Cache-Control: must-revalidate, post-check=0, pre-check=0","content-disposition: attachment;filename=Report.doc","Cache-Control: must-revalidate, post-check=0, pre-check=0"]);

        }
        return view('proposal.complete', compact('completed'));
    }

    public function proposalSignature(Request $request)
    {
        // $constants = \App\ProposalConstant::where('proposal_name', 'Enterprise Resource Planning')->get();
        return view('proposal.proposal-signature');
    }

    public function dollarRate(Request $request)
    {
        $rate = \App\ProposalDollarRate::first();
        return view('proposal.dollar-rate', compact('rate'));
    }


    public function saveSignature(Request $request)
    {
//        $result = array();
//        $imagedata = base64_decode($_POST['img_data']);
//        $filename = md5(date("dmYhisA"));
//        //Location to where you want to created sign image
//        $file_name = './images/signatures/'.$filename.'.png';
//        file_put_contents($file_name,$imagedata);
//        $result['status'] = 1;
//        $result['file_name'] = $file_name;
//        echo json_encode($result);


        $user=\Auth::user();
        //store picture and signature
        $signature_path = '';
        $base64_image = $request->signature;
        if (preg_match('/^data:image\/(\w+);base64,/', $base64_image))
        {
            $data = substr($base64_image, strpos($base64_image, ',') + 1);
            $data = base64_decode($data);
            $signature_path="public/images/signatures/{$user->name}.png";
            $sign_path = "/storage/images/signatures/{$user->name}.png";

            Storage::put($signature_path, $data);
            //save path to db
            $DATA = array
            (
                'signature_path' => $sign_path,
            );
            \App\User::where('id', \Auth::user()->id)->update($DATA);
            return $signature_path = str_replace('public','',$signature_path);
        }

    }








    public function addProposalTemplate(Request $request)
    {
        try
        {
            // return $request->all();
            //template
            $add = \App\ProposalTemplate::updateOrCreate
            (['id'=> $request->id],
            array(
                'proposal_name' => $request->proposal_name,
                'content' => $request->content,
                'status' => 0,
                'created_by' => \Auth::user()->id,
            ));

            //cecking if the section already exist
            $sectionExist = \App\ProposalSection::where('proposal_name', $request->proposal_name)->first();
            if(!$sectionExist)
            {
                $add = \App\ProposalSection::updateOrCreate
                (['id'=> $request->id],
                [
                    'proposal_name' => $request->proposal_name,
                    'content' => $request->content,
                    'status' => 0,
                    'created_by' => \Auth::user()->id,
                ]);
            }


            if($request->ajax())
            {
              return response()->json(['status'=>'success', 'message'=>'New Proposal Section Added Successfully.']);
            }
            else
            {
              return redirect()->back()->with(['status'=>'success', 'info'=>'New Proposal Section Added Successfully.']);
            }
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }

    }


    public function addProposalDocuments(Request $request)
    {
        try
        {
            //return $request->all();
            $file = $request->document_file;
            // $file_name = substr($file, 12);
            $file_name = $request->document_file->getClientOriginalName();
            $destinationPath = 'assets/documents/' . Input::file('document_file')->getClientOriginalName();
            $file->move($destinationPath, Input::file('document_file')->getClientOriginalName());

            //template
            $add = \App\ProposalDocument::updateOrCreate
            (['id'=> $request->id],
            [
                'document_type' => $request->document_type,
                'document_name' => $request->document_name,
                'document_file' => $request->document_name,
                'created_by' => \Auth::user()->id,
            ]);


            if($request->ajax())
            {
              return response()->json(['status'=>'success', 'message'=>'New Proposal Document Uploaded Successfully.']);
            }
            else
            {
              return redirect()->back()->with(['status'=>'success', 'info'=>'New Proposal Document Uploaded Successfully.']);
            }
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }

    }


    public function getCompanyDetails(Request $request)
    {
        $company_details = \App\ProposalCompanyDetail::where('id', $request->id)->first();
        return response()->json($company_details);
    }

    public function addProposalCompanyDetails(Request $request)
    {
        try
        {
              //return $request->all();
//            $file = $request->company_logo;
//            // $file_name = substr($file, 12);
//            $file_name = $request->company_logo->getClientOriginalName();
//            $destinationPath = 'assets/logos/' . Input::file('company_logo')->getClientOriginalName();
//            $file->move($destinationPath, Input::file('company_logo')->getClientOriginalName());

            //template
            $add = \App\ProposalCompanyDetail::updateOrCreate
            (['proposal_name'=> $request->proposal_name],
            [
                'proposal_name' => $request->proposal_name,
                'company_logo' => $request->company_logo,
                'company_name' => $request->company_name,
                'executive_summary' => $request->executive_summary,
                'created_by' => \Auth::user()->id,
            ]);

            $DATA = array
            (
                'content' => $request->company_logo,
            );
            \App\ProposalConstant::where('proposal_name', $request->proposal_name)->where('variable', '%header%')->update($DATA);

        return ['status'=>'success', 'message'=>'Proposal Company Details Added Successfully'];
        }
        catch (\Exception $e)
        {
            return ['status'=>'error','message'=>'Sorry, An Error Occurred Please Try Again. '.$e->getMessage()];
        }

    }



    public function addProposalSection(Request $request)
    {
        try
        {   //return $request->all();
            for ($i=1; $i <= 2; $i++)
            {
                $var_one = $request->var_one;  $var_two = $request->var_two;
                $variable_one = $request->variable_one;  $variable_two = $request->variable_two;
                if($i == 1){ $column = 'var_one'; $var = $variable_one;  $id = $request->id_one; }
                elseif($i == 2){ $column = 'var_two'; $var = $variable_two;  $id = $request->id_two;  }
                $variable = '%'.$var.'%';    $proposal_name = $request->proposal_name;

                $add = \App\ProposalConstant::updateOrCreate
                (['proposal_name'=> $proposal_name, 'variable' => $variable],
                [
                    'proposal_name' => $proposal_name,
                    'section' => $request->section,
                    'variable' => $variable,
                    'type' => 'multi',
                    'content' => $request->$column,
                    'status' => 0,
                    'created_by' => \Auth::user()->id,
                ]);
            }


            if($request->ajax())
            {
              return response()->json(['status'=>'success', 'message'=>'New Proposal Section Added Successfully.']);
            }
            else
            {
              return redirect()->back()->with(['status'=>'success', 'info'=>'New Proposal Section Added Successfully.']);
            }
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }

    }

    public function addProposalImplementation(Request $request)
    {
        try
        {
            //return $request->all();
            for ($i=1; $i <= 7; $i++)
            {
                $variable = '%implementations_'.$i.'%';    $content = 'implementations_'.$i;    $proposal_name = $request->proposal_name;
                $add = \App\ProposalConstant::updateOrCreate
                (['proposal_name'=> $proposal_name, 'variable' => $variable],
                [
                    'proposal_name' => $proposal_name,
                    'section' => $request->section,
                    'variable' => $variable,
                    'content' => $request->$content,
                    'type' => 'multi',
                    'status' => 0,
                    'created_by' => \Auth::user()->id,
                ]);
            }

            $add = \App\ProposalConstant::updateOrCreate
            (['proposal_name'=> $proposal_name, 'variable' => '%project_cost%'],
                [
                    'proposal_name' => $proposal_name,
                    'section' => $request->section,
                    'variable' => '%project_cost%',
                    'content' => $request->project_cost,
                    'type' => 'multi',
                    'status' => 0,
                    'created_by' => \Auth::user()->id,
                ]);

            return ['status'=>'success','content_temp'=>$content,'message'=>'Proposal Section Saved Successfully'];
        }
        catch (\Exception $e)
        {
            return ['status'=>'error','message'=>'Sorry, An Error Occurred Please Try Again. '.$e->getMessage()];
        }

    }



    public function addDollarRate(Request $request)
    {
        try
        {   //return $request->all();
                $add = \App\ProposalDollarRate::updateOrCreate
                (['id'=> 1],
                    [
                        'dollar_rate' => $request->dollar_rate,
                        'created_by' => \Auth::user()->id,
                    ]
                );

            return ['status'=>'success', 'message'=>'Dollar Rate Saved Successful'];
        }
        catch (\Exception $e)
        {
            return ['status'=>'error','message'=>'Sorry, An Error Occurred Please Try Again. '.$e->getMessage()];
        }

    }

    public function getProposalIncludes(Request $request)
    {
        $include = \App\ProposalInclude::where('id', $request->id)->first();
        return response()->json($include);
    }

    public function addProposalIncludes(Request $request)
    {
        try
        {
             //return $request->all();
            $add = \App\ProposalInclude::updateOrCreate
            (['title'=> $request->title],
            [
                'proposal_name' => $request->proposal_name,
                'section' => $request->section,
                'title' => $request->title,
                'answer' => $request->answer,
                'created_by' => \Auth::user()->id,
            ]);

            return ['status'=>'success', 'message'=>'Proposal Section Saved Successfully'];
        }
        catch (\Exception $e)
        {
            return ['status'=>'error','message'=>'Sorry, An Error Occurred Please Try Again. '.$e->getMessage()];
        }

    }

    public function addProposalAdditions(Request $request)
    {
        try
        {
            //return $request->all();
            $add = \App\ProposalAddition::updateOrCreate
            (['title'=> $request->title],
                [
                    'proposal_name' => $request->proposal_name,
                    'section' => $request->section,
                    'title' => $request->title,
                    'answer' => $request->answer,
                    'created_by' => \Auth::user()->id,
                ]);

            $value = '%implementations_'.$add->id.'%';
            $DATA = array
            (
                'addition' => $request->answer,
            );
            \App\ProposalConstant::where('variable', $value)->update($DATA);

            return ['status'=>'success', 'message'=>'Proposal Details Saved Successfully'];
        }
        catch (\Exception $e)
        {
            return ['status'=>'error','message'=>'Sorry, An Error Occurred Please Try Again. '.$e->getMessage()];
        }

    }

    public function UpdateProjectDuration(Request $request)
    {
        try
        {
            //return $request->all();
            $DATA = array
            (
                'type' => $request->project_duration,
            );
            \App\ProposalConstant::where('proposal_name', $request->proposal_name)->where('variable', '%hcmatrix%')->update($DATA);

            return ['status'=>'success', 'message'=>'Proposal Duration Saved Successfully'];
        }
        catch (\Exception $e)
        {
            return ['status'=>'error','message'=>'Sorry, An Error Occurred Please Try Again. '.$e->getMessage()];
        }

    }

    public function addSubscription(Request $request)
    {
        try
        {
            //return $request->all();
            $count = $request->count;    $section = $request->section;
            for ($i=1; $i <= $count; $i++)
            {
                if($section == 'implementation'){  $title = 'title_'.$i;    $value = NULL;    $monthly = 'monthly_'.$i;  }
                else{   $title = 'title_'.$i;    $value = 'value_'.$i;    $monthly = 'monthly_'.$i;  }


                $add = \App\ProposalInclude::updateOrCreate
                (['title'=> $request->$title],
                [
                    'proposal_name' => $request->proposal_name,
                    'section' => $section,
                    'title' => $request->$title,
                    'monthly_rate' => $request->$monthly,
                    'answer' => $request->$value,
                    'created_by' => \Auth::user()->id,
                ]);
            }

            return ['status'=>'success', 'message'=>'Proposal Details Saved Successfully'];
        }
        catch (\Exception $e)
        {
            return ['status'=>'error','message'=>'Sorry, An Error Occurred Please Try Again. '.$e->getMessage()];
        }

    }



    public function getProposalTemplateDetails(Request $request)
    {
        $template = \App\ProposalTemplate::where('proposal_name', $request->proposal_name)->first();
        return response()->json($template);
    }

    public function getProposalSectionDetails(Request $request)
    {
        $section = \App\ProposalTemplate::where('proposal_name', $request->proposal_name)->first();
        // $section = \App\ProposalSection::where('proposal_name', $request->proposal_name)->first();
        return response()->json($section);
    }

    public function getProposalConstantDetails(Request $request)
    {
        $section = \App\ProposalConstant::where('section', $request->section)->get();
        return response()->json($section);
    }

    public function getProposalDocument(Request $request)
    {
        $documents = \App\ProposalDocument::orderBy('id', 'asc')->get();
        return response()->json($documents);
    }

    public function getSavedData(Request $request)
    {
        $sections = \App\ProposalVariable::where('proposal_name', $request->proposal_name)->get();
        $sections= $sections->map(function($section)
        {
            $response= ['id'=>$section->id,'proposal_name'=>$section->proposal_name,'client_name'=>$section->client_name,
                        'variable'=>$section->variable,'header'=>$section->header,'content'=>$section->content,
                        'constant'=>$section->constant,'type'=>$section->type];
            if (strlen($section->content)<3)
            {
                $response= ['id'=>$section->id,'proposal_name'=>$section->proposal_name,'client_name'=>$section->client_name,
                            'variable'=>$section->variable,'header'=>$section->header,'content'=>$section->constant,
                            'constant'=>$section->constant,'type'=>$section->type];
            }
            return $response;
        });
        return response()->json($sections);
    }

    public function resolveProposalPlaceholder(Request $request)
    {
        try
        {
            // return $request->all();
            $variables = \App\ProposalVariable::where('proposal_name', $request->proposal_name)->get();
            $content = $request->content;

            $header = $request->header;   //$header = trim($header, '<p></p>');
            $company_name = $request->company_name;   //$company_name = trim($company_name, '<p></p>');
            $executive_summary = $request->executive_summary;   //$executive_summary = trim($executive_summary, '<p></p>');
            $number_of_days = $request->number_of_days;   //$number_of_days = trim($number_of_days, '<p></p>');
            $software_add_ons = $request->software_add_ons;   //$software_add_ons = trim($software_add_ons, '<p></p>');
            $hcmatrix = $request->hcmatrix;   //$hcmatrix = trim($hcmatrix, '<p></p>');
            $palipro = $request->palipro;   //$palipro = trim($palipro, '<p></p>');
            $our_client = $request->our_client;   //$our_client = trim($our_client, '<p></p>');
            $client_lists = $request->client_lists;   //$client_lists = trim($client_lists, '<p></p>');
            $assumption = $request->assumption;   //$assumption = trim($assumption, '<p></p>');
            $subscription_table = $request->subscription_table;   //$subscription_table = trim($subscription_table, '<p></p>');
            $recurring_subscription = $request->recurring_subscription;   //$recurring_subscription = trim($recurring_subscription, '<p></p>');
            $one_time_subscription = $request->one_time_subscription;   //$one_time_subscription = trim($one_time_subscription, '<p></p>');
            $third_party_table = $request->third_party_table;   //$third_party_table = trim($third_party_table, '<p></p>');
            $monthly_recurring = $request->monthly_recurring;   //$monthly_recurring = trim($monthly_recurring, '<p></p>');
            $implementation_table = $request->implementation_table;   //$implementation_table = trim($implementation_table, '<p></p>');
            $project_cost_table = $request->project_cost_table;   //$project_cost_table = trim($project_cost_table, '<p></p>');
            $signature = $request->signature;   //$signature = trim($signature, '<p></p>');
            $signee_details = $request->signee_details;   //$signee_details = trim($signee_details, '<p></p>');

            $content = str_replace("%header%", $header, $content);
            $content = str_replace("%company_name%", $company_name, $content);
            $content = str_replace("%executive_summary%", $executive_summary, $content);
            $content = str_replace("%number_of_days%", $number_of_days, $content);
            $content = str_replace("%software_add_ons%", $software_add_ons, $content);
            $content = str_replace("%hcmatrix%", $hcmatrix, $content);
            $content = str_replace("%palipro%", $palipro, $content);
            $content = str_replace("%our_client%", $our_client, $content);
            $content = str_replace("%client_lists%", $client_lists, $content);
            $content = str_replace("%assumption%", $assumption, $content);
            $content = str_replace("%subscription_table%", $subscription_table, $content);
            $content = str_replace("%recurring_subscription%", $recurring_subscription, $content);
            $content = str_replace("%one_time_subscription%", $one_time_subscription, $content);
            $content = str_replace("%third_party_table%", $third_party_table, $content);
            $content = str_replace("%monthly_recurring%", $monthly_recurring, $content);
            $content = str_replace("%implementation_table%", $implementation_table, $content);
            $content = str_replace("%project_cost_table%", $project_cost_table, $content);
            $content = str_replace("%signature%", $signature, $content);
            $content = str_replace("%signee_details%", $signee_details, $content);

            $data = array
            (
                'content' => $content,
            );
            \App\ProposalSection::where('id', $request->id)->update($data);

            foreach ($variables as $key => $variable)
            {
                $v = $variable->variable;      $value = trim($v, '%');
                if($request->$value != '')
                {
                    $DATA = array
                    (
                        'content' => $request->$value,
                    );
                    \App\ProposalVariable::where('id', $variable->id)->update($DATA);
                }

            }

            if($request->ajax())
            {
              return response()->json(['status'=>'success', 'message'=>'Proposal Updated Successfully.']);
            }
            else
            {
              return redirect()->back()->with(['status'=>'success', 'info'=>'Proposal Updated Successfully.']);
            }
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }

    }



    public function replacePlaceholder(Request $request)
    {
        try
        {
            //return $request->all();
            $template = \App\ProposalTemplate::first();
            $constants = \App\ProposalConstant::get();
            $company_detail = \App\ProposalCompanyDetail::where('proposal_name', $request->proposal_name)->first();
            $dollar_rate = \App\ProposalDollarRate::first();
            $content = $template->content;

            //loop to swap all placeholders
            foreach ($constants as $key => $constant)
            {
                if($constant->addition == 0 && $constant->section == '_implementation' && $constant->variable != '%project_cost%')
                {
                    $content = str_replace($constant->variable, '', $content);
                }
                else
                {
                    $content = str_replace($constant->variable, $constant->content, $content);
                }
                if($constant->type != 'multi'){ $content = str_replace('%number_of_days%', $constant->type, $content); }
            }


            $content = str_replace('%executive_summary%', $company_detail->executive_summary, $content);
            $content = str_replace('%company_name%', $company_detail->company_name, $content);
            $content = str_replace('%dollar_naira_rate%', $dollar_rate->dollar_rate, $content);







            //$data = ['content_temp' => $content];
            //\App\ProposalSection::where('proposal_name', 'Enterprise Resource Planning')->update($data);


            return ['status'=>'success','content_temp'=>$content,'message'=>'successful'];
        }
        catch (\Exception $e)
        {
            return ['status'=>'error','message'=>'Sorry, An Error Occurred Please Try Again. '.$e->getMessage()];
        }

    }



    public function generatePlaceholder(Request $request)
    {
        try
        {
            //return $request->all();


            //REPLACE
            $template = \App\ProposalTemplate::first();
            $constants = \App\ProposalConstant::get();
            $company_detail = \App\ProposalCompanyDetail::where('proposal_name', $request->proposal_name)->first();
            $dollar_rate = \App\ProposalDollarRate::first();
            $content = $template->content;

            //loop to swap all placeholders
            foreach ($constants as $key => $constant)
            {
                if($constant->addition == 0 && $constant->section == '_implementation' && $constant->variable != '%project_cost%')
                {
                    $content = str_replace($constant->variable, '', $content);
                }
                else
                {
                    $content = str_replace($constant->variable, $constant->content, $content);
                }
                if($constant->type != 'multi'){ $content = str_replace('%number_of_days%', $constant->type, $content); }
            }


            $content = str_replace('%executive_summary%', $company_detail->executive_summary, $content);
            $content = str_replace('%company_name%', $company_detail->company_name, $content);
            $content = str_replace('%dollar_naira_rate%', $dollar_rate->dollar_rate, $content);

            $data = ['content_temp' => $content];
            \App\ProposalSection::where('proposal_name', 'Enterprise Resource Planning')->update($data);

            //GENERATE
            //SUBSCRIPTION
            $subscription_temp = \App\ProposalSection::where('proposal_name', $request->proposal_name)->first();
            $subscription_includes = \App\ProposalInclude::where('proposal_name', $request->proposal_name)->where('section', 'subscription')->get();
            $implementation_includes = \App\ProposalInclude::where('proposal_name', $request->proposal_name)->where('section', 'implementation')->get();
            $content_sub = $subscription_temp->content_temp;

            //loop to swap all placeholders - subscriptions
            foreach ($subscription_includes as $key => $include)
            {   $i = $key + 1;
                //QTY
                $qty_sub = '%subscription_qty_'.$i.'%';
                $content_sub = str_replace($qty_sub, $include->answer, $content_sub);

                //RATE
                $rate_sub = '%subscription_dollar_'.$i.'%';
                $content_sub = str_replace($rate_sub, $include->monthly_rate, $content_sub);

                //computed total for subscription
                $total_sub = '%subscription_total_'.$i.'%';
                $sub_qty = $include->answer;    $sub_monthly_rate = $include->monthly_rate;
                $erp_arr[$key] = $sub_total = ($sub_qty * $sub_monthly_rate);
                $content_sub = str_replace($total_sub, $sub_total, $content_sub);
                $azure_dollar = 400.00;   $azure_arr=[$azure_dollar];

                //compute erp sub total;
                if($key == 2)
                {
                    $erp_array = array_merge($erp_arr, $azure_arr);
                    $erp_sub_total = array_sum($erp_array);  Session::put('erp_sub_total', $erp_sub_total);
                    $content_sub = str_replace('%erp_sub_total%', number_format($erp_sub_total, 2), $content_sub);
                    $content_sub = str_replace('%azure_dollar%', number_format($azure_dollar, 2), $content_sub);
                    $content_sub = str_replace('%azure_total%', number_format($azure_dollar, 2), $content_sub);
                }

                //compute db sub total;
                if($key > 2 && $key < 6){    $db_arr[$key] = $sub_total;    }
                if($key == 5)
                {
                    $db_sub_total = array_sum($db_arr);     Session::put('db_sub_total', $db_sub_total);
                    $content_sub = str_replace('%db_sub_total%', number_format($db_sub_total, 2), $content_sub);
                }

                //compute config sub total;
                if($key >= 5 && $key <= 11){    $config_arr[$key] = $sub_total;    }
                if($key == 10)
                {
                    $config_sub_total = array_sum($config_arr);     Session::put('config_sub_total', $config_sub_total);
                    $content_sub = str_replace('%config_sub_total%', number_format($config_sub_total, 2), $content_sub);

                    //NET TOTAL HCMATRIX
                    $subscription_net_total = (Session::get('erp_sub_total') + Session::get('db_sub_total') + Session::get('config_sub_total'));
                    $content_sub = str_replace('%subscription_net_total%', number_format($subscription_net_total, 2), $content_sub);
                }
            }


            //THIRD PARTY SOFTWARE
            $third_party_temp = \App\ProposalSection::where('proposal_name', $request->proposal_name)->first();
            $third_party_includes = \App\ProposalInclude::where('proposal_name', $request->proposal_name)->where('section', 'third_party')->get();
            $content_tps = $content_sub;

            //loop to swap all placeholders - third_partys
            foreach ($third_party_includes as $key => $include)
            {   $j = $key + 1;
                //QTY
                $qty_hcm = '%third_party_qty_'.$j.'%';
                $content_tps = str_replace($qty_hcm, $include->answer, $content_tps);

                //RATE
                $rate_hcm = '%third_party_dollar_'.$j.'%';
                $content_tps = str_replace($rate_hcm, $include->monthly_rate, $content_tps);

                //computed total for hcmatrix
                $hcm_total = '%third_party_total_'.$j.'%';
                $hcm_qty = $include->answer;    $hcm_monthly_rate = $include->monthly_rate;
                $hcm_arr[$key] = $total_hcm = ($hcm_qty * $hcm_monthly_rate);
                $content_tps = str_replace($hcm_total, $total_hcm, $content_tps);


                //computed total for palipro
                // $pali_total = '%third_party_total_'.$j.'%';
                // $pali_qty = $include->answer;    $pali_monthly_rate = $include->monthly_rate;
                // $pali_arr[$key] = $total_pali = ($pali_qty * $pali_monthly_rate);


                //compute hcmatrix sub total;
                if($key == 1)
                {
                    $hcm_sub_total = array_sum($hcm_arr);  Session::put('hcm_sub_total', $hcm_sub_total);
                    $content_tps = str_replace('%hcm_sub_total%', number_format($hcm_sub_total, 2), $content_tps);
                }


                //compute palipro sub total;
                if($key == 2)
                {
                    //computed total for palipro
                    $pali_total = '%third_party_total_'.$j.'%';
                    $pali_qty = $include->answer;    $pali_monthly_rate = $include->monthly_rate;
                    $pali_arr[$key] = $total_pali = ($pali_qty * $pali_monthly_rate);
                    $content_tps = str_replace($pali_total, $total_pali, $content_tps);

                    $pali_sub_total = array_sum($pali_arr);     Session::put('pali_sub_total', $pali_sub_total);
                    $content_tps = str_replace('%pali_sub_total%', number_format($pali_sub_total, 2), $content_tps);

                    //NET TOTAL THIRD PARTY SOFTWARE
                    $third_party_net_total = (Session::get('hcm_sub_total') + Session::get('pali_sub_total') );
                    $content_tps = str_replace('%third_party_net_total%', number_format($third_party_net_total, 2), $content_tps);
                }
            }



            $content_imp = $content_tps;
            //loop to swap all placeholders - implementation

            $additions = \App\ProposalAddition::where('proposal_name', $request->proposal_name)->where('section', 'implementation')->get();
            $fin_mgt = \App\ProposalAddition::where('proposal_name', $request->proposal_name)->where('title', 'Financial Management')->first();
            $inv_mgt = \App\ProposalAddition::where('proposal_name', $request->proposal_name)->where('title', 'Inventory Management')->first();
            $sales = \App\ProposalAddition::where('proposal_name', $request->proposal_name)->where('title', 'Sales')->first();
            $purch = \App\ProposalAddition::where('proposal_name', $request->proposal_name)->where('title', 'Purchase')->first();
            $pali = \App\ProposalAddition::where('proposal_name', $request->proposal_name)->where('title', 'Palipro Contract Mgt Software')->first();
            $hcm = \App\ProposalAddition::where('proposal_name', $request->proposal_name)->where('title', 'HCMatrix Payroll')->first();
            $infra = \App\ProposalAddition::where('proposal_name', $request->proposal_name)->where('title', 'Infrastructure Setup')->first();

            foreach ($implementation_includes as $key => $include)
            {   $k = $key + 1;
                //IMP
                // $qty_imp = '%implementation_'.$k.'%';
                // $content_imp = str_replace($qty_imp, $include->monthly_rate, $content_tps);

                //checking if to include Financial Management module to proposal
                if($fin_mgt->answer == 1)
                {
                    //compute financial sub total;
                    if($k > 0 && $k < 6)
                    {
                        //computed total for implementation
                        $one_total = '%implementation_'.$k.'%';
                        $one_arr[$key] = $one_monthly_rate = $include->monthly_rate;
                        $content_imp = str_replace($one_total, $one_monthly_rate, $content_imp);
                    }
                    if($k == 5)
                    {
                        $one_sub_total = array_sum($one_arr);  Session::put('one_sub_total', $one_sub_total);
                        $content_imp = str_replace('%financial_sub_total%', number_format($one_sub_total, 2), $content_imp);
                    }
                }else{ Session::put('one_sub_total', 0); }

                //checking if to include Inventory Management module to proposal
                if($inv_mgt->answer == 1)
                {
                    //compute inventory sub total;
                    if ($k > 5 && $k < 11) {
                        //computed total for implementation
                        $two_total = '%implementation_' . $k . '%';
                        $two_arr[$key] = $two_monthly_rate = $include->monthly_rate;
                        $content_imp = str_replace($two_total, $two_monthly_rate, $content_imp);

                        if ($k == 10) {
                            $two_sub_total = array_sum($two_arr);
                            Session::put('two_sub_total', $two_sub_total);
                            $content_imp = str_replace('%inventory_sub_total%', number_format($two_sub_total, 2), $content_imp);
                        }
                    }
                }else{ Session::put('two_sub_total', 0); }

                //checking if to include Sales module to proposal
                if($sales->answer == 1)
                {
                    //compute sales sub total;
                    if($k > 10 && $k < 16)
                    {
                        //computed total for implementation
                        $thr_total = '%implementation_'.$k.'%';
                        $thr_arr[$key] = $thr_monthly_rate = $include->monthly_rate;
                        $content_imp = str_replace($thr_total, $thr_monthly_rate, $content_imp);

                        if($k == 15)
                        {
                            $thr_sub_total = array_sum($thr_arr);  Session::put('thr_sub_total', $thr_sub_total);
                            $content_imp = str_replace('%sales_sub_total%', number_format($thr_sub_total, 2), $content_imp);
                        }
                    }
                }else{ Session::put('thr_sub_total', 0); }



                //checking if to include Purchase module to proposal
                if($purch->answer == 1)
                {
                    //compute Purchasing sub total;
                    if($k > 15 && $k < 21)
                    {
                        //computed total for implementation
                        $fou_total = '%implementation_'.$k.'%';
                        $fou_arr[$key] = $fou_monthly_rate = $include->monthly_rate;
                        $content_imp = str_replace($fou_total, $fou_monthly_rate, $content_imp);

                        if($k == 20)
                        {
                            $fou_sub_total = array_sum($fou_arr);  Session::put('fou_sub_total', $fou_sub_total);
                            $content_imp = str_replace('%purchasing_sub_total%', number_format($fou_sub_total, 2), $content_imp);
                        }
                    }
                }else{ Session::put('fou_sub_total', 0); }

                //checking if to include Palipro module to proposal
                if($pali->answer == 1)
                {
                    //compute Palipro sub total;
                    if($k > 20 && $k < 26)
                    {
                        //computed total for implementation
                        $fiv_total = '%implementation_'.$k.'%';
                        $fiv_arr[$key] = $fiv_monthly_rate = $include->monthly_rate;
                        $content_imp = str_replace($fiv_total, $fiv_monthly_rate, $content_imp);

                        if($k == 25)
                        {
                            $fiv_sub_total = array_sum($fiv_arr);  Session::put('fiv_sub_total', $fiv_sub_total);
                            $content_imp = str_replace('%palipro_sub_total%', number_format($fiv_sub_total, 2), $content_imp);
                        }
                    }
                }else{ Session::put('fiv_sub_total', 0); }

                //checking if to include HCMatrix module to proposal
                if($hcm->answer == 1)
                {
                    //compute hcmatrix sub total;
                    if($k > 25 && $k < 31)
                    {
                        //computed total for implementation
                        $six_total = '%implementation_'.$k.'%';
                        $six_arr[$key] = $six_monthly_rate = $include->monthly_rate;
                        $content_imp = str_replace($six_total, $six_monthly_rate, $content_imp);

                        if($k == 30)
                        {
                            $six_sub_total = array_sum($six_arr);  Session::put('six_sub_total', $six_sub_total);
                            $content_imp = str_replace('%hrm_sub_total%', number_format($six_sub_total, 2), $content_imp);
                        }
                    }
                }else{ Session::put('six_sub_total', 0); }

                //checking if to include Infrastructure Setupt module to proposal
                if($infra->answer == 1)
                {
                    //compute infrastructure sub total;
                    if($k > 30 && $k < 37)
                    {
                        //computed total for implementation
                        $sev_total = '%implementation_'.$k.'%';
                        $sev_arr[$key] = $sev_monthly_rate = $include->monthly_rate;
                        $content_imp = str_replace($sev_total, $sev_monthly_rate, $content_imp);

                        if($k == 36)
                        {
                            $sev_sub_total = array_sum($sev_arr);  Session::put('sev_sub_total', $sev_sub_total);
                            $content_imp = str_replace('%infrastructure_sub_total%', number_format($sev_sub_total, 2), $content_imp);

                            //NET TOTAL IMPLEMENTATION
                            $implementation_net_total = (Session::get('one_sub_total') + Session::get('two_sub_total') + Session::get('thr_sub_total') + Session::get('fou_sub_total') + Session::get('fiv_sub_total') + Session::get('six_sub_total') + Session::get('sev_sub_total') );
                            Session::put('implementation_net_total', $implementation_net_total);
                            $content_imp = str_replace('%implementation_net_total%', number_format($implementation_net_total, 2), $content_imp);
                        }
                    }
                }else{ Session::put('sev_sub_total', 0); }

            }


            //project cost
            $annual_software_total_1 = (((Session::get('hcm_sub_total') + Session::get('pali_sub_total')) * 12) + Session::get('db_sub_total'));
            $annual_software_total_2 = ($annual_software_total_1 - Session::get('db_sub_total'));



            $total_in_naira_1 = (($annual_software_total_1 * 455) + Session::get('implementation_net_total'));
            $total_in_naira_2 = (($annual_software_total_2 * 455) + 4500000);


            $content_imp = str_replace('%annual_software_total_1%', number_format($annual_software_total_1, 2), $content_imp);
            $content_imp = str_replace('%annual_software_total_2%', number_format($annual_software_total_2, 2), $content_imp);
            $content_imp = str_replace('%total_in_naira_1%', number_format($total_in_naira_1, 2), $content_imp);
            $content_imp = str_replace('%total_in_naira_2%', number_format($total_in_naira_2, 2), $content_imp);


            //appending signature and user details
            $signature_path = \Auth::user()->signature_path;
            $sign = "<img src='data:image/png;base64, {base64_encode($signature_path)}' alt='your signature' width='100' height='60'>";
//            $sign = "<img src='{$signature_path}' alt='your signature' width='100' height='60'>";

            $name = \Auth::user()->name;
            $phone = \Auth::user()->phone;
            $email = \Auth::user()->email;


            $content_imp = str_replace('%signature%', $sign, $content_imp);
            $content_imp = str_replace('%name%', $name, $content_imp);
            $content_imp = str_replace('%email%', $email, $content_imp);
            $content_imp = str_replace('%phone%', $phone, $content_imp);

            $data = ['content_complete' => $content_imp];
            \App\ProposalSection::where('proposal_name', $request->proposal_name)->update($data);





            return ['status'=>'success','content_complete'=>$content_imp,'message'=>'successful'];
        }
        catch (\Exception $e)
        {
            return ['status'=>'error','message'=>'Sorry, An Error Occurred Please Try Again. '.$e->getMessage()];
        }

    }



    public function UploadProfile(Request $request)
    {
        try
        {
//            return $request->all();
            $file = $request->profile;
            $file_name = $request->profile->getClientOriginalName();
            $destinationPath = 'assets/profile/' . Input::file('profile')->getClientOriginalName();
            $file->move($destinationPath, Input::file('profile')->getClientOriginalName());

            $DATA = array
            (
                'phone' => $request->phone,   'profile_path' => $destinationPath,
            );
            \App\User::where('id', \Auth::user()->id)->update($DATA);

            return ['status'=>'success', 'message'=>'User Profile Uploaded and Saved Successfully'];
        }
        catch (\Exception $e)
        {
            return ['status'=>'error','message'=>'Sorry, An Error Occurred Please Try Again. '.$e->getMessage()];
        }

    }








    public function reloadPreview(Request $request)
    {
        $live_preview = \App\ProposalSection::where('proposal_name', $request->proposal_name)->first();
        return response()->json($live_preview);
    }


    public function downloadWord(Request $request)
    {

        // $template = new \PhpOffice\PhpWord\TemplateProcessor('C:\Users\JIMI-Snapnet\Desktop\Test Excel\Proposal Template.docx');
        $constants = \App\ProposalConstant::where('proposal_name', 'Enterprise Resource Planning')->get();
        $text= 'This is a Text';
        $alias="test word doc";
        $word = new PhpWord;
        $section = $word->addSection();
        Html::addHtml($section, trim($constants), false, false);


        //  foreach ($textArr as $k=>$text){

        //  }


         header('Content-Type: application/octet-stream');
         header('Content-Disposition: attachment;filename="' . $alias . '.docx"');
         $objWriter = IOFactory::createWriter($word, 'Word2007');
         $objWriter->save('php://output');
     }


     public  function convertToDoc(Request $request)
     {

         header("Content-Type: application/vnd.ms-word");
         header("Expires: 0");
         header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
         header("content-disposition: attachment;filename=Report.doc");
     }


     public  function zipDocument(Request $request)
     {
         $files = array('readme.txt', 'test.html', 'image.gif');
         $zipname = 'file.zip';
         $zip = new ZipArchive;
         $zip->open($zipname, ZipArchive::CREATE);
         foreach ($files as $file) {
             $zip->addFile($file);
         }
         $zip->close();
     }




}
