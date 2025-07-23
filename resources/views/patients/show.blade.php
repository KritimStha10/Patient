@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Patient Details</h2>

    <a href="{{ route('patients.index') }}" class="btn btn-secondary mb-3">Back to List</a>

    <table class="table table-bordered">
        <tr><th>Code</th><td>{{ $patient->code }}</td></tr>
        <tr><th>Name</th><td>{{ $patient->name }}</td></tr>
        <tr><th>Gender</th><td>{{ $patient->gender->title ?? '-' }}</td></tr>
        <tr><th>District</th><td>{{ $patient->district->title ?? '-' }}</td></tr>
        <tr><th>Palities</th><td>{{ $patient->pality->title ?? '-' }}</td></tr>
        <tr><th>Phone Number</th><td>{{ $patient->phone_number }}</td></tr>
        <tr><th>Status</th><td>{{ $patient->status ? 'Active' : 'Inactive' }}</td></tr>
        <tr><th>Description</th><td>{!! $patient->description !!}</td></tr>
        <tr><th>Hobbies</th>
            <td>
                @foreach($patient->hubbies as $hubby)
                    <span class="badge bg-info">{{ $hubby->title }}</span>
                @endforeach
            </td>
        </tr>
    </table>
</div>
@endsection
