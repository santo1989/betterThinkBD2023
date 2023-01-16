<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::latest()->get();
        return view('backend.Admin.types.index', [
            'types' => $types
        ]);
    }

    public function create()
    {
        return view('backend.Admin.types.create');
    }

    public function store(request $request)
    {

        try {
            $types = Type::create([
                'name' => $request->name,
            ]);
            return redirect()->route('types.index')->withMessage('Successfully Created!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }


    public function show(Type $type)
    {
        return view('backend.Admin.types.show', [
            'type' => $type
        ]);
    }

    public function edit(Type $type)
    {
        return view('backend.Admin.types.edit', [
            'type' => $type
        ]);
    }

    public function update(request $request, Type $type)
    {
        // dd($request->all());
        try {
            $requestData = [
                'name' => $request->name,
            ];
            $type->update($requestData);
            return redirect()->route('types.index')->withMessage('Successfully Updated!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function destroy(Type $type)
    {
        try {
            $type->delete();
            return redirect()->route('types.index')->withMessage('Successfully Deleted!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

}
