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
      <div class="card-header" style="background-color: gray">Refrence Details</div><br>
        <div class="row">

          <div class="col-sm-6"><a class="btn btn-outline-info" href="/refrence/CV/{{Auth::user()->id}}" style="width: 100%">Preview</a></div>
          <div class="col-sm-6"><button class="btn btn-outline-success" onClick="$('#signupbox').hide(); $('#loginbox').show()" style="width: 100%">Add Refrence</button></div>
          
        </div><br><br>
        <div class="container">
              <div id="loginbox" style="display:none;">
                   <form action="/Refrence_action_insert/CV/{{Auth::user()->id}}" method="post">
                      @csrf      
                <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                              <input type="text" name="name" id="first_name" class="form-control" placeholder="Name" tabindex="1" value=""  required>
                              @if($errors->has('name'))
                           <div  class="alert alert-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </div>
                            
                                @endif
                </div>
              </div>
                      
              <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                  <select name="relationship" tabindex="2" class="form-control">
                    <option value="single">Single</option>
                    <option value="married">Married</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <input type="tel"  name="phone" placeholder="Phone"  class="form-control" tabindex="3">
             
            </div>
            <div class="form-group">
              <input type="text"  name="CompanyName" placeholder="Company Name"  class="form-control" tabindex="4">
             
            </div>
            <div class="form-group">
              <input type="email" name="email"   class="form-control " placeholder="Email" tabindex="5" >

            </div>
            <div class="form-group">
              <input type="text"  name="address" placeholder="Address"  class="form-control" tabindex="6">
             
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
              </div>
<!--preview contact details-->
        <div  id="signupbox"  style="opacity: 0.5;filter: alpha(opacity=50);" >
          
             @foreach($fetchLang as $row)
              <h4>Refrence</h4><hr>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="col-xs-12">
                      <ul style="list-style: none; ">
                        <li><strong>{{$row->ref_name}}</strong></li>
                        <li ><strong>Relationships:</strong> {{$row->relationship}}</li>
                        <li ><strong>Comany:</strong>{{$row->company}}</li>
                        <li><strong>Address:</strong>{{$row->ref_address}}</li>
                        <li><i class="fa fa-phone"></i> {{$row->ref_phone}}</li>
                        <li><i class="fa fa-envelope"></i>{{$row->ref_email}}</li>
                      </ul>
                    </div>
                  </div>
                </div>
              <div style="float: right;"> 
                  <a href="#editEmployeeModal"
                   data-myid="{{$row->id}}" data-myname="{{$row->ref_name}}" data-myrelation="{{$row->relationship}}" data-myphone="{{$row->ref_phone}}" data-myemail="{{$row->ref_email}}" data-mycompany="{{$row->company}}"
                   data-myaddress="{{$row->ref_address}}" class="edit"data-toggle="modal"><i class='fas fa-edit' style='font-size:24px'></i></a>
              </div>  
           
                
             @endforeach
          
        </div>
        <div id="editEmployeeModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
                <form action="/refrence_update/CV/{{Auth::user()->id}}" method="POST" >
                  @csrf
                    <div class="modal-header"> 

                        <h4 class="modal-title">Update  Details</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body"> 
                      <div class="form-group">
                        <input type="hidden" name="id" id="id">
                        
                      </div>

                    <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                              <input type="text" name="name" id="name" class="form-control" placeholder="Name" tabindex="1" value=""  required>
                              @if($errors->has('name'))
                           <div  class="alert alert-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </div>
                            
                                @endif
                </div>
              </div>
                      
              <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                  <select name="relationship" tabindex="2" class="form-control">
                    <option value="single">Single</option>
                    <option value="married">Married</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <input type="tel"  name="phone" placeholder="Phone" id="phone"  class="form-control" tabindex="3">
             
            </div>
            <div class="form-group">
              <input type="text"  name="CompanyName" placeholder="Company Name" id="company"  class="form-control" tabindex="4">
             
            </div>
            <div class="form-group">
              <input type="email" name="email"   class="form-control " id="email" placeholder="Email" tabindex="5" >

            </div>
            <div class="form-group">
              <input type="text"  name="address" placeholder="Address" id="address" class="form-control" tabindex="6">
             
            </div>
  
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
  <a href="/language_action/CV/{{Auth::user()->id}}" class="btn btn-info">Previous</a>
  <a href='#' class="btn btn-success">Next</a>
</div>

<script type="text/javascript">
        $('#editEmployeeModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var id=button.data('myid') 
  var name = button.data('myname')
  var myrelation= button.data('myrelation')
  var myphone= button.data('myphone') 
  var myemail = button.data('myemail')
  var mycompany = button.data('mycompany')
  var myaddress = button.data('myaddress')
  var modal = $(this) 
  modal.find('.modal-body #id').val(id)
  modal.find('.modal-body #name').val(name)
  modal.find('.modal-body #relationship').val(myrelation)
  modal.find('.modal-body #phone').val(myphone)
  modal.find('.modal-body #email').val(myemail)
   modal.find('.modal-body #company').val(mycompany)
    modal.find('.modal-body #address').val(myaddress)
})

</script>
@endsection