@extends('master.dashboard')
@section('title','Web Crawler Panel - URL - Tashbin')
@section('bodyContent')
<!-- page content -->
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>URL <small> Trashbin - Soft deleted website records.</small></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>URL Trashbin 
                        @if ($lastUrl != null)
                            <small>Last created at {{$lastUrl->created_at}}</small>
                        @endif
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" style="display: block;">
                    @if (count($urls) > 0)
                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                    <th class="column-title">UrlID</th>
                                    <th class="column-title">Site Name</th>
                                    <th class="column-title">Url Name</th>
                                    <th class="column-title">Original Url</th>
                                    <th class="column-title">Last Modified</th>
                                    <th class="column-title no-link last"><span class="nobr">Action</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
								<?php $i=0?>
								@foreach ($urls as $url)
                                <tr class="{{$i%2?'even':'odd'}} pointer">
                                    <td class=" ">{{$url->id}}</td>
                                    <td class=" ">{{$url->site()->first()->name}}</td>
                                    <td class=" ">{{$url->name}}</td>
                                    <td class=" ">{{$url->original_url}}</td>
                                    <td class="">{{$url->updated_at}}</td>
                                    <td class=" last">
									    <a class="btn btn-xs btn-danger" href="{{url('/objectives/url/forcedelete/'.$url->id)}}">Delete Forever</a>
                                    </td>
                                </tr>
								<?php $i++?>
								@endforeach
								<?php unset($i) ?>
                            </tbody>
                        </table>
                    </div>
                    @else
    			        <div class="alert alert-success" role="alert">Empty Trashbin.</div>
                    @endif
                </div>
                @if (count ($urls) > 0)
				<center>
					{!! $urls->render() !!}
				</center>
                @endif
            </div>
        </div>
        <br>
    </div>
</div>
<!-- page content -->
@stop
