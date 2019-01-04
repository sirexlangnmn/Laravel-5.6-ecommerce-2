    <table class="table table-hover table-striped table-responsive display">
        <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Fullname</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Fullname</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>
            @php
                $i = 1;   
            @endphp
            @foreach ($users as $key => $user)
            <tr class="id{!! $user->id !!}">
                <td>{!! $i++ !!}</td>
                <td>{!! $user->id !!}</td>
                <td>{!! $user->name !!}</td>
                <td>{!! $user->email !!}</td>
                <td>{!! $user->role->role_title !!}</td>
                <td>
                    @if($user->status == 1)
                        <span class="label label-success">Active</span>
                    @elseif($user->status == 0)
                        <span class="label label-danger">Pending</span>
                    @endif
                </td>
                <td colspan="3">
                    <a href='#' class='btn btn-info btn-xs'
                        data-toggle="tooltip" title="View full record of this particular student." >View</a>
                    <button value='{!! $user->id !!}' id='ajaxEdit' class='btn btn-primary btn-xs' {{-- data-toggle="modal" data-target="#modalUpdate" --}}
                        data-toggle="tooltip" title="Edit record of this particular student." >Edit</button>
                    <input type="hidden" name="_method" value="delete" />
                    <button value="{!! $user->id !!}" id='ajaxDelete' class='btn btn-danger btn-xs'
                        data-toggle="tooltip" title="Delete record. Are you sure you want to do this?" >Delete</button>
                </td>
            </tr>    
            @endforeach
            
        </tbody>
    </table>
    