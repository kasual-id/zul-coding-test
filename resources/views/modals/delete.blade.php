

<div class="modal fade" id="deleteModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content p-3">
	<form method="post" action="/delete">
		@csrf
        <input type="hidden" id="delrowIndex" name="row_index" required />
        <div class="modal-header p-0">
            <h5 class="modal-title p-0 m-2">Hapus Data</h5>
         </div>
        <div class="modal-body">
           <div class="row">
               <div class="col-3">No</div>
               <div class="col-9">: <span id="delno"></span></div>
           </div>
           <div class="row">
               <div class="col-3">First Name</div>
               <div class="col-9">: <span id="delfirstname"></span></div>
           </div>
           <div class="row">
               <div class="col-3">Last Name</div>
               <div class="col-9">: <span id="dellastname"></span></div>
           </div>
           <div class="row">
               <div class="col-3">Email</div>
               <div class="col-9">: <span id="delemail"></span></div>
           </div>
           <div class="row">
               <div class="col-3">Gender</div>
               <div class="col-9">: <span id="delgender"></span></div>
           </div>
           <div class="row">
               <div class="col-3">IP Address</div>
               <div class="col-9">: <span id="delip"></span></div>
           </div>
         </div>
      <div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
	</form>
    </div>
  </div>
</div>


<script>
$('#deleteModal').on('show.bs.modal', function (event) {
   var button = $(event.relatedTarget);
  var no = button.data('no');
  var firstname = button.data('firstname');
  var lastname = button.data('lastname');
  var email = button.data('email');
  var gender = button.data('gender');
  var ip = button.data('ip');
  var rangeStart = button.data('range_start');
  var rangeEnd = button.data('range_end');
  var rowIndex = button.data('row_index');
  $('#delno').text(no);
  $('#delfirstname').text(firstname);
  $('#dellastname').text(lastname);
  $('#delemail').text(email);
  $('#delgender').text(gender);
  $('#delip').text(ip);
  $('#delrowIndex').val(rowIndex);
})
</script>