@extends('layout.default') @section('title', 'Type')

@section('content')
<script>
	$(function(){
		attachValidator(['type_name']);
	});
</script>
<form class="form-horizontal" method="post" id="create_type_form">
<div class="panel panel-info"> 
	<div class="panel-heading"> 
		<div class="row">
			<div class="col-xs-offset-0 col-xs-8 col-md-4 col-lg-8"> 
                <h4 style="margin:0;">Add Type</h4>
            </div> 
        </div> 
	</div> 
	<div class="panel-body"> 
			<div class="form-group">
				<label class="control-label col-xs-3 col-md-2 col-lg-2" for="type_name">Name:</label>
				<div class="col-xs-8 col-md-8 col-lg-7"> 
					<input type="text" class="form-control" name="type_name" id="type_name"
						placeholder="Type Name" value="" />
				</div>
			</div>
	</div> 
	<div class="panel-footer">
		<div class="row">
			<div class="col-xs-offset-1 col-md-offset-8 col-lg-offset-9 col-xs-11 col-md-4 col-lg-3">
				<button  type="button" class="btn btn-primary" id="type_save"
					data-loading-text="Saving..." >Save</button>
				<button type="reset" class="btn btn-default">Reset</button>
			</div>
		</div>
	</div> 
</div> 
</form>
@stop
