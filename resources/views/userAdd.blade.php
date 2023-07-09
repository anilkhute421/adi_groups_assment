
<!DOCTYPE html>
<html>
<head>
    <title>User Add</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"> {{ $data->id  ? 'Student update' : 'Student add' }} <?php $data->id ?> </div>
                    <div class="card-body">
                        <form id="registrationForm">
                        <!-- {{ csrf_field() }} -->
                           <input type="hidden" id="studentId" name="studentId" value="{{ $data->id }}">

                            <div class="form-group">
                                <label for="name">Student Name</label>
                                <input type="text" class="form-control" id="studentName" name="studentName" value="{{ $data->studentName }}">
                                <small class="text-danger"></small>
                            </div>
                            <div class="form-group">
                                <label for="email">School Name</label>
                                <input type="text" class="form-control" id="schoolName" name="schoolName" value="{{ $data->id ?  $data->school->schoolName : '' }}">
                                <small class="text-danger"></small>

                            </div>
                            <div class="form-group">
                                <label for="email">School Location Add.</label>
                                <input type="text" class="form-control" id="location" name="location" value="{{ $data->id ? $data->school->location : '' }}">
                                <small class="text-danger"></small>

                            </div>
                            <div class="form-group">
                                <label for="phone">Marks</label>
                                <input type="text" class="form-control" id="marks" name="marks" value="{{ $data->id ?  $data->result->marks : ''}}">
                                <small class="text-danger"></small>
                             </div>

                            <button type="submit" class="btn btn-primary">{{ $data->id  ? 'Update' : 'Add' }}</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
      
        $('#registrationForm').submit(function(e) {
            e.preventDefault();
            $('.text-danger').text('');
            // Get form values
            var studentName = $('#studentName').val();
            var schoolName = $('#schoolName').val();
            var marks = $('#marks').val();
            var location = $('#location').val();
            var studentId = $('#studentId').val();


            // Validation flag
            var isValid = true;

            if (studentName === '') {
            isValid = false;
            $('#studentName').next('.text-danger').text('Student Name is required.');
        } else if (studentName.length > 15) {
            isValid = false;
            $('#studentName').next('.text-danger').text('Student Name cannot exceed 15 characters.');
        }

        if (marks === '') {
            isValid = false;
            $('#marks').next('.text-danger').text('Marks is required.');
        } else if (isNaN(marks) || marks < 30 || marks > 100) {
            isValid = false;
            $('#marks').next('.text-danger').text('Marks should be a number between 30 and 100.');
        }

        if (schoolName === '') {
            isValid = false;
            $('#schoolName').next('.text-danger').text('School Name is required.');
        } else if (schoolName.length > 15) {
            isValid = false;
            $('#schoolName').next('.text-danger').text('School Name cannot exceed 15 characters.');
        }

            if (location === '') {
                isValid = false;
                $('#location').next('.text-danger').text('location is required.');
            } else if (location.length > 15) {
            isValid = false;
            $('#location').next('.text-danger').text('location Name cannot exceed 15 characters.');
        }

            // If form is not valid, stop the submission

            var form = $(this);
            var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            console.log(form.serialize() , 'form');
            var url = studentId ? "{{url('user/updates')}}" : "{{url('user/submit')}}";
            var type = studentId ? "PUT" : "POST";

            console.log(url , 'url');

            if(isValid){
                $.ajax({
                url: url,
                type: type,
                headers: {
        'X-CSRF-TOKEN': token
    },
                // headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'), '_method': 'post'},
                data: form.serialize(),
                success: function(response) {
                    alert(response.message);
                    window.location.href = "/";
                },
                error: function(response) {
                    var errors = response.responseJSON.errors;
                    var errorMessage = '';
                    $.each(errors, function(key, value) {
                        errorMessage += value + "\n";
                });
                alert(errorMessage);
                console.log(response, 'errorMessage');
            }
        });
            }
           
    });

    
</script>
</body>
</html>
