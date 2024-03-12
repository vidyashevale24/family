@extends('layouts.app')

@section('content')
<div class="mt -5 container">
    <div class="card">
        <div class="card-header">
            <h4>Family Heads
                <a href="{{ route('family-head.create') }}" class="btn btn-primary float-right">Add Family Head</a>
            </h4>
        </div>
        @if (count($familyHeads) > 0)
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr >
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Birth Date</th>
                            <th>Mobile No</th>
                            <th>Address</th>
                            <th>State</th>
                            <th>City</th>
                            <!--<th>Pincode</th>
                            <th>Marital Status</th>
                            <th>Wedding Date</th>
                            <th>Hobbies</th> -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($familyHeads as $familyHead)
                        <tr>
                            <td>{{ $familyHead->name }}</td>
                            <td>{{ $familyHead->surname }}</td>
                            <td>{{ $familyHead->birthdate }}</td>
                            <td>{{ $familyHead->mobile_no }}</td>
                            <td>{{ $familyHead->address }}</td>
                            <td>{{ $familyHead->state }}</td>
                            <td>{{ $familyHead->city }}</td>
                            <!--<td>{{ $familyHead->pincode }}</td>
                            <td>{{ $familyHead->marital_status }}</td>
                            <td>{{ $familyHead->wedding_date }}</td>
                            <td>{{ $familyHead->hobbies }}</td> -->
                            <td><a href="{{ route('family-head.show', ['id' => $familyHead->id]) }}" class="btn btn-success">View Members</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
        <p>No family heads found.</p>
        @endif
    </div>
    @endsection
</div>
        
    
                
