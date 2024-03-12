@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Family Head</h2>
    <form id="createFamilyHeadForm" method="POST" action="{{ route('family-head.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="surname">Surname:</label>
            <input type="text" class="form-control" id="surname" name="surname" required>
        </div>
        <div class="form-group">
            <label for="birthdate">Birth Date:</label>
            <input type="date" class="form-control" id="birthdate" name="birthdate" required>
        </div> 
        <div class="form-group">
            <label for="mobile_no">Mobile No:</label>
            <input type="text" class="form-control" id="mobile_no" name="mobile_no" required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <div class="form-group">
            <label for="state">State:</label>
            <input type="text" class="form-control" id="state" name="state" required>
        </div>
        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" class="form-control" id="city" name="city" required>
        </div>
        <div class="form-group">
            <label for="pincode">Pincode:</label>
            <input type="text" class="form-control" id="pincode" name="pincode" required>
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
            <label for="hobbies">Hobbies:</label>
            <input type="text" class="form-control" id="hobbies" name="hobbies">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
