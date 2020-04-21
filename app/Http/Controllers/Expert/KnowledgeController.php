<?php

namespace App\Http\Controllers\Expert;

use App\Fact;
use App\Http\Requests\StoreRuleType1Request;
use App\Http\Requests\UpdateRuleType1Request;
use App\Services\Interfaces\CriteriaServiceInterface;
use App\Services\Interfaces\FactServiceInterface;
use App\Services\Interfaces\KnowledgeServiceInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KnowledgeController extends Controller
{
    protected $knowledgeService;
    protected $criteriaService;
    protected $factService;

    public function __construct(KnowledgeServiceInterface $knowledgeService,
                                CriteriaServiceInterface $criteriaService,
                                FactServiceInterface $factService)
    {
        $this->knowledgeService = $knowledgeService;
        $this->criteriaService = $criteriaService;
        $this->factService = $factService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('expert.knowledge.rulesType1.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $criteria = $this->criteriaService->getAllCriteria();
        $facts = $this->factService->getFactsByType(Fact::TYPE_COMMENT);

        return view('expert.knowledge.rulesType1.create', compact('criteria'), compact('facts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRuleType1Request $request)
    {
        if ($this->knowledgeService->storeRuleType1($request)) {
            return redirect()->back()->with('success', __('knowledge.storingSuccess'));
        } else {
            return redirect()->back()->withErrors(['message' => __('knowledge.storingFailed')]);
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function edit($id)
    {
        $knowledge = $this->knowledgeService->getKnowledgeById($id);
        $criteria = $this->criteriaService->getAllCriteria();
        $facts = $this->factService->getFactsByType(Fact::TYPE_COMMENT);

        return view('expert.knowledge.rulesType1.edit', [
            'knowledge' => $knowledge,
            'criteria' => $criteria,
            'facts' => $facts,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRuleType1Request $request, $id)
    {
        if ($this->knowledgeService->updateRuleType1($request, $id)) {
            return redirect()->back()->with('success', __('knowledge.updateSuccess'));
        } else {
            return redirect()->back()->withErrors(['message' => __('knowledge.updateFailed')]);
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
        if ($this->knowledgeService->changeStatus($request)) {
            return response()->json([
                'success' => __('knowledge.updateSuccess'),
            ], 200);
        } else {
            return response()->json([
                'error' => __('knowledge.updateFailed'),
            ], 500);
        }
    }
}
