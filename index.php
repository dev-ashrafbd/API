<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
  <body>
      <div class="container h1 text-center my-3">Api Project</div>
      <div class="container my-4">
      <form>
        <div class="row">
          <div class="col-md-4">
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
          </div>
          <div class="col-md-4">
            <input type="text" class="form-control" name="city" id="city" placeholder="Enter City">
          </div>
          <div class="col-md-2">
            <input type="number" class="form-control" name="age" id="age" placeholder="Enter Age">
          </div>
          <div class="col-md-2">
            <button type="button" id="add" class="btn btn-primary">Add Data</button>
          </div>      
        </div>
      </form>
      </div>
      <div class="container">
      <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">City</th>
                <th scope="col">Age</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody id="data">
            </tbody>
        </table>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form id="editform">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="ename" id="ename" placeholder="Enter Name">
              </div>
              <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" name="ecity" id="ecity" placeholder="Enter City">
              </div>
              <div class="form-group">
                <label for="age">Age</label>
                <input type="number" class="form-control" name="eage" id="eage" placeholder="Enter Age">
              </div>             
              <input type="hidden" class="form-control" id="eid" name="eid">            
              <input type="submit" id="submit" class="btn btn-primary" value="Update"/>
            </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $.ajax({
                type:"GET",
                url: "http://localhost/API/fetch_all_data.php",
                success:function(data){ 
                  var html='';
                    $.each(data, function (key,value) { 
                        html += "<tr>";
                        html += "<td>" + value.id + "</td>";
                        html += "<td>" + value.name + "</td>";
                        html += "<td>" + value.city + "</td>";
                        html += "<td>" + value.age + "</td>";
                        html += "<td><button id='edit' class='btn btn-primary' data-toggle='modal' data-target='#exampleModalCenter' data-id='"+value.id+"'>Edit</button></td>";
                        html += "<td><button id='delete' class='btn btn-danger' data-id='"+value.id+"'>Delete</button></td>";
                        html += "</tr>";
                  
                    });
                    $("#data").html(html);
                }
            });
        });
        $(document).on("click","#edit",function () {
          var editid=$(this).data("id");
          var obj={sid:editid};
          var myJson=JSON.stringify(obj);
          $.ajax({
            type: "POST",
            url: "http://localhost/API/fetch_single.php",
            data: myJson,
            success: function (data) {
              $("#ename").val(data.name);
              $("#ecity").val(data.city);
              $("#eage").val(data.age);
              $("#eid").val(data.id);
            }
          });        
        });
        $(document).on("click","#delete",function () {
          var delid=$(this).data("id");
          var obj={did:delid};
          var myJson=JSON.stringify(obj);
          $.ajax({
            type: "POST",
            url: "http://localhost/API/fetch_delete.php",
            data: myJson,
            success: function (data) {
              
            }
          });        
        });

    </script>
  </body>
</html>