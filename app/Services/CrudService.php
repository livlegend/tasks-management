<?php

namespace App\Services;


class CrudService
{
  
    //store new data
    public function store($request, $model){
        return $model::create($request);
    }

    // update 
    public function update($request,$model){
        return $model->update($request);
    }

    // delete
    public function delete($model){
        return $model->delete() ? true : false;
    }

}
