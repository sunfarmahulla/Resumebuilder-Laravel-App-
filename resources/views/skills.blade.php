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
      <div class="card-header" style="background-color: gray">Technical Skills Details</div><br>
        <div class="row">

          <div class="col-sm-6"><a class="btn btn-outline-info" href="/skills/CV/{{Auth::user()->id}}" style="width: 100%">Preview</a></div>
          <div class="col-sm-6"><button class="btn btn-outline-success" onClick="$('#signupbox').hide(); $('#loginbox').show()" style="width: 100%">Add Skills</button></div>
          
        </div><br><br>
        <div class="container">
              <div id="loginbox" style="display:none;">
                   <form action="/skills_insert_action/CV/{{Auth::user()->id}}" method="post">
                      @csrf      
                <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                              <input type="text" name="subject" id="" class="form-control" placeholder="Language(c/c++,java etc...)" tabindex="1" value=""  required>
                              @if($errors->has('subject'))
                           <div  class="alert alert-danger">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </div>
                            
                                @endif
                </div>
              </div>
                      
              <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                  <select class="form-control" name="type" >
                    <option class="active" value="Beginer">Begginer</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Advance">Advance</option>
                  
                  </select>
                </div>
              </div>
            </div>
            
            <div class="form-group">
              <input type="number" name="percentage" min="10" max="100" step="1" class="form-control " placeholder="Percentage %" tabindex="4" required>
            </div>
            <button type="submit" class="btn btn-success">Submit</button><br>
        </form>
              </div>
              <h4 style="text-align: center;">Skills</h4>
              <hr>
<!--preview contact details-->
        <div  id="signupbox"  style="opacity: 0.5;filter: alpha(opacity=50);" >
          
            @foreach($fetchSkills as $row)
              <div style="float: right;"> 
                  <a href="#editEmployeeModal" data-myid="{{$row->id}}" data-mysub="{{$row->subject}}",data-mytype="{{$row->sk_type}}", data-mysize="{{$row->sk_percentage}}" class="edit"data-toggle="modal"><i class='fas fa-edit' style='font-size:24px'></i></a>
                  <a href="#deleteModal" data-myid="{{$row->id}}"  class="edit"data-toggle="modal"><i class='fas fa-trash' style='font-size:24px;color: red;'></i></a>
                  
              </div>  
             
                {{$row->subject}}
                <div class="progress">
                  <div class="progress-bar progress-bar-info progress-bar-striped"  role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:{{$row->sk_percentage}}%">
                   {{$row->subject}} {{$row->sk_percentage}}%

                  </div>
                </div>
              @endforeach
         
        </div>

        <div id="editEmployeeModal" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="/skills_update/CV/{{Auth::user()->id}}" method="POST" >
                  @csrf
                    <div class="modal-header"> 

                        <h4 class="modal-title">Update  Details</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body"> 
                     <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="hidden" name="id" id="id1">
                              <input type="text" name="subject" id="mysub" class="form-control" placeholder="subject" tabindex="1" value=""  required>
                              @if($errors->has('subject'))
                           <div  class="alert alert-danger">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </div>
                            
                                @endif
                </div>
              </div>
                      
              <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                  <select class="form-control" name="type" >
                    <option class="active" value="Beginer">Begginer</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Advance">Advance</option>
                  
                  </select>
                </div>
              </div>
            </div>
            
            <div class="form-group">
              <input type="number" name="percentage" id="mysize" min="10" max="100" step="1" class="form-control " placeholder="Percentage %" tabindex="4" required>
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
<div id="deleteModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
                <form action="/delete_skills/cv/{{Auth::user()->id}}" method="POST" >
                  @csrf
                    <div class="modal-header"> 

                        <h4 class="modal-title">Delete Education Details</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body"> 
                
                    <div>
                      <p>Are you sure to delete this details</p>
                      <input type="hidden" name="id" id="myid">
                    </div>  
                
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </div>
                  
                </form>
            </div>
        </div>
    </div>



<br>
<br>
  </div>
  <br> 
<div style="float: right">
  <a href="/preview/cv/{{Auth::user()->id}}" class="btn btn-info">Previous</a>
  <a href='/language_action/CV/{{Auth::user()->id}}' class="btn btn-success">Next</a>
</div>

<script type="text/javascript">
        $('#editEmployeeModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var id1=button.data('myid') 
  var mysub = button.data('mysub')
  var mytype= button.data('mytype')
  var mysize= button.data('mysize') 
  var percentage = button.data('mypercent')
  var modal = $(this) 
  modal.find('.modal-body #id1').val(id1)
  modal.find('.modal-body #mysub').val(mysub)
  modal.find('.modal-body #mytype').val(mytype)
  modal.find('.modal-body #mysize').val(mysize)
 
})

        //deleteid
     $('#deleteModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var delid = button.data('myid')
      var modal = $(this) 
     
      modal.find('.modal-body #myid').val(delid)
    })

    </script>
@endsection