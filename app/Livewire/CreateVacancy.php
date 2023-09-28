<?php

namespace App\Livewire;

use App\Models\Salary;
use App\Models\Vacancy;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class CreateVacancy extends Component
{
    public $title;
    public $salary;
    public $category;
    public $company;
    public $last_day;
    public $description;
    public $image;

    use WithFileUploads;

    protected $rules = [
        'title' => ['required', 'string'],
        'salary' => ['required'],
        'category' => ['required'],
        'company' => ['required'],
        'last_day' => ['required'],
        'description' => ['required'],
        'image' => ['required', 'image', 'max:1024'],
    ];

    public function createVacancy()
    {
        $data = $this->validate();

        // Image Store
        $image = $this->image->store('public/vacancies');

        $data['image'] = str_replace('public/vacancies/', '', $image);

        // Create Vacancy
        Vacancy::create([
            'title' => Str::lower($data['title']),
            'salary_id' => $data['salary'],
            'category_id' => $data['category'],
            'company' => Str::lower($data['company']),
            'last_day' => $data['last_day'],
            'description' => $data['description'],
            'image' => $data['image'],
            'user_id' => auth()->user()->id,
        ]);

        // Create Message
        session()->flash('message', 'La Vacante se publicó correctamente');

        // Redirect Users
        return redirect()->route('vacancies.index');
    }


    public function render()
    {
        // Consultar Base de Datos
        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.create-vacancy', [
            'salaries' => $salaries,
            'categories' => $categories,
        ]);
    }
}
