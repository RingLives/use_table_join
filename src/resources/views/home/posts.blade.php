<form action="{{ Route('post_action')}}" method="post">
	@csrf
	<div class="col-sm-8">
		<label>Share Something</label>
		<div class="form-group">
			<input type="textarea" name="post" class="form-control" placeholder="Write here.......">
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<button class="btn btn-primary">Submit</button>
		</div>
	</div>
</form>