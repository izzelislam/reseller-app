<?php

namespace App\Http\Controllers;

use App\Models\Withdraw;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\WithdrawRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $withdraws = Withdraw::paginate();

        return view('withdraw.index', compact('withdraws'))
            ->with('i', ($request->input('page', 1) - 1) * $withdraws->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $withdraw = new Withdraw();

        return view('withdraw.create', compact('withdraw'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WithdrawRequest $request): RedirectResponse
    {
        Withdraw::create($request->validated());

        return Redirect::route('withdraws.index')
            ->with('success', 'Withdraw created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $withdraw = Withdraw::find($id);

        return view('withdraw.show', compact('withdraw'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $withdraw = Withdraw::find($id);

        return view('withdraw.edit', compact('withdraw'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WithdrawRequest $request, Withdraw $withdraw): RedirectResponse
    {
        $withdraw->update($request->validated());

        return Redirect::route('withdraws.index')
            ->with('success', 'Withdraw updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Withdraw::find($id)->delete();

        return Redirect::route('withdraws.index')
            ->with('success', 'Withdraw deleted successfully');
    }
}
