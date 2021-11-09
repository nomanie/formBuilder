<section class="showOne-new-group " >
    <div class="card" id="showOne-new-group">
        <div class="card-header">
            <div class="ds-ib">
                Group : {{$group[0]->name}}
            </div>
            <div class="close-window ds-ib">
                <span class="close">X</span>
            </div>
        </div>
        <div class="card-body">
            @if($group[0]->creator_id == Auth::user()->id)
            {!! Form::open(['method'=>'post','url'=>route('change.name.group',['group_id'=>$group[0]->id])]) !!}
            {!! Form::text('name',$group[0]->name,array('class'=>'form-control')) !!}
            <button type="submit" class="btn btn-dark mt-2">Change Name</button>
            {!! Form::close() !!}
                @endif
        </div>
    </div>

    <div class="card" id="show-members-new-group">
        <div class="card-header">
            <div class="ds-ib">
                Members :
            </div>
            <div class="close-window ds-ib">
                <span class="close">X</span>
            </div>
        </div>
        <div class="card-body">
            <div class="section">
                <div class="row">
                    <div class="col-sm-3">
                        Name:
                    </div>
                    <div class="col-sm-3">
                        Role:
                    </div>
                    @if($group[0]->creator_id == Auth::user()->id)
                    <div class="col-sm-3">
                        Delete:
                    </div>
                    <div class="col-sm-3">
                        Owner:
                    </div>
                    @endif
                </div>

                        @foreach($group as $user)
                    @for($i=0;$i<$user->users->count();$i++)
                    <div class="row mt-2">
                        <div class="col-sm-3">
                            {{$user->users[$i]->name}}

                        </div>
                        <div class="col-sm-3">
                                @foreach($user->roles as $role)
                                @if($group[0]->creator_id == Auth::user()->id)
                                    {!! Form::open(['method'=>'POST','url'=>route('change.user.role',['user_id'=>$user->users[$i]->id,'group_id'=>$group[0]->id])]) !!}
                                    @if($role->pivot->user_id == $group[0]->creator_id)
                                        @if($role->pivot->user_id == $user->users[$i]->id)
                                            {!! Form::select('role',App\Models\Role::pluck('name'),$role->id,  array('class'=>'form-control role btn btn-warning','disabled'=>'disabled')) !!}
                                        @endif
                                    @else
                                        @if($role->pivot->user_id == $user->users[$i]->id)
                                            {!! Form::select('role',App\Models\Role::pluck('name'),$role->id,  array('class'=>'form-control role','id'=>'role'.$user->users[$i]->id)) !!}
                                        @endif
                                    @endif
                                    {!! Form::close() !!}
                                @else
                                    @if($role->pivot->user_id == $user->users[$i]->id)
                                        {!! Form::select('role',App\Models\Role::pluck('name'),$role->id,  array('class'=>'form-control role','id'=>'role'.$user->users[$i]->id,'disabled'=>'disabled')) !!}
                                    @endif
                                @endif
                                @endforeach

                        </div>
                        @if($group[0]->creator_id == Auth::user()->id and $user->users[$i]->id != Auth::user()->id)
                        <div class="col-sm-3">
                                {!! Form::open(['method'=>'post','url'=>route('delete.user',['group_id'=>$group[0]->id,'id'=>$user->users[$i]->id])]) !!}
                            <button class="btn btn-danger">Usuń</button>
                                {!! Form::close() !!}
                        </div>
                            <div class="col-sm-3">
                                {!! Form::open(['method'=>'post','url'=>route('change.group.owner',['group_id'=>$group[0]->id])]) !!}
                                {!! Form::hidden('user_id',$user->users[$i]->id) !!}
                                <button class="btn btn-success">Change</button>
                                {!! Form::close() !!}
                            </div>
                        @endif
                    </div>
                    @endfor
                    @endforeach

            </div>
        </div>
    </div>
    @if($group[0]->creator_id == Auth::user()->id)
    <div class="card" id="invite-users">
        <div class="card-header">
            <div class="ds-ib">
                Invite Users
            </div>
            <div class="close-window ds-ib">
                <span class="close">X</span>
            </div>
        </div>
        <div class="card-body">
            {!! Form::open(['method'=>'POST','url'=>route('send.invite',['id'=>Auth::user()->id])]) !!}
            {!! Form::hidden('group_id',$group[0]->id) !!}
            {!! Form::text('email',null,array('class'=>'form-control','placeholder'=>'E-mail')) !!}
            <button type="submit" class="btn btn-dark mt-2">Invite</button>
            {!! Form::close() !!}
        </div>
    </div>
        <div class="text-center delete-group">
            {!! Form::open(['method'=>'delete','url'=>route('group.delete',['id'=>Auth::user()->id,'group_id'=>$group[0]->id])]) !!}
            <button class="btn btn-warning text-center">Delete Group</button>
            {!! Form::close() !!}
        </div>
        @endif
    @if($group[0]->creator_id != Auth::user()->id)
    <div class="text-center leave-group">
        {!! Form::open(['method'=>'delete','url'=>route('group.leave',['id'=>Auth::user()->id,'group_id'=>$group[0]->id])]) !!}
        <button class="btn btn-danger text-center">Leave Group</button>
        {!! Form::close() !!}
    </div>
        @endif

</section>
<script>
    $(".close").on('click',function(){
        $('.showOne-new-group').css('display','none')
    })
    $( function() {
        $( "#showOne-new-group" ).draggable();
        $( "#show-members-new-group" ).draggable();
        $( "#invite-users" ).draggable();
    } );
$(function(){
    //ajax
    $(".role").on('change',function(){
        $(this).parents('form:first').submit();
            console.log($(this).parents('form:first').serialize())
    })
})

</script>
<style>
    #show-members-new-group{
        width:35%;
    }
    #invite-users{
        position:absolute;
        left:70%;
        top:0%;
    }
    .delete-group{
        position:absolute;
        left:15%;
        top:5%;
    }
    .leave-group{
        position:absolute;
        left:15%;
        top:15%;
    }
    @media only screen and (max-width: 1200px) {
        #invite-users{
            position:static;
        }
        .delete-group{
            position:static;
        }
        .leave-group{
            position: static;
        }
    }
</style>
