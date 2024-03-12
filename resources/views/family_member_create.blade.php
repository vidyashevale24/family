@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Family Member</h2>
    <form id="addFamilyMemberForm" method="POST" action="{{ route('family-member.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="family_head">Family Head:</label>
            <select class="form-control" id="family_head" name="head_id" required>
                <option value="">Select Family Head</option>
                @foreach ($familyHeads as $familyHead)
                    <option value="{{ $familyHead->id }}">{{ $familyHead->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="birthdate">Birth Date:</label>
            <input type="date" class="form-control" id="birthdate" name="birthdate" required>
        </div> 
       <div class="form-group">
            <label for="marital_status">Marital Status:</label>
            <select class="form-control" id="marital_status" name="marital_status" required>
                <option value="">Select Marital Status</option>
                <option value="Married">Married</option>
                <option value="Unmarried">Unmarried</option>
            </select>
        </div> 
        <div class="form-group" id="wedding_date_container" style="display:none;">
            <label for="wedding_date">Wedding Date:</label>
            <input type="date" class="form-control" id="wedding_date" name="wedding_date">
        </div> 
        <div class="form-group">
            <label for="education">Education:</label>
            <input type="text" class="form-control" id="education" name="education">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
