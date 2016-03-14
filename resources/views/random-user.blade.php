<div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title" id="RandomUserHeader">Random User Generator
                            <a data-toggle="collapse" data-target="#UserBody" href="#RandomUserHeader"><span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-down"></i></span></a></h3>
                                    </div>
                                    <form method="post" action="/RandomUsers" id="RandomUserGeneratorForm">
                                    <div class="panel-body" id="UserBody">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in nunc finibus, mattis risus at, porttitor neque. Suspendisse odio elit, congue id fermentum at, tristique et urna.</p>
                                        <div class="form-group">
                                            <label for="MaxUsers">Number of Users (Maximum of 100)</label>
                                            
                                            <input id="MaxUsers" name="MaxUsers" type="text" data-slider-min="1" data-slider-max="100" data-slider-step="1" data-slider-value="{{ object_get($randomUserOptions, "MaxUsers" ) }}"/><br>

                                            <label for="PercentFemale">Gender Percentage</label>
                                            Male&nbsp;<input id="PercentFemale" name="PercentFemale" type="text" data-slider-min="1" data-slider-max="100" data-slider-step="1" data-slider-value="{{ object_get($randomUserOptions, "PercentFemale" ) }}"/>&nbsp;Female

                                        </div>
                                        <h4>Options</h4>
                                        <div class="panel panel-default">
                                            <div class="checkbox">
                                                <label>
                                                    <input name="IncludeName" type="checkbox" {{ object_get($randomUserOptions, "IncludeFullName" ) == true ? 'checked' : '' }} value="1">
                                                    Include Full Name
                                   
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input name="IncludeGender" type="checkbox" {{ object_get($randomUserOptions, "IncludeGender" ) == true ? 'checked' : '' }} value="1">
                                                    Include Gender                                   
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input name="IncludeAddress" type="checkbox" {{ object_get($randomUserOptions, "IncludeAddress" ) == true ? 'checked' : '' }} value="1">
                                                    Include Address
                                   
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input name="IncludePhone" type="checkbox" {{ object_get($randomUserOptions, "IncludePhone" ) == true ? 'checked' : '' }} value="1">
                                                    Include Phone Number
                                   
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input name="IncludeEmail" type="checkbox" {{ object_get($randomUserOptions, "IncludeEmail" ) == true ? 'checked' : '' }} value="1">
                                                    Include Email Address
                                   
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input name="IncludePassword" type="checkbox" {{ object_get($randomUserOptions, "IncludePassword" ) == true ? 'checked' : '' }} value="1">
                                                    Include Password
                                   
                                                </label>
                                            </div>


                                            <div class="checkbox">
                                                <label>
                                                    <input name="IncludeImage" type="checkbox" {{ object_get($randomUserOptions, "IncludeImage" ) == true ? 'checked' : '' }} value="1">
                                                    Include Image
                                   
                                                </label>
                                            </div>


                                        </div>

                                        
                                        <button class="btn btn-md btn-info" type="submit" value="submit">Generate Users</button>
                                        <div class="label label-danger" id="user-gen-error">There was an error in your input. Please try again.</div>
                                         <div class="panel panel-default results"><h4>Randomly Generated Users</h4>



                                            @foreach ($randomUsers as $user)
                                                <div class="panel-body">
                                                @if ($randomUserOptions->IncludeImage == true)
                                                <img src="{{ $user->image }}" class="user-image">
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
                            </div>
                        </div>
