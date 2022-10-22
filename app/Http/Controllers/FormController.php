<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        return view('form', [
            'forms' => Form::latest()->paginate(5),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'form.name' => 'required|string',
            'form.email' => 'required|email',
            'terms' => 'accepted',
        ]);

        $form = new Form();

        $form->fill($validated['form']);

        $form->save();

        session()->flash('message', 'Form Successfully Created!');

        return back();
    }

    public function livewire()
    {
        return view('form-livewire');
    }
}
