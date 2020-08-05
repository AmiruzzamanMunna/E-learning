<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AdminRole;
use App\Permission;
use App\RolePermission;
use DB;

class RoleController extends Controller
{
    public function roleIndex(Request $request)
    {
        $permission=$request->session()->get('permission');
        $rolelist=$request->session()->get('rolelist');
        if($rolelist){

            return view('Admin.role')
                    ->with('permission',$permission);
        }
        
    }
    public function getRoleList(Request $request)
    {
        $data=AdminRole::all();

        $roledelete=$request->session()->get('roledelete');
        $roleedit=$request->session()->get('roleedit');
        $roleper=$request->session()->get('roleper');
        
        return response()->json(array('status'=>'success','data'=>$data,'roleedit'=>$roleedit,'roledelete'=>$roledelete,'roleper'=>$roleper));
    }
    public function insertRole(Request $request)
    {
        $name=$request->name;
        $data=new AdminRole();
        $data->adminrole_name=$name;
        $data->save();
        return response()->json(array('status'=>'success'));
    }
    public function editRole(Request $request)
    {
        $id=$request->id;
        $data=AdminRole::where('adminrole_id',$id)->first();
        return response()->json(array('status'=>'success','data'=>$data));
    }
    public function editRoleUpdate(Request $request)
    {
        $id=$request->id;
        $data=AdminRole::where('adminrole_id',$id)->update(['adminrole_name'=>$request->name]);
        return response()->json(array('status'=>'success'));
    }
    public function deleteRole(Request $request)
    {
        $id=$request->id;
        $data=AdminRole::where('adminrole_id',$id)->delete();
    }
    public function rolePermission(Request $request)
    {
        $id=$request->id;
        $role=AdminRole::where('adminrole_id',$id)->first();
        $permission=Permission::where('permission_parent_id',0)->get();
        $subPermission=DB::select("
                SELECT 
                    tbl_permission.permission_id AS autoid,
                    per.permission_id,
                    per.permission_parent_id,
                    per.permission_name
                FROM
                    tbl_permission
                        LEFT JOIN
                    tbl_permission AS per ON per.permission_parent_id = tbl_permission.permission_id
                WHERE
                    per.permission_parent_id != 0
        ");
        $rolePer=RolePermission::where('role_permission_role_id',$id)->get();
        return response()->json(array('status'=>'success','data'=>$role,'permission'=>$permission,'subPermission'=>$subPermission,'rolePer'=>$rolePer));
    }
    public function permissionStore(Request $request)
    {
        $id=$request->roleId;
        $permissionid=$request->permissionid;
        $updatePermissionUnCheck=$request->updatePermissionUnCheck;
        $permissionid=$request->permissionid;

        if($permissionid){

            foreach($permissionid as $key=>$val){

                $data=new RolePermission();
                $data->role_permission_role_id=$id;
                $data->role_permission_per_id=$permissionid[$key];
                $data->save();
            }

        }
        if($updatePermissionUnCheck){

            $updateData=RolePermission::where('role_permission_role_id',$id)->get();

            foreach ($updatePermissionUnCheck as $key => $value) {

                RolePermission::where('role_permission_role_id',$id)
                                ->where('role_permission_per_id',$updatePermissionUnCheck[$key])
                                ->delete();
            }
        }

        

        return response()->json(array('status'=>'success'));

        

    }
}
