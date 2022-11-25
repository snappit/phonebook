<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
	<title>Phone Book System</title>
	<link rel="stylesheet" href="http://localhost/phonebook/bootstrap/css/bootstrap.min.css">
	<script src="http://localhost/phonebook/jquery/jquery.min.js"></script>
	<script src="http://localhost/phonebook/bootstrap/js/bootstrap.min.js"></script>

  </head>
  <body>
    <div class="container">
      <div class="row p-5">
        <div class="col-sm-12 ">
            <div class="col-sm-12 ">
            <h3 class="text-center">Contact List</h3>
            </div>
            <div class="card-header col-md-8">
            <button class="btn btn-primary" id="add" > 
                <span class="glyphicon glyphicon-plus"></span>
                    Add New Contact
            </button>
			</div>
			<div class="col-md-4">
				<!-- <input type="name" class="form-control" name="search_name" id="search_name">
				<button class="btn btn-primary" id="search" > 
					<span class="glyphicon glyphicon-search"></span>
						Search
				</button> -->

					<button class="btn btn-primary" id="searchname" ><span class="glyphicon glyphicon-search"></span> Search</button>
					<button class="btn btn-success" id="refresh" ><span class="glyphicon glyphicon-refresh"></span> refresh</button>
			</div>
			
            

            <table class="table table-bordered table-striped table-dark" style="margin-top:20px;">
            <thead class="table-dark">
              <tr>
			  <th style="display:"></th>
                <th style="display:"></th>
                <th>ID</th>
                <th>Name</th>
                <th>Tel No</th>
                <th>Description</th>
                <th></th>
              </tr>
            </thead>
            <tbody  id="tbody">
            </tbody>
          </table>
        </div>
      </div>

      <?php echo $modal; ?>

      <script type="text/javascript">
        $(document).ready(function(){
            //create a global variable for our base url
	        var url = '<?php echo site_url(); ?>';

            //fetch table data
	        showTable();

	//show add modal
	$('#add').click(function(){
		$('#addnew').modal('show');
		$('#addForm')[0].reset();
	});
 
	//submit add form
	$('#addForm').submit(function(e){
		e.preventDefault();
		var user = $('#addForm').serialize();
			$.ajax({
				type: 'POST',
				url: url + '/phonebook/insert',
				data: user,
				success:function(){
					$('#addnew').modal('hide');
					showTable();
				}
			});
	});

	//show add new number modal
	$(document).on('click', '.addnewnum', function(){
		var id = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: url + '/phonebook/getusercontact',
			dataType: 'json',
			data: {id: id},
			success:function(response){
				console.log(response);
				$('#userid_addnew').val(response.id);
				$('#ref_id_addnew').val(response.ref_id);
				$('#addnummodal').modal('show');
			}
		});
	});
	//insert new phone number
	$('#addnumForm').submit(function(e){e.preventDefault();
		console.log("insert new phone number");
		var user = $('#addnumForm').serialize();
		console.log(user);
		$.ajax({
			type: 'POST',
			url: url + '/phonebook/insertnewphonenumber',
			data: user,
			success:function(){
				$('#addnummodal').modal('hide');
				showTable();
			}
		});
	});

    //show edit modal
	// $(document).on('click', '.edit', function(){
	// 	var id = $(this).data('id');
	// 	$.ajax({
	// 		type: 'POST',
	// 		url: url + '/phonebook/getusercontact',
	// 		dataType: 'json',
	// 		data: {id: id},
	// 		success:function(response){
	// 			console.log(response);
	// 			$('#name').val(response.name);
	// 			$('#phone_number').val(response.phone_number);
	// 			$('#desc').val(response.desc);
	// 			$('#userid').val(response.id);
	// 			$('#ref_id').val(response.ref_id);
	// 			$('#editmodal').modal('show');
	// 		}
	// 	});
	// });
	$(document).on('click', '.edit', function(){
		var phone_number = $(this).data('id');
		alert("Phone_number: " + phone_number);
		$.ajax({
			type: 'POST',
			url: url + '/phonebook/getusercontactPN',
			dataType: 'json',
			data: {phone_number: phone_number},
			success:function(response){
				console.log(response);
				$('#name').val(response.name);
				$('#phone_number').val(response.phone_number);
				$('#desc').val(response.desc);
				$('#userid').val(response.id);
				$('#ref_id').val(response.ref_id);
				$('#contact_id').val(response.contact_id);
				$('#editmodal').modal('show');
			}
		});
	});
	//update selected user
	$('#editForm').submit(function(e){e.preventDefault();
		var user = $('#editForm').serialize();
		$.ajax({
			type: 'POST',
			url: url + '/phonebook/update',
			data: user,
			success:function(){
				$('#editmodal').modal('hide');
				showTable();
			}
		});
	});

	//show delete modal
	$(document).on('click', '.delete', function(){
        console.log('log delete button click');
        console.log($(this).data('id'));
		var contact_id = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: url + '/phonebook/getuserdelete1',
			dataType: 'json',
			data: {contact_id: contact_id},
			success:function(response){
				console.log(response);
				$('#cont_id').val(response.contact_id);	
				$('#info_id').val(response.info_id);	
				$('#delfname').html(response.name);
				$('#delid').val(response.contact_id);
				$('#delmodal').modal('show');
			}
		});
	});

        $('#delid').click(function(){
		 var id = $(this).val();
			// var contact_id = $(this).val(response.contact_id);
			// var info_id = $(this).val(response.info_id);
        console.log('site_url ' + url + '/phonebook/delete');
		console.log('contact_id: ' + id);
		$.ajax({
			type: 'POST',
			url: url + '/phonebook/delete',
			data: {id: id},
			success:function(){
				$('#delmodal').modal('hide');
				showTable();
			}
		});
	});
 
            
        })


			//show add modal
	// $('#searchname').click(function(){
	// 	var url = '<?php echo site_url(); ?>';
	// 	// var kw = document.getElementById("keyword").value;
	// 	console.log('Search: ' + kw );
	// 	$.ajax({
	// 		type: 'POST',
	// 		url: url + '/phonebook/showtest',
	// 		data: {kw: kw},
	// 		success:function(){
	// 			// $('#delmodal').modal('hide');
	// 			showTable();
	// 		}
	// 	});
	// });

	$('#search').click(function(){
		var url = '<?php echo site_url(); ?>';
		console.log('log search button click');
		console.log('site_url ' + url + '/phonebook/searchname');
		console.log($_POST(search_name));
		$.ajax({
			type: 'POST',
			url: url + '/phonebook/searchname',
			data: {id: id},
			success:function(){
				// $('#delmodal').modal('hide');
				showTable();
			}
		});
	});
//====================================================================================
		//show search modal

		$('#searchname').click(function(){
		$('#searchmodal').modal('show');
		$('#searchForm')[0].reset();
		});

		//submit search form

		$('#searchForm').submit(function(e){
		e.preventDefault();
		var url = '<?php echo site_url(); ?>';
		var user = $('#searchForm').serialize();
			$.ajax({
				type: 'POST',
				url: url + '/phonebook/showtest',
				data: user,
				success:function(response){
					$('#searchmodal').modal('hide');
					$('#tbody').html(response);
				}
			});
	});
	
		// function showTableSearch(){
        //     var url = '<?php echo site_url(); ?>';
        //     console.log('log showTableSearch');
        //     console.log('site_url' + "<?php echo site_url(); ?>" + '/phonebook/showtest');
        //     $.ajax({
        //         type: 'POST',
        //         // url: url + 'user/show',
        //         url: "<?php echo site_url(); ?>/phonebook/showtest",
        //         success:function(response){
        //             $('#tbody').html(response);
        //         }
        //     });
        //     }  


//====================================================================================

		//show search modal
		$('#refresh').click(function(){
			showTable();
		});

        function showTable(){
            var url = '<?php echo site_url(); ?>';
            console.log('log showtable');
            console.log('site_url' + "<?php echo site_url(); ?>" + '/phonebook/show');
            $.ajax({
                type: 'POST',
                // url: url + 'user/show',
                url: "<?php echo site_url(); ?>/phonebook/show",
                success:function(response){
                    $('#tbody').html(response);
                }
            });
            }  


      </script>
    </div>
  </body>
</html>

