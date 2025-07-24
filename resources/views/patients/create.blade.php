<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Create New Patient</title>
    
    <!-- Bootstrap CSS (optional, for styling) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container my-4">
        <h2>Create New Patient</h2>

        {{-- @include('errors.error') --}}

        <form action="{{ route('patients.store') }}" method="POST">
            @csrf

            <!-- Gender -->
            <div class="mb-3">
                <label for="gender_id" class="form-label">Gender</label>
                <select name="gender_id" id="gender_id" class="form-control @error('gender_id') is-invalid @enderror">
                    <option value="">Select Gender</option>
                    @foreach ($genders as $gender)
                        <option value="{{ $gender->id }}" {{ old('gender_id') == $gender->id ? 'selected' : '' }}>
                            {{ $gender->title }}
                        </option>
                    @endforeach
                </select>
                @error('gender_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- District -->
            <div class="mb-3">
                <label for="district_id">District</label>
                    <select name="district_id" id="district_id" class="form-control" required>
                        <option value="">Select District</option>
                        @foreach ($districts as $district)
                            <option value="{{ $district->id }}">{{ $district->title }}</option>
                        @endforeach
                    </select>
                @error('district_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Pality -->
            <div class="mb-3">
                <label for="pality_id">Pality</label>
                <select name="pality_id" id="pality_id" class="form-control" required>
                    <option value="">Select Pality</option>
                    {{-- Populated dynamically --}}
                </select>
                @error('pality_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Phone Number -->
            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="text" name="phone_number" id="phone_number" maxlength="10" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}" >
                @error('phone_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Hobbies -->
            <div class="mb-3">
                <label for="hubbies" class="form-label">Hobbies</label>
                <select name="hubbies[]" id="hubbies" class="form-control @error('hubbies') is-invalid @enderror" multiple style="width: 100%;">
                    @foreach ($hubbies as $hubby)
                        <option value="{{ $hubby->id }}" {{ collect(old('hubbies'))->contains($hubby->id) ? 'selected' : '' }}>
                            {{ $hubby->title }}
                        </option>
                    @endforeach
                </select>
                @error('hubbies')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" rows="5" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Create Patient</button>
            <a href="{{ route('patients.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <!-- jQuery (must load before Select2) -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize Select2 on hobbies multi-select
            $('#hubbies').select2({
                placeholder: "Select hobbies",
                allowClear: true,
                width: '100%'
            });

            // Initialize CKEditor on description textarea
            CKEDITOR.replace('description');
        });
    </script>

    <script>
        $('#district_id').on('change', function () {
            const districtId = $(this).val();

            $('#pality_id').html('<option value="">Loading...</option>');

            if (districtId) {
                $.ajax({
                    url: `/get-palities/${districtId}`,
                    method: 'GET',
                    success: function (data) {
                        let options = '<option value="">Select Pality</option>';
                        data.forEach(pality => {
                            options += `<option value="${pality.id}">${pality.title}</option>`;
                        });
                        $('#pality_id').html(options);
                    },
                    error: function () {
                        $('#pality_id').html('<option value="">Error loading palities</option>');
                    }
                });
            } else {
                $('#pality_id').html('<option value="">Select District First</option>');
            }
        });
    </script>
</body>
</html>
