@extends('layouts.app')

@section('content')

<div class="container">
    <!-- Display family members associated with the family head -->
    <h3>Family Members</h3>
    @if (count($familyMembers) > 0)
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Family Head</th>
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
                            <td>{{ $familyHeadName }}</td>
                            <td>{{ $familyMember->name }}</td>
                            <td>{{ $familyMember->birthdate }}</td>
                            <td>{{ $familyMember->marital_status }}</td>
                            <td>{{ $familyMember->education }}</td>
                            <td><a href="{{ route('family-member.update') }}" class="btn btn-info">Edit</a>
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
