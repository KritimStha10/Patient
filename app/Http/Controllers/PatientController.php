<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\District;
use App\Models\Gender;
use App\Models\Hubby;
use App\Models\Pality;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::with(['gender', 'district', 'pality', 'hubbies'])->paginate(10);
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        $genders = Gender::all();
        $districts = District::all();
        $palities = Pality::all();
        $hubbies = Hubby::all();
        return view('patients.create', compact('genders', 'districts', 'palities', 'hubbies'));
    }

    public function store(StorePatientRequest $request)
    {
       $data = $request->validated();

        $patient = Patient::create([
            'gender_id'    => $data['gender_id'],
            'district_id'  => $data['district_id'],
            'pality_id'    => $data['pality_id'],
            'code'         => strtoupper(Str::random(2)) . rand(1000, 9999),
            'name'         => $data['name'],
            'phone_number' => $data['phone_number'],
            'description'  => $data['description'],
            'status'       => 0,
            'created_by'   => 1,
        ]);


        foreach ($request->hubbies ?? [] as $hubbyId) {
            $patient->hubbies()->attach($hubbyId, [
                'created_by' => 1, 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }


        return redirect()->route('patients.index')->with('success', 'Patient created.');
    }

    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

  public function edit($id)
    {
        $patient = Patient::with('hubbies')->findOrFail($id);

        $genders = Gender::all();
        $districts = District::all();
        $palities = Pality::all();

        $hubbies = Hubby::all(); 

        return view('patients.edit', compact('patient', 'genders', 'districts', 'palities', 'hubbies'));
    }


    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        $data = $request->validated();

        $patient->update([
            'gender_id'    => $data['gender_id'],
            'district_id'  => $data['district_id'],
            'pality_id'    => $data['pality_id'],
            'name'         => $data['name'],
            'phone_number' => $data['phone_number'],
            'description'  => $data['description'],
            'created_by'   => 1,
            'updated_by'   => 1,
            'updated_at'   => now(),
        ]);


       $patient->hubbies()->detach();

        foreach ($request->hubbies ?? [] as $hubbyId) {
            $patient->hubbies()->attach($hubbyId, [
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('patients.index')->with('success', 'Patient updated.');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patient deleted.');
    }
}
