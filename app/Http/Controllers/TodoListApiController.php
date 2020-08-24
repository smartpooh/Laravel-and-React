<?php

namespace App\Http\Controllers;

use App\ListItem;
use App\TodoList;
use Illuminate\Http\Request;

/**
 * Class TodoListApiController
 * @package App\Http\Controllers
 *
 * /lists
 */
class TodoListApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return TodoList[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {

        return TodoList::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        return TodoList::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param \App\TodoList $todoList
     * @return \Illuminate\Http\Response
     */
    public function show($todoList)
    {
        $todoList = TodoList::findOrFail($todoList);
        $listItems = ListItem::where('list_id', '=', $todoList->id)->get();

        return $listItems;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $todoList
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $todoList)
    {
        $todoList = TodoList::find($todoList);

        $request->validate([
            'name' => 'required',
        ]);

        $todoList->update($request->all());

        return $todoList;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param TodoList $todoList
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($todoList)
    {
        $todoList = TodoList::find($todoList);

        $todoList->delete();

        return 204;
    }
}
