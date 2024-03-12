<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FamilyHead;
use Illuminate\Support\Facades\Validator;

class FamilyHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all family heads
        $familyHeads = FamilyHead::all();

        // Pass family heads data to the view
        return view('family_head_index', compact('familyHeads'));
    }
    
    public function create()
    {
        return view('family_head_create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'birthdate' => 'required|date|before:-21 years',
            'mobile_no' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'state' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'pincode' => 'required|string|max:10',
            'marital_status' => 'required|in:Married,Unmarried',
            'wedding_date' => $request->marital_status == 'Married' ? 'required_if:marital_status,Married|date' : '',
            'hobbies' => 'nullable|string',
        ]);
     
        if ($validator->fails()) {
           /*  $messages = $validator->messages();
            foreach ($messages->all('<li>:message</li>') as $message)
            {
                echo $message;
            } */
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        // Create family head
        $familyHead = FamilyHead::create($validator->validated());
        return redirect()->route('family-head.index')->with('success', 'Family head created successfully');
    }

    public function show($id)
    {
        // Fetch the selected family head
        $familyHead = FamilyHead::findOrFail($id);
        $familyHeadName = $familyHead['name'];
        // Fetch family members associated with the selected family head
        $familyMembers = $familyHead->familyMembers;
        // Return the view with the family head and family members data
        return view('family_head_show', compact('familyHeadName', 'familyMembers'));
    }
}
