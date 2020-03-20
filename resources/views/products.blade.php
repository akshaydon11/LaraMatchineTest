@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div id="content">

	<!-- Topbar -->
	@include('includes.header')
	<!-- End of Topbar -->

	<!-- Begin Page Content -->
	<div class="container-fluid">

		<!-- Page Heading -->
		<h1 class="h3 mb-2 text-gray-800">List</h1>


		<!-- DataTales Example -->
		<div class="card shadow mb-4">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Sr No</th>
								<th>Product Name</th>
								<th>Product Desc</th>
								<th>Catgeory</th>
								<th>Product Color</th>
								<th>Product Price</th>
					
								<th>Action</th>
							</tr>
						</thead>
						<!-- <tfoot>
							<tr>
								<th>Sr No</th>
								<th>Product Name</th>
								<th>Product Desc</th>
								<th>Catgeory ID</th>
								<th>Product Color</th>
								<th>Product Price</th>
					
								<th>Action</th>
							</tr>
						</tfoot> -->
						<tbody>
							@foreach($data as $val)
							
							<tr>
								<td>{{ $val->id }}</td>
								<td>{{ $val->prod_name }}</td>
								<td>{{ $val->prod_desc }}</td>
								<td>{{ $val->cat_name }}</td>
								<td>{{ $val->prod_color }}</td>
								<td>{{ $val->prod_price }}</td>
								
								<td>
									<a href="{{ route('deletePro',['ProID' => $val->id])}}" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></a>
									<a href="{{ route('editPro',['proID' => $val->id])}}" class="btn btn-info btn-circle"><i class="fas fa-edit"></i></a>
									
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<div class="modal fade" id="compose" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form method="post" action="{{ url('send') }}">
			@csrf
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Compose Mail</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group row">
						<label class="label">Email ID</label>
						<input id="emailid" type="email" class="form-control" name="email" value="" required autocomplete="name" autofocus placeholder="">
					</div>
					<div class="form-group row">
						<label class="label">Type Message</label>
						<textarea class="form-control" name="message" required rows="5"></textarea>
					</div>					
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Send</button>
				</div>
			</div>
		</form>
	</div>
</div>
@stop


<script type="text/javascript">

function sendmail(email)
{
	$('#emailid').val(email);
}	
	

</script>
