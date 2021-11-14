<section class="form-create">
    <div class="header">
        <div class="row">
            <div class="col-sm-2 form-name-create" style="z-index: 2;">
                {!! Form::text('name',null,(['class'=>'form-control ml-5','placeholder'=>'Name'])) !!}
            </div>
            <div class="col-sm-7" style="z-index: 2;">
                <button class="btn btn-primary add-field">Add Field</button>
                <button class="btn btn-secondary delete-field">Delete Field(s)</button>
                <button class="btn btn-light edit-field">Edit Field</button>
                <button class="btn btn-primary view-form">View Form</button>
                <button class="btn btn-warning make-form-private">Make form Private</button>
            </div>
            <div class="col-sm-3" style="z-index: 2;">
                <button class="btn btn-success save">Save</button>
                <button class="btn btn-warning clear-form">Clear all</button>
                <button class="btn btn-danger delete-form">Delete Form</button>
            </div>
        </div>
    </div>
    <div class="form-body mt-5">
        <!-- Add field div -->
        <div class="add-field-div closing-div">
            <div class="card">
                <div class="card-header">
                    <div class="ds-ib">
                        Add field
                    </div>
                    <div class="close-window ds-ib">
                        <span class="close">X</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <button class="btn btn-primary field-type-btn">Text</button>
                            <button class="btn btn-light field-type-btn">Password</button>
                            <button class="btn btn-secondary field-type-btn">E-mail</button>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <button class="btn btn-secondary field-type-btn">Checkbox</button>
                            <button class="btn btn-light field-type-btn">Multiple Checkbox</button>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <button class="btn btn-light field-type-btn">Select</button>
                            <button class="btn btn-secondary field-type-btn">Date</button>
                            <button class="btn btn-primary field-type-btn">Time</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit field properties -->
        <div class="edit-field-properties closing-div" style="display: none">
            <div class="card">
                <div class="card-header">
                    <div class="ds-ib" style="width:85%;">
                        Edit field properties
                    </div>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
        <!-- End add field div -->
        <!-- -->
        <!-- -->
        <!-- -->

    </div>
    <!--Fields List Table -->
    <div class="form-list">
        <table id="input-list-table" class="table table-striped table-bordered table-sm" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Required</th>
                <th>Min</th>
                <th>Max</th>
                <th>Required 1 Big Letter</th>
                <th>Required 1 Special Character</th>
                <th>Date Not Before</th>
                <th>Date Not After</th>
                <th>Other Fields</th>
            </tr>
            </thead>
            <tbody></tbody>
        </table>

    </div>
    <!-- Other fields informations -->
    <div id="other-fields" class="closing-div" style="display:none">
        <div class="card">
            <div class="card-header">
                <div class="ds-ib">
                    Other Fields
                </div>
                <div class="close-window ds-ib">
                    <span class="close">X</span>
                </div>
            </div>
            <div class="card-body">

            </div>
        </div>
    </div>
    <!-- Edit fields form -->
    <!-- Add field div -->
    <div class="edit-field-div closing-div" style="display:none;">
        <div class="card">
            <div class="card-header">
                <div class="ds-ib edit-field-header">
                    Edit Field:
                </div>
                <div class="close-window ds-ib">
                    <span class="close">X</span>
                </div>
            </div>
            <div class="card-body edit-field-body">

            </div>
        </div>
    </div>
    </div>
</section>

<div class="form-view" style="display:none;">

</div>
<script>
    options = {}
    input_number = 0;
    data = {}
    // close window function
    $('.close').on('click',function(){
        $(this).parents('.closing-div').toggle();
    })
    //function for dynamic buttons
    function editNextCheckbox(){
        checkbox_number ++;
        $('.checkboxes').append('<div class="row"> <div class="col-sm-10 mt-2 mb-2"><input type="text" placeholder="Label for Checkbox" id="checkbox'+checkbox_number+'" class="form-control mtp-checkbox" ></div> </div>')
    }
    function editNextSelectOption(){
        select_number ++;
        $('.selects').append('<div class="row"> <div class="col-sm-10 mt-2 mb-2"><input type="text" placeholder="Select Option" id="select'+select_number+'" class="form-control mtp-select" ></div> </div>')
    }
    //end functions for dynamic buttons
    //add field function for add field button

$(".add-field").on('click',function(){
    $(".add-field-div").toggle();
})
    $(".field-type-btn").on('click',function(){
        $(".add-field-div").toggle();
        $(".edit-field-properties").toggle();
        type = $(this).text()
        $(".edit-field-properties .card-body").html("");
        $(".edit-field-properties .card-body").append('<div class="row"><div class="col-sm-10">{!! Form::text('type',"Type: Text",array('class'=>'form-control','placeholder'=>'type','disabled'=>'disabled','id'=>'type')) !!}</div> </div> ')
        $('#type').val('Type: '+ type)
        if(type == "Text" || type == "Password" || type == "E-mail"){
            $(".edit-field-properties .card-body").append('<div class="row"> <div class="col-sm-10 mt-2 mb-2">{!! Form::text('name',null,array('class'=>'form-control','placeholder'=>'Name','id'=>'name')) !!}</div> <hr> </div> <div class="row"> <div class="col-sm-6">{!! Form::number('min',null,array('class'=>'form-control','placeholder'=>'Min','id'=>'min')) !!}</div> <div class="col-sm-6">{!! Form::number('max',null,array('class'=>'form-control','placeholder'=>'Max','id'=>'max')) !!} </div></div><div class="row"> <div class="col-sm-12"> {!! Form::checkbox('required',0,false,array('id'=>'required')) !!}{!! Form::label('required','Required') !!} </div></div> ')
            if(type == 'Password'){
                $(".edit-field-properties .card-body").append('<div class="row"><div class="col-sm-6"><input type="checkbox" id="big-letter"> Big Letter</div></div>' +
                    '<div class="row"><div class="col-sm-6"><input type="checkbox" id="special-char"> Special Char</div></div>')
            }
        }
        else if(type == "Checkbox"){
            checkbox_number = 1;
            $('.edit-field-properties .card-body').append('<div class="row"> <div class="col-sm-10 mt-2 mb-2">{!! Form::text('name',null,array('class'=>'form-control mtp-checkbox','placeholder'=>'Label for Checkbox','id'=>'name')) !!}</div> <hr> </div><div class="row"> <div class="col-sm-12"> {!! Form::checkbox('required',0,false,array('id'=>'required')) !!}{!! Form::label('required','Required') !!} </div></div> ')
        }
        else if(type == "Multiple Checkbox"){
            checkbox_number = 1;
            $('.edit-field-properties .card-body').append('<div class="row"> <div class="col-sm-10 mt-2 mb-2">{!! Form::text('name',null,array('class'=>'form-control','placeholder'=>'Checkbox Name','id'=>'name')) !!}</div></div><hr><div class="row checkboxes"> <div class="col-sm-12"> {!! Form::checkbox('required',0,false,array('id'=>'required')) !!}{!! Form::label('required','Required') !!} </div></div><div class="row"> <div class="col-sm-10 mt-2 mb-2">{!! Form::text('checkbox0',null,array('class'=>'form-control mtp-checkbox','id'=>'checkbox0','placeholder'=>'Label for Checkbox')) !!}</div> </div><button class="btn btn-secondary mt-3 add-next-checkbox" onclick="editNextCheckbox()">Add Next Checkbox</button> ')
        }
        else if(type == "Select"){
            select_number = 1
            $(".edit-field-properties .card-body").append('<div class="row"> <div class="col-sm-10 mt-2 mb-2">{!! Form::text('name',null,array('class'=>'form-control','placeholder'=>'Select Name','id'=>'name')) !!}</div></div><hr><div class="row selects"> <div class="col-sm-12"> {!! Form::checkbox('required',0,false,array('id'=>'required')) !!}{!! Form::label('required','Required') !!} </div></div><div class="row"> <div class="col-sm-10 mt-2 mb-2">{!! Form::text('select_label0',null,array('class'=>'form-control mtp-select','id'=>'select0','placeholder'=>'Select Option mtp-select')) !!}</div> </div><button class="btn btn-secondary mt-3 add-next-checkbox" onclick="editNextSelectOption()">Add Next Option</button> ')
        }
        else if(type == 'Date'){
            $(".edit-field-properties .card-body").append('<div class="row"> <div class="col-sm-10 mt-2 mb-2">{!! Form::text('name',null,array('class'=>'form-control','placeholder'=>'Name','id'=>'name')) !!}</div> <hr> </div> <div class="row">{!! Form::label('before','Not Before') !!} <div class="col-sm-8 mb-2">{!! Form::date('before',null,array('class'=>'form-control')) !!}</div></div><div class="row"><div class="col-sm-8">{!! Form::label('after','Not After') !!}{!! Form::date('after',null,array('class'=>'form-control')) !!} </div></div><div class="row"> <div class="col-sm-12"> {!! Form::checkbox('required',0,false,array('id'=>'required')) !!}{!! Form::label('required','Required') !!} </div></div> ')
        }
        else if(type == "Time"){
            $(".edit-field-properties .card-body").append('<div class="row"> <div class="col-sm-10 mt-2 mb-2">{!! Form::text('name',null,array('class'=>'form-control','placeholder'=>'Name','id'=>'name')) !!}</div> <hr> </div> <div class="row">{!! Form::label('before','Not Before') !!} <div class="col-sm-8 mb-2"><input type="time" id="before" class="form-control" name="before"></div></div><div class="row"><div class="col-sm-8">{!! Form::label('after','Not After') !!}<input type="time" class="form-control" name="after" id="after"> </div></div><div class="row"> <div class="col-sm-12"> {!! Form::checkbox('required',0,false,array('id'=>'required')) !!}{!! Form::label('required','Required') !!} </div></div> ')
        }
        $(".edit-field-properties .card-body").append('<div class="row mt-2"><div class="col-sm-5"></div> <div class="col-sm-3">' +
            '<button class="btn btn-success" onclick="saveField()">Add</button></div> <div class="col-sm-3"> <button class="btn btn-danger">Cancel</button> </div> </div>')
    })
    function saveField(){
        console.log(type)
        options[input_number] = 0;
        a = type;
        data[input_number] = {}
        data[input_number] = {
            'type': a,
            'name': $('input[id="name"]').val(),
            'required': $('input[id="required"]').prop('checked'),
        }
        if(a == "Text" || a == "Password" || a == "E-mail"){
            data[input_number]['min'] = $("#min").val()
            data[input_number]['max'] = $("#max").val()
            if(a == "Password"){
                data[input_number]['big'] = $('input[id="big-letter"]').prop('checked')
                data[input_number]['special'] = $('input[id="special-char"]').prop('checked')
            }
        }
        else if(a == "Checkbox" || a == "Multiple Checkbox"){
            $(".mtp-checkbox").each(function(i=0){
                data[input_number]['checkbox_label'+i] = $(this).val();
                data[input_number]['checkbox_number'] = checkbox_number
                i++
                options[input_number]++;
            })
        }
        else if(a == "Select"){
            $(".mtp-select").each(function(i=0){
                data[input_number]['select_label'+i] = $(this).val();
                data[input_number]['select_number'] = select_number
                i++
                options[input_number]++;
            })
        }
        else if(a == 'Date' || a == "Time"){
            data[input_number]['not-before'] = $("#before").val()
            data[input_number]['not-after'] = $("#after").val()
        }
        console.log(data[input_number])
        $(".edit-field-properties").toggle();
        $("#input-list-table tbody").append("<tr id='row"+input_number+"' class='"+input_number+"' data-index='"+input_number+"'><td id='name"+input_number+"'>"+data[input_number]['name']+"</td><td id='type"+input_number+"'>"+data[input_number]['type']+"</td>" +
            "<td id='required"+input_number+"'>"+data[input_number]['required']+"</td></tr>")
        if(data[input_number]['min']){
            $("#input-list-table tbody #row"+input_number+"").append("<td id=min"+input_number+">"+data[input_number]['min']+"</td>")
        }
        else{
            $("#input-list-table tbody #row"+input_number+"").append("<td id=min"+input_number+"></td>")
        }
        if(data[input_number]['max']){
            $("#input-list-table tbody #row"+input_number+"").append("<td id=max"+input_number+">"+data[input_number]['max']+"</td>")
        }
        else{
            $("#input-list-table tbody #row"+input_number+"").append("<td id=max"+input_number+"></td>")
        }
        if(data[input_number]['big']){
            $("#input-list-table tbody #row"+input_number+"").append("<td id=big"+input_number+">"+data[input_number]['big']+"</td>")
        }
        else{
            $("#input-list-table tbody #row"+input_number+"").append("<td id=big"+input_number+"></td>")
        }
        if(data[input_number]['special']){
            $("#input-list-table tbody #row"+input_number+"").append("<td id=special"+input_number+">"+data[input_number]['special']+"</td>")
        }
        else{
            $("#input-list-table tbody #row"+input_number+"").append("<td id=special"+input_number+"></td>")
        }
        if(data[input_number]['not-before']){
            $("#input-list-table tbody #row"+input_number+"").append("<td id=not-before"+input_number+">"+data[input_number]['not-before']+"</td>")
        }
        else{
            $("#input-list-table tbody #row"+input_number+"").append("<td id=not-before"+input_number+"></td>")
        }
        if(data[input_number]['not-after']){
            $("#input-list-table tbody #row"+input_number+"").append("<td id=not-after"+input_number+">"+data[input_number]['not-after']+"</td>")
        }
        else{
            $("#input-list-table tbody #row"+input_number+"").append("<td id=not-after"+input_number+"></td>")
        }
        if(options[[input_number]] > 0){
            $("#input-list-table tbody #row"+input_number+"").append("<td><button class='btn btn-dark' id='"+input_number+"' onclick='showOtherFields(this.id)'>Others</button></td>")
        }
        else{
            $("#input-list-table tbody #row"+input_number+"").append("<td></td>")
        }
        input_number++;
    }
function showOtherFields(index){
    $("#other-fields .card .card-body").html("")
    $("#other-fields").toggle();
    var d = data[index];
    console.log(d)
    console.log(options[index])
    for(i=0;i<options[index];i++){
        $("#other-fields .card .card-body").append('<div class="row"><div class="col-sm-4">Label'+i+': </div><div class="col-sm-4">'+d['checkbox_label'+i]+'</div></div>')
    }
}
//selecting rows
    selected = 0
    $('tbody').on('click','tr',function(event){
        $(this).toggleClass("selected");
    })
// deleting select fields
    $(".delete-field").on('click',function(){
        $('.selected').each(function(d){
            $('tr.'+$(this).attr('data-index')).remove()
            data[$(this).attr('data-index')] = {}
        })
        console.log(data)
    })
// delete all fields
$(".clear-form").on('click',function(){
    data = {}
    $('#input-list-table tbody').html("")
})
//edit field function
    $(document).on('click','.edit-field',function(e){
        if($('.selected').length > 1 || $('.selected').length < 1){
            alert('error,please select only 1 field!')
        }
        else{
            $('.edit-field-div').toggle();
            index = $('.selected').attr('data-index');
            //console.log(data[index])
            $('.edit-field-header').text("Edit Field: " +data[index]['name'])
            type = data[index]['type']
            //
            $(".edit-field-div .card-body").html("");
            $(".edit-field-div .card-body").append('<div class="row"><div class="col-sm-10">{!! Form::select('edit-type',array('Text'=>"Type: Text",'Password'=>"Type: Password",'E-mail'=>'Type: E-mail','Checkbox'=>'Type: Checkbox','Multiple Checkbox'=>"Type: Multiple Checkbox",'Select'=>'Type: Select','Date'=>'Type: Date','Time'=>'Type: Time'),null,array('class'=>'form-control','id'=>'edit-type')) !!}</div> </div> ')
            console.log($("select#edit-type").val())
            $(document).find('#edit-type').val(type)
            console.log($("select#edit-type").val())

            if(type == "Text" || type == "Password" || type == "E-mail"){
                $(".edit-field-div .card-body").append('<div class="row"> <div class="col-sm-10 mt-2 mb-2"><input type="text" name="name" id="edit-name" placeholder="Name" class="form-control" value="'+data[index]['name']+'"></div></div> <hr> </div> <div class="row"> <div class="col-sm-6"><input type="number" name="min" id="edit-min" placeholder="Min" class="form-control mb-2" value="'+data[index]['min']+'"></div></div> <div class="col-sm-6"><input type="number" name="max" id="edit-max" placeholder="Max" class="form-control" value="'+data[index]['max']+'"></div> </div></div><div class="row"> <div class="col-sm-12"> <input type="checkbox" name="required" id="edit-required"> Required</div> </div></div> ')
                $('input#edit-required').prop('checked',data[index]['required'])

                if(type == 'Password'){
                    $(".edit-field-div .card-body").append('<div class="row"><div class="col-sm-6"><input type="checkbox" id="big-letter"> Big Letter</div></div>' +
                        '<div class="row"><div class="col-sm-6"><input type="checkbox" id="special-char"> Special Char</div></div>')
                }
            }
            else if(type == "Checkbox"){
                $('.edit-field-div .card-body').append('<div class="row"> <div class="col-sm-10 mt-2 mb-2"><input type="text" name="name" id="edit-name" placeholder="Label for checkbox" class="form-control" value="'+data[index]['name']+'"></div> <hr> </div><div class="row"> <div class="col-sm-12"> {!! Form::checkbox('required',0,false,array('id'=>'edit-required')) !!}{!! Form::label('required','Required') !!} </div></div> ')
            }
            else if(type == "Multiple Checkbox"){
                $('.edit-field-div .card-body').append('<div class="row"> <div class="col-sm-10 mt-2 mb-2"><input type="text" name="name" id="edit-name" placeholder="Checkbox Name" class="form-control" value="'+data[index]['name']+'"></div></div></div><hr><div class="row"> <div class="col-sm-12"> {!! Form::checkbox('required',0,false,array('id'=>'edit-required')) !!}{!! Form::label('required','Required') !!} </div></div><div class="row row-checkbox checkboxes"> <div class="col-sm-10 mt-2 mb-2"></div> </div><button class="btn btn-secondary mt-3 add-next-checkbox" onclick="editNextCheckbox()">Add Next Checkbox</button> ')
                for(var i=0;i<data[index]['checkbox_number'];i++){
                    $('.checkboxes').append('<div class="col-sm-10 mt-2 mb-2"><input type="text" class="form-control mtp-checkbox" id="edit-checkbox'+i+'" value="'+data[index]['checkbox_label'+i]+'"></div>')
                }
            }
            else if(type == "Select"){
                $(".edit-field-div .card-body").append('<div class="row"> <div class="col-sm-10 mt-2 mb-2"><input type="text" name="name" id="edit-name" placeholder="Select Name" class="form-control" value="'+data[index]['name']+'"></div></div></div><hr><div class="row"> <div class="col-sm-12"> {!! Form::checkbox('required',0,false,array('id'=>'edit-required')) !!}{!! Form::label('required','Required') !!} </div></div><div class="row row-select selects">  </div><button class="btn btn-secondary mt-3 add-next-checkbox" onclick="editNextSelectOption()">Add Next Option</button> ')
                for(var i=0;i<data[index]['select_number'];i++){
                    $('.selects').append('<div class="col-sm-10 mt-2 mb-2"><input type="text" class="form-control mtp-select" id="edit-select'+i+'" value="'+data[index]['select_label'+i]+'"></div>')
                }

            }
            else if(type == 'Date'){
                $(".edit-field-div .card-body").append('<div class="row"> <div class="col-sm-10 mt-2 mb-2"><input value="'+data[index]['name']+'" type="text" name="name" id="name" placeholder="Name" class="form-control"></div></div> <hr> </div> <div class="row">{!! Form::label('before','Not Before') !!} <div class="col-sm-8 mb-2">{!! Form::date('before',null,array('class'=>'form-control','id'=>'edit-before')) !!}</div></div><div class="row"><div class="col-sm-8">{!! Form::label('after','Not After') !!}{!! Form::date('after',null,array('class'=>'form-control','id'=>'edit-after')) !!} </div></div><div class="row"> <div class="col-sm-12"> {!! Form::checkbox('required',0,false,array('id'=>'edit-required')) !!}{!! Form::label('required','Required') !!} </div></div> ')
            }
            else if(type == "Time"){
                $(".edit-field-div .card-body").append('<div class="row"> <div class="col-sm-10 mt-2 mb-2"><input value="'+data[index]['name']+'" type="text" name="name" id="name" placeholder="Name" class="form-control"></div></div> <hr> </div> <div class="row">{!! Form::label('before','Not Before') !!} <div class="col-sm-8 mb-2"><input type="time" id="before" class="form-control" name="before"></div></div><div class="row"><div class="col-sm-8">{!! Form::label('after','Not After') !!}<input type="time" class="form-control" name="after" id="after"> </div></div><div class="row"> <div class="col-sm-12"> {!! Form::checkbox('required',0,false,array('id'=>'edit-required')) !!}{!! Form::label('required','Required') !!} </div></div> ')
            }
            $(".edit-field-div .card-body").append('<div class="row mt-2"><div class="col-sm-5"></div> <div class="col-sm-3">' +
                '<button class="btn btn-success" onclick="saveEditField(data[index],index)">Save</button></div> <div class="col-sm-3"> <button class="btn btn-danger">Cancel</button> </div> </div>')
            //
        }
    })
    function saveEditField(data,i){
        all_td_ids = ['type','name','required','min','max','big','special','not-before','not-after']
        options[i] = 0;
        if(data['type'] == "Select"){
            $('.edit-field-properties .card .card-body .selects').html("");
                $(".edit-field-body .mtp-select").each(function(ii=0){
                    data['select_label'+ii] = $(this).val();
                    data['select_number'] = select_number
                    ii++
                    options[i]++;
                })
        }
        else if(data['type'] == "Multiple Checkbox"){
                $(".edit-field-body  .mtp-checkbox").each(function(ii=0){
                    data['checkbox_label'+ii] = $(this).val();
                    data['checkbox_number'] = checkbox_number
                    ii++
                    options[i]++;
                })
        }
        $('.edit-field-div').toggle();
        $('.selected').toggleClass();
        $(all_td_ids).each(function(id) {
            if($("#edit-"+all_td_ids[id]).val() == "on")
                data[all_td_ids[id]] = $("#edit-"+all_td_ids[id]).prop('checked')
            else{
                data[all_td_ids[id]] = $("#edit-"+all_td_ids[id]).val()
            }

            console.log(id)
            console.log(all_td_ids[id] + ":" + $('#row' + i + " #" + all_td_ids[id] + i).text())
            $('#row' + i + " #" + all_td_ids[id] + i).text(data[all_td_ids[id]])
        })
        console.log(data,i)
    }
    // form view
    $(".view-form").on('click',function(){
            $(".form-view").html("")
            $('.form-view').toggle();
            if($(".view-form").text() == "Hide Form")
                $(".view-form").text("View Form")
            else{
                $(".view-form").text("Hide Form")
            }
        $(".form-view").append('<div class="section"></div>')
            let rows_number = 0
            $.each(data, function(o){
                if(data[o]['type'] === undefined){
                    console.log("xx")
                }
                else{
                    if(data[o]['type'] == "Select"){
                        $('.form-view .section').append('<div class="row"><div class="col-sm-4"><label for='+data[o]["name"]+'>'+data[o]["name"]+'</label><select class="form-control" id="'+data[o]['type']+o+'"></select></div></div>')
                        for(i=0;i<data[o]['select_number'];i++){
                            $('select#'+data[o]['type']+o).append("<option id='"+data[o]['select_label'+i]+"'>"+data[o]['select_label'+i]+"</option>")
                        }

                    }
                    else{
                        if(data[o]['type'] == "Checkbox")
                            $('.form-view .section').append('<div class="row"><div class="col-sm-4"><label for='+data[o]["name"]+'>'+data[o]["name"]+'</label><input type="'+data[o]['type']+'"></div>')
                        else if(data[o]['type'] == "Multiple Checkbox"){
                            $('.form-view .section').append('<div class="row"><div class="col-sm-4">'+data[o]["name"]+'</div><div class="row"></div>')
                            for(ii=0;ii<data[o]['checkbox_number'];ii++){
                                $('.form-view .section').append('<input id="'+data[o]['name']+'" name="'+data[o]['name']+'" class="ml-2" type="checkbox" value="'+data[o]['checkbox_label'+ii]+'"><label for='+data[o]["checkbox_label"+ii]+'>'+data[o]["checkbox_label"+ii]+'</label>')
                            }

                        }
                        else{
                            $('.form-view .section').append('<div class="row"><div class="col-sm-4"><label for='+data[o]["name"]+'>'+data[o]["name"]+'</label><input type="'+data[o]['type']+'" class="form-control"></div>')
                        }
                    }

                }

            })
    })
</script>
<style>
    .header{
        width:90%;
        margin-left:10%;
        height:50px;
        border:solid 1px black;
        padding:5px;
        z-index:2;
    }
    .sidebar{
        z-index: 2;
    }
    .form-body{
        margin-left:15%;
    }
    .form-name-create{
        border-right:solid 1px black;
    }
    .form-create button{
        margin-right:10px;
    }
    .add-field-div .card{
        width:25%;
        border:solid black 1px;
        box-shadow:1px 1px 2px 2px black;
    }
    .add-field-div{
        display:none;
    }
    .form-list{
        position:absolute;
        left:11%;
        top:8%;
        border:solid 1px black;
        width:30%;
        height:90%;
        background-color:rgba(0,0,0,0.5);
        box-shadow:1px 1px 2px 2px black;
        text-overflow: ellipsis;
        overflow-x: auto;
    }
    .form-list .table{
        margin-left: 0px;
        width:100%;
        background:rgba(255,255,255,0.5);
    }

    #input-list-table th, td {
        white-space: nowrap;
    }

    .selected{
        background:purple;
    }
    .form-view{
        position:absolute;
        top:0%;
        width:100%;
        height:100%;
        background: wheat;
        z-index:1;
        padding-left:20%;
        padding-top:10%;
    }
</style>
