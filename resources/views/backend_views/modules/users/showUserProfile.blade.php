@extends('backend_views.layouts.master_page')

@section('breadcrumb')
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">User Profile</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <a href="{!! route('user-profiles.index') !!}" {{-- target="_blank" --}} class="btn btn-success pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Edit User Profile</a>
        <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li class="active">User Profile</li>
        </ol>
    </div>
@endsection
        
<!-- Module|Page Content -->
@section('modules')
<div class="row">
    <div class="col-md-4 col-xs-12">
        <div class="white-box">
            @if(!empty($row->userProfile->avatar))
            <div class="user-bg"> <img width="100%" height="100%" alt="user" src="{!! asset('uploads/users/medium/'.$row->userProfile->avatar) !!}"> </div>
            @elseif(empty($row->userProfile->avatar))
                <div class="user-bg"> <img width="100%" height="100%" alt="user" src="{!! asset('uploads/users/medium/avatar.jpg') !!}"> </div>
            @endif
            <div class="user-btm-box">
                <!-- .row -->
                <div class="row text-center m-t-10">
                    <div class="col-md-6 b-r"><strong>Name</strong>
                        <p>{!! $row->name !!}</p>
                    </div>
                    <div class="col-md-6"><strong>Role</strong>
                        <p>{!! $row->role->role_title !!}</p>
                    </div>
                </div>
                <!-- /.row -->
                <hr>
                <!-- .row -->
                <div class="row text-center m-t-10">
                    <div class="col-md-12 b-r"><strong>Email</strong>
                        <p>{!! $row->email !!}</p>
                    </div>
                    <div class="col-md-12"><strong>Phone</strong>
                        <p>+123 456 789</p>
                    </div>
                </div>
                <!-- /.row -->
                <hr>
                <!-- .row -->
                <div class="row text-center m-t-10">
                    <div class="col-md-12"><strong>Address</strong>
                        <p>E104, Dharti-2, Chandlodia Ahmedabad
                            <br/> Gujarat, India.</p>
                    </div>
                </div>
                <hr>
                <!-- /.row -->
                <div class="col-md-4 col-sm-4 text-center">
                    <p class="text-purple"><i class="ti-facebook"></i></p>
                    <h1>258</h1> </div>
                <div class="col-md-4 col-sm-4 text-center">
                    <p class="text-blue"><i class="ti-twitter"></i></p>
                    <h1>125</h1> </div>
                <div class="col-md-4 col-sm-4 text-center">
                    <p class="text-danger"><i class="ti-google"></i></p>
                    <h1>140</h1> </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-xs-12">
        <div class="white-box">
            <!-- .tabs -->
            <ul class="nav nav-tabs tabs customtab">
                <li class="active tab">
                    <a href="#home" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-home"></i></span> <span class="hidden-xs">Activity</span> </a>
                </li>
                <li class="tab">
                    <a href="#biography" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-home"></i></span> <span class="hidden-xs">Biography</span> </a>
                </li>
                <li class="tab">
                    <a href="#update" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-home"></i></span> <span class="hidden-xs">Update Details</span> </a>
                </li>
            </ul>
            <!-- /.tabs -->
            <div class="tab-content">
                <!-- .tabs 1 -->
                <div class="tab-pane active" id="home">
                    <div class="steamline">
                        <div class="sl-item">
                            <div class="sl-left"> <img src="{!! asset('backend_assets/plugins/images/users/d1.jpg') !!}" alt="user" class="img-circle" /> </div>
                            <div class="sl-right">
                                <div class="m-l-40"><a href="#" class="text-info">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                    <p>assign a new task <a href="#"> Design weblayout</a></p>
                                    <div class="m-t-20 row"><img src="{!! asset('backend_assets/plugins/images/img1.jpg') !!}" alt="user" class="col-md-3 col-xs-12" /> <img src="{!! asset('backend_assets/plugins/images/img2.jpg') !!}" alt="user" class="col-md-3 col-xs-12" /> <img src="{!! asset('backend_assets/plugins/images/img3.jpg') !!}" alt="user" class="col-md-3 col-xs-12" /></div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="sl-item">
                            <div class="sl-left"> <img src="{!! asset('backend_assets/plugins/images/users/d1.jpg') !!}" alt="user" class="img-circle" /> </div>
                            <div class="sl-right">
                                <div class="m-l-40"> <a href="#" class="text-info">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                    <div class="m-t-20 row">
                                        <div class="col-md-2 col-xs-12"><img src="{!! asset('backend_assets/plugins/images/img1.jpg') !!}" alt="user" class="img-responsive" /></div>
                                        <div class="col-md-9 col-xs-12">
                                            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa</p> <a href="#" class="btn btn-success"> Design weblayout</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="sl-item">
                            <div class="sl-left"> <img src="{!! asset('backend_assets/plugins/images/users/d1.jpg') !!}" alt="user" class="img-circle" /> </div>
                            <div class="sl-right">
                                <div class="m-l-40"><a href="#" class="text-info">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                    <p class="m-t-10"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper </p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="sl-item">
                            <div class="sl-left"> <img src="{!! asset('backend_assets/plugins/images/users/d1.jpg') !!}" alt="user" class="img-circle" /> </div>
                            <div class="sl-right">
                                <div class="m-l-40"><a href="#" class="text-info">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                    <p>assign a new task <a href="#"> Design weblayout</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.tabs1 -->
                <!-- .tabs 2 -->
                <div class="tab-pane" id="biography">
                    <div class="row">
                        <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                            <br>
                            <p class="text-muted">Johnathan Deo</p>
                        </div>
                        <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                            <br>
                            <p class="text-muted">(123) 456 7890</p>
                        </div>
                        <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                            <br>
                            <p class="text-muted">johnathan@admin.com</p>
                        </div>
                        <div class="col-md-3 col-xs-6"> <strong>Location</strong>
                            <br>
                            <p class="text-muted">London</p>
                        </div>
                    </div>
                    <hr>
                    <p class="m-t-30">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries </p>
                    <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    <h4 class="m-t-30">Skill Set</h4>
                    <hr>
                    <h5>Wordpress <span class="pull-right">80%</span></h5>
                    <div class="progress">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%;"> <span class="sr-only">50% Complete</span> </div>
                    </div>
                    <h5>HTML 5 <span class="pull-right">90%</span></h5>
                    <div class="progress">
                        <div class="progress-bar progress-bar-custom" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%;"> <span class="sr-only">50% Complete</span> </div>
                    </div>
                    <h5>jQuery <span class="pull-right">50%</span></h5>
                    <div class="progress">
                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%;"> <span class="sr-only">50% Complete</span> </div>
                    </div>
                    <h5>Photoshop <span class="pull-right">70%</span></h5>
                    <div class="progress">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%;"> <span class="sr-only">50% Complete</span> </div>
                    </div>
                    <h4 class="m-t-30">Education</h4>
                    <hr>
                    <ul>
                        <li>M.B.B.S from AIIMS</li>
                        <li>M.B.B.S from AIIMS</li>
                        <li>M.D from AIIMS</li>
                        <li>D.N.B AIIMS</li>
                        <li>M.S from AIIMS</li>
                        <li>D.N.B from AIIMS</li>
                    </ul>
                    <h4 class="m-t-30">Experience</h4>
                    <hr>
                    <ul>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                        <li>Excepteur sint occaecat cupidatat non proident.</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                        <li>Excepteur sint occaecat cupidatat non proident.</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                        <li>Excepteur sint occaecat cupidatat non proident.</li>
                    </ul>
                    <h4 class="m-t-30">Accomplishments</h4>
                    <hr>
                    <ul>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                        <li>Excepteur sint occaecat cupidatat non proident.</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                        <li>Excepteur sint occaecat cupidatat non proident.</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                        <li>Excepteur sint occaecat cupidatat non proident.</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                    </ul>
                </div>
                <!-- /.tabs2 -->
                <!-- .tabs 3 -->
                <div class="tab-pane" id="update">
                    <form class="form-material form-horizontal">
                        <div class="form-group">
                            <label class="col-md-12" for="example-text">Name</span>
                            </label>
                            <div class="col-md-12">
                                <input type="text" id="example-text" name="example-text" class="form-control" placeholder="enter your name" value="Jonathan Doe">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="bdate">Date of Birth</span>
                            </label>
                            <div class="col-md-12">
                                <input type="text" id="bdate" name="bdate" class="form-control mydatepicker" placeholder="enter your birth date" value="12/10/2017">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Gender</label>
                            <div class="col-sm-12">
                                <select class="form-control">
                                    <option>Select Gender</option>
                                    <option selected="selected">Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Profile Image</label>
                            <div class="col-sm-12">
                                <img class="img-responsive" src="{!! asset('backend_assets/plugins/images/big/d2.jpg') !!}" alt="" style="max-width:120px;">
                            </div>
                            <div class="col-sm-12">
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                    <input type="file" name="..."> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="special">Speciality</span>
                            </label>
                            <div class="col-md-12">
                                <input type="text" id="special" name="special" class="form-control" placeholder="e.g. Dentist" value="Neurosurgeon">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Description</label>
                            <div class="col-md-12">
                                <textarea class="form-control" rows="3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="url">Website URL</span>
                            </label>
                            <div class="col-md-12">
                                <input type="text" id="url" name="url" class="form-control" placeholder="your website" value="http://www.example-website.com">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Submit</button>
                        <button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                    </form>
                </div>
                <!-- /.tabs 3 -->
            </div>
        </div>
    </div>
</div>
@endsection
<!-- /.Module|Page Content -->
