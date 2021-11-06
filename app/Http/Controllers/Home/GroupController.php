<?php

namespace App\Http\Controllers\Home;

use App\Models\Group;
use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class GroupController extends Controller
{
    public function createView(){
        return view('home/pages/groups/create');
    }
    public function create(Request $request){
            $input = $request->validate([
                'name' => 'required|unique:groups|string|min:3|max:30|',
                'creator_id'=>'integer'
            ]);
            $input['created_at'] = Carbon::now();
            $input['updated_at'] = Carbon::now();
            $group = Group::create($input);
            return $group->users;
            return back();

    }
    public function showAll($id){
        return view('home/pages/groups/show')->with('group',Group::all()->where("creator_id", $id));
    }
    public function showOne($id, $idd){
        $group = Group::where("group_id",$idd);
        $group->user()->get();

        return view('home/pages/groups/showOne')->with('group',Group::all()->where("creator_id", $id)->where('id',$idd))->with('members',Member::with('name')->where('group_id',$idd));
    }
}
