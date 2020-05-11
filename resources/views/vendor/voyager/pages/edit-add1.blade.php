@php
$edit = !is_null($dataTypeContent->getKey());
$add  = is_null($dataTypeContent->getKey());
@endphp

@extends('voyager::master')

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('css/all.css') }}">
<link rel="stylesheet" href="//unpkg.com/grapesjs/dist/css/grapes.min.css">
{{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
<style type="text/css">
	.panel__top {
		padding: 0;
		width: 100%;
		display: flex;
		position: initial;
		justify-content: center;
		justify-content: space-between;
	}
	.panel__basic-actions {
		position: initial;
	}

</style>
@stop

@section('page_title', __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular'))

@section('page_header')
<h1 class="page-title">
	<i class="{{ $dataType->icon }}"></i>
	{{ __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular') }}
</h1>
@include('voyager::multilingual.language-selector')
@stop

@section('content')
<div class="page-content edit-add container-fluid">
	<div class="row">
		<div class="col-md-12">

			<div class="panel panel-bordered">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link" id="def-tab" data-toggle="tab" href="#def" role="tab" aria-controls="def" aria-selected="true">Rich Text Box Editor</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="grapes-tab" data-toggle="tab" href="#grapes" role="tab" aria-controls="grapes"
							aria-selected="false">GrapesJS Editor</a>
						</li>
					</ul>

					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade" id="def" role="tabpanel" aria-labelledby="def-tab">
							<!-- form start -->
							<form role="form"
								class="form-edit-add"
								action="{{ $edit ? route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) : route('voyager.'.$dataType->slug.'.store') }}"
								method="POST" enctype="multipart/form-data">
								<!-- PUT Method if we are editing -->
								@if($edit)
								{{ method_field("PUT") }}
								@endif

								<!-- CSRF TOKEN -->
								{{ csrf_field() }}
								<div class="panel-body">
									@if (count($errors) > 0)
									<div class="alert alert-danger">
										<ul>
											@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
									@endif

									<!-- Adding / Editing -->
									@php
										$dataTypeRows = $dataType->{($edit ? 'editRows' : 'addRows' )};
									@endphp
									{{-- @dd($dataTypeContent) --}}

									@foreach($dataTypeRows as $row)
										<!-- GET THE DISPLAY OPTIONS -->
										@php
											$display_options = $row->details->display ?? NULL;
											if ($dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')}) {
												$dataTypeContent->{$row->field} = $dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')};
											}
										@endphp
										@if (isset($row->details->legend) && isset($row->details->legend->text))
											<legend class="text-{{ $row->details->legend->align ?? 'center' }}" style="background-color: {{ $row->details->legend->bgcolor ?? '#f0f0f0' }};padding: 5px;">{{ $row->details->legend->text }}</legend>
										@endif

										<div class="form-group @if($row->type == 'hidden') hidden @endif col-md-{{ $display_options->width ?? 12 }} {{ $errors->has($row->field) ? 'has-error' : '' }}" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
											{{ $row->slugify }}
											<label class="control-label" for="name">{{ $row->getTranslatedAttribute('display_name') }}</label>
											@include('voyager::multilingual.input-hidden-bread-edit-add')
											@if (isset($row->details->view))
											@include($row->details->view, ['row' => $row, 'dataType' => $dataType, 'dataTypeContent' => $dataTypeContent, 'content' => $dataTypeContent->{$row->field}, 'action' => ($edit ? 'edit' : 'add'), 'view' => ($edit ? 'edit' : 'add'), 'options' => $row->details])
											@elseif ($row->type == 'relationship')
											@include('voyager::formfields.relationship', ['options' => $row->details])
											@else
											{!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
											@endif

											@foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
											{!! $after->handle($row, $dataType, $dataTypeContent) !!}
											@endforeach
											@if ($errors->has($row->field))
											@foreach ($errors->get($row->field) as $error)
											<span class="help-block">{{ $error }}</span>
											@endforeach
											@endif
										</div>
									@endforeach
								</div><!-- panel-body -->

								<div class="panel-footer">
									@section('submit-buttons')
									<button type="submit" class="btn btn-primary save">{{ __('voyager::generic.save') }}</button>
									@stop
									@yield('submit-buttons')
								</div>
							</form>
						</div>

						<div class="tab-pane fade" id="grapes" role="tabpanel" aria-labelledby="grapes-tab">
							<!-- form start -->
							<form role="form"
								class="form-edit-add"
								action="{{ $edit ? route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) : route('voyager.'.$dataType->slug.'.store') }}"
								method="POST" enctype="multipart/form-data">
								<!-- PUT Method if we are editing -->
								@if($edit)
								{{ method_field("PUT") }}
								@endif

								<!-- CSRF TOKEN -->
								{{ csrf_field() }}
								<div class="panel-body">
									@if (count($errors) > 0)
									<div class="alert alert-danger">
										<ul>
											@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
									@endif

									<!-- Adding / Editing -->
									@php
										// $dataTypeRows = $dataType->{($edit ? 'editRows' : 'addRows' )};
										// dd($dataTypeContent->title);
									@endphp

									<!-- GET THE DISPLAY OPTIONS -->
									<div class="form-group  col-md-12 ">
										<label class="control-label" for="name">Title</label>
										<span class="language-label js-language-label">en</span>
										<input type="hidden" data-i18n="true" name="title_i18n" id="title_i18n" value="{'en','ru'}">
										<input required type="text" class="form-control" name="title" placeholder="Title" value="{{ $dataTypeContent->title }}">
									</div>

									<div class="form-group  col-md-12 ">
										<label class="control-label" for="name">Excerpt</label>
										<textarea class="form-control" name="excerpt" rows="5">{{ $dataTypeContent->excerpt }}</textarea>
									</div>

									<div class="form-group  col-md-12 ">
										<label class="control-label" for="name">Body</label>
										<span class="language-label js-language-label">en</span>
										<input type="hidden" data-i18n="true" name="body_i18n" id="body_i18n" value="{'en','ru'}">
										<div class="panel__top">
										    <div class="panel__basic-actions"></div>
										</div>
										<div id="gjs"></div>
										{{-- <textarea class="form-control" name="body" style="display: none;" aria-hidden="true"></textarea> --}}
									</div>

									<div class="form-group  col-md-12 ">
										<label class="control-label" for="name">Slug</label>
										<span class="language-label js-language-label">en</span>
										<input type="hidden" data-i18n="true" name="slug_i18n" id="slug_i18n" value="{'en','ru'}">
										<input required type="text" class="form-control" name="slug" placeholder="Slug" data-slug-origin="title" value="{{ $dataTypeContent->slug }}">
									</div>

									<div class="form-group  col-md-12 ">
										<label class="control-label" for="name">Meta Description</label>
										<input type="text" class="form-control" name="meta_description" placeholder="Meta Description" value="{{ $dataTypeContent->meta_description }}">
									</div>

									<div class="form-group  col-md-12 ">
										<label class="control-label" for="name">Meta Keywords</label>
										<input type="text" class="form-control" name="meta_keywords" placeholder="Meta Keywords" value="{{ $dataTypeContent->meta_keywords }}">
									</div>

									<div class="form-group  col-md-12 ">
										<label class="control-label" for="name">Status</label>
										<select class="form-control" name="status" tabindex="-1" aria-hidden="true">
											<option value="INACTIVE" @if($dataTypeContent->status === 'INACTIVE') selected @endif>INACTIVE</option>
											<option value="ACTIVE" @if($dataTypeContent->status === 'ACTIVE') selected @endif>ACTIVE</option>
										</select>
									</div>

									<div class="form-group col-md-12 ">
										<label class="control-label" for="name">Page Image</label>
										@if($dataTypeContent->image)
										<div data-field-name="image">
									        <a href="#" class="voyager-x remove-single-image" style="position:absolute;"></a>
									        <img src="http://custom-admin-panel//storage/{{ $dataTypeContent->image }}" data-file-name="{{ $dataTypeContent->image }}" data-id="5" style="max-width:200px; height:auto; clear:both; display:block; padding:2px; border:1px solid #ddd; margin-bottom:10px;">
									    </div>
									    @endif
										<input type="file" name="image" accept="image/*">
									</div>
								</div><!-- panel-body -->

								<div class="panel-footer">
									@section('submit-buttons')
									<button type="submit" class="btn btn-primary save">{{ __('voyager::generic.save') }}</button>
									@stop
									@yield('submit-buttons')
								</div>
							</form>
						</div>
					</div>

					{{-- <div class="panel-footer">
						@section('submit-buttons')
						<button type="submit" class="btn btn-primary save">{{ __('voyager::generic.save') }}</button>
						@stop
						@yield('submit-buttons')
					</div> --}}
				</form>

				<iframe id="form_target" name="form_target" style="display:none"></iframe>
				<form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post" enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
					<input name="image" id="upload_file" type="file"
						onchange="$('#my_form').submit();this.value='';">
					<input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
					{{ csrf_field() }}
				</form>

			</div>
		</div>
	</div>
</div>

<div class="modal fade modal-danger" id="confirm_delete_modal">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">&times;</button>
				<h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}</h4>
			</div>

			<div class="modal-body">
				<h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
				<button type="button" class="btn btn-danger" id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}</button>
			</div>
		</div>
	</div>
</div>
<!-- End Delete File Modal -->
@stop

@section('javascript')
{{-- <script src="//unpkg.com/grapesjs"></script> --}}
<script src="{{ asset('js/all.js') }}" charset="utf-8"></script>

<script>
	var params = {};
	var $file;

	function deleteHandler(tag, isMulti) {
		return function() {
			$file = $(this).siblings(tag);

			params = {
				slug:   '{{ $dataType->slug }}',
				filename:  $file.data('file-name'),
				id:     $file.data('id'),
				field:  $file.parent().data('field-name'),
				multi: isMulti,
				_token: '{{ csrf_token() }}'
			}

			$('.confirm_delete_name').text(params.filename);
			$('#confirm_delete_modal').modal('show');
		};
	}

	$('document').ready(function () {
		$('.toggleswitch').bootstrapToggle();

		//Init datepicker for date fields if data-datepicker attribute defined
		//or if browser does not handle date inputs
		$('.form-group input[type=date]').each(function (idx, elt) {
			if (elt.hasAttribute('data-datepicker')) {
				elt.type = 'text';
				$(elt).datetimepicker($(elt).data('datepicker'));
			} else if (elt.type != 'date') {
				elt.type = 'text';
				$(elt).datetimepicker({
					format: 'L',
					extraFormats: [ 'YYYY-MM-DD' ]
				}).datetimepicker($(elt).data('datepicker'));
			}
		});

		@if ($isModelTranslatable)
		$('.side-body').multilingual({"editing": true});
		@endif

		$('.side-body input[data-slug-origin]').each(function(i, el) {
			$(el).slugify();
		});

		$('.form-group').on('click', '.remove-multi-image', deleteHandler('img', true));
		$('.form-group').on('click', '.remove-single-image', deleteHandler('img', false));
		$('.form-group').on('click', '.remove-multi-file', deleteHandler('a', true));
		$('.form-group').on('click', '.remove-single-file', deleteHandler('a', false));

		$('#confirm_delete').on('click', function(){
			$.post('{{ route('voyager.'.$dataType->slug.'.media.remove') }}', params, function (response) {
				if ( response
					&& response.data
					&& response.data.status
					&& response.data.status == 200 ) {

					toastr.success(response.data.message);
				$file.parent().fadeOut(300, function() { $(this).remove(); })
			} else {
				toastr.error("Error removing file.");
			}
		});

			$('#confirm_delete_modal').modal('hide');
		});
		$('[data-toggle="tooltip"]').tooltip();
	});
</script>

<script type="text/javascript">
	const editor = grapesjs.init({
		container: '#gjs',
		fromElement: true,
		plugins: ['gjs-preset-webpage'],
		pluginsOpts: {
			'gjs-preset-webpage': {
				blocks: ['link-block', 'quote', 'text-basic']
			}
		},
		storageManager: {
			// id: 'gjs-',
			type: 'local',
			autosave: true,
			autoload: true,
			storeComponents: true,
			storeStyles: true,
			storeHtml: true,
			storeCss: true
		},
		commands: {
			defaults: [
			{
				id: 'store-data',
				run(editor) {
					editor.store();
					let grapesComponents = localStorage.getItem("gjs-components");
					let grapesStyles = localStorage.getItem("gjs-styles");
					let grapesHtml = localStorage.getItem("gjs-html");
					let grapesCss = localStorage.getItem("gjs-css");
					let pageBody = document.getElementsByName('body');

					pageBody.forEach(item => item.value = grapesHtml);
						// console.log(pageBody);

					},
				}
				]
			}
		});

	editor.Panels.addPanel({
		id: 'panel-top',
		el: '.panel__top',
	});
	editor.Panels.addPanel({
		id: 'basic-actions',
		el: '.panel__basic-actions',
		buttons: [
			{
				id: 'store-data',
		      	active: true, // active by default
		      	className: 'btn-toggle-borders',
		      	label: 'Save',
		      	command: 'store-data', // Built-in command
		  	}
	  	],
	});

	// function setBodyVal() {
	// 	let grapesComponents = localStorage.getItem("gjs-components");
	// 	let grapesStyles = localStorage.getItem("gjs-styles");
	// 	let grapesHtml = localStorage.getItem("gjs-html");
	// 	let pageBody = document.getElementById('grapesBody');

	// 	pageBody.value = grapesComponents;
		
	// }
</script>
@stop



{{-- const wrapper = editor.DomComponents.getWrapper(); --}}