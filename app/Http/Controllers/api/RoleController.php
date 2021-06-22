<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Role\RoleRepository;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function __construct(
        RoleRepository $role
    ) {
        $this->role = $role;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->role->getAll();
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles',
            'display_name' => 'required'
        ]);

        if ($validator->fails()) {
            return ['status' => 0, 'message' => $validator->errors()];
        }

        try {
            $this->role->create([
                'name' => $request->name,
                'display_name' => $request->display_name,
                'description' => $request->description,
            ]);
        } catch (\Exception $e) {
            return ['status' => 0, 'message' => $e->getMessage()];
        }
        return ['status' => 1, 'message' => 'Thành công'];
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
        $role = $this->role->find($id);
        if ($role) {
            return ['status' => 1, 'data' => $role];
        }
        return ['status' => 0, 'message' => 'Not Found'];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = $this->role->find($id);
        $validator = Validator::make($request->all(), [
            'name' => "required|unique:roles,name,{$role->id},id",
            'display_name' => 'required'
        ]);

        if ($validator->fails()) {
            return ['status' => 0, 'message' => $validator->errors()];
        }

        try {
            $this->role->update($id, [
                'name' => $request->name,
                'display_name' => $request->display_name,
                'description' => $request->description,
            ]);
        } catch (\Exception $e) {
            return ['status' => 0, 'message' => $e->getMessage()];
        }
        return ['status' => 1, 'message' => 'Thành công'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return ['status' => 0, 'message' => $validator->errors()];
        }

        if (!$this->role->delete($id)) {
            return ['status' => 0, 'message' => 'Not found'];
        }
        return ['status' => 1, 'data' => $id];
    }
}
