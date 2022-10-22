<?php

namespace App\Http\Livewire;

use App\Models\Form as FormModel;
use Livewire\Component;
use Livewire\WithPagination;

class Form extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public FormModel $form;
    public bool $terms;

    protected $queryString = [
        'page' => ['except' => 1],
    ];

    protected $rules = [
        'form.name' => 'required|string',
        'form.email' => 'required|email',
        'terms' => 'accepted',
    ];

    public function mount(): void
    {
        $this->form = new FormModel();
        $this->terms = false;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.form', [
            'forms' => FormModel::latest()->paginate(5),
        ]);
    }

    public function store()
    {
        $this->validate();

        $this->form->save();

        session()->flash('message', 'Form Successfully Created!');

        $this->mount();
    }
}
