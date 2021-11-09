<section>
    <div class="card" id="show-members-new-group">
        <div class="card-header">
            <div class="ds-ib">
               Sended Invitations :
            </div>

        </div>
        <div class="card-body">
            <div class="section">

                @forelse($invites ?? [] as $inv)
                    <div class="row">
                        <div class="col-sm-4">
                            Group:
                        </div>
                        <div class="col-sm-4">
                            Name:
                        </div>
                        <div class="col-sm-4">
                            Cancel:
                        </div>
                    </div>
                        @foreach ($inv->invites as $i)
                            <div class="row mt-2">
                                <div class="col-sm-4">
                                    {{$inv->name}}
                                </div>
                                <div class="col-sm-4">
                                    {{$i->name}}
                                </div>
                                <div class="col-sm-4">
                                    {!! Form::open(['method'=>"POST",'url'=>route('cancel.invite',['id'=>$i->id,'gid'=>$inv->id])]) !!}
                                    <button class="btn btn-warning">Cancel</button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        @endforeach
                    @empty
                    You don't have any sended invitations!
                    @endforelse

            </div>
        </div>
    </div>
</section>
<style>
    .ds-ib{
        width:80%;
    }
</style>
