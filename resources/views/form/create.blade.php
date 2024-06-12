<!-- create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<h2>Form</h2>
<form id="formDataForm" action="{{ url('/form/save') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" required><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="phone">Phone:</label><br>
    <input type="text" id="phone" name="phone" required><br><br>

    <label for="document">Upload Document:</label><br>
    <input type="file" id="document" name="document"><br><br>

    <label for="text_data">Text Data:</label><br>
    <textarea id="text_data" name="text_data"></textarea><br><br>

    <input type="submit" value="Submit">
</form>
<script>
    // Ajax request for form submission
$(document).ready(function(){
    $('#formDataForm').on('submit', function(e){
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response){
                console.log(response);
                alert(response.success); // Show success message
            },
            error: function(xhr, status, error){
                console.error(xhr.responseText);
                alert('An error occurred while saving the form data');
            }
        });
    });
});

</script>
</body>
</html>
