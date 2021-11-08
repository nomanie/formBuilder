<section>
    <div class="card" id="show-members-new-group">
        <div class="card-header">
            <div class="ds-ib">
                Invitations :
            </div>
            <div class="close-window ds-ib">
                <span class="close">X</span>
            </div>
        </div>
        <div class="card-body">
            <div class="section">
                <div class="row">
                    <div class="col-sm-4">
                        Group:
                    </div>
                    <div class="col-sm-4">
                        Action
                    </div>
                </div>
                @foreach($invitations as $inv)
                    @foreach($inv['invites'] as $i)
                    <div class="row">
                        <div class="col-sm-4">
                               {{$i->name}}
                        </div>
                        <div class="col-sm-4">
                            {!! Form::open(['method'=>'POST','url'=>route('join.invite',['id'=>Auth::user()->id,'gid'=>$i->id])]) !!}
                            <button class="btn btn-dark">Join</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    @endforeach
                @endforeach

            </div>
        </div>
    </div>
</section>
