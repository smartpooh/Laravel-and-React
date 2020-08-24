<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'detail'
    ];

    public function listItems()
    {
        return $this->hasMany('App\ListItem');
    }

    public function tags()
    {
        return $this->hasMany('App\Tags');
    }
}
