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
  <div class="card-header" style="background-color: gray">Summary Details</div><br>
  <div class="row">

          <div class="col-sm-6"><a class="btn btn-outline-info" href="/summery/CV/{{Auth::user()->id}}" style="width: 100%">Preview</a></div>
          <div class="col-sm-6"><button class="btn btn-outline-success" onClick="$('#signupbox').hide(); $('#sumbox').show()" style="width: 100%">Write Summary </button></div>
          
        </div><br><br>
        <div class="container">
              <div id="sumbox" style="display:none;">
          			<form action="/summery_action/CV/{{Auth::user()->id}}" method="post">
                  @csrf
                  <div class="form-group">
                     <label for="comment">Summary:</label>
                    <textarea name="Sum" id="Sum" rows="5" placeholder="write your experience and skill in brief" class="form-control" type="text" required ></textarea>
                  </div>
                  <button name="submit" type="submit" class="btn btn-success">Submit</button>
                </form>
				  	

				</div>
        </div>
        <hr>
<!--preview contact details-->
        <div  id="signupbox"  style="opacity: 0.5;filter: alpha(opacity=50);" >
          <center> 
           
              <div style="float: right;"> 
                  <a href="#editEmployeeModal" class="edit"data-toggle="modal"><i class='fas fa-edit' style='font-size:24px'></i></a>
              </div>  
          <div>
          @foreach($fetchSummery as $row)
        <div class="bs-callout bs-callout-danger">
        <h4>Summary</h4>
        <p>
         {!!$row->summery!!}
        </p>
       
          </div>
         
          </div>  
          
            
          
          </center>

        </div>
        
        <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/summery_update/CV/{{Auth::user()->id}}" method="POST" >
                  @csrf
                    <div class="modal-header"> 

                        <h4 class="modal-title">Update Contact Details</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body"> 
                      <div class="form-group">
                        <label for="comment">Summary:</label>
                          <textarea name="Summ" rows="5" class="ckeditor" placeholder="write your experience and skill in brief" id="Summ" class="form-control" type="text" required > {!!$row->summery!!}</textarea>
                      </div>
                      
                
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-info" value="Update">
                    </div>
                  
                </form>
            </div>
        </div>
    </div> 
 @endforeach
    </div><br>
  </div></div><br>
<div style="float: right">
  <a href="/home/CV/{{Auth::user()->id}}" class="btn btn-info">Previous</a>
  <a href='/education_preview/CV/{{Auth::user()->id}}' class="btn btn-success">Next</a>
</div>
<br><br>
  <script src="//cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
  <script>
            
            CKEDITOR.replace( 'Sum' );
            CKEDITOR.replace( 'Sum' );

</script>
@endsection