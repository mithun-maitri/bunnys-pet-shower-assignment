@extends('layout.default') @section('title', 'Services')

@section('content')
<script>
	$(function(){
		attachValidator(['service_name']);
		$('#multiselect').multiselect({
			numberDisplayed: 4,
			 includeSelectAllOption: true,
			 includeSelectAllDivider:true,
			 enableFiltering:true,
			 enableCaseInsensitiveFiltering:true,
			 buttonWidth:'50%',
			 maxHeight: 400,
			 onChange: function(element, checked) { }
		});
	});
</script>
<form class="form-horizontal" method="post" id="create_service_form">
<div class="panel panel-info"> 
	<div class="panel-heading"> 
		<div class="row">
			<div class="col-xs-offset-0 col-xs-8 col-md-4 col-lg-8"> 
                <h4 style="margin:0;">Add Services</h4>
            </div> 
        </div> 
	</div> 
	<div class="panel-body"> 
			<div class="form-group">
				<label class="control-label col-xs-3 col-md-2 col-lg-2" for="service_name">Name:</label>
				<div class="col-xs-8 col-md-8 col-lg-7"> 
					<input type="text" class="form-control" name="service_name" id="service_name"
						placeholder="Service Name" value="" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-xs-3 col-md-2 col-lg-2" for="pet_types">Map Pet Types:</label>
				<div class="col-xs-8 col-md-8 col-lg-7"> 
				<select id="multiselect" multiple="multiple" class="form-control" >
					@foreach ($types as $type)
					    <option value="{{$type->id}}">{{$type->name}}</option>
					@endforeach
				</select>
				</div>
			</div>
			<input type="hidden" name="selected_pet_types" id="multiselectOptions" value="" readonly="readonly"/>
	</div> 
	<div class="panel-footer">
		<div class="row">
			<div class="col-xs-offset-1 col-md-offset-8 col-lg-offset-9 col-xs-11 col-md-4 col-lg-3">
				<button  type="button" class="btn btn-primary" id="service_save"
					data-loading-text="Saving..." >Save</button>
				<button type="reset" class="btn btn-default">Reset</button>
			</div>
		</div>
	</div> 
</div> 
</form>
@stop
