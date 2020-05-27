@extends('layouts.CVLayout')

@section('content')
<div class="container">
   @if($message=Session::get('success'))

                        <div class="alert alert-success">
                            <p>{{$message}}</p>
                        </div>
                        @endif
@if($errors->any())
    @foreach($errors->all() as $error)
    <div class="alert alert-danger">{{ $error}}</div>
    @endforeach
    @endif
   <div class="card">
      <div class="card-header" style="background-color: gray">Education Details</div><br>
        <div class="row">

          <div class="col-sm-6"><a class="btn btn-outline-info" href="/education_preview/CV/{{Auth::user()->id}}" style="width: 100%">Preview</a></div>
          <div class="col-sm-6"><button class="btn btn-outline-success" onClick="$('#signupbox').hide(); $('#loginbox').show()" style="width: 100%">Add Education</button></div>
          
        </div><br><br>
        <div class="container">
              <div id="loginbox" style="display:none;">
                   <form action="/Education_action_insert/CV/{{Auth::user()->id}}" method="post">
                      @csrf      
                <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                            <label><b>Qualification</b></label>
                              <input type="text" name="qualification" id="first_name" class="form-control" placeholder="qualification" tabindex="1" value=""  required>
                              @if($errors->has('qualification'))
                           <div  class="alert alert-danger">
                                        <strong>{{ $errors->first('qualification') }}</strong>
                                    </div>
                            
                                @endif
                </div>
              </div>
                      
              <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                  <label><b>Current Status:</b></label>
                  <select class="form-control" name="completeEdu" >
                    <option class="active" value="Graduated">Graduated</option>
                    <option value="Pursuing">Pursuing</option>
                    <option value="Passed">Passed</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label><b>School/Organization/College</b></label>
              <input type="text"  name="school" placeholder="school/organization/college"  class="form-control" tabindex="3">
             
            </div>
            <div class="form-group">
              <label><b>Passing Year:</b></label>
              <input type="month"  name="year" value="March,2019"  class="form-control" tabindex="3">
             
            </div>
            <div class="form-group">
              <label><b>Percentage(%):</b></label>
              <input type="number" name="percentage" min="10" max="100" step="1" class="form-control " placeholder="Percentage %" tabindex="4" required>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
              </div><hr>
<!--preview contact details-->
         

        <div  id="signupbox"  style="opacity: 0.5;filter: alpha(opacity=50);" >
          
      
              <div>
                <center>
                  <div class="bs-callout bs-callout-danger">
                   <h4>Education</h4>
                    @foreach($fetchEducation as $row)
                      <table class="table table-striped table-responsive ">
                      <thead>

                        <tr>
                        <th>Degree</th>
                        <th>Status</th>
                        <th>Instiute Name</th>
                        <th>Year</th>
                        <th>Percentage</th>
                        <th>Update</th>
                      </tr></thead>
                      <tbody>

                        <tr>
                          <td>{{$row->qualification}}</td>
                          <td>{{$row->completeEdu}}</td>
                          <td>{{$row->SchoolName}}</td>
                          <td>{{$row->edu_year}}</td>
                          <td>
                            <div class="progress">
                            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:{{$row->edu_percentage}}%">
                              {{$row->edu_percentage}}%
                            </div>
                          </div></td>
                          <td>
                            <div style="float: right;"> 
                              <a href="#editEmployeeModal" data-myid="{{$row->id}}" data-mytitle="{{$row->qualification}}" data-myschool="{{$row->SchoolName}}" data-mymonth="{{$row->edu_year}}" data-mypercent="{{$row->edu_percentage}}" class="edit"data-toggle="modal"><i class='fas fa-edit' style='font-size:24px'></i></a>
                              <div style="float: right;"> 
                              <a href="#deleteModal" data-myid="{{$row->id}}" class="edit"data-toggle="modal"><i class='fas fa-trash' style='font-size:24px;color:red;'></i></a>

              </div> 
                              </div> 
                          </td>
                          </tr>
                       </tbody>
                    </table>
                  </div>      
              `</center>
              </div>

              </div>
              <hr>
            @endforeach 
        
        </div>
        <!--edit and update-->
         <div id="editEmployeeModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
                <form action="/Education_update/CV/{{Auth::user()->id}}" method="POST" >
                  @csrf
                    <div class="modal-header"> 

                        <h4 class="modal-title">Update Education Details</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body"> 
                      <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <input type="hidden" name="id12" id="id" >
                <div class="form-group">
                              <input type="text" name="qualification" id="qualification" class="form-control" placeholder="qualification" tabindex="1" value=""  required>
                              @if($errors->has('qualification'))
                           <div  class="alert alert-danger">
                                        <strong>{{ $errors->first('qualification') }}</strong>
                                    </div>
                            
                                @endif
                </div>
              </div>
                      
              <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                  <select class="form-control" name="completeEdu" >
                    <option class="active" value="Graduated">Graduated</option>
                    <option value="Graduated">Graduting</option>
                    <option value="Enrolled">Enrolled</option>
                    <option value="Deferred">Deferred</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <input type="text"  name="school" id="school" placeholder="scool/organization/college"  class="form-control" tabindex="3">
             
            </div>
            <div class="form-group">
              <input type="month"  name="year" value="March,2019" id="month"  class="form-control" tabindex="3">
             
            </div>
            <div class="form-group">
              <input type="number" name="percentage" min="10" max="100" step="1" id="percentage" class="form-control " placeholder="Percentage %" tabindex="4" required>
            </div>
                
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-info" value="Update">
                    </div>
                  
                </form>
            </div>
        </div>
    </div>
   
    </div>
  </div>
</div>

<br> 
<div style="float: right">
  <a href="/summery/CV/{{Auth::user()->id}}" class="btn btn-info">Previous</a>
  <a href='/preview/cv/{{Auth::user()->id}}' class="btn btn-success">Next</a>
</div><br>

<div id="deleteModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
                <form action="/Education_delete/CV/{{Auth::user()->id}}" method="POST" >
                  @csrf
                    <div class="modal-header"> 

                        <h4 class="modal-title">Delete Education Details</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body"> 
                      <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                      <input type="hidden" name="id" id="id" >
                  <div class="form-group">
                              <input type="hidden" name="id" id="del_id" class="form-control" placeholder="qualification" tabindex="1" value=""  required>
                            
                  </div>
                </div>
                    <div>
                      <p>Are you sure to delete this details</p>
                    </div>  
                
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </div>
                  
                </form>
            </div>
        </div>
    </div>


 <script type="text/javascript">
        $('#editEmployeeModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var id=button.data('myid') 
  var title = button.data('mytitle')
  var school= button.data('myschool')
  var month= button.data('mymonth') 
  var percentage = button.data('mypercent')
  var modal = $(this) 
  modal.find('.modal-body #id').val(id)
  modal.find('.modal-body #qualification').val(title)
  modal.find('.modal-body #school').val(school)
  modal.find('.modal-body #month').val(month)
  modal.find('.modal-body #percentage').val(percentage)
})

        //deleteid
     $('#deleteModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var delid = button.data('myid')
      var modal = $(this) 
     
      modal.find('.modal-body #del_id').val(delid)
    })

    </script>
@endsection