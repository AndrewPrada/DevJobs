<?php

namespace App\Livewire;

use App\Models\Vacancy;
use Livewire\Component;
use Illuminate\Support\Str;

class HomeVacancies extends Component
{
    public $term;
    public $category;
    public $salary;

    protected $listeners = ['searchTerm' => 'search'];

    public function search($term, $category, $salary)
    {
        $this->term = $term;
        $this->category = $category;
        $this->salary = $salary;
    }

    public function render()
    {
        // $vacancies = Vacancy::all();

        $vacancies = Vacancy::when($this->term, function ($query) {
            $query->where('title', 'LIKE', '%' . Str::lower($this->term) . '%');
        })->when($this->term, function ($query) {
            $query->orWhere('company', 'LIKE', '%' . Str::lower($this->term) . '%');
        })->when($this->category, function ($query) {
            $query->where('category_id', $this->category);
        })->when($this->salary, function ($query) {
            $query->where('salary_id', $this->salary);
        })->orderBy('last_day', 'DESC')->paginate(20);

        return view('livewire.home-vacancies', [
            'vacancies' => $vacancies
        ]);
    }
}
