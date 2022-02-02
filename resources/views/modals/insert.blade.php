

<div class="modal fade" id="insertModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="insertModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content p-3">
	<form method="post" action="/insert">
		@csrf
        <input type="hidden" id="rangeStart" name="range_start" required />
        <input type="hidden" id="rangeEnd" name="range_end" required />
        <input type="hidden" id="rowIndex" name="row_index" required />
        <div class="modal-header p-0">
            <h5 class="modal-title p-0 m-2">Tambah Data</h5>
         </div>
      <div class="modal-body">
            <div class="mb-1 row">
				<label class="col-3 form-label">No</label>
				<div class="col-9">
                	<input class="form-control" id="no" name="no" type="number" maxlength="4" required />
				</div>
            </div>
			<div class="mb-1 row">
				<label class="col-3 form-label">First Name</label>
				<div class="col-9">
                	<input class="form-control" id="firstname" name="firstname" type="text" />
				</div>
            </div>
            <div class="mb-1 row">
				<label class="col-3 form-label">Last Name</label>
				<div class="col-9">
                	<input class="form-control" id="lastname" name="lastname" type="text" />
				</div>
            </div>
            <div class="mb-1 row">
				<label class="col-3 form-label">Email</label>
				<div class="col-9">
                	<input class="form-control" id="email" name="email" type="text" />
				</div>
            </div>
            <div class="mb-1 row">
				<label class="col-3 form-label">Gender</label>
				<div class="col-9">
                	<input class="form-control" id="gender" name="gender" type="text" />
				</div>
            </div>
            <div class="mb-1 row">
				<label class="col-3 form-label">Ip Address</label>
				<div class="col-9">
                	<input class="form-control" id="ip" name="ip"  type="text" />
				</div>
            </div>
      </div>
      <div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger">Save</button>
      </div>
	</form>
    </div>
  </div>
</div>


<script>
$('#insertModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var rangeStart = button.data('range_start');
  var rangeEnd = button.data('range_end');
  var rowIndex = button.data('row_index');
  $('#rangeStart').val(rangeStart);
  $('#rangeEnd').val(rangeEnd);
  $('#rowIndex').val(rowIndex);
})
</script>