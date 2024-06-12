<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;
use Auth;
class ResourceController extends Controller
{
    public function index()
{
    if(Auth::check())
    {

    $resources = Resource::all();
    return view('resources.index', compact('resources'));

}
return redirect('login')->with('success', 'you are not allowed to access');
}

public function create()
{
    return view('resources.create');
}

public function store(Request $request)
{
    // Validate request...

    // Upload document...
    
    $resource = new Resource;
    $resource->name = $request->name;
    $resource->email = $request->email;
    $resource->phone = $request->phone;
    $resource->document = $request->file('document')->store('documents');
    $resource->text = $request->text;
    $resource->save();

    return redirect()->route('resources.index')->with('success', 'Resource created successfully.');
}

public function edit(Resource $resource)
{
    return view('resources.edit', compact('resource'));
}

public function update(Request $request, Resource $resource)
{
    // Validate request...

    // Update document if provided...
    
   
    $resource->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'document' => $request->file('document') ? $request->file('document')->store('documents') : $resource->document,
        'text' => $request->text,
    ]);

    return redirect()->route('resources.index')->with('success', 'Resource updated successfully.');
}

public function destroy(Resource $resource)
{
    $resource->delete();
    return redirect()->route('resources.index')->with('success', 'Resource deleted successfully.');
}

}
