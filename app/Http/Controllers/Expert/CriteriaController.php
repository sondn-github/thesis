<?php

namespace App\Http\Controllers\Expert;

use App\Http\Requests\StoreCriteriaRequest;
use App\Http\Requests\UpdateCriteriaRequest;
use App\Services\Interfaces\CriteriaServiceInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CriteriaController extends Controller
{
    protected $criteriaService;

    public function __construct(CriteriaServiceInterface $criteriaService)
    {
        $this->criteriaService = $criteriaService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('expert.criteria.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expert.criteria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCriteriaRequest $request)
    {
        if ($this->criteriaService->store($request)) {
            return redirect()->back()->with('success', __('criteria.storingSuccess'));
        } else {
            return redirect()->back()->withErrors(['message' => __('criteria.storingFailed')]);
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
        $criteria = $this->criteriaService->getCriteria($id);
        if ($criteria) {
            return response()->json($criteria, 200);
        } else {
            return response(__('lesson.failed-message'), 401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $criteria = $this->criteriaService->getCriteria($id);

         return view('expert.criteria.edit', compact('criteria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCriteriaRequest $request, $id)
    {
        if ($this->criteriaService->update($request, $id)) {
            return redirect()->back()->with('success', __('criteria.updateSuccess'));
        } else {
            return redirect()->back()->withErrors(['message' => __('criteria.updateFailed')]);
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
        if ($this->criteriaService->changeStatus($request)) {
            return response()->json([
                'success' => __('criteria.updateSuccess'),
            ], 200);
        } else {
            return response()->json([
                'error' => __('criteria.updateFailed'),
            ], 500);
        }
    }
}
