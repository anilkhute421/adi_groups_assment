<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>
    
<div class="container">
    <h1>User List</h1>
    <div style="display:flex; justify-content:space-between">
    <a class="btn btn-success" href="{{route('user/add')}}" > Create New User</a>
    <a class="btn btn-success" href="{{route('user/filter')}}" style="
    /* margin: 1px; */
    /* margin-left: 879px; */
"> Go to Filter Page</a>
</div>
    
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Student Name</th>
                <th>Result marks</th>
                <th>Student School Name</th>
                <th width="300px">Action</th>
            </tr>
        </thead>
        <tbody id="user_list">
        </tbody>
    </table>
</div>
   
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="bookForm" name="bookForm" class="form-horizontal">
                   <input type="hidden" name="book_id" id="book_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="" maxlength="50" required="">
                        </div>
                    </div>
     
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Details</label>
                        <div class="col-sm-12">
                            <textarea id="author" name="author" required="" placeholder="Enter Author" class="form-control"></textarea>
                        </div>
                    </div>
      
                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                     </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  

<script type="text/javascript">
  $(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
})

$.ajax({
    url:"{{route('user/list/data')}}",
    type:"GET",
    success:function(data){
        var i = 1;
        var noDataFount = `
        <tr>
  <td colspan="5" style="text-align: center;">No data found</td>
</tr>
        
        `
       var list =  data.map((row)=>(
        // console.log(row , 'row');
            `<tr>
                <td>${i++}</td>
                <td>${row?.studentName}</td>
                <td>${row?.result?.marks}</td>
                <td>${row?.school?.schoolName}</td>
                <td>
                <a href="{{url('user/update/${row?.id}')}}" class="btn btn-success">Edit</a>
                <a href="{{url('user/delete/${row?.id}')}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                </td>
            </tr>`
       ))
        console.log(list )
        if(list.length >= 1){
        $("#user_list").empty().append(list)
            
        }else{
        $("#user_list").empty().append(noDataFount)

        }
    }
})
</script>
</body>
</html>