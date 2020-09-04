<?php

namespace App\Forms\Builders;

use App\Courses;
use LaravelEnso\Forms\app\Services\Form;

class CoursesForm
{
    protected const FormPath = __DIR__.'/../Templates/courses.json';

    protected $form;

    public function __construct()
    {
        $this->form = (new Form(static::FormPath));
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Courses $courses)
    {
        return $this->form->edit($courses);
    }
}
