<?php

namespace App\Http\Controllers\Home;

use App\Models\Group;
use Carbon\Carbon;
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
            Group::create($input);
            return back();

    }
    public function showAll($id){
        return view('home/pages/groups/show')->with('group',Group::all()->where("creator_id", $id));
    }
    public function showOne($id, $idd){
        return view('home/pages/groups/showOne')->with(['group',Group::all()->where("creator_id", $id)->where('id',$idd),'members',]);
    }
}
