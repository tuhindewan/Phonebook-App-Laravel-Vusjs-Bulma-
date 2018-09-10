<?php

namespace App\Http\Controllers;

use App\PhoneBook;
use Illuminate\Http\Request;
use App\Http\Requests\PhonebookRequest;

class PhoneBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('phonebook');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhonebookRequest $request)
    {
        $pb = new PhoneBook;
        $pb->name = $request->name;
        $pb->phone = $request->phone;
        $pb->email = $request->email;
        $pb->save();
    }

    public function getData(){
        return PhoneBook::orderBy('name','ASC')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PhoneBook  $phoneBook
     * @return \Illuminate\Http\Response
     */
    public function show(PhoneBook $phoneBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PhoneBook  $phoneBook
     * @return \Illuminate\Http\Response
     */
    public function edit(PhoneBook $phoneBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PhoneBook  $phoneBook
     * @return \Illuminate\Http\Response
     */
    public function update(PhonebookRequest $request)
    {
        $pb = PhoneBook::find($request->id);
        $pb->name = $request->name;
        $pb->phone = $request->phone;
        $pb->email = $request->email;
        $pb->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PhoneBook  $phoneBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhoneBook $phoneBook)
    {
        PhoneBook::where('id',$phoneBook->id)->delete();
    }
}
