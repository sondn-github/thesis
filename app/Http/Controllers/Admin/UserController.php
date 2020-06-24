<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\Interfaces\RoleServiceInterface;
use App\Services\Interfaces\UserServiceInterface;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $userService;
    protected $roleService;

    public function __construct(UserServiceInterface $userService,
                                RoleServiceInterface $roleService)
    {
        $this->userService = $userService;
        $this->roleService = $roleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->roleService->getRoles();

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        if ($this->userService->store($request)) {
            return redirect()->route('admin.users.create')->with(['success' => __('user.successStoring')]);
        } else {
            return redirect()->route('admin.users.create')
                ->withInput()
                ->withErrors(['message' => __('user.failedStoring')]);
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
        $user = $this->userService->getUserById($id);
        $roles = $this->roleService->getRoles();

        return view('admin.users.edit', compact('user'), compact('roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        if ($this->userService->updateUserByAdmin($request, $id)) {
            return redirect()->back()->with('success', __('user.successUpdating'));
        } else {
            return redirect()->back()->withErrors(['message' => __('user.failedUpdating')]);
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
        if ($this->userService->destroy($id)) {
            return response()->json([
                'success' => __('user.successDeleting'),
            ], 200);
        } else {
            return response()->json([
                'error' => __('user.failedDeleting'),
            ], 500);
        }
    }

    public function changeStatus(Request $request) {
        if ($this->userService->changeStatus($request)) {
            return response()->json([
                'success' => __('lesson.updateSuccess'),
            ], 200);
        } else {
            return response()->json([
                'error' => __('lesson.updateFailed'),
            ], 500);
        }
    }
}
