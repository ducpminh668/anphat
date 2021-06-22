<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Permission\PermissionRepository;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    public function __construct(
        PermissionRepository $permission
    ) {
        $this->permission = $permission;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->permission->getAll();
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
            'name' => 'required|unique:permissions',
            'display_name' => 'required'
        ]);

        if ($validator->fails()) {
            return ['status' => 0, 'message' => $validator->errors()];
        }

        try {
            $this->permission->create([
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
        $permission = $this->permission->find($id);
        if ($permission) {
            return ['status' => 1, 'data' => $permission];
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
        $permission = $this->permission->find($id);
        $validator = Validator::make($request->all(), [
            'name' => "required|unique:permissions,name,{$permission->id},id",
            'display_name' => 'required'
        ]);

        if ($validator->fails()) {
            return ['status' => 0, 'message' => $validator->errors()];
        }

        try {
            $this->permission->update($id, [
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

        if (!$this->permission->delete($id)) {
            return ['status' => 0, 'message' => 'Not found'];
        }
        return ['status' => 1, 'data' => $id];
    }
}
