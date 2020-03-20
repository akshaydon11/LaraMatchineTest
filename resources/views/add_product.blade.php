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
								<h1 class="h4 text-gray-900 mb-4">Add Product</h1>
							</div>
							<form method="POST" action="{{ url('/store_product') }}" enctype="multipart/form-data">
								@csrf
								<div class="form-group row">
									<div class="col-sm-6 mb-3 mb-sm-0">
										<input id="prod_name" type="text" class="form-control @error('prod_name') is-invalid @enderror" name="prod_name" value="{{old('prod_name')}}" required autocomplete="prod_name" autofocus placeholder="prod_name">

										@error('name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
									<div class="col-sm-6">
										<select class="form-control" name="prod_cat" required="">
											<option value="">Select Category</option>
											@foreach($data as $cat)
												<option value="{{$cat->cat_id}}">{{$cat->cat_name}}</option>
											@endforeach
										</select>
									</div>
								</div>

								<div class="form-group row">
									<div class="col-sm-6 mb-3 mb-sm-0">
										
										<input id="prod_desc" type="text" value="{{ old('prod_desc') }}" class="form-control @error('prod_desc') is-invalid @enderror" name="prod_desc" required autocomplete="prod_desc" placeholder="prod_desc">

										@error('prod_desc')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
									<div class="col-sm-6">
										<input id="prod_color" type="text" class="form-control @error('prod_color') is-invalid @enderror" name="prod_color" value="{{old('prod_color')}}" required autocomplete="prod_color" placeholder="prod_color">

										@error('prod_color')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-6">
										<input id="prod_price" type="text" class="form-control @error('prod_price') is-invalid @enderror" name="prod_price" value="{{old('prod_price')}}" required autocomplete="prod_price" placeholder="prod_price">

										@error('prod_price')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>	
									<div class="col-sm-6">
										<input id="prod_img" type="file" class="form-control @error('prod_img') is-invalid @enderror" name="prod_img" value="{{old('prod_img')}}" required autocomplete="prod_img" placeholder="">

										@error('prod_img')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								<button type="submit" class="btn btn-primary">
									{{ __('Save Item') }}
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