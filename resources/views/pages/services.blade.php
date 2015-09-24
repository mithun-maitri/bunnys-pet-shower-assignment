@extends('layout.default') @section('title', 'Services')

@section('content')
<div class="panel panel-info">
	<div class="panel-heading"> 
		<div class="row">
			<div class="col-xs-offset-0 col-xs-5 col-md-4 col-lg-2"> 
                <h4 style="margin:0;">Services</h4>
            </div>
            <div class="col-xs-offset-1 col-md-offset-2 col-lg-offset-8 col-md-3 col-lg-1 col-xs-1"> 
                <a class="btn btn-primary" href="/services/add">Add Services</a>
            </div> 
        </div> 
	</div>
	<div class="panel-body">
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th class="col-xs-2 col-md-2 col-lg-1">#Service Id</th>
					<th class="col-xs-2 col-md-2 col-lg-2">Service Name</th>
					<th class="col-xs-2 col-md-2 col-lg-2">Offered Pet Types</th>
					<th class="col-xs-2 col-md-2 col-lg-1">Action</th>
				</tr>
			</thead>
			<tbody>
					@forelse($services as $service)
		    			<tr>
							<td>{{$service->id}}</td>
							<td>{{$service->name}}</td>
							<td>{{$service->offered_types}}</td>
							<td>
								<a href="/services/{{$service->id}}/edit" ><span class="glyphicon glyphicon-edit"></span></a>
								<a href="/services/{{$service->id}}/delete" ><span class="glyphicon glyphicon-trash"></span></a>
							</td>
						</tr>
		    		@empty
						<tr><td colspan="3">No Services</td></tr>
					@endforelse
				
			</tbody>
		</table>
	</div>
</div>
@stop
