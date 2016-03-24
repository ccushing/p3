@extends('main')

@section('active-component')

<ul class="nav nav-tabs">
  <li><a href="/LoremIpsum">Lorem Ipsum Generator</a></li>
  <li class="active"><a href="#">Random User Generator</a></li>
</ul>


<div class="tab-content clearfix">

    <form method="post" action="/RandomUsers" id="random-user-generator-form">
    {{ csrf_field() }}
    
        <div class="panel-body" id="user-body">
            <p>The random user generator allows you to generate up to 100 users. The gender slider allows you to determine the approximate percentage of female users will be generated. You also have the option to choose which fields to include for the randomly generated users. The user list can either be displayed on the web page, or, you can choose to download it as a ccs file.</p>
            
            <div class="form-group">
                <label for="max-users">Number of Users (Maximum of 100)</label>            
                <input id="max-users" name="max-users" type="text" data-slider-min="1" data-slider-max="100" data-slider-step="1" data-slider-value="{{ object_get($randomUserOptions, "MaxUsers" ) }}"/><br>

                <label for="percent-female">Percent Female</label>
                Male&nbsp;<input id="percent-female" name="percent-female" type="text" data-slider-min="1" data-slider-max="100" data-slider-step="1" data-slider-value="{{ object_get($randomUserOptions, "PercentFemale" ) }}"/>&nbsp;Female

            </div>

            <h4>Options</h4>
            <div class="panel panel-default">

                <div class="checkbox">
                    <label>
                        <input name="include-image" type="checkbox" {{ object_get($randomUserOptions, "IncludeImage" ) == true ? 'checked' : '' }} value="1">
                        Include Image
                    </label>
                </div>

                <div class="checkbox">
                    <label>
                        <input name="include-name" type="checkbox" {{ object_get($randomUserOptions, "IncludeFullName" ) == true ? 'checked' : '' }} value="1">
                        Include Full Name   
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input name="include-gender" type="checkbox" {{ object_get($randomUserOptions, "IncludeGender" ) == true ? 'checked' : '' }} value="1">
                        Include Gender                                   
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input name="include-address" type="checkbox" {{ object_get($randomUserOptions, "IncludeAddress" ) == true ? 'checked' : '' }} value="1">
                        Include Address   
                    </label>
                </div>

                <div class="checkbox">
                    <label>
                        <input name="include-phone" type="checkbox" {{ object_get($randomUserOptions, "IncludePhone" ) == true ? 'checked' : '' }} value="1">
                        Include Phone Number   
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input name="include-email" type="checkbox" {{ object_get($randomUserOptions, "IncludeEmail" ) == true ? 'checked' : '' }} value="1">
                        Include Email Address   
                    </label>
                </div>

                <div class="checkbox">
                    <label>
                        <input name="include-password" type="checkbox" {{ object_get($randomUserOptions, "IncludePassword" ) == true ? 'checked' : '' }} value="1">
                        Include Password   
                    </label>
                </div>

                <div class="radio-inline">
                  <label><input type="radio" name="opt-display" checked value="HTML">Display as HTML</label>
                </div>

                <div class="radio-inline">
                  <label><input type="radio" name="opt-display" value="CSV">Export as csv</label>
                </div>
            </div>

            
            <button class="btn btn-md btn-info" type="submit" value="submit">Generate Users</button>

             @if(count($errors) > 0)
             <div class="label label-danger" id="user-gen-error">
             <p>There were errors with your request.</p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
             </div>
            @endif

             <div class="panel panel-default results"><h4>Randomly Generated Users</h4>

                @foreach ($randomUsers as $user)
                    <div class="panel-body">
                        @if ($randomUserOptions->IncludeImage == true)
                        <img src="{{ $user->image }}" class="user-image" alt="user picture">
                        @endif

                         <ul class="user-list">
                            @if ($randomUserOptions->IncludeFullName == true)
                              <li><span class="label-default field-name">Name&nbsp;</span><span class="field-value">{{ $user->name }}</span></li>
                            @endif

                            @if ($randomUserOptions->IncludeGender == true)
                              <li><span class="label-default field-name">Gender&nbsp;</span><span class="field-value">{{ $user->gender }}</span></li>
                            @endif

                            @if ($randomUserOptions->IncludeAddress == true)
                              <li><span class="label-default field-name">Address&nbsp;</span><span class="field-value">{{ $user->address }}</span></li>
                            @endif

                            @if ($randomUserOptions->IncludePhone == true)
                              <li><span class="label-default field-name">Phone&nbsp;</span><span class="field-value">{{ $user->telephone }}</span></li>
                            @endif

                            @if ($randomUserOptions->IncludeEmail == true)
                              <li><span class="label-default field-name">Email&nbsp;</span><span class="field-value">{{ $user->email }}</span></li>
                            @endif

                            @if ($randomUserOptions->IncludePassword == true)
                              <li><span class="label-default field-name">Password&nbsp;</span><span class="field-value">{{ $user->password }}</span></li>
                            @endif

                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </form>
</div>

@stop
