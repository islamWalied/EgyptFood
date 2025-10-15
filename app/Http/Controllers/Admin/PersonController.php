<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use App\Models\Department;
use App\Models\Person;

class PersonController extends Controller
{
    public function index()
    {
        $data = Person::with('department')->paginate(10);
        return view('admin.people.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::pluck('name', 'id')->toArray();
        $person = new Person();
        return view('admin.people.create', compact('departments', 'person'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePersonRequest $request)
    {
        $person = [
            'name' => $request->name,
            'email' => $request->email,
            'department_id' => $request->department_id,
        ];
        Person::create($person);

        return redirect()->route('admin.people.index')->with('success', 'Person created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        return view('admin.people.show', compact('person'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person)
    {
        return view('admin.person.edit' , compact('person'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePersonRequest $request, Person $person)
    {
        $person->name = $request->name ?? $person->name;
        $person->email = $request->email ?? $person->email;
        $person->department_id = $request->department_id ?? $person->department_id;
        $person->save();

        return redirect()->route('admin.people.index')->with('success', 'Person updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        $person->delete();
        return redirect()->route('admin.people.index')->with('success', 'Person deleted successfully');
    }
}
