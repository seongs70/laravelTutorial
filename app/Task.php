<?php

namespace App;

use App\Task;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected  $guarded = [];

    public function complete($completed = true)// $task ->completed
    {
        $this->update(compact('completed'));
    }

    public function incomplete()
    {
        $this->complete(false);
    }

    public function project()
{
    return $this->belongsTo(Project::class);
}
}
