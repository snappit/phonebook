
<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Add New Contact</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form id="addForm">
				<div class="row">
					<div class="col-md-3">
						<label class="control-label" style="position:relative; top:7px;">Name:</label>
					</div>
					<div class="col-md-9">
						<input type="name" class="form-control" name="name" required>
					</div>
				</div>
				<div style="height:10px;"></div>
				<div class="row">
					<div class="col-md-3">
						<label class="control-label" style="position:relative; top:7px;">Phone number:</label>
					</div>
					<div class="col-md-9">
						<input type="number" class="form-control" name="phone_number" required>
					</div>
				</div>
				<div style="height:10px;"></div>
				<div class="row">
					<div class="col-md-3">
						<label class="control-label" style="position:relative; top:7px;">Description:</label>
					</div>
					<div class="col-md-9">
						<!-- <input type="text" class="form-control" name="desc" required> -->
                        <textarea class="form-control" name="desc" rows="3"></textarea>
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
			</form>
            </div>
 
        </div>
    </div>
</div>

<!-- Add New Number -->

<div class="modal fade" id="addnummodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Add New Phone Number</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form id="addnumForm">
                <input type="text" name="id_addnew" id="userid_addnew">
                <input type="text" name="ref_id_addnew" id="ref_id_addnew">

				<div class="row">
                    <div class="col-md-3">
						<label class="control-label" style="position:relative; top:7px;">Phone number:</label>
					</div>
					<div class="col-md-9">
						<input type="number" class="form-control" name="phone_number" required>
					</div>
				</div>
							
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Add </a>
			</form>
            </div>
 
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit Contact - editmodal</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form id="editForm">
                <input type="text" name="id" id="userid">
                <input type="text" name="ref_id" id="ref_id">
				<input type="text" name="contact_id" id="contact_id">
				<div class="row">
                    <div class="col-md-3">
						<label class="control-label" style="position:relative; top:7px;">Name:</label>
					</div>
					<div class="col-md-9">
						<input type="name" class="form-control" name="name" id="name">
					</div>
				</div>
				<div style="height:10px;"></div>
				<div class="row">
                    <div class="col-md-3">
						<label class="control-label" style="position:relative; top:7px;">Phone number:</label>
					</div>
					<div class="col-md-9">
						<input type="number" class="form-control" name="phone_number" id="phone_number">
					</div>
				</div>
				<div style="height:10px;"></div>
				<div class="row">
                    <div class="col-md-3">
						<label class="control-label" style="position:relative; top:7px;">Description:</label>
					</div>
					<div class="col-md-9">
						<!-- <input type="text" class="form-control" name="desc" required> -->
                        <textarea class="form-control" name="desc" rows="3" id="desc"></textarea>
					</div>
				</div>
				
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Update</a>
			</form>
            </div>
 
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h3 class="modal-title" id="myModalLabel">Delete Contact</h3></center>
            </div>
			<input type="text" name="cont_id" id="cont_id">
			<input type="text" name="info_id" id="info_id">
            <div class="modal-body">
				<h4 class="text-center">Are you sure you want to delete </h4>
				<h2 id="delfname" class="text-center"></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="button" id="delid" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</button>
            </div>
 
        </div>
    </div>
</div>

<!-- Search -->

<div class="modal fade" id="searchmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Search contact</h4></center>
            </div>
            <div class="modal-body">
				<div class="container-fluid">
					<form id="searchForm" method="POST">

						<div class="row">
							<div class="col-md-3">
								<label class="control-label" style="position:relative; top:7px;">Name:</label>
							</div>
							<div class="col-md-9">
								<input type="name" class="form-control" name="search_name" required>
							</div>
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
							<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Search </button>
						
						</div>
					</form>
				</div> 
			</div>
        </div>
    </div>
</div>


<div class="modal fade" id="searchmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Search Contact</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form id="searchForm">
				<div class="row">
					<div class="col-md-3">
						<label class="control-label" style="position:relative; top:7px;">Name:</label>
					</div>
					<div class="col-md-9">
						<input type="name" class="form-control" name="name" required>
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
			</form>
            </div>
 
        </div>
    </div>
</div>