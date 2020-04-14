<?php

namespace App\Http\Controllers\Expert;

use App\Http\Requests\StoreFactRequest;
use App\Http\Requests\UpdateFactRequest;
use App\Services\Interfaces\FactServiceInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FactController extends Controller
{
    protected $factService;

    public function __construct(FactServiceInterface $factService)
    {
        $this->factService = $factService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('expert.facts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expert.facts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFactRequest $request)
    {
        if ($this->factService->store($request)) {
            return redirect()->back()->with('success', __('fact.storingSuccess'));
        } else {
            return redirect()->back()->withErrors(['message' => __('fact.storingFailed')]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fact = $this->factService->getFactById($id);
        return view('expert.facts.edit', compact('fact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFactRequest $request, $id)
    {
        if ($this->factService->update($request, $id)) {
            return redirect()->back()->with('success', __('fact.updateSuccess'));
        } else {
            return redirect()->back()->withErrors(['message' => __('fact.updateFailed')]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeStatus(Request $request) {
        if ($this->factService->changeStatus($request)) {
            return response()->json([
                'success' => __('fact.updateSuccess'),
            ], 200);
        } else {
            return response()->json([
                'error' => __('fact.updateFailed'),
            ], 500);
        }
    }
}
