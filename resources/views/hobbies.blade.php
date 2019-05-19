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
      <div class="card-header" style="background-color: gray">Hobbies Details</div><br>
        <div class="row">
          
          <div class="col-sm-6"><a class="btn btn-outline-info" href="/preview/cv/{{Auth::user()->id}}" style="width: 100%">Preview</a></div>
          <div class="col-sm-6"><button class="btn btn-outline-success" onClick="$('#signupbox').hide(); $('#loginbox').show()" style="width: 100%">Add Hobbies</button></div>
          
        </div><br><br>
        <div class="container">
              <div id="loginbox" style="display:none;">
               <form action="/Hobbies_action/CV/{{Auth::user()->id}}" method="post">
                  @csrf
                  <div class="form-group">
                     <label for="comment">Hobbies:</label>
                    <textarea name="hobby" class="ckeditor" rows="5" placeholder="Hobbies " id="hobby" class="form-control" type="text" required ></textarea>
                  </div>
                  <button name="submit" type="submit" class="btn btn-success">Submit</button>
                </form>    
              </div>
<!--preview contact details-->
        <div  id="signupbox"  style="opacity: 0.5;filter: alpha(opacity=50);" >
          <h4 style="text-align: center;">Hobbies</h4>
           @foreach($fetchHobby as $row)
              <div style="float: right;"> 
                  <a href="#editEmployeeModal" data-myid="{{$row->id}}" class="edit"data-toggle="modal"><i class='fas fa-edit' style='font-size:24px'></i></a>

              </div>  
            
                <div class="bs-callout bs-callout-danger">
                 
                  <ul class="list-group">
                    <li class="list-group-item">{!!$row->Hobbies!!}</li>
                    
                  </ul>
                </div>

        </div>
        <div id="editEmployeeModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
                <form action="/hobby_update/CV/{{Auth::user()->id}}" method="POST" >
                  @csrf
                    <div class="modal-header"> 

                        <h4 class="modal-title">Update  Details</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body"> 
                      <div class="form-group">
                        <input type="hidden" name="id" id="id">
                        <label for="comment">Hobbies:</label>
                          <textarea name="hobby1" id="hobby1" rows="5" class="ckeditor" placeholder="write your hobbies and skill in brief" id="Summ" class="form-control" type="text" required >{!!$row->Hobbies!!} </textarea>
                      </div>
                      
                
                  @endforeach        <div class="modal-footer">
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
  <a href="/education_preview/CV/{{Auth::user()->id}}" class="btn btn-info">Previous</a>
  <a href='/skills/CV/{{Auth::user()->id}}' class="btn btn-success">Next</a>
</div>
<br><br>
<script src="//cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
<script>
            // Replace the <textarea id="topic"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace( 'hobby' );
             CKEDITOR.replace( 'hobby1' );

</script>
<script type="text/javascript">
        $('#editEmployeeModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var myid=button.data('myid') 
  var mysumm=button.data('mysumm') 
  var modal = $(this) 
  modal.find('.modal-body #id').val(myid)
  
})
</script>
@endsection

