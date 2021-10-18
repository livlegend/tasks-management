<?php

namespace App\Services;


class TaskService
{
  
    //store new data
    public function store($request, $model){
        return $model::create($request);
    }

}
