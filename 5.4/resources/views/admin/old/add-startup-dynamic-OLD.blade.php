<?php $settings = App\Models\AdminSettings::first(); ?>

@extends('admin.layout')

@section('css')
<link href="{{ asset('public/plugins/iCheck/all.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/plugins/tagsinput/jquery.tagsinput.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h4>Admin
        <i class="fa fa-angle-right margin-separator"></i>Startups
        <i class="fa fa-angle-right margin-separator"></i>Profiles
        <i class="fa fa-angle-right margin-separator"></i>Add New
      </h4>
    </section>

  <!-- Main content -->
  <section class="content">
    <div class="content">
      <div class="row">
        <div class="box startups">
          <div class="box-header with-border">
            <h3 class="box-title">Add Startup</h3>
          </div>

          <!--Form Start-->
          <form class="form-horizontal" method="POST" action="{{ url('panel/admin/startup/add') }}" enctype="multipart/form-data">
            <!--CSRF Token-->        
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <!--Include Form Errors-->
            @include('errors.errors-forms')

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Member Name</label>
                <div class="col-sm-10">
                  <select name="member_name" id="member_name" class="form-control" required>
                    <option value="">Select One</option>
                    @foreach( $user as $user )
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Startup Name</label>
                <div class="col-sm-10">
                  <input type="text" name="title" id="title" class="form-control" placeholder="Name" required>
                </div>
              </div>
            </div>

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Tagline</label>
                <div class="col-sm-10">
                  <input type="text" name="tagline" id="tagline" class="form-control" placeholder="Tagline" required>
                </div>
              </div>
            </div>

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Logo</label>
                <div class="col-sm-10">
                  <input type="file" name="logo" id="logo" class="form-control input-lg">
                </div>
              </div>
            </div>

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Cover</label>
                <div class="col-sm-10">
                  <input type="file" name="cover" id="cover" class="form-control input-lg">
                </div>
              </div>
            </div>

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Startup Description</label>
                <div class="col-sm-10">
                  <textarea data-limit="300" rows="5" name="description" id="description" class="form-control" placeholder="Description"></textarea>
                </div>
              </div>
            </div>

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Location</label>
                <div class="col-sm-10">
                  <input type="text" name="location" id="location" class="form-control" placeholder="Location">
                </div>
              </div>
            </div>              

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Website</label>
                <div class="col-sm-10">
                  <input type="url" name="website" id="website" class="form-control" placeholder="https://www.website-name.com">
                </div>
              </div>
            </div>

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Facebook</label>
                <div class="col-sm-10">
                  <input type="url" name="facebook" id="facebook" class="form-control" placeholder="https://www.facebook.com/account-name">
                </div>
              </div>
            </div>

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Twitter</label>
                <div class="col-sm-10">
                  <input type="url" name="twitter" id="twitter" class="form-control" placeholder="https://www.twitter.com/account-name">
                </div>
              </div>
            </div>

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">LinkedIn</label>
                <div class="col-sm-10">
                  <input type="url" name="linkedin" id="linkedin" class="form-control" placeholder="https://www.linkedin.com/account-name">
                </div>
              </div>
            </div>

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Video</label>
                <div class="col-sm-10">
                  <input type="url" name="video" id="video" class="form-control" placeholder="https://www.youtube.com/video-name">
                </div>
              </div>
            </div>

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Category</label>
                <div class="col-sm-10">
                  <select name="category" id="category" class="form-control" required>
                    <option value="">Select One</option>
                    @foreach( App\Models\Categories::where('mode','on')->orderBy('name')->get() as $category )   
                    <option value="{{$category->id}}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Investment Sought</label>
                <div class="col-sm-10">
                  <div class="input-group">
                  <div class="input-group-addon">{{$settings->currency_symbol}}</div>
                  <input type="number" min="1" autocomplete="off" name="goal" id="goal" class="form-control onlyNumber" placeholder="1000000" required>
                </div>
              </div>
              </div>
            </div>

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Equity</label>
                <div class="col-sm-10">
                  <div class="input-group">
                  <div class="input-group-addon">%</div>
                  <input type="number" name="equity" id="equity" class="form-control" placeholder="Equity">
                </div>
              </div>
              </div>
            </div>

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Pre-Money Valuation</label>
                <div class="col-sm-10">
                  <div class="input-group">
                    <div class="input-group-addon">{{$settings->currency_symbol}}</div>
                    <input type="number" name="valuation" id="valuation" class="form-control" placeholder="Valuation">
                  </div>
                </div>
              </div>
            </div>

            <!-- Start Form Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Tax Relief</label>
                <div class="col-sm-10">
                  <select name="tax" id="tax" class="form-control" required>
                    <option value="">Select One</option>
                    @foreach ( App\Models\TaxReliefs::where('mode','on')->orderBy('id')->get() as $taxreliefstatus )
                      <option value="{{$taxreliefstatus->status}}">{{ $taxreliefstatus->status }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Status</label>
                <div class="col-sm-10">
                  <select name="status_id" class="form-control" required>
                    @foreach ( App\Models\Statuses::where(['mode'=>'on', 'table'=>'startups'])->orderBy('status')->get() as $status )   
                    <option value="{{$status->status}}">{{ ucfirst(trans($status->status)) }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Featured?</label>
                <div class="col-sm-10">
                 
                  <div class="radio">
                    <label class="padding-zero">
                      <input type="radio" name="featured" @if( $settings->featured == '1' ) checked="checked" @endif value="1">
                      Yes
                    </label>
                  </div>
                
                  <div class="radio">
                    <label class="padding-zero">
                      <input type="radio" name="featured" @if( $settings->featured == '0' ) checked="checked" @endif value="0" checked>
                      No
                    </label>
                  </div>
                </div>
              </div>
            </div>

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Opportunity?</label>
                <div class="col-sm-10">
                 
                  <div class="radio">
                    <label class="padding-zero">
                      <input type="radio" name="opportunity" @if( $settings->opportunity == '1' ) checked="checked" @endif value="1">
                      Yes
                    </label>
                  </div>
                
                  <div class="radio">
                    <label class="padding-zero">
                      <input type="radio" name="opportunity" @if( $settings->opportunity == '0' ) checked="checked" @endif value="0" checked>
                      No
                    </label>
                  </div>
                </div>
              </div>
            </div>

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Portfolio?</label>
                <div class="col-sm-10">
                 
                  <div class="radio">
                    <label class="padding-zero">
                      <input type="radio" name="portfolio" @if( $settings->portfolio == '1' ) checked="checked" @endif value="1">
                      Yes
                    </label>
                  </div>
                
                  <div class="radio">
                    <label class="padding-zero">
                      <input type="radio" name="portfolio" @if( $settings->portfolio == '0' ) checked="checked" @endif value="0" checked>
                      No
                    </label>
                  </div>
                </div>
              </div>
            </div>              

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">

                  <div class="input_fields_wrap" id="TextBoxesGroup">
                      <div id="TextBoxDiv1">
                        <label class="col-sm-2 control-label">Question 1</label>
                        <div class="col-sm-10">
                          <div style="padding-bottom:2px"><input type="text" id="question_1" name="question_1" placeholder="Question 1" class="form-control"></div>
                          <div style="padding-bottom:10px"><textarea data-limit="300" rows="5" name="response_1" id="response_1" placeholder="Response 1" class="form-control"></textarea></div>
                        </div>
                      </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="box-footer">
              <a href="{{ url('panel/admin/startups') }}" class="btn btn-default">Cancel</a>
              <button type="submit" class="btn btn-success pull-right">Save</button>
              <?php $count = 2; ?>
              <input type='button' class="btn btn-success pull-right no-shadow" value="Add A Question" id="addButton" style="margin-right:10px">
              <input type='button' class="btn btn-success pull-right no-shadow" value="Remove A Question" id="removeButton" style="margin-right:10px">
            </div>

          </form>
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
  <script src="{{ asset('public/js/style-admin-elements.js') }}"></script>

  <script type="text/javascript">
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

    jQuery(document).ready(function($){
        var counter = "<?php echo $count; ?>";

        //add function
        $("#addButton").click(function () {
          if(counter==15) {
            $("#addButton").prop("disabled",true);
          }

          if(counter>15){
            //alert("Only 15 textboxes allow");
            return false;
          }

          $("#removeButton").prop("disabled",false);

          var newTextBoxDiv = $(document.createElement('div'))
               .attr("id", 'TextBoxDiv' + counter);

          newTextBoxDiv.after().html('<label class="col-sm-2 control-label">Question '+ counter + '</label><div class="col-sm-10"><div style="padding-bottom:2px"><input type="text" name="question_' + counter + '" id="question_' + counter + '" value="" placeholder="Question ' + counter + '" class="form-control" required></div><div style="padding-bottom:10px"><textarea data-limit="300" rows="5" name="response_' + counter + '" id="response_' + counter + '" value="" placeholder="Response ' + counter + '" class="form-control" required></textarea></div></div>');

          newTextBoxDiv.appendTo("#TextBoxesGroup");
          counter++;
        });

       //remove function
       $("#removeButton").click(function () {
        if(counter==2) {
          $("#removeButton").prop("disabled",true);
        }

        if(counter==1){
            //alert("No more textbox to remove");
            return false;
         }

        counter--;
        $("#addButton").prop("disabled",false);
        $("#TextBoxDiv" + counter).remove();
       });

       //get value function
       $("#getButtonValue").click(function () {
        var msg = '';
        for(i=1; i<counter; i++){
            msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();
        }
          //alert(msg);
          $("#addButton").prop("disabled",true);
       });
    });

  </script>

@endsection