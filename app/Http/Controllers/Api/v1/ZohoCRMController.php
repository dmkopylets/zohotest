<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facades\ZohoClientFacade;

class ZohoCRMController extends Controller
{
    public function createDealAndAccount(Request $request)
    {
        // Validate request data (you can add more validation rules as needed)
        $validatedData = $request->validate([
            'deal.name' => 'required|string',
            'deal.stage' => 'required|string',
            'account.name' => 'required|string',
            'account.website' => 'required|string',
            'account.phone' => 'required|string',
        ]);

        // Set up Zoho API Client
        //$zohoClient = ZohoClientFacade::getInstance();
        $zohoClient = app('ZohoClient');
        $moduleIns = $zohoClient->module('Deals');

        // Create Deal in Zoho CRM
        $dealData = [
            'Deal_Name' => $validatedData['deal']['name'],
            'Stage' => $validatedData['deal']['stage'],
        ];
        $dealRecord = $moduleIns->create($dealData);

        // Create Account in Zoho CRM
        $moduleIns = $zohoClient->module('Accounts');
        $accountData = [
            'Account_Name' => $validatedData['account']['name'],
            'Website' => $validatedData['account']['website'],
            'Phone' => $validatedData['account']['phone'],
        ];
        $accountRecord = $moduleIns->create($accountData);

        // Link Deal and Account (you may need to use a custom field to store the relationship)
        // For example, we assume a custom field 'Account_Link' in the Deal module to store the account's ID
        $dealRecord->set('Account_Link', $accountRecord->get('id'));
        $dealRecord->save();

        return response()->json(['message' => 'Deal and Account created successfully'], 200);
    }
}
