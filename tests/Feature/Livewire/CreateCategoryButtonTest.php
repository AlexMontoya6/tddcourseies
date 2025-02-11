<?php

use App\Models\Course;
use Livewire\Livewire;

use function Pest\Laravel\get;

it('When I click the button the form is displayed', function () {

    $courses = [];

    Livewire::test('create-category-button', ['coursesAll' => $courses])
        ->assertDontSee('Nueva categoría')
        ->call('openModal')
        ->assertSee('Nueva categoría');

});



it('You can see multiple courses in the form', function () {

    $courses = Course::factory(3)->create();

    Livewire::test('create-category-button', ['coursesAll' => $courses])
        ->assertDontSee('Nueva categoría')
        ->call('openModal')
        ->assertSee('Nueva categoría')
        ->assertSee($courses[0]->title)
        ->assertSee($courses[1]->title)
        ->assertSee($courses[2]->title);

});


it('The form sends you to the store method', function () {

    $courses = [];

    Livewire::test('create-category-button', ['coursesAll' => $courses])
        ->assertDontSee('Nueva categoría')
        ->call('openModal')
        ->assertSee('Nueva categoría')
        ->assertSeeHtml('<form action="' . route('category.store') . '" method="POST">');


});
