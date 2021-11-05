<section class="create-new-group " >
    <div class="card" id="create-new-group">
        <div class="card-header">
            <div class="ds-ib">
                Create new Group
            </div>
            <div class="close-window ds-ib">
                <span class="close">X</span>
            </div>
        </div>
        <div class="card-body">
            {!! Form::open(['method'=>'POST','url'=>route('group.create')]) !!}
            {!! Form::text("name",null,array('class'=>'form-control','placeholder'=>'Name')) !!}
            {!! Form::hidden('creator_id',Auth::user()->id) !!}
            <div style="text-align: right;">
                {!! Form::submit('Create!',array('class'=>'btn btn-dark mt-3 btn-create-group','style'=>'color: #1c7430;'))  !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div>@isset($error) {{$error}} @endisset</div>
</section>
<script>
    $(".close").on('click',function(){
        $('.create-new-group').css('display','none')
    })
    $( function() {
        $( "#create-new-group" ).draggable();
    } );

</script>
