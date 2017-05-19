<?php $settings = App\Models\AdminSettings::first(); 
$documents = $data->documents()->orderBy('id','desc')->paginate(20);
?>
@extends('app')

@section('title')Edit Documents - @endsection

@section('content')
@include('includes.startup-dashboard')
<h1 class="margin-bottom-40">Documents<span><a href="{{ url('edit/startup/documents/add',$data->id) }}" class="btn pull-right text-center btn-save custom-rounded">Add New</a></span></h1>

<div class="margin-top-40">
  <div class="table-responsive">
    <table class="table"> 
      <thead> 
        <tr>
          <th>Document</th>
          <th>Filename</th>
          <th>Delete</th>
        </tr>
      </thead> 

      <tbody> 
        @foreach( $documents as $document )
        <tr>
          <td>
            @if ($document->type == 'pdf' )
            <img src="{{ asset('public/img/pdf.png') }}" class="startup-file"/>
            @elseif ($document->type == 'xls' || $document->type == 'xlsx')
            <img src="{{ asset('public/img/xls.png') }}" class="startup-file"/>
            @endif
          </td>
          <td><a class="filename" target="_blank" href="{{url('public/startups/documents',$document->path)}}">{{$document->filename}}.{{$document->type}}</a></td>
          <td> <a href="{{ url('edit/startup/documents/delete/').'/'.$document->id }}" class="btn btn-danger actionDelete">Delete
          </a></td>
        </tr>
        @endforeach           
      </tbody> 
    </table>
  </div>
</div>

@include('includes.dashboard-end')

@endsection
