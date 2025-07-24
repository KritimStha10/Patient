<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Edit Patient</title>
    
    <!-- Bootstrap CSS (optional, for styling) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container my-4">
        <h2>Edit Patient</h2>

        <form action="{{ route('patients.update', $patient->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Gender -->
            <div class="mb-3">
                <label for="gender_id" class="form-label">Gender</label>
                <select name="gender_id" id="gender_id" class="form-control" required>
                    <option value="">Select Gender</option>
                    @foreach ($genders as $gender)
                        <option value="{{ $gender->id }}" {{ (old('gender_id', $patient->gender_id) == $gender->id) ? 'selected' : '' }}>
                            {{ $gender->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- District -->
            <div class="mb-3">
                <label for="district_id" class="form-label">District</label>
                <select name="district_id" id="district_id" class="form-control" required>
                    <option value="">Select District</option>
                    @foreach ($districts as $district)
                        <option value="{{ $district->id }}" {{ (old('district_id', $patient->district_id) == $district->id) ? 'selected' : '' }}>
                            {{ $district->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Pality -->
            <div class="mb-3">
                <label for="pality_id" class="form-label">Palities</label>
                <select name="pality_id" id="pality_id" class="form-control" required>
                    <option value="">Select Pality</option>
                    @foreach ($palities as $pality)
                        <option value="{{ $pality->id }}" {{ (old('pality_id', $patient->pality_id) == $pality->id) ? 'selected' : '' }}>
                            {{ $pality->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $patient->name) }}" required>
            </div>

            <!-- Phone Number -->
            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="text" name="phone_number" id="phone_number" maxlength="10" class="form-control" value="{{ old('phone_number', $patient->phone_number) }}" required>
            </div>

            <!-- Hobbies (multi-select with Select2) -->
            <div class="mb-3">
                <label for="hubbies" class="form-label">Hobbies</label>
                <select name="hubbies[]" id="hubbies" class="form-control" multiple style="width: 100%;">
                    @php
                        $selectedHubbies = old('hubbies', $patient->hubbies->pluck('id')->toArray());
                    @endphp
                    @foreach ($hubbies as $hubby)
                        <option value="{{ $hubby->id }}" {{ in_array($hubby->id, $selectedHubbies) ? 'selected' : '' }}>
                            {{ $hubby->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Description (CKEditor) -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" rows="5" class="form-control">{{ old('description', $patient->description) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Patient</button>
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
            // Initialize Select2
            $('#hubbies').select2({
                placeholder: "Select hobbies",
                allowClear: true,
                width: '100%'
            });

            // Initialize CKEditor
            CKEDITOR.replace('description');
        });


        $('#district_id').on('change', function () {
            const districtId = $(this).val();
            const palitySelect = $('#pality_id');

            palitySelect.html('<option value="">Loading...</option>');

            if (districtId) {
                $.ajax({
                    url: `/get-palities/${districtId}`,
                    method: 'GET',
                    success: function (data) {
                        let options = '<option value="">Select Pality</option>';
                        data.forEach(function (pality) {
                            options += `<option value="${pality.id}">${pality.title}</option>`;
                        });
                        palitySelect.html(options);
                    },
                    error: function () {
                        palitySelect.html('<option value="">Error loading palities</option>');
                    }
                });
            } else {
                palitySelect.html('<option value="">Select District First</option>');
            }
        });
    </script>
</body>
</html>
