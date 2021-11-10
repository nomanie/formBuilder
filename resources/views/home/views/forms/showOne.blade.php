<section class="form-create">
    <div class="header">
        <div class="row">
            <div class="col-sm-2 form-name-create">
                {!! Form::text('name',null,(['class'=>'form-control ml-5','placeholder'=>'Name'])) !!}
            </div>
            <div class="col-sm-7">
                <button class="btn btn-primary add-field">Add Field</button>
                <button class="btn btn-secondary delete-field">Delete Field(s)</button>
                <button class="btn btn-light edit-field">Edit Field</button>
                <button class="btn btn-primary view-form">View Form</button>
                <button class="btn btn-warning make-form-private">Make form Private</button>
            </div>
            <div class="col-sm-3">
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
                            <button class="btn btn-secondary field-type-btn">Data</button>
                            <button class="btn btn-primary field-type-btn">Time</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit field properties -->
        <div class="edit-field-properties closing-div">
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
        <!-- -->
    </div>
</section>
<script>
    // close window function
    $('.close').on('click',function(){
        $(this).parents('.closing-div').toggle();
    })
    //function for dynamic buttons
    function editNextCheckbox(){
        checkbox_number ++;
        $('.checkboxes').append('<div class="row"> <div class="col-sm-10 mt-2 mb-2"><input type="text" placeholder="Label for Checkbox" id="checkbox'+checkbox_number+'" class="form-control" ></div> </div>')
    }
    function editNextSelectOption(){
        checkbox_number ++;
        $('.selects').append('<div class="row"> <div class="col-sm-10 mt-2 mb-2"><input type="text" placeholder="Select Option" id="select'+checkbox_number+'" class="form-control" ></div> </div>')
    }
    //end functions for dynamic buttons
    //add field function for add field button

$(".add-field").on('click',function(){
    $(".add-field-div").toggle();
})
    $(".field-type-btn").on('click',function(){
        let type = $(this).text()
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
            $('.edit-field-properties .card-body').append('<div class="row"> <div class="col-sm-10 mt-2 mb-2">{!! Form::text('name',null,array('class'=>'form-control','placeholder'=>'Label for Checkbox','id'=>'name')) !!}</div> <hr> </div><div class="row"> <div class="col-sm-12"> {!! Form::checkbox('required',0,false,array('id'=>'required')) !!}{!! Form::label('required','Required') !!} </div></div> ')
        }
        else if(type == "Multiple Checkbox"){
            checkbox_number = 0;
            $('.edit-field-properties .card-body').append('<div class="row"> <div class="col-sm-10 mt-2 mb-2">{!! Form::text('name',null,array('class'=>'form-control','placeholder'=>'Checkbox Name','id'=>'name')) !!}</div></div><hr><div class="row checkboxes"> <div class="col-sm-12"> {!! Form::checkbox('required',0,false,array('id'=>'required')) !!}{!! Form::label('required','Required') !!} </div></div><div class="row"> <div class="col-sm-10 mt-2 mb-2">{!! Form::text('checkbox0',null,array('class'=>'form-control','placeholder'=>'Label for Checkbox')) !!}</div> </div><button class="btn btn-secondary mt-3 add-next-checkbox" onclick="editNextCheckbox()">Add Next Checkbox</button> ')
        }
        else if(type == "Select"){
            select_number = 0
            $(".edit-field-properties .card-body").append('<div class="row"> <div class="col-sm-10 mt-2 mb-2">{!! Form::text('name',null,array('class'=>'form-control','placeholder'=>'Select Name','id'=>'name')) !!}</div></div><hr><div class="row selects"> <div class="col-sm-12"> {!! Form::checkbox('required',0,false,array('id'=>'required')) !!}{!! Form::label('required','Required') !!} </div></div><div class="row"> <div class="col-sm-10 mt-2 mb-2">{!! Form::text('select0',null,array('class'=>'form-control','placeholder'=>'Select Option')) !!}</div> </div><button class="btn btn-secondary mt-3 add-next-checkbox" onclick="editNextSelectOption()">Add Next Option</button> ')
        }
        else if(type == 'Data'){
            $(".edit-field-properties .card-body").append('<div class="row"> <div class="col-sm-10 mt-2 mb-2">{!! Form::text('name',null,array('class'=>'form-control','placeholder'=>'Name','id'=>'id')) !!}</div> <hr> </div> <div class="row">{!! Form::label('before','Not Before') !!} <div class="col-sm-8 mb-2">{!! Form::date('before',null,array('class'=>'form-control')) !!}</div></div><div class="row"><div class="col-sm-8">{!! Form::label('after','Not After') !!}{!! Form::date('after',null,array('class'=>'form-control')) !!} </div></div><div class="row"> <div class="col-sm-12"> {!! Form::checkbox('required',0,false,array('id'=>'required')) !!}{!! Form::label('required','Required') !!} </div></div> ')
        }
        else if(type == "Time"){
            $(".edit-field-properties .card-body").append('<div class="row"> <div class="col-sm-10 mt-2 mb-2">{!! Form::text('name',null,array('class'=>'form-control','placeholder'=>'Name','id'=>'name')) !!}</div> <hr> </div> <div class="row">{!! Form::label('before','Not Before') !!} <div class="col-sm-8 mb-2"><input type="time" class="form-control" name="before"></div></div><div class="row"><div class="col-sm-8">{!! Form::label('after','Not After') !!}<input type="time" class="form-control" name="after"> </div></div><div class="row"> <div class="col-sm-12"> {!! Form::checkbox('required',0,false,array('id'=>'required')) !!}{!! Form::label('required','Required') !!} </div></div> ')
        }
        $(".edit-field-properties .card-body").append('<div class="row mt-2"><div class="col-sm-5"></div> <div class="col-sm-3">' +
            '<button class="btn btn-success" onclick="saveField()">Add</button></div> <div class="col-sm-3"> <button class="btn btn-danger">Cancel</button> </div> </div>')
    })
    function saveField(){
        a = ""
        if($(type).val().split(" ")[1] == "Multiple"){
            a = $(type).val().split(" ")[2]
            multiple = 1;
        }
        else{
            a = $(type).val().split(" ")[1]
        }
        data = {
            'type': a,
            'name': $('input[id="name"]').val(),
            'required': $('input[id="required"]').prop('checked'),
        }
        if(type == "Text" || type == "Password" || type == "E-mail" || type == "Data" || type == "Time"){
            d = {
                'min': 0,
                'max': 1,
            }
            data.append(d)
        }
        console.log(data)
    }

</script>
<style>
    .header{
        width:90%;
        margin-left:10%;
        height:50px;
        border:solid 1px black;
        padding:5px;
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
</style>
