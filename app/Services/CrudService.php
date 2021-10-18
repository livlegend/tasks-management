<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Support\Facades\DB;

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

    // update  swap of item performed
    public function updateSwap($data){

        DB::transaction(function() use ($data) {
            //
            $draggedTask=Task::find($data['dragged_id']);
            $droppedTask=Task::find($data['dropped_id']);

            Task::where('id', $data['dragged_id'])
                ->update(['priority' => $droppedTask->priority]);

            Task::where('id', $data['dropped_id'])
                ->update(['priority' => $draggedTask->priority]);

            return true;
        });
    }

}
