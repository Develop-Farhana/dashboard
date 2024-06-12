<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormData;

class FormDataController extends Controller
{
    public function createForm()
    {
        return view('form.create');
    }

    public function saveFormData(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'document' => 'nullable|mimes:pdf,mp4,jpeg,png|max:2048',
            'text_data' => 'nullable'
        ]);

        // Handle file upload
        if ($request->hasFile('document')) {
            $documentPath = $request->file('document')->store('uploads');
        } else {
            $documentPath = null;
        }

        // Save form data
        FormData::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'document_path' => $documentPath,
            'text_data' => $validatedData['text_data']
        ]);

        return response()->json(['success' => 'Form data saved successfully']);
    }

    // Implement editForm, updateFormData, deleteFormData methods
    // ...
}
