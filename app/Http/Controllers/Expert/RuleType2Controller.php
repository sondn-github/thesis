<?php

namespace App\Http\Controllers\Expert;

use App\Fact;
use App\Http\Requests\StoreRuleType2Request;
use App\Http\Requests\UpdateRuleType2Request;
use App\Services\Interfaces\FactServiceInterface;
use App\Services\Interfaces\KnowledgeServiceInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RuleType2Controller extends Controller
{
    protected $factService;
    protected $knowledgeService;

    public function __construct(FactServiceInterface $factService,
                                KnowledgeServiceInterface $knowledgeService)
    {
        $this->factService = $factService;
        $this->knowledgeService = $knowledgeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('expert.knowledge.rulesType2.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $factsTypeComment = $this->factService->getFactsByType(Fact::TYPE_COMMENT);
        $facts = $this->factService->getFacts();

        return view('expert.knowledge.rulesType2.create', compact('facts'), compact('factsTypeComment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRuleType2Request $request)
    {
        if ($this->knowledgeService->storeRuleType2($request)) {
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
        $factsTypeComment = $this->factService->getFactsByType(Fact::TYPE_COMMENT);
        $facts = $this->factService->getFacts();

        return view('expert.knowledge.rulesType2.edit', [
            'knowledge' => $knowledge,
            'factsTypeComment' => $factsTypeComment,
            'facts' => $facts,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRuleType2Request $request, $id)
    {
        if ($this->knowledgeService->updateRuleType2($request, $id)) {
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
}
