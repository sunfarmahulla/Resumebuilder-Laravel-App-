<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link href="{{ asset('css/cv.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ URL::asset('js/jspdf.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jsppdf.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/htmltopdf.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
</head>
<body>
<div id="HTMLtoPDF">
<div class="resume">
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
    <div class="panel panel-default">
       <div class="panel-heading resume-heading">
              <div class="row">
                <div class="col-lg-12">
                  <div class="col-xs-12">
                    <ul style="list-style: none; text-align: center;">
                      @foreach($contact as $row)
                      <li style="font-size:25px;"><strong>{{$row->firstName}} {{$row->MiddleName}} {{$row->endName}}</strong></li>
                      <li>Softwre Engineer</li>
                      <li>Google Inc.</li>
                      <li>{{$row->Address}}</li>
                       <li>{{$row->state}},{{$row->city}} {{$row->zip}} {{$row->country}}</li>
                      <li><i class="fa fa-phone"></i>{{$row->Phone}} </li>
                      <li><i class="fa fa-envelope"></i>{{$row->email}}</li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            </div>
              
          
      <div class="bs-callout bs-callout-danger">
        <h4>Summary</h4>
        <p>
          @foreach($summary as $summ)
         {!!$summ->summery!!}
         @endforeach
        </p>
        
      </div>
      <div class="bs-callout bs-callout-danger">
        <h4>Research Interests</h4>
        <p>
          Software Engineering, Machine Learning, Image Processing,
          Computer Vision, Artificial Neural Networks, Data Science,
          Evolutionary Algorithms.
        </p>
      </div>
      <div class="bs-callout bs-callout-danger">
        <h4>Skills</h4>
        @foreach($skill as $show)
        {{$show->subject}}
                <div class="progress">
                  <div class="progress-bar progress-bar-info progress-bar-striped"  role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:{{$row->sk_percentage}}%; text-align: center;">
                   {{$show->subject}} {{$show->sk_percentage}}%

                  </div>
                </div>
        @endforeach
      </div>
      <div class="bs-callout bs-callout-danger">
        <h4>Language and  Skills</h4>
        @foreach($language as $language)
        {{$language->language}}
                <div class="progress">
                  <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:{{$language->la_percentage}}%; text-align: center;">
                    {{$language->la_percentage}}% {{$language->language}}
                  </div>
            </div>
        @endforeach
      </div> 
      <div class="bs-callout bs-callout-danger">
        <h4>Education</h4>
        <table class="table table-striped table-responsive ">
                      <thead>

                        <tr>
                        <th>Degree</th>
                        <th>Status</th>
                        <th>Instiute Name</th>
                        <th>Year</th>
                        <th>Percentage</th>
                        
                      </tr></thead>
                      <tbody>
                        @foreach($education as $row1)
                        <tr>
                          <td>{{$row1->qualification}}</td>
                          <td>{{$row1->completeEdu}}</td>
                          <td>{{$row1->SchoolName}}</td>
                          <td>{{$row1->edu_year}}</td>
                          <td>
                            <div class="progress">
                            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:{{$row1->edu_percentage}}%; text-align: center;">
                              {{$row1->edu_percentage}}%
                            </div>
                          </div></td>
                          
                          </tr>
                          @endforeach
                       </tbody>
                    </table>

      </div>
       <div class="bs-callout bs-callout-danger">
                 <h4>Hobbies</h4>
                  <ul class="list-group">
                    @foreach($hobbies as $row2)
                    <li class="list-group-item">{!!$row2->Hobbies!!}</li>
                    @endforeach
                  </ul>
                </div>
        <div class="bs-callout bs-callout-danger">
                 <h4>Refrence</h4><hr>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="col-xs-12">
                      <ul style="list-style: none; ">
                        @foreach($refrence as $row3)
                        <li><strong>{{$row3->ref_name}}</strong></li>
                        <li ><strong>Relationships:</strong> {{$row3->relationship}}</li>
                        <li ><strong>Comany:</strong>{{$row3->company}}</li>
                        <li><strong>Address:</strong>{{$row3->ref_address}}</li>
                        <li><i class="fa fa-phone"></i> {{$row3->ref_phone}}</li>
                        <li><i class="fa fa-envelope"></i>{{$row3->ref_email}}</li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </div>
        </div>
    </div>

  </div>
</div>
    
</div>
</div>
<a href="#" class="btn btn-success" onclick="HTMLtoPDF()">PDF Format</a><br><br>
  <form>
         <input type = "button" class="btn btn-info" value = "Print" onclick = "window.print()" />
      </form>  
</div>
</body>
</html>



