<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListItem extends Model
{
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'detail', 'list_id'
    ];

    public function todoList()
    {
        return $this->belongsTo('App\TodoList');
    }
}
