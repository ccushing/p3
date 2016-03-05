<!DOCTYPE html>
<html>
<head>

    <title>Charles Cushing P3 - CSCI E-15 : Developer's Best Friend</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


    <link href='css/p3.css' rel='stylesheet'>
</head>
<body>

    <div class="container">


        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h1 class="panel-title">CSCI E-15 : Project #3</h1>
                        <h5><span class="label label-author pull-right">Submitted by : Charles Cushing</span></h5>
                    </div>
                    <div class="panel-body">
                        <h4>Developer's Best Friend</h4>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in nunc finibus, mattis risus at, porttitor neque. Suspendisse odio elit, congue id fermentum at, tristique et urna. Sed quis laoreet ante. Praesent sed viverra lectus. Aliquam dignissim tempor convallis. Mauris congue tristique nisl, a condimentum arcu elementum et. Nam vehicula laoreet arcu, vitae tincidunt ipsum fermentum et. Morbi tincidunt interdum ante ac semper. Suspendisse eros ipsum, lacinia ac malesuada vitae, tincidunt in ex. In dolor eros, viverra et justo id, vehicula rutrum nulla. Praesent eu rhoncus ex. Suspendisse mauris ex, ullamcorper maximus fermentum eget, dictum a orci. Suspendisse sed egestas sapien. Proin tincidunt ex non mauris viverra vestibulum. </p>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Lorem Ipsum Generator
                                <a data-toggle="collapse" data-target="#LoremBody" href="#"><span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-down"></i></span></a>
                                        </h3>
                                    </div>
                                    <form method="post" action="/LoremIpsum" id="LoremIpsumGeneratorForm">
                                    <div class="panel-body" id="LoremBody">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in nunc finibus, mattis risus at, porttitor neque. Suspendisse odio elit, congue id fermentum at, tristique et urna.</p>
                                        <div class="form-group">
                                            <label for="MaxParagraphs">Number of Paragraphs (Maximum of 50)</label>
                                            <input name="MaxParagraphs" class="form-control" id="MaxParagraphs" type="number" value="5">
                                        </div>


                                        <h4>Options</h4>
                                        <div class="panel panel-default">
                                            <div class="checkbox">
                                                <label>
                                                    <input name="IncludeLists" type="checkbox" checked value="1">
                                                    Include Lists
                                   
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input name="IncludeHeadings" type="checkbox" checked value="1">
                                                    Include Headings
                                   
                                                </label>
                                            </div>
                                        </div>

                                        <button class="btn btn-md btn-info" type="submit" value="submit">Generate Text</button>
                                          <div class="label label-danger" id="lorem-error">There was an error in your input. Please try again.</div>
                                        <div class="panel panel-default"><h4>Generated Text</h4>
                                          <div class="panel-body" id="LoremResults">
    
                                          </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Random User Generator
                            <a data-toggle="collapse" data-target="#UserBody" href="#"><span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-down"></i></span></a></h3>
                                    </div>
                                    <div class="panel-body" id="UserBody">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in nunc finibus, mattis risus at, porttitor neque. Suspendisse odio elit, congue id fermentum at, tristique et urna.</p>
                                        <div class="form-group">
                                            <label for="MaxUsers">Number of Users (Maximum of 100)</label>
                                            <input name="MaxUsers" class="form-control" id="MaxUsers" type="number" value="5">
                                        </div>
                                        <h4>Options</h4>
                                        <div class="panel panel-default">
                                            <div class="checkbox">
                                                <label>
                                                    <input name="IncludeName" type="checkbox" checked value="1">
                                                    Include Full Name
                                   
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input name="IncludeGender" type="checkbox" checked value="1">
                                                    Include Gender
                                   
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input name="IncludeStreetAddress" type="checkbox" checked value="1">
                                                    Include Address
                                   
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input name="IncludePhone" type="checkbox" checked value="1">
                                                    Include Phone Number
                                   
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input name="IncludeEmail" type="checkbox" checked value="1">
                                                    Include Email Address
                                   
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input name="IncludePassword" type="checkbox" checked value="1">
                                                    Include Password
                                   
                                                </label>
                                            </div>


                                        </div>

                                        
                                        <button class="btn btn-md btn-info" type="button">Generate Users</button>
                                        <div class="label label-danger" id="user-gen-error">There was an error in your input. Please try again.</div>
                                         <div class="panel panel-default"><h4>Randomly Generated Users</h4>
                                          <div class="panel-body" id="UsersResults">
                                              <ul class="user-list">
                                                  <li><span class="label-default field-name">Name&nbsp;</span><span class="field-value">John Smith</span></li>
                                                  <li><span class="label-default field-name">Gender&nbsp;</span><span class="field-value">Male</span></li>
                                                  <li><span class="label-default field-name">Address&nbsp;</span><span class="field-value">5 Congress Street  Portland, ME 04101</span></li>
                                                  <li><span class="label-default field-name">Phone&nbsp;</span><span class="field-value">207-797-8965</span></li>
                                                  <li><span class="label-default field-name">Email&nbsp;</span><span class="field-value">John.Smith@abc.com</span></li>
                                                  <li><span class="label-default field-name">Password&nbsp;</span><span class="field-value">red-cat-bride@995</span></li>
                                              </ul>
    
                                          </div>
</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>
</body>
</html>
