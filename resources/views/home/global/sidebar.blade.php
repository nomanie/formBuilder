<div class="sidebar">
    <h3 class="mt-3 dropdown-h3  text-center" id="name">
        {{Auth::user()->name}}
    </h3>
    <div class="name-dropdown-menu dropdown-div ml-4">
        <s>Settings</s><br>
        <a style="color:red" href="{{route('logout')}}">Logout</a>
    </div>
    <h3 class="mt-3 dropdown-h3  text-center" id="group">Groups</h3>
    <div class="group-dropdown-menu dropdown-div ml-4">
        <a href="{{route('group.create')}}">Create New Group</a>
        <a href="{{route('group.show',['id'=>Auth::user()->id])}}">Your group</a>
    </div>
    <h3 class="mt-3 dropdown-h3  text-center" id="form">Forms</h3>
    <div class="form-dropdown-menu dropdown-div ml-4">
        <s>Create new Form</s><br>
        <a href="{{route('show.forms',['id'=>Auth::user()->id])}}">Your Forms</a>
    </div>
    <h3 class="mt-3 dropdown-h3  text-center" id="inv">Invitations</h3>
    <div class="inv-dropdown-menu dropdown-div ml-4">

        <a href="{{route('show.sended.invite',['id'=>Auth::user()->id])}}">Your Invitations</a>
        <a href="{{route('show.invite',['id'=>Auth::user()->id])}}">Pending Invitations</a>

    </div>
</div>
<script>
    $(".dropdown-h3").each(function(){
        $(this).on('click',function(){
            $("."+$(this).attr('id')+"-dropdown-menu").toggle();
        })
    })


</script>
