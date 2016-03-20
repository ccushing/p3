
@extends('main')


@section('active-component')

<ul class="nav nav-tabs">
  <li class="active"><a href="#">Lorem Ipsum Generator</a></li>
  <li><a href="/RandomUsers">Random User Generator</a></li>
</ul>


                                <div class="tab-content clearfix">
                                    <form method="post" action="/LoremIpsum" id="LoremIpsumGeneratorForm">
                                    {{ csrf_field() }}
                                    <div class="panel-body" id="LoremBody">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in nunc finibus, mattis risus at, porttitor neque. Suspendisse odio elit, congue id fermentum at, tristique et urna.</p>

                                        <h4>Options</h4>
                                        <div class="panel panel-default" id="LoremOptionsPanel">

                                        <div class="form-group">
                                            <label for="MaxParagraphs">Number of Paragraphs (between 1 and 150)</label>
                                            <input id="MaxParagraphs" name="MaxParagraphs" type="text" class="span2" value="" data-slider-min="1" data-slider-max="150" data-slider-step="1" data-slider-value="[{{ object_get($loremOptions, "MinParagraphs" ) }},{{ object_get($loremOptions, "MaxParagraphs" ) }}]"/> 
                                        </div>

                                        <div class="form-group">
                                            <label for="IncludeHeaders">Frequency % of Headers to Include Before a Paragraph.</label>
                                            <input id="IncludeHeaders" name="IncludeHeaders" type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="{{ object_get($loremOptions, "HeaderFrequency" ) }}"/>
                                        </div>

                                        <div class="form-group">
                                            <label for="IncludeLists">Frequency % of Lists to Include.</label>
                                            <input id="IncludeLists" name="IncludeLists" type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="{{ object_get($loremOptions, "ListFrequency" ) }}"/>
                                        </div>

                                        <div class="form-group">
                                            <label for="MaxListItems">Number of items in List (between 2 and 50)</label>
                                            <input id="MaxListItems" name="MaxListItems" type="text" class="span2" value="" data-slider-min="2" data-slider-max="50" data-slider-step="1" data-slider-value="[{{ object_get($loremOptions, "MinListItems" ) }},{{ object_get($loremOptions, "MaxListItems" ) }}]"/> 
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
                                          <p>
                                          {!! $loremResults !!}
                                          </p>
                                          </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>


@stop

