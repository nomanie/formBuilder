<section class="showOne-new-group " >
    <div class="card" id="showOne-new-group">
        <div class="card-header">
            <div class="ds-ib">
                Group : {{$group[0]['name']}}
            </div>
            <div class="close-window ds-ib">
                <span class="close">X</span>
            </div>
        </div>
        <div class="card-body">
            {!! Form::open() !!}
            {!! Form::text('name',$group[0]['name'],array('class'=>'form-control')) !!}
            <button type="submit" class="btn btn-dark mt-2">Change Name</button>
            {!! Form::close() !!}
        </div>
    </div>

    <div class="card" id="showOne-new-group">
        <div class="card-header">
            <div class="ds-ib">
                Members : {{$group[0]['name']}}
            </div>
            <div class="close-window ds-ib">
                <span class="close">X</span>
            </div>
        </div>
        <div class="card-body">

        </div>
    </div>

</section>
<script>
    $(".close").on('click',function(){
        $('.showOne-new-group').css('display','none')
    })
    $( function() {
        $( "#showOne-new-group" ).draggable();
    } );

</script>
