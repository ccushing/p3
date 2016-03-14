

<div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title" id="LoremIpsumHeader">Lorem Ipsum Generator
                                <a data-toggle="collapse" data-target="#LoremBody" href="#LoremIpsumHeader"><span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-down"></i></span></a>
                                        </h3>
                                    </div>
                                    <form method="post" action="/LoremIpsum" id="LoremIpsumGeneratorForm">
                                    <div class="panel-body" id="LoremBody">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in nunc finibus, mattis risus at, porttitor neque. Suspendisse odio elit, congue id fermentum at, tristique et urna.</p>

                                        <h4>Options</h4>
                                        <div class="panel panel-default" id="LoremOptionsPanel">

                                        <div class="form-group">
                                            <label for="MaxParagraphs">Number of Paragraphs (between 1 and 150)</label>
                                            <input id="MaxParagraphs" name="MaxParagraphs" type="text" class="span2" value="" data-slider-min="1" data-slider-max="150" data-slider-step="1" data-slider-value="[20,50]"/> 
                                        </div>

                                        <div class="form-group">
                                            <label for="IncludeHeaders">Frequency % of Headers to Include Before a Paragraph.</label>
                                            <input id="IncludeHeaders" name="IncludeHeaders" type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="20"/>
                                        </div>

                                        <div class="form-group">
                                            <label for="IncludeLists">Frequency % of Lists to Include.</label>
                                            <input id="IncludeLists" name="IncludeLists" type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="15"/>
                                        </div>

                                        <div class="form-group">
                                            <label for="MaxListItems">Number of items in List (between 2 and 50)</label>
                                            <input id="MaxListItems" name="MaxListItems" type="text" class="span2" value="" data-slider-min="2" data-slider-max="50" data-slider-step="1" data-slider-value="[5,10]"/> 
                                        </div>
    
                                        </div>

                                        <button class="btn btn-md btn-info" type="submit" value="submit">Generate Text</button>
                                         @if($formIsValid==false)
                                        <div class="label label-danger" id="lorem-error">{{ $errorMessage }}</div>
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
                            </div>
                            </div>
