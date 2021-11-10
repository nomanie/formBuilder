e<section class="show-new-forms " >
    <div class="card" id="show-new-forms">
        <div class="card-header">
            <div class="ds-ib">
                Your Forms
            </div>
            <div class="close-window ds-ib">
                <span class="close">X</span>
            </div>
        </div>
        <div class="card-body">

        </div>
    </div>
    <div>
</section>
<script>
    $(".close").on('click',function(){
        $('.show-new-forms').css('display','none')
    })
    $( function() {
        $( "#show-new-forms" ).draggable();
    } );

</script>
