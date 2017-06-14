@extends('admin.layout') 

@section('css')
<link href="{{ asset('public/plugins/iCheck/all.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/plugins/tagsinput/jquery.tagsinput.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4>Admin
       <i class="fa fa-angle-right margin-separator"></i>Settings       		
     </h4>
    </section>

    <!-- Main content -->
    <section class="content">
     
      @if(Session::has('success_message'))
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <i class="fa fa-check margin-separator"></i> {{ Session::get('success_message') }}	        
        </div>
      @endif

      <div class="content">
        <div class="row">
          <div class="col-md-9">
            <div class="box Startups">
              <div class="box-header with-border">
                <h3 class="box-title">Settings</h3>
              </div>
        
              <!-- form start -->
              <form class="form-horizontal" method="POST" action="{{ url('panel/admin/settings') }}" enctype="multipart/form-data">
             
                <input type="hidden" name="_token" value="{{ csrf_token() }}">	
             
                  @include('errors.errors-forms')
             
                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Site Name</label>
                      <div class="col-sm-10">
                        <input type="text" value="{{ $settings->title }}" name="title" class="form-control" placeholder="Name">
                      </div>
                    </div>
                  </div>
            
                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Strapline</label>
                      <div class="col-sm-10">
                        <input type="text" value="{{ $settings->welcome_text }}" name="welcome_text" class="form-control" placeholder="Strapline">
                      </div>
                    </div>
                  </div>
        
                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Subtitle</label>
                      <div class="col-sm-10">
                        <input type="text" value="{{ $settings->welcome_subtitle }}" name="welcome_subtitle" class="form-control" placeholder="Subtitle">
                      </div>
                    </div>
                  </div>
              
                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Keywords</label>
                      <div class="col-sm-10">
                        <input type="text" value="{{ $settings->keywords }}" id="keywords" name="keywords" class="form-control" placeholder="Keywords">
                      </div>
                    </div>
                  </div>
                  
                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Description</label>
                      <div class="col-sm-10">
                       <textarea name="description" rows="4" id="description" class="form-control" placeholder="Description">{{ $settings->description }}</textarea>
                     </div>
                   </div>
                 </div>

                <!-- Start Box Body -->
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Admin Email</label>
                    <div class="col-sm-10">
                      <input type="text" value="{{ $settings->email_admin }}" name="email_admin" class="form-control" placeholder="admin@example.com">
                    </div>
                  </div>
                </div>
                
                 <!-- Start Box Body -->
                 <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">No-reply Email</label>
                    <div class="col-sm-10">
                      <input type="text" value="{{ $settings->email_no_reply }}" name="email_no_reply" class="form-control" placeholder="no-reply@example.com">
                    </div>
                  </div>
                </div>
            
                <!-- Start Box Body -->
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Auto-Approve Startups</label>
                    <div class="col-sm-10">
                     
                      <div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="auto_approve_startups" @if( $settings->auto_approve_startups == '1' ) checked="checked" @endif value="1" checked>
                          Yes
                        </label>
                      </div>
                    
                      <div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="auto_approve_startups" @if( $settings->auto_approve_startups == '0' ) checked="checked" @endif value="0">
                          No
                        </label>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Start Box Body -->
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Hide Startups Registration Form</label>
                    <div class="col-sm-10">

                      <div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="disable_startups_reg" @if( $settings->disable_startups_reg == 'yes' ) checked="checked" @endif value="yes" checked>
                          Yes
                        </label>
                      </div>

                      <div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="disable_startups_reg" @if( $settings->disable_startups_reg == 'no' ) checked="checked" @endif value="no">
                          No
                        </label>
                      </div>

                    </div>
                  </div>
                </div>

                <!-- Start Box Body -->
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Hide Investors Registration Form</label>
                    <div class="col-sm-10">

                      <div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="disable_investors_reg" @if( $settings->disable_investors_reg == 'yes' ) checked="checked" @endif value="yes" checked>
                          Yes
                        </label>
                      </div>

                      <div class="radio">
                        <label class="padding-zero">
                            <input type="radio" name="disable_investors_reg" @if( $settings->disable_investors_reg == 'no' ) checked="checked" @endif value="no">
                            No
                        </label>
                      </div>

                    </div>
                  </div>
                </div>

                <!-- Start Box Body -->
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Captcha</label>
                    <div class="col-sm-10">
                     
                      <div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="captcha" @if( $settings->captcha == 'on' ) checked="checked" @endif value="on" checked>
                          Yes
                        </label>
                      </div>
                  
                      <div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="captcha" @if( $settings->captcha == 'off' ) checked="checked" @endif value="off">
                          No
                        </label>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Start Box Body -->
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Email Verification?</label>
                    <div class="col-sm-10">
                     
                      <div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="email_verification" @if( $settings->email_verification == '1' ) checked="checked" @endif value="1" checked>
                          Yes
                        </label>
                      </div>
                      
                      <div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="email_verification" @if( $settings->email_verification == '0' ) checked="checked" @endif value="0">
                          No
                        </label>
                      </div>  
                    </div>
                  </div>
                </div>

                <!-- Start Box Body -->
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Paginate</label>
                    <div class="col-sm-10">
                      <select name="result_request" class="form-control">
                        <option @if( $settings->result_request == 4 ) selected="selected" @endif value="4">4</option>
                        <option @if( $settings->result_request == 8 ) selected="selected" @endif value="8">8</option>
                        <option @if( $settings->result_request == 12 ) selected="selected" @endif value="12">12</option>
                        <option @if( $settings->result_request == 24 ) selected="selected" @endif value="24">24</option>
                        <option @if( $settings->result_request == 36 ) selected="selected" @endif value="36">36</option>
                        <option @if( $settings->result_request == 48 ) selected="selected" @endif value="48">48</option>
                        <option @if( $settings->result_request == 60 ) selected="selected" @endif value="60">60</option>
                      </select>
                    </div>
                  </div>
                </div>

                <!-- Start Box Body -->
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Max File Size</label>
                    <div class="col-sm-10">
                      <select name="file_size_allowed" class="form-control">
                        <option @if( $settings->file_size_allowed == 1024 ) selected="selected" @endif value="1024">1 MB</option>
                        <option @if( $settings->file_size_allowed == 2048 ) selected="selected" @endif value="2048">2 MB</option>
                        <option @if( $settings->file_size_allowed == 3072 ) selected="selected" @endif value="3072">3 MB</option>
                        <option @if( $settings->file_size_allowed == 4096 ) selected="selected" @endif value="4096">4 MB</option>
                        <option @if( $settings->file_size_allowed == 5120 ) selected="selected" @endif value="5120">5 MB</option>
                        <option @if( $settings->file_size_allowed == 10240 ) selected="selected" @endif value="10240">10 MB</option>
                      </select>
                      <span class="help-block ">Upload max filesize - <strong><?php echo str_replace('M', 'MB', ini_get('upload_max_filesize')) ?></strong></span>
                    </div>
                  </div>
                </div>

                <!-- Start Box Body -->
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Min Investment Target</label>
                    <div class="col-sm-10">
                      <div class="input-group">
                        <div class="input-group-addon">{{$settings->currency_symbol}}</div>                  
                        <input type="number" min="1" autocomplete="off" value="{{ $settings->min_startup_amount }}" name="min_startup_amount" class="form-control onlyNumber" placeholder="1000000">
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Start Box Body -->
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Max Investmemt Target</label>
                    <div class="col-sm-10">
                      <div class="input-group">
                        <div class="input-group-addon">{{$settings->currency_symbol}}</div>                  
                        <input type="number" min="1" autocomplete="off" value="{{ $settings->max_startup_amount }}" name="max_startup_amount" class="form-control onlyNumber" placeholder="10000000000">
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Start Box Body -->
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Min Investment Amount</label>
                    <div class="col-sm-10">
                      <div class="input-group">
                        <div class="input-group-addon">{{$settings->currency_symbol}}</div>                  
                        <input type="number" min="1" autocomplete="off" value="{{ $settings->min_investment_amount }}" name="min_investment_amount" class="form-control onlyNumber" placeholder="5000">
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Start Box Body -->
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Max Investment Amount</label>
                    <div class="col-sm-10">
                      <div class="input-group">
                        <div class="input-group-addon">{{$settings->currency_symbol}}</div>                  
                        <input type="number" min="1" autocomplete="off" value="{{ $settings->max_investment_amount }}" name="max_investment_amount" class="form-control onlyNumber" placeholder="1000000">
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Start Box Body -->
                <div class="box-body">
                  <div class="form-group">
                    <div class="input_fields_wrap" id="TextBoxesGroup">
                    <?php $count = 0; ?>
                    @for($i = 1; $i < 16; $i++)
                      <?php $question = 'question_'.$i; ?>
                      @if( !empty($data->$question ))
                        <?php $count = $i; ?>
                        <div id="TextBoxDiv{{ $i }}">
                          <label class="col-sm-2 control-label">Question {{ $i }}</label>
                          <div class="col-sm-10">
                            <div style="padding-bottom:2px"><input type="text" id="question_{{ $i }}" name="question_{{ $i }}" value="{{ $data->$question }}" placeholder="Question {{ $i }}" class="form-control"></div>
                          </div>
                        </div>
                      @endif
                    @endfor
                    </div>
                  </div>
                </div>

                <div class="box-footer">
                  <a href="{{ url('panel/admin') }}" class="btn btn-default">Cancel</a>
                  <button type="submit" class="btn btn-success pull-right">Save</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </section>
  </div>
@endsection

@section('javascript')

  <!-- icheck -->
  <script src="{{ asset('public/plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('public/plugins/tagsinput/jquery.tagsinput.min.js') }}" type="text/javascript"></script>

  <script type="text/javascript">
  	//Flat red color scheme for iCheck
    $('input[type="radio"]').iCheck({
      radioClass: 'iradio_flat-red'
    });
    
    $("#tagInput").tagsInput({
     
  	 'delimiter': [','],   // Or a string with a single delimiter. Ex: ';'
  	 'width':'auto',
  	 'height':'auto',
     'removeWithBackspace' : true,
     'minChars' : 3,
     'maxChars' : 25,
     'defaultText':'Add',
     /*onChange: function() {
        var input = $(this).siblings('.tagsinput');
        var maxLen = 4;
  		
    		if( input.children('span.tag').length >= maxLen){
    		  input.children('div').hide();
    		}
    		else{
    		  input.children('div').show();
    		}
      },*/
    });
  </script>

@endsection