<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateCategoryButton extends Component
{
    public $isOpen = false;

    public $courses;



    public function mount($coursesAll)
    {

        $this->courses = $coursesAll;
    }

    public function openModal()
    {

        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.create-category-button');
    }
}
