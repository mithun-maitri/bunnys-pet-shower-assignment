@extends('layout.default') @section('title', 'Types')

@section('content')
<div class="panel panel-info">
	<div class="panel-heading"> 
		<div class="row">
			<div class="col-xs-offset-0 col-xs-5 col-md-4 col-lg-2"> 
                <h4 style="margin:0;">Types</h4>
            </div>
            <div class="col-xs-offset-1 col-md-offset-2 col-lg-offset-8 col-md-3 col-lg-1 col-xs-1"> 
                <a class="btn btn-primary" href="/types/add">Add Types</a>
            </div>  
        </div> 
	</div>
	<div class="panel-body">
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th class="col-xs-2 col-md-2 col-lg-1">#Type Id</th>
					<th class="col-xs-2 col-md-2 col-lg-2">Type Name</th>
					<th class="col-xs-2 col-md-2 col-lg-1">Action</th>
				</tr>
			</thead>
			<tbody>
					@forelse($types as $type)
		    			<tr>
							<td>{{$type->id}}</td>
							<td>{{$type->name}}</td>
							<td>
								<a href="/types/{{$type->id}}/delete" ><span class="glyphicon glyphicon-trash"></span></a>
							</td>
						</tr>
		    		@empty
						<tr><td colspan="4">No Types</td></tr>
					@endforelse
				
			</tbody>
		</table>
	</div>
</div>
@stop
