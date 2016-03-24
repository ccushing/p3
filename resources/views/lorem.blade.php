
@extends('main')

@section('active-component')

<ul class="nav nav-tabs">
  <li class="active"><a href="#">Lorem Ipsum Generator</a></li>
  <li><a href="/RandomUsers">Random User Generator</a></li>
</ul>


<div class="tab-content clearfix">
    <form method="post" action="/LoremIpsum" id="LoremIpsumGeneratorForm">
    {{ csrf_field() }}
	    <div class="panel-body" id="lorem-body">
	        <p>The Lorem Ipsum generator generates random filler text which mimics actual text you may find on a web page. Options are available which allow you choose the length of the text be selecting a range of paragraphs to include. You may also choose the frequency that header text will appear as well as the frequency that lists will appear.</p>

	        <h4>Options</h4>
	        <div class="panel panel-default" id="lorem-options-panel">

		        <div class="form-group">
		            <label for="paragraph-range">Number of Paragraphs (between 1 and 150)</label>
		            <input id="paragraph-range" name="paragraph-range" type="text" class="span2" value="" data-slider-min="1" data-slider-max="150" data-slider-step="1" data-slider-value="[{{ object_get($loremOptions, "MinParagraphs" ) }},{{ object_get($loremOptions, "MaxParagraphs" ) }}]"/> 
		        </div>

		        <div class="form-group">
		            <label for="header-frequency">Frequency % of Headers to Include Before a Paragraph.</label>
		            <input id="header-frequency" name="header-frequency" type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="{{ object_get($loremOptions, "HeaderFrequency" ) }}"/>
		        </div>

		        <div class="form-group">
		            <label for="list-frequency">Frequency % of Lists to Include.</label>
		            <input id="list-frequency" name="list-frequency" type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="{{ object_get($loremOptions, "ListFrequency" ) }}"/>
		        </div>

		        <div class="form-group">
		            <label for="listitem-range">Number of items in List (between 2 and 50)</label>
		            <input id="listitem-range" name="listitem-range" type="text" class="span2" value="" data-slider-min="2" data-slider-max="50" data-slider-step="1" data-slider-value="[{{ object_get($loremOptions, "MinListItems" ) }},{{ object_get($loremOptions, "MaxListItems" ) }}]"/> 
		        </div>

		    </div>

		    <button class="btn btn-md btn-info" type="submit" id="LoremButton" value="submit">Generate Text</button>


	         @if(count($errors) > 0)
	         <div class="label label-danger" id="lorem-error">
	         <p>There were errors with your request.</p>
			    <ul>
			        @foreach ($errors->all() as $error)
			            <li>{{ $error }}</li>
			        @endforeach
			    </ul>
			 </div>
			@endif
		        
	        <div class="panel panel-default results"><h4>Generated Text</h4>
	          <div class="panel-body" id="LoremResults">

	          {!! $loremResults !!}

	        </div>
		    </div>
	    </div>
    </form>
</div>


@stop

