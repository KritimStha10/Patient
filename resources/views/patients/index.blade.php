@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Patients List</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('patients.create') }}" class="btn btn-primary mb-3">Add New Patient</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Gender</th>
                <th>District</th>
                <th>Palities</th>
                <th>Phone Number</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($patients as $patient)
                <tr>
                    <td>{{ $patient->code }}</td>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->gender->title ?? '-' }}</td>
                    <td>{{ $patient->district->title ?? '-' }}</td>
                    <td>{{ $patient->pality->title ?? '-' }}</td>
                    <td>{{ $patient->phone_number }}</td>
                    <td>{{ $patient->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" style="display:inline-block;" class="delete-patient-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>


                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No patients found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $patients->links() }}
</div>
@endsection

<script>
document.addEventListener('DOMContentLoaded', function() {
    const forms = document.querySelectorAll('.delete-patient-form');

    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault(); // Stop immediate form submission

            Swal.fire({
                title: 'Are you sure?',
                text: "This patient will be deleted permanently!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Submit form if confirmed
                }
            });
        });
    });
});
</script>

