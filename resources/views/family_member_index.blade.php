@extends('layouts.app')

@section('content')
<div class="mt -5 container">
    <div class="card">
        <div class="card-header">
            <h4>Family Members
                <a href="{{ route('family-member.create') }}" class="btn btn-primary float-right">Add Family Member</a>
            </h4>
        </div>
        @if (count($familyMembers) > 0)
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Birthdate</th>
                            <th>Marital Status</th>
                            <th>Education</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($familyMembers as $familyMember)
                        <tr>
                            <td>{{ $familyMember->name }}</td>
                            <td>{{ $familyMember->birthdate }}</td>
                            <td>{{ $familyMember->marital_status }}</td>
                            <td>{{ $familyMember->education }}</td>
                            <td><a href="{{ route('family-member.store') }}" class="btn btn-success">Edit</a>
                            <button type="button" id="deleteMember" class="btn btn-danger">Delete</button></td>
                                    
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
        <p>No family members found.</p>
        @endif
    </div>
    @endsection
</div>
