e<section class="show-new-group " >
    <div class="card" id="show-new-group">
        <div class="card-header">
            <div class="ds-ib">
                Your Groups
            </div>
            <div class="close-window ds-ib">
                <span class="close">X</span>
            </div>
        </div>
        <div class="card-body">
            @foreach($group as $gr)
                @foreach($gr->groups as $g)

                <a href="{{route('group.show.one',['id'=>Auth::user()->id,'idd'=>$g['id']])}}"><button class="btn btn-dark">{{$g->name}}</button></a>
                @endforeach
            @endforeach
        </div>
    </div>
    <div>
</section>
<script>
    $(".close").on('click',function(){
        $('.show-new-group').css('display','none')
    })
    $( function() {
        $( "#show-new-group" ).draggable();
    } );

</script>
