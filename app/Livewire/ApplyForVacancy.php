<?php

namespace App\Livewire;

use App\Models\Vacancy;
use App\Notifications\NewApplicant;
use Livewire\Component;
use Livewire\WithFileUploads;

class ApplyForVacancy extends Component
{
    public $cv;
    public $vacancy;

    use WithFileUploads;

    protected $rules = [
        'cv' => ['required', 'mimes:pdf'],
    ];

    public function mount(Vacancy $vacancy)
    {
        $this->vacancy = $vacancy;
    }

    public function Apply()
    {
        $data = $this->validate();

        if ($this->vacancy->applicants()->where('user_id', auth()->user()->id)->count() > 0) {
            session()->flash('error', 'Ya postulaste a esta vacante anteriormente');
        } else {
            // Store CV on HardDisk
            $cv = $this->cv->store('public/curriculum');

            $data['cv'] = str_replace('public/curriculum/', '', $cv);

            // Create the Applicant for the vacancy
            $this->vacancy->applicants()->create([
                'user_id' => auth()->user()->id,
                'cv' => $data['cv'],
            ]);

            // Create notification and send email
            $this->vacancy->recruiter->notify(new NewApplicant($this->vacancy->id, $this->vacancy->title, auth()->user()->id));

            // Show the user the success message
            session()->flash('message', 'Se envió correctamente tu información. Mucha Suerte');

            return redirect()->back();
        }
    }

    public function render()
    {
        return view('livewire.apply-for-vacancy');
    }
}
