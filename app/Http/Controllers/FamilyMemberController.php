<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\FamilyMember;
use App\Models\FamilyHead;

class FamilyMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all family members
        $familyMembers = FamilyMember::all();

        // Pass family members data to the view
        return view('family_member_index', compact('familyMembers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Fetch all family heads
        $familyHeads = FamilyHead::all();

        // Pass family heads data to the view
        return view('family_member_create', compact('familyHeads'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //dd($request->post());die;
        $validator = Validator::make($request->all(), [
           // 'head_id' => 'required|exists:family_heads,id',
            'name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'marital_status' => 'required|in:Married,Unmarried',
            'wedding_date' => $request->marital_status == 'Married' ? 'required_if:marital_status,Married|date' : '',
            'education' => 'nullable|string|max:255',
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            /*$messages = $validator->messages();
            foreach ($messages->all('<li>:message</li>') as $message)
            {
                echo $message;
            } */
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // If validation passes, create family member
        FamilyMember::create([
            'head_id' => $request->head_id,
            'name' => $request->name,
            'birthdate' => $request->birthdate,
            'marital_status' => $request->marital_status,
            'wedding_date' => $request->wedding_date,
            'education' => $request->education,
        ]);

        // Redirect back with success message
        return redirect()->route('family-member.index')->with('success', 'Family member created successfully');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FamilyMembers  $familyMembers
     * @return \Illuminate\Http\Response
     */
    public function show(FamilyMembers $familyMembers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FamilyMembers  $familyMembers
     * @return \Illuminate\Http\Response
     */
    public function edit(FamilyMembers $familyMembers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FamilyMembers  $familyMembers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FamilyMembers $familyMembers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FamilyMembers  $familyMembers
     * @return \Illuminate\Http\Response
     */
    public function destroy(FamilyMembers $familyMembers)
    {
        //
    }
}
