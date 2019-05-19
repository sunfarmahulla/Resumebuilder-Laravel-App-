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
  <div class="card-header" style="background-color: gray">Contact Details</div><br>
  <div class="row">

          <div class="col-sm-6"><a class="btn btn-outline-info" href="/home/CV/{{Auth::user()->id}}" style="width: 100%">Preview</a></div>
          <div class="col-sm-6"><button class="btn btn-outline-success" onClick="$('#signupbox').hide(); $('#loginbox').show()" style="width: 100%">Create</button></div>
          
        </div><br><br>
        <div class="container">
              <div id="loginbox" style="display:none;">
          <form action="/Contact_action/CV/{{Auth::user()->id}}" method="post">
          @csrf      
                <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                <div class="form-group">
                              <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" tabindex="1" value=""  required>
                              @if($errors->has('first_name'))
                           <div  class="alert alert-danger">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </div>
                            
                                @endif
                </div>
              </div>
                      <div class="col-xs-12 col-sm-4 col-md-4">
                  <div class="form-group">
                              <input type="text" name="middle_name" id="middle_name" class="form-control" placeholder="Middle Name" tabindex="1">
                </div>
              </div>
              <div class="col-xs-12 col-sm-4 col-md-4">
                <div class="form-group">
                  <input type="text" name="last_name" id="last_name" class="form-control " placeholder="Last Name" tabindex="2">
                </div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" name="phone" id="" class="form-control " placeholder="Phone" tabindex="3">
              @if($errors->has('phone'))
                           <div  class="alert alert-danger">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </div>
                            
                                @endif
            </div>
            <div class="form-group">
              <input type="email" name="email" id="email" class="form-control " placeholder="Email Address" tabindex="4" required>
            </div>
            <div class="form-group">
              <textarea type="text" name="address" id="" class="form-control " placeholder=" Address" tabindex="4"></textarea> 
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="text" name="state" id="" class="form-control " placeholder="State" tabindex="5">
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="text" name="city" id="" class="form-control " placeholder="City name" tabindex="6">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="text" name="zip" id="" class="form-control " placeholder="Zip code" tabindex="5">
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="text" name="country" id="" class="form-control " placeholder="Country name" tabindex="6">
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
              </div><hr>
<!--preview contact details-->
        <div  id="signupbox"  style="opacity: 0.5;filter: alpha(opacity=50);" >
          <center> 
           
              <div style="float: right;"> 
                  <a href="#editEmployeeModal" class="edit"data-toggle="modal"><i class='fas fa-edit' style='font-size:24px'></i></a>
              </div>  
          
            @foreach($fetchContact as $row)
              <div class="panel-heading resume-heading">
                <div class="row">
                <div class="col-lg-12">
                  <div class="col-xs-12">
                    <ul style="list-style: none; text-align: center;">
                      <li style="font-size:25px;"><strong>{{$row->firstName}} {{$row->MiddleName}} {{$row->endName}}</strong></li>
                      <li>Softwre Engineer</li>
                      <li>Google Inc.</li>
                      <li>{{$row->Address}}</li>
                       <li>{{$row->state}},{{$row->city}} {{$row->zip}} {{$row->country}}</li>
                      <li><i class="fa fa-phone"></i>{{$row->Phone}} </li>
                      <li><i class="fa fa-envelope"></i>{{$row->email}}</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
                  
          
          </center>
             
          </div>

          <!--model for edit-->
            <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/contact_update_action/CV/{{Auth::user()->id}}" method="POST" >
                  @csrf
                    <div class="modal-header"> 

                        <h4 class="modal-title">Update Contact Details</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body"> 

                       <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                <div class="form-group">
                              <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" tabindex="1" value="{{$row->firstName}}"  required>
                              @if($errors->has('first_name'))
                           <div  class="alert alert-danger">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </div>
                            
                                @endif
                </div>
              </div>
                      <div class="col-xs-12 col-sm-4 col-md-4">
                  <div class="form-group">
                              <input type="text" name="middle_name" id="middle_name" class="form-control" value="{{$row->MiddleName}}" placeholder="Middle Name" tabindex="1">
                </div>
              </div>
              <div class="col-xs-12 col-sm-4 col-md-4">
                <div class="form-group">
                  <input type="text" name="last_name" id="last_name" class="form-control " placeholder="Last Name" value="{{$row->endName}}" tabindex="2">
                </div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" name="phone" id="" value="{{$row->Phone}}" class="form-control " placeholder="Phone" tabindex="3">
              @if($errors->has('phone'))
                           <div  class="alert alert-danger">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </div>
                            
                                @endif
            </div>
            <div class="form-group">
              <input type="email" name="email" value="{{$row->email}}" id="email" class="form-control " placeholder="Email Address" tabindex="4" required>
            </div>
            <div class="form-group">
              <textarea type="text" name="address" value="{{$row->Address}}" id="" class="form-control " placeholder=" Address" tabindex="4">{{$row->Address}}</textarea> 
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="text" name="state" id="" value="{{$row->state}}" class="form-control " placeholder="State" tabindex="5">
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="text" name="city" id="" value="{{$row->city}}" class="form-control " placeholder="City name" tabindex="6">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="text" name="zip" id="" value="{{$row->zip}}" class="form-control " placeholder="Zip code" tabindex="5">
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="text" name="country" id="" value="{{$row->country}}" class="form-control " placeholder="Country name" tabindex="6">
                </div>
              </div>
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
      @endforeach
        </div>
</div>
</div>
<br>
<div style="float: right">
  <a href="#" class="btn btn-info">Previous</a>
  <a href='/summery/CV/{{Auth::user()->id}}' class="btn btn-success">Next</a>
</div>
<br><br>

</div>
@endsection