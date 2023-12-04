<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <button type="button" class="btn btn-primary" id="openModalButton">Add a Session</button>
            <form action="">
            <!-- Modal Body -->
            <div class="modal-body">
               <p>this is a modal</p>
               <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="submit" name="submit" class="btn btn-primary">Save</button>
            </div>
			</form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
<script>
	// schedule create modal

// Open the modal when the button is clicked
$('#openModalButton').click(function() {
    $('#myModal').modal('show');
});

// Close the modal when the close button or "Close" is clicked
$('#myModal .close, #myModal .modal-footer .btn-secondary').click(function() {
    $('#myModal').modal('hide');
});
</script>
</body>

</html>