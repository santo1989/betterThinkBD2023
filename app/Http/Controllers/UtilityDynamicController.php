<?php

namespace App\Http\Controllers;

use App\Models\UtilityDynamic;
use Illuminate\Http\Request;

class UtilityDynamicController extends Controller
{
   public function index()
    {
        $utilityDynamics = UtilityDynamic::all();
        return view('backend.utility_dynamic.index', compact('utilityDynamics'));
    }

    public function create()
    {
        return view('backend.utility_dynamic.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type_of_placement' => 'required'
        ]);

        $utilityDynamic = new UtilityDynamic;
        $utilityDynamic->name = $validatedData['name'];
        $utilityDynamic->description = $validatedData['description'];
        $utilityDynamic->type_of_placement = $validatedData['type_of_placement'];

        if ($request->hasFile('picture')) {
            $image = $request->file('picture');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/utilityDynamic');
            $image->move($destinationPath, $name);
            $utilityDynamic->picture = $name;
        }

        $utilityDynamic->save();

        return redirect()->route('utility_dynamic.index')->with('success', 'Utility Dynamic created successfully.');
    }

    public function show($id)
    {
        $utilityDynamic = UtilityDynamic::findOrFail($id);
        return view('backend.utility_dynamic.show', compact('utilityDynamic'));
    }

    public function edit($id)
    {
        $utilityDynamic = UtilityDynamic::findOrFail($id);
        return view('backend.utility_dynamic.edit', compact('utilityDynamic'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type_of_placement' => 'required'
        ]);
        $utilityDynamic = UtilityDynamic::findOrFail($id);
        $utilityDynamic->name = $validatedData['name'];
        $utilityDynamic->description = $validatedData['description'];
        $utilityDynamic->type_of_placement = $validatedData['type_of_placement'];

        if ($request->hasFile('picture')) {
            $image = $request->file('picture');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/utilityDynamic');
            $image->move($destinationPath, $name);
            $utilityDynamic->picture = $name;
        }

        $utilityDynamic->save();

        return redirect()->route('utility_dynamic.index')->with('success', 'Utility Dynamic updated successfully.');
    }

    public function destroy($id)
    {
        $utilityDynamic = UtilityDynamic::findOrFail($id);
        unlink(public_path('/images/utilityDynamic' . $utilityDynamic->picture));
        $utilityDynamic->delete();
        
        return redirect()->route('utility_dynamic.index')->with('success', 'Utility Dynamic deleted successfully.');
    }
}
