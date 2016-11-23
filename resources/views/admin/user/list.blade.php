@extends('admin.master')

@section('content')
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">User
					<small>List</small>
				</h1>
			</div>
			<!-- /.col-lg-12 -->
			<div class="col-lg-12">
                @if (Session::has('flash_message'))
                    <div class="alert alert-{!! Session::get('flash_level') !!}">
                        {!! Session::get('flash_message') !!}
                    </div>
                @endif
            </div>
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr align="center">
						<th>ID</th>
						<th>Username</th>
						<th>Level</th>
						<th>Delete</th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($users as $user)
					<tr class="odd gradeX" align="center">
						<td>{!! $user["id"] !!}</td>
						<td>{!! $user["username"] !!}</td>
						<td>
							@if ($user["level"] == 1)
								{!! 'Admin' !!}
							@else
								{!! 'Member' !!}
							@endif
						</td>
						<td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{!!route('admin.user.getDelete', $user["id"]) !!}" onclick="return delete_confirm('Are you sure you want to delete?')"> Delete</a></td>
						<td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!!route('admin.user.getEdit', $user["id"]) !!}">Edit</a></td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</div>
@endsection