<?php

namespace App\Http\Controllers;

use App\ListItem;
use Illuminate\Http\Request;

class ListItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('listItems.create',
            ['listId' => filter_input(INPUT_GET, 'todoListId', FILTER_SANITIZE_NUMBER_INT)]);
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

        $all = $request->all();

        ListItem::create($all);

        return redirect()->route('lists.show', ['list' => $all['list_id']])
            ->with('success', 'List item created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\ListItem $listItem
     * @return \Illuminate\Http\Response
     */
    public function show(ListItem $listItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\ListItem $listItem
     * @return \Illuminate\Http\Response
     */
    public function edit(ListItem $listItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ListItem $listItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListItem $listItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ListItem $listItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListItem $listItem)
    {
        //
    }
}
