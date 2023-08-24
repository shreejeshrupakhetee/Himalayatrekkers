@php
    $edit = !is_null($dataTypeContent->getKey());
    $add  = is_null($dataTypeContent->getKey());
@endphp

@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular'))

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular') }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form role="form"
                            class="form-edit-add"
                            action="{{ $edit ? route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) : route('voyager.'.$dataType->slug.'.store') }}"
                            method="POST" enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                        @if($edit)
                            {{ method_field("PUT") }}
                        @endif

                        <!-- CSRF TOKEN -->
                        {{ csrf_field() }}

                        <div class="panel-body">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @php
                            $dataTypeRows = $dataType->{(isset($dataTypeContent->id) ? 'editRows' : 'addRows' )};
                            @endphp
                            {{-- <!-- added -->
                            <div class="form-group">
                                <label class="control-label">Add Itinerary of ?</label> <br>
                                 <label> Region </label>
                                 <input type="radio" name="alOf" value="r" class="itinerary" @if(isset($dataTypeContent->id) &&
                                $dataTypeContent->region_id != 0) checked @endif>
                                <label> Trip </label>
                                <input type="radio" name="alOf" value="t" class="itinerary" @if(isset($dataTypeContent->id) &&
                                $dataTypeContent->trip_id != 0) checked @endif>
                            </div>
                            <!-- end added --> --}}
                            @foreach($dataTypeRows as $row)
                            <!-- GET THE DISPLAY OPTIONS -->
                            @php
                                    $display_options = $row->details->display ?? NULL;
                                    if ($dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')}) {
                                        $dataTypeContent->{$row->field} = $dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')};
                                    }
                                @endphp
                                {{-- @if (isset($row->details->legend) && isset($row->details->legend->text))
                                    <legend class="text-{{ $row->details->legend->align ?? 'center' }}" style="background-color: {{ $row->details->legend->bgcolor ?? '#f0f0f0' }};padding: 5px;">{{ $row->details->legend->text }}</legend>
                                @endif --}}
                                {{-- @if ($options && isset($options->formfields_custom))
                    @include('voyager::formfields.custom.' . $options->formfields_custom)
                    @else --}}
                            @if($row->field == 'additional')

                            @elseif($row->display_name == 'Trip Name')
                            <div class="form-group @if($row->type == 'hidden') hidden @endif @if(isset($display_options->width)){{ 'col-md-' . $display_options->width }}@else{{ '' }}@endif"
                                id="selTrip">
                                {{ $row->slugify }}
                                <label for="name">{{ $row->display_name }}</label>
                                <select class="form-control group_select" name="trip_id" id="tripSel">
                                    <option value="0">Select Trip</option>
                                    @foreach($trips as $t)
                                    @if(isset($dataTypeContent->id))
                                    @if(!isset($t->itinerary) || $dataTypeContent->trip_id == $t->id)
                                    <option value="{{ $t->id }}" {!! $dataTypeContent->trip_id == $t->id ? 'selected="selected"'
                                        : '' !!}>{{ $t->title }}</option>
                                    @endif
                                    @else
                                    @if(!isset($t->itinerary))
                                    <option value="{{ $t->id }}" {!! $dataTypeContent->trip_id == $t->id ? 'selected="selected"'
                                        : '' !!}>{{ $t->title }}</option>
                                    @endif
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            @elseif($row->display_name == 'Region Name')
                            <div class="form-group @if($row->type == 'hidden') hidden @endif @if(isset($display_options->width)){{ 'col-md-' . $display_options->width }}@else{{ '' }}@endif"
                                id="selRegion">
                                {{ $row->slugify }}
                                <label for="name">{{ $row->display_name }}</label>
                                <select class="form-control group_select" name="region_id" id="regionSel">
                                    <option value="0">Select Region</option>
                                    @foreach($regions as $r)
                                    @if(isset($dataTypeContent->id))
                                    @if(!isset($r->itinerary) || $dataTypeContent->region_id == $r->id)
                                    <option value="{{ $r->id }}" {!! $dataTypeContent->region_id == $r->id ?
                                        'selected="selected"' : '' !!}>{{ $r->title }}</option>
                                    @endif
                                    @else
                                    @if(!isset($r->itinerary))
                                    <option value="{{ $r->id }}" {!! $dataTypeContent->region_id == $r->id ?
                                        'selected="selected"' : '' !!}>{{ $r->title }}</option>
                                    @endif
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            @elseif($row->field == 'detail')
                            <label for="name">{{ $row->display_name }}</label>
                            <!-- first -->
                            <div class="col-md-11">
                                <div class="form-group">
                                    <label class="control-label">Add  Itinerary Detail</label>
                                    <input type="checkbox" name="check" id="detailIti" value="0">
                                </div>
                            </div>
                            <!-- second -->
                            @if(!empty($dataTypeContent->detail)>0)
                            @php
                            $abc = json_decode($dataTypeContent->detail);
                            // dd($abc);
                            @endphp

                            @foreach($abc as $key=>$v)
                            <div class="newDetailBlock2" style="clear: both;">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label bg-primary">Day</label>
                                        <input type="text" name="day[]" class="form-control"
                                            value="@if(!empty($v->day)){{$v->day}}@else {{$key+1}}@endif">
                                    </div>
                                </div>
                                <div class="col-md-12" id="title">
                                    <div class="form-group">
                                        <label class="control-label bg-success ">Title</label>
                                        <div class="mt-2"></div>
                                        <input type="text" name="title[]" class="mt-1 form-control" value="{{$v->title}}">
                                    </div>
                                </div>
                                <div class="col-md-12" id="content">
                                    <div class="form-group">
                                        <label class="control-label">Content</label>
                                        <textarea name="content[]" class="form-control editor">{{$v->content}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-4" id="content">
                                  <div class="form-group">
                                    <label class="control-label">Altitude</label>
                                    <input type="text" name="altitude[]" class="form-control" value="{{isset($v->altitude)?$v->altitude:''}}">
                                </div>
                              </div>
                                <div class="col-md-4" id="content">
                                  <div class="form-group">
                                    <label class="control-label">Time</label>
                                    <input type="text" name="time[]" class="form-control" value="{{isset($v->time)?$v->time:''}}">
                                </div>
                              </div>
                                <div class="col-md-4" id="content">
                                  <div class="form-group">
                                    <label class="control-label">Meals</label>
                                    <input type="text" name="meal[]" class="form-control" value="{{isset($v->meal)?$v->meal:''}}">
                                </div>
                              </div>
                                <div class="col-md-4" id="content">
                                  <div class="form-group">
                                    <label class="control-label">Accomodation</label>
                                    <input type="text" name="acco[]" class="form-control" value="{{isset($v->acco)?$v->acco:''}}">
                                </div>
                              </div>
                                <div class="col-md-4" id="content">
                                  <div class="form-group">
                                    <label class="control-label">Icon</label>
                                    {{-- <input type="text" name="acco[]" class="form-control" value="{{isset($v->acco)?$v->acco:''}}"> --}}
                                    <select class="form-control" name="icon[]" id="">
                                        @if ($v->icon == 0)
                                        <option selected value="0">Select Icon</option>
                                        @else
                                        <option value="0">Select Icon</option>
                                        @endif

                                        @if ($v->icon == 1)
                                        <option selected value="1">Plane</option>
                                        @else
                                        <option value="1">Plane</option>
                                        @endif

                                        @if ($v->icon == 2)
                                        <option selected value="2">Car</option>
                                        @else
                                        <option value="2">Car</option>
                                        @endif

                                        @if ($v->icon == 3)
                                        <option selected value="3">Bus</option>
                                        @else
                                        <option value="3">Bus</option>
                                        @endif

                                        @if ($v->icon == 4)
                                        <option selected value="4">Trek</option>
                                        @else
                                        <option value="4">Trek</option>
                                        @endif

                                        @if ($v->icon == 5)
                                        <option selected value="5">Helicopter</option>
                                        @else
                                        <option value="5">Helicopter</option>
                                        @endif

                                        @if ($v->icon == 6)
                                        <option selected value="6">Expedition</option>
                                        @else
                                        <option value="6">Expedition</option>
                                        @endif
                                        @if ($v->icon == 7)
                                        <option selected value="7">Camping</option>
                                        @else
                                        <option value="7">Camping</option>
                                        @endif
                                    </select>
                                </div>
                              </div>
                            <div class="forRemove2 col-md-2"></div>
                            @endforeach
                            @endif
                            <!-- third -->
                            <div class="myBlock2" style="display:none;">
                                <div class="newDetailBlock2" style="clear: both;">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="control-label">Day</label>
                                            <input type="text" name="day[]" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Title</label>
                                            <input type="text" name="title[]" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Content</label>
                                            <textarea name="content[]" class="form-control editor"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Altitude</label>
                                            {{-- <textarea name="facility[]" class="form-control "></textarea> --}}
                                            <input type="text" class="form-control" name="altitude[]" id="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Time</label>
                                            <input class="form-control" type="text" name="time[]" id="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Meals</label>
                                            <input class="form-control"  type="text" name="meal[]" id="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Acco</label>
                                            <input class="form-control" type="text" name="acco[]" id="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Icon</label>
                                <select class="form-control" name="icon[]" id="">
                                    <option selected value="0">Select Icon</option>
                                    <option value="1">Plane</option>
                                    <option value="2">Car</option>
                                    <option value="3">Bus</option>
                                    <option value="4">Trek</option>
                                    <option value="5">Helicopter</option>
                                    <option value="6">Expedition</option>
                                </select>

                                        </div>
                                    </div>
                                    <div class="forRemove2 col-md-2"></div>
                                </div>
                            </div>
                            <div class="utsav2"></div>
                            <div style="clear: both;"></div>
                            <!-- fourth -->
                            <div class="col-md-2 myAdd2" style="display:none">
                                <div class="form-group">
                                    <!-- <label class="control-label"></label> -->
                                    <a href="#" class="form-control btn btn-success addNewInfo2"><i class="entypo-plus"></i>Add
                                        New</a>
                                </div>
                            </div>
                            <div style="clear: both;"></div>

                            @elseif($row->field == 'equipment')
                            <label for="name"
                                style="float: left;display: block; width: 100%;margin: 15px 0 15px 15px;"><b>{{ $row->display_name }}</b></label>
                            <!-- first -->
                            <div class="col-md-11">
                                <div class="form-group">
                                    <label class="control-label">Add More Equipments /
                                        Safety</label>
                                    <input type="checkbox" name="check" id="equipment" value="0">
                                </div>
                            </div>
                            <!-- second -->
                            @if(!empty($dataTypeContent->equipment)>0)
                            @php
                            $abc = json_decode($dataTypeContent->equipment);
                            @endphp
                            @foreach($abc as $v)
                            <div class="newDetailBlock9" style="clear: both;">
                                <div class="col-md-12" id="title">
                                    <div class="form-group">
                                        <label class="control-label">Title</label>
                                        <input type="text" name="eqi_title[]" class="form-control" value="{{$v->eqi_title}}">
                                    </div>
                                </div>
                                <div class="col-md-3" id="content">
                                    <div class="form-group">
                                        <label class="control-label">Icon</label>
                                        <select name="eqi_facility[]" class="form-control">
                                            <option value="ballon" @if($v->eqi_facility=='ballon') selected @endif >
                                                Ballon
                                            </option>
                                            <option value="shirt" @if($v->eqi_facility=='shirt') selected @endif>
                                                Shirt
                                            </option>
                                            <option value="jeans" @if($v->eqi_facility=='jeans') selected @endif>
                                                Jeans
                                            </option>
                                            <option value="tool" @if($v->eqi_facility=='tool') selected @endif>
                                                Tool
                                            </option>
                                            <option value="shoe" @if($v->eqi_facility=='shoe') selected @endif>
                                                Shoe
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4" id="content">
                                    <div class="form-group">
                                        <label class="control-label">Content</label>
                                        <textarea name="eqi_content[]"
                                            class="form-control editor">{{$v->eqi_content}}</textarea>
                                    </div>
                                </div>
                                <div class="forRemove9 col-md-2"></div>
                            </div>
                            @endforeach
                            @endif
                            <!-- third -->
                            <div class="myBlock9" style="display:none;">
                                <div class="newDetailBlock9" style="clear: both;">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Title</label>
                                            <input type="text" name="eqi_title[]" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Facility</label>
                                            <select name="eqi_facility[]" class="form-control">
                                                <option value="ballon">Ballon</option>
                                                <option value="shirt">Shirt</option>
                                                <option value="jeans">Jeans</option>
                                                <option value="tool">Tool</option>
                                                <option value="shoe">Shoe</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Content</label>
                                            <textarea name="eqi_content[]" class="form-control editor"></textarea>
                                        </div>
                                    </div>
                                    <div class="forRemove9 col-md-2"></div>
                                </div>
                            </div>
                            <div class="utsav9"></div>
                            <div style="clear: both;"></div>
                            <!-- fourth -->
                            <div class="col-md-2 myAdd9" style="display:none">
                                <div class="form-group">
                                    <!-- <label class="control-label"></label> -->
                                    <a href="#" class="form-control btn btn-success addNewInfo9"><i class="entypo-plus"></i>Add
                                        New</a>
                                </div>
                            </div>
                            <div style="clear: both;"></div>

                            @elseif($row->field == 'faqs')
                            <label for="name">{{ $row->display_name }}</label>
                            <!-- first -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Add More Faqs</label>
                                    <input type="checkbox" name="check" id="faqs" value="0">
                                </div>
                            </div>
                            <!-- second -->
                            @if(!empty($dataTypeContent->faqs)>0)
                            @php
                            $abc = json_decode($dataTypeContent->faqs);
                            @endphp
                            @foreach($abc as $k=>$v)
                            <div class="newDetailBlock3" style="clear: both;">
                                <div class="col-md-5" id="title">
                                    <div class="form-group">
                                        <label class="control-label">Question</label>
                                        <input type="text" name="question[]" class="form-control" value="{{$v->question}}">
                                    </div>
                                </div>
                                <div class="col-md-5" id="content">
                                    <div class="form-group">
                                        <label class="control-label">Answer</label>
                                        <!-- <div class="editor"></div> -->
                                        <textarea name="answer[]" class="form-control editor">{{$v->answer}}</textarea>
                                    </div>
                                </div>
                                <div class="forRemove3 col-md-2"></div>
                            </div>
                            @endforeach
                            @endif
                            <!-- third -->
                            <div class="myBlock3" style="display: none;">
                                <div class="newDetailBlock3" style="clear: both;">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="control-label">Question</label>
                                            <input type="text" name="question[]" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="control-label">Answer</label>
                                            <!-- <div class="editor"></div> -->
                                            <textarea name="answer[]" class="form-control editor"></textarea>
                                        </div>
                                    </div>
                                    <div class="forRemove3 col-md-2"></div>
                                </div>
                            </div>
                            <div class="utsav3"></div>
                            <div style="clear: both;"></div>
                            <!-- fourth -->
                            <div class="col-md-2 myAdd3" style="display:none">
                                <div class="form-group">
                                    <!-- <label class="control-label"></label> -->
                                    <a href="#" class="form-control btn btn-success addNewInfo3"><i class="entypo-plus"></i>Add
                                        New</a>
                                </div>
                            </div>
                            <div style="clear: both;"></div>



                            {{-- morecontent --}}
                            @elseif($row->field == 'morecontent')
                            <label for="name">{{ $row->display_name }}</label>
                            <!-- first -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Add More Content</label>
                                    <input type="checkbox" name="check" id="morecontent" value="0">
                                </div>
                            </div>
                            <!-- second -->
                            @if(!empty($dataTypeContent->morecontent)>0)
                            @php
                            $abc = json_decode($dataTypeContent->morecontent);
                            @endphp
                            @foreach($abc as $k=>$v)
                            <div class="newDetailBlock9" style="clear: both;">
                                <div class="col-md-5" id="title">
                                    <div class="form-group">
                                        <label class="control-label">Key
                                            Name</label>
                                        <input type="text" name="key[]" class="form-control" value="{{isset($v->key)?$v->key:''}}">
                                    </div>
                                </div>
                                <div class="col-md-5" id="content">
                                    <div class="form-group">
                                        <label class="control-label">Value</label>
                                        <textarea name="value[]" class="form-control editor">{{$v->content}}</textarea>
                                    </div>
                                </div>
                                <div class="forRemove9 col-md-2"></div>
                            </div>
                            @endforeach
                            @endif
                            <!-- third -->
                            <div class="myBlock9" style="display:none;">
                                <div class="newDetailBlock9" style="clear: both;">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="control-label">Key Name </label>
                                            <input type="text" name="key[]" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="control-label">Content</label>
                                            <textarea name="value[]" class="form-control editor"></textarea>
                                        </div>
                                    </div>
                                    <div class="forRemove9 col-md-2"></div>
                                </div>
                            </div>
                            <div class="utsav9"></div>
                            <div style="clear: both;"></div>
                            <!-- fourth -->
                            <div class="col-md-2 myAdd9" style="display:none">
                                <div class="form-group">
                                    <!-- <label class="control-label"></label> -->
                                    <a href="#" class="form-control btn btn-success addNewInfo9"><i class="entypo-plus"></i>Add
                                        New</a>
                                </div>
                            </div>
                            <div style="clear: both;"></div>



                            {{-- endmoreconent --}}



                            @elseif($row->field == 'group_discount')
                            <label for="name">{{ $row->display_name }}</label>
                            <!-- first -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Add Group Discounts</label>
                                    <input type="checkbox" name="check" id="discount" value="0">
                                </div>
                            </div>
                            <!-- second -->
                            @if(!empty($dataTypeContent->group_discount)>0)
                            @php
                            $abc = json_decode($dataTypeContent->group_discount);
                            @endphp
                            @foreach($abc as $k=>$v)
                            <div class="newDetailBlock4" style="clear: both;">
                                <div class="col-md-5" id="title">
                                    <div class="form-group">
                                        <label class="control-label">Group
                                            Size</label>
                                        <input type="text" name="group[]" class="form-control" value="{{$k}}">
                                    </div>
                                </div>
                                <div class="col-md-5" id="content">
                                    <div class="form-group">
                                        <label class="control-label">Price</label>
                                        <input type="text" name="price[]" class="form-control" value="{{$v}}">
                                    </div>
                                </div>
                                <div class="forRemove4 col-md-2"></div>
                            </div>
                            @endforeach
                            @endif
                            <!-- third -->
                            <div class="myBlock4" style="display:none;">
                                <div class="newDetailBlock4" style="clear: both;">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="control-label">Group Size</label>
                                            <input type="text" name="group[]" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="control-label">Price</label>
                                            <input type="text" name="price[]" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="forRemove4 col-md-2"></div>
                                </div>
                            </div>
                            <div class="utsav4"></div>
                            <div style="clear: both;"></div>
                            <!-- fourth -->
                            <div class="col-md-2 myAdd4" style="display:none">
                                <div class="form-group">
                                    <!-- <label class="control-label"></label> -->
                                    <a href="#" class="form-control btn btn-success addNewInfo4"><i class="entypo-plus"></i>Add
                                        New</a>
                                </div>
                            </div>
                            <div style="clear: both;"></div>

                            @else
                            <div class="form-group @if($row->type == 'hidden') hidden @endif @if(isset($display_options->width)){{ 'col-md-' . $display_options->width }}@else{{ '' }}@endif"
                                @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                {{ $row->slugify }}
                                <label for="name">{{ $row->display_name }}</label>
                                @include('voyager::multilingual.input-hidden-bread-edit-add')
                                @if($row->type == 'relationship')
                                @include('voyager::formfields.relationship')
                                @else
                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                @endif

                                @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                @endforeach
                            </div>
                            @endif
                            {{-- @endif --}}
                            @endforeach

                            <!-- added for key value -->
                            <!-- first -->
                            {{-- <div class="col-md-11">
                                <div class="form-group">
                                    <label class="control-label">Add Trip Highlights</label>
                                    <input type="checkbox" name="check" id="extraInfo" value="0">
                                    </textarea>
                                </div>
                            </div> --}}
                            <!-- second -->
                            @if(!empty($dataTypeContent->additionala)>0)
                            @php
                            $abc = json_decode($dataTypeContent->additionala)
                            @endphp
                            @foreach($abc as $k=>$v)
                            <div class="newDetailBlock" style="">
                                <div class="col-md-5" id="key">
                                    <div class="form-group">
                                        <label class="control-label">Key</label>
                                        <input type="text" name="key[]" class="form-control highlightKey" value="{{$k}}">
                                        <span class="iconDiv" style="display: none; padding: 15px; border: 1px solid #e4eaec;">
                                            <a href="" class="icn" name="shape"><img src="{{asset('images/shape.png')}}"></a>
                                            <a href="" class="icn" name="mountain"><img
                                                    src="{{asset('images/mountain.png')}}"></a>
                                            <a href="" class="icn" name="airline"><img
                                                    src="{{asset('images/airline.png')}}"></a>
                                            <a href="" class="icn" name="plane"><img src="{{asset('images/plane.png')}}"></a>
                                            <a href="" class="icn" name="map"><img src="{{asset('images/map.png')}}"></a>
                                            <a href="" class="icn" name="sun"><img src="{{asset('images/sun.png')}}"></a>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-5" id="value">
                                    <div class="form-group">
                                        <label class="control-label">Value</label>
                                        <input type="text" name="value[]" class="form-control" value="{{$v}}">
                                    </div>
                                </div>
                                <div class="forRemove"></div>
                            </div>
                            <div style="clear: both;"></div>
                            @endforeach
                            @endif
                            <!-- third -->
                            <div class="row myBlock" style="display:none;">
                                <div class="newDetailBlock" style="">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="control-label">Key</label>
                                            <input type="text" name="key[]" class="form-control highlightKey" value="">
                                            <span class="iconDiv"
                                                style="display: none; padding: 15px; border: 1px solid #e4eaec;">
                                                <a href="" class="icn" name="shape"><img
                                                        src="{{asset('images/shape.png')}}"></a>
                                                <a href="" class="icn" name="mountain"><img
                                                        src="{{asset('images/mountain.png')}}"></a>
                                                <a href="" class="icn" name="airline"><img
                                                        src="{{asset('images/airline.png')}}"></a>
                                                <a href="" class="icn" name="plane"><img
                                                        src="{{asset('images/plane.png')}}"></a>
                                                <a href="" class="icn" name="map"><img src="{{asset('images/map.png')}}"></a>
                                                <a href="" class="icn" name="sun"><img src="{{asset('images/sun.png')}}"></a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="control-label">Value</label>
                                            <input type="text" name="value[]" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="forRemove"></div>
                                </div>
                                <div style="clear: both;"></div>
                            </div>
                            <div style="clear: both;"></div>
                            <div class="utsav"></div>
                            <!-- fourth -->
                            <div class="col-md-2 myAdd" style="display:none;">
                                <div class="form-group">

                                    <label class="control-label"></label>
                                    <a href="#" class="form-control btn btn-green addNewInfo"><i class="entypo-plus"></i>Add
                                        New</a>
                                </div>
                            </div>
                            <div style="clear: both;"></div>
                        </div><!-- panel-body -->

                        <div class="panel-footer">
                            @section('submit-buttons')
                                <button type="submit" class="btn btn-primary save">{{ __('voyager::generic.save') }}</button>
                            @stop
                            @yield('submit-buttons')
                        </div>
                    </form>

                    <iframe id="form_target" name="form_target" style="display:none"></iframe>
                    <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
                            enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                        <input name="image" id="upload_file" type="file"
                                 onchange="$('#my_form').submit();this.value='';">
                        <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
                        {{ csrf_field() }}
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}</h4>
                </div>

                <div class="modal-body">
                    <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="button" class="btn btn-danger" id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete File Modal -->
@stop

@section('javascript')
    <script>
        var params = {};
        var $file;

        function deleteHandler(tag, isMulti) {
          return function() {
            $file = $(this).siblings(tag);

            params = {
                slug:   '{{ $dataType->slug }}',
                filename:  $file.data('file-name'),
                id:     $file.data('id'),
                field:  $file.parent().data('field-name'),
                multi: isMulti,
                _token: '{{ csrf_token() }}'
            }

            $('.confirm_delete_name').text(params.filename);
            $('#confirm_delete_modal').modal('show');
          };
        }

        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();

            //Init datepicker for date fields if data-datepicker attribute defined
            //or if browser does not handle date inputs
            $('.form-group input[type=date]').each(function (idx, elt) {
                if (elt.hasAttribute('data-datepicker')) {
                    elt.type = 'text';
                    $(elt).datetimepicker($(elt).data('datepicker'));
                } else if (elt.type != 'date') {
                    elt.type = 'text';
                    $(elt).datetimepicker({
                        format: 'L',
                        extraFormats: [ 'YYYY-MM-DD' ]
                    }).datetimepicker($(elt).data('datepicker'));
                }
            });

            @if ($isModelTranslatable)
                $('.side-body').multilingual({"editing": true});
            @endif

            $('.side-body input[data-slug-origin]').each(function(i, el) {
                $(el).slugify();
            });

            $('.form-group').on('click', '.remove-multi-image', deleteHandler('img', true));
            $('.form-group').on('click', '.remove-single-image', deleteHandler('img', false));
            $('.form-group').on('click', '.remove-multi-file', deleteHandler('a', true));
            $('.form-group').on('click', '.remove-single-file', deleteHandler('a', false));

            $('#confirm_delete').on('click', function(){
                $.post('{{ route('voyager.'.$dataType->slug.'.media.remove') }}', params, function (response) {
                    if ( response
                        && response.data
                        && response.data.status
                        && response.data.status == 200 ) {

                        toastr.success(response.data.message);
                        $file.parent().fadeOut(300, function() { $(this).remove(); })
                    } else {
                        toastr.error("Error removing file.");
                    }
                });

                $('#confirm_delete_modal').modal('hide');
            });
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <!-- added -->
{{-- <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script> --}}
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
{{-- <script src="/js/ckeditor.js"></script> --}}
@include('ckfinder::setup')
<script type="text/javascript">
    $(document).ready(function () {
            $("#selTrip").show();
            // $("#selRegion").hide();
            var v = 't';
            // if (v == 't') {
            //     $("#selTrip").show();
            // }
            // if (v == 'r') {
            //     $("#selRegion").show();
            // }
            // for trip or region
            $(".itinerary").on("change", function () {
                // var option = $("form input[type='radio']:checked").val();
                // if (option == 'r') {
                //     // $("#selTrip option:selected").removeAttr("selected");
                //     $("#selRegion").show();
                //     $("#selTrip").hide();
                //     $("#regionSel").change(function () {
                //         if ($("#regionSel").val() != 0) {
                //             $('#tripSel option:contains("Select Trip")').prop('selected', true);
                //         }
                //     });
                // }
                var option = 't';
                if (option == 't') {
                    // $("#selRegion option:selected").removeAttr("selected");
                    $("#selTrip").show();
                    // $("#selRegion").hide();
                    $("#tripSel").change(function () {
                        if ($("#tripSel").val() != 0) {
                            $('#regionSel option:contains("Select Region")').prop('selected', true);
                        }
                    });
                }
            });


            // first
            $("#extraInfo").change(function () {
                if (this.checked) {
                    $(".myAdd").show();
                } else {
                    $(".myAdd").hide();
                }
            });
            // second
            var maxInputs = 20;
            var inputWrapper = $(".myBlock");
            //var addButton = $(".addNewActivity");
            var x = inputWrapper.length;
            var fieldCount = 1;
            $(document).on('click', 'a.addNewInfo', function (e) {

                if (x < maxInputs) {
                    fieldCount++;
                    var row = $(".myBlock").html();
                    var remove = '<div class = "col-md-2" >' +
                        '<div class = "form-group" >' +
                        '<label class = "control-label" for = "activity_date" >&nbsp;</label>' +
                        '<a href="#" class = "form-control btn-red test" style="background-color:red;color:#fff;"><i class="entypo-minus"> </i>Remove</a>' +
                        '</div></div>';
                    $(".utsav").append(row);
                    $(".forRemove").html(remove);
                    x++;
                    $(".test").click(function () {
                        $(this).closest('.newDetailBlock').remove();
                        return false;
                    });
                }
                return false;
            }); // end of click function

            // for itinerary
            // first
            $("#detailIti").change(function () {
                if (this.checked) {
                    $(".myAdd2").show();
                } else {
                    $(".myAdd2").hide();
                }
            });
            // second
            var maxInputs = 50;
            var inputWrapper = $(".myBlock2");
            //var addButton = $(".addNewActivity");
            var x = inputWrapper.length;
            var fieldCount = 1;
            $(document).on('click', 'a.addNewInfo2', function (e) {

                if (x < maxInputs) {
                    fieldCount++;
                    var row2 = $(".myBlock2").html();
                    var remove2 = '<div class = "form-group" >' +
                        '<label class = "control-label" for = "activity_date" >&nbsp;</label>' +
                        '<a href="#" class = "form-control btn-red test2" style="background-color:red;color:#fff;"><i class="entypo-minus"> </i>Remove</a>' +
                        '</div>';
                    $(".utsav2").append(row2);
                    $(".forRemove2").html(remove2);
                    x++;
                    $(".test2").click(function () {
                        $(this).closest('.newDetailBlock2').remove();
                        return false;
                    });
                }
                ck();
                return false;
            }); // end of click function

            // for icon select
            $(document).on('click', '.highlightKey', function (e) {
                e.preventDefault();
                $(this).parent().find('.iconDiv').slideToggle(function () {
                    $(this).css('display', 'block');
                    $(this).find('.icn').css({'padding': '10px', 'display': 'inline-block'});
                });
                $('.icn').click(function (f) {
                    var val1 = $(this).attr('name');
                    $(this).parent().parent().find('.highlightKey').val(val1);
                    $(this).parent().hide();
                    f.preventDefault();
                    return false;
                });
            });

            // for equipment
            // first
            // $("#equipment").change(function () {
            //     if (this.checked) {
            //         $(".myAdd9").show();
            //     } else {
            //         $(".myAdd9").hide();
            //     }
            // });
            // // second
            // var maxInputs = 30;
            // var inputWrapper = $(".myBlock9");
            // //var addButton = $(".addNewActivity");
            // var x = inputWrapper.length;
            // var fieldCount = 1;
            // $(document).on('click', 'a.addNewInfo9', function (e) {

            //     if (x < maxInputs) {
            //         fieldCount++;
            //         var row9 = $(".myBlock9").html();
            //         var remove9 = '<div class = "form-group" >' +
            //             '<label class = "control-label" for = "activity_date" >&nbsp;</label>' +
            //             '<a href="#" class = "form-control btn-red test9" style="background-color:red;color:#fff;"><i class="entypo-minus"> </i>Remove</a>' +
            //             '</div>';
            //         $(".utsav9").append(row9);
            //         $(".forRemove9").html(remove9);
            //         x++;
            //         $(".test9").click(function () {
            //             $(this).closest('.newDetailBlock9').remove();
            //             return false;
            //         });
            //     }
            //     ck();
            //     return false;
            // }); // end of click function

            // for Faqs
            // first
            $("#faqs").change(function () {
                if (this.checked) {
                    $(".myAdd3").show();
                } else {
                    $(".myAdd3").hide();
                }
            });
            // second
            var maxInputs = 50;
            var inputWrapper = $(".myBlock3");
            //var addButton = $(".addNewActivity");
            var x = inputWrapper.length;
            var fieldCount = 1;
            $(document).on('click', 'a.addNewInfo3', function (e) {

                if (x < maxInputs) {
                    fieldCount++;
                    var row3 = $(".myBlock3").html();
                    var remove3 = '<div class = "form-group" >' +
                        '<label class = "control-label" for = "activity_date" >&nbsp;</label>' +
                        '<a href="#" class = "form-control btn-red test3" style="background-color:red;color:#fff;"><i class="entypo-minus"> </i>Remove</a>' +
                        '</div>';
                    $(".utsav3").append(row3);
                    $(".forRemove3").html(remove3);
                    x++;
                    $(".test3").click(function () {
                        $(this).closest('.newDetailBlock3').remove();
                        return false;
                    });
                }
                ck();
                return false;
            }); // end of click function

             // for Additional
            // first
            $("#morecontent").change(function () {
                if (this.checked) {
                    $(".myAdd9").show();
                } else {
                    $(".myAdd9").hide();
                }
            });
            // second
            var maxInputs = 50;
            var inputWrapper = $(".myBlock9");
            //var addButton = $(".addNewActivity");
            var x = inputWrapper.length;
            var fieldCount = 1;
            $(document).on('click', 'a.addNewInfo9', function (e) {

                if (x < maxInputs) {
                    fieldCount++;
                    var row9 = $(".myBlock9").html();
                    var remove9 = '<div class = "form-group" >' +
                        '<label class = "control-label" for = "activity_date" >&nbsp;</label>' +
                        '<a href="#" class = "form-control btn-red test9" style="background-color:red;color:#fff;"><i class="entypo-minus"> </i>Remove</a>' +
                        '</div>';
                    $(".utsav9").append(row9);
                    $(".forRemove9").html(remove9);
                    x++;
                    $(".test9").click(function () {
                        $(this).closest('.newDetailBlock9').remove();
                        return false;
                    });
                }
                ck();
                return false;
            }); // end of click morecontent function






            // for discounts
            // first
            $("#discount").change(function () {
                if (this.checked) {
                    $(".myAdd4").show();
                } else {
                    $(".myAdd4").hide();
                }
            });
            // second
            var maxInputs = 50;
            var inputWrapper = $(".myBlock4");
            //var addButton = $(".addNewActivity");
            var x = inputWrapper.length;
            var fieldCount = 1;
            $(document).on('click', 'a.addNewInfo4', function (e) {

                if (x < maxInputs) {
                    fieldCount++;
                    var row4 = $(".myBlock4").html();
                    var remove4 = '<div class = "form-group" >' +
                        '<label class = "control-label" for = "activity_date" >&nbsp;</label>' +
                        '<a href="#" class = "form-control btn-red test4" style="background-color:red;color:#fff;"><i class="entypo-minus"> </i>Remove</a>' +
                        '</div>';
                    $(".utsav4").append(row4);
                    $(".forRemove4").html(remove4);
                    x++;
                    $(".test4").click(function () {
                        $(this).closest('.newDetailBlock4').remove();
                        return false;
                    });
                }
                return false;
            }); // end of click function

        });  //end of ready function
</script>

<script>
    function ck() {
            var elements = $('.editor:visible:not(.added)');
            elements.each(function () {
                // let theEditor;
                ClassicEditor
                    .create(this, {
                        ckfinder: {
        uploadUrl: '/ckfinder/connector',
    },

                        toolbar: {
					items: [
                        'ckfinder',
						'heading',
						'|',
						'bold',
						'italic',
						'link',
						'bulletedList',
						'numberedList',
						'|',
						'outdent',
						'indent',
						'|',
						'blockQuote',
						'insertTable',
						'mediaEmbed',
						'undo',
						'redo',
						'codeBlock',
						'htmlEmbed',
						'code'
					]
				},
				language: 'en',
				image: {
					toolbar: [
						'imageTextAlternative'
					]
				},
				table: {
					contentToolbar: [
						'tableColumn',
						'tableRow',
						'mergeTableCells'
					]
				},
				licenseKey: '',


			} )
                    // .then( editor => {
                    //     console.log('hy',editor);
                    //     // theEditor = editor;
                    // })
                    .catch(error => {
                        console.error(error);
                    });

            }).addClass('added');
        }

        ck();
</script>
@stop
