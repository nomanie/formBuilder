<?php

namespace App\Http\Controllers\Home;

use App\Models\Field;
use App\Models\Form;
use App\Models\Group;
use Illuminate\Http\Request;

class FormController extends Controller
{
    //
    public function store(Request $request){
        //Form (id,group_id,name)
        $input = $request->all();
        $input['form']['group_id'] = Group::select('id')->where('name','=',$request['form']['group_id'])->first()->id;
        $form = Form::create($input['form']);
        $types = Field::with('type')->get();
        return $types;
        foreach($input as $i){
            $i['form_id'] = $form['id'];
            $i['field_type_id'] = $types->where('name','=',$i['type'])->first();
            if($i != "form"){
                Field::create($i);
            }
        }
        return $input;
    }
}
