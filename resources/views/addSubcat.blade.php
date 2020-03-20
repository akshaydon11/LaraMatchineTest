@extends('layouts.main')
@section('content')
<div id="content">
	@include('includes.header')
	<div class="container">

		<div class="card o-hidden border-0 shadow-lg my-5">
			<div class="card-body p-0">
				<!-- Nested Row within Card Body -->
				<div class="row">
					<div class="col-lg-5 d-none d-lg-block "></div>
					<div class="col-lg-12">
						<div class="p-5">
							<div class="text-center">
								<h1 class="h4 text-gray-900 mb-4">Add Sub Category</h1>
							</div>
							<form method="POST" action="{{ url('/store_subcat') }}">
								@csrf
								<div class="form-group row">
									<div class="col-sm-6 mb-3 mb-sm-0">
										<select class="form-control" name="main_cat" required="">
											<option value="">Select Category</option>
											@foreach($data as $cat)
												<option value="{{$cat->cat_id}}">{{$cat->cat_name}}</option>
											@endforeach
										</select>
										@error('name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
									<div class="col-sm-6 mb-3 mb-sm-0">
										<input id="cat_name" type="text" class="form-control @error('cat_name') is-invalid @enderror" name="sub_cat_name" value="{{old('cat_name')}}" required autocomplete="cat_name" autofocus placeholder="Category Name">

										@error('name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
									
								</div>

								<button type="submit" class="btn btn-primary">
									{{ __('Save Category') }}
								</button>
								
							</form>
							
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>


@stop