<?php

namespace App\Http\Controllers;

use App\ListItem;
use App\TodoList;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todoLists = TodoList::latest()->paginate(5);

        return view('todoLists.index', compact('todoLists'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

//        $todoLists = TodoList::all();
//        return view('todoLists.index', compact('todoLists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todoLists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        TodoList::create($request->all());

        return redirect()->route('lists.index')
            ->with('success', 'Todo List created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\TodoList $todoList
     * @return \Illuminate\Http\Response
     */
    public function show($todoList)
    {
        $todoList = TodoList::find($todoList);
        $listItems = ListItem::where('list_id', '=', $todoList->id)->get();

        return view('todoLists.show', compact('todoList', 'listItems'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\TodoList $todoList
     * @return \Illuminate\Http\Response
     */
    public function edit($todoList)
    {
        $todoList = TodoList::find($todoList);

        return view('todoLists.edit', compact('todoList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\TodoList $todoList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $todoList)
    {
        $todoList = TodoList::find($todoList);

        $request->validate([
            'name' => 'required',
        ]);

        $todoList->update($request->all());

        return redirect()->route('lists.index')
            ->with('success','Todo List updated successfully');
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

        return redirect()->route('lists.index')
            ->with('success','Todo List deleted successfully');
    }
}
