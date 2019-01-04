<div id="myModal{!! $row->id !!}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title text-danger" id="myModalLabel">Very important!</h4>
            Once you delete this post details, there's no getting it back.
            Make sure you want to do this.
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-6 col col-md-6 col-sm-12 col-xs-12">
                    <p>Post Image:</p>
                    <p class="text-center">
                         @if($row->post_image == '')
                        No post image
                        @else
                        <img src="{!! asset('uploads/posts/small/'.$row->post_image) !!}" alt="{!! $row->post_image !!}" />
                        @endif
                    </p>  
                    <p>Post-ID: &nbsp; <strong>{!! $row->id !!}</strong></p>
                    <p>Post Title: &nbsp; <strong>{!! $row->post_title !!}</strong></p>
                    <p>Author: &nbsp; <strong>{!! $row->user->name !!}</strong></p>
                    <p>Category: &nbsp; <strong>{!! $row->post_category ? $row->post_category->pc_title : 'Uncategorized' !!}</strong></p>
                    <p>Status: &nbsp;           
                        @if($row->post_status == 1)
                            <span class="label label-success">Active</span>
                        @elseif($row->post_status == 0)
                            <span class="label label-danger">Disabled</span>
                        @endif</strong>
                    </p>
                    <p>Created At: &nbsp; <strong>{!! $row->created_at !!} - {!! $row->created_at->diffForHumans() !!}</strong></p>
                    <p>Updated At: &nbsp; <strong>{!! $row->updated_at !!}</strong></p>        
                </div>
                <div class="col-lg-6 col col-md-6 col-sm-12 col-xs-12">
                    <p>Post Body: &nbsp; </p>
                    <p><strong>{!! $row->post_body !!}</strong></p>
                    
                </div>
            </div>
        </div>
        <div class="modal-footer">
            
            {!! Form::open(['route'=>['posts.destroy', $row->id], 'method'=>'POST' ]) !!}
                {!! Form::hidden('_method', 'DELETE') !!}
                {!! Form::button('Delete', ['type'=>'submit', 'class'=>'btn btn-outline btn-rounded btn-danger', 'data-toggle'=>'tooltip', 'title'=>'Delete' ]) !!}
                {{-- 'onclick'=>'confirm("Are you sure you want to delete this?")' --}}
            {!! Form::close() !!} 
            
            <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Cancel</button>
        </div>

    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
