<?php

namespace domain\Services;

use App\Models\student;
use infrastructure\Facade\ImagesFacade;

class StudentService

{
    protected $student;

    public function __construct()
    {
        $this->student = new student();
    }

    public function all()
    {
        return $this->student::all();
    }

    public function store($data)
    {
        if(isset($data['images'])){
            $image = ImagesFacade::store($data['images'], [1,2,3,4,5]);
            $data['image_id'] = $image['created_images']->id;
        }
        $this->student->create($data);
    }


    public function delete($students_id)
    {
        $student = $this->student->find($students_id);
        $student->delete();
    }

    public function status($students_id)
    {
        $student = $this->student->find($students_id);
            if ($student->status == 0) {
                $student->status = 1;
                $student->update();
            } else {
                $student->status = 0;
                $student->update();
            }
    }

    public function get( $students_id)
    {
        return $this->student->find($students_id);

    }

      //new data update to db
      public function update(array $data ,$students_id){
        $student = $this->student->find($students_id);
        $student->update($this->edit($student , $data));
    }

    //new data and past data merge
    protected function edit(student $task , $data){
        return array_merge($task->toArray(),$data);
    }
}

