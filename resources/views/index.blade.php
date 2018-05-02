<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="/favicon.ico">

        <title>Status Dashboard</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Custom styles for this template -->
        <link href="css/dashboard.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- <a class="navbar-brand" href="#">Incident Status Dashboard</a> -->
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Create Incident</a></li>
                    <li><a href="#">Incident History</a></li>
                    <!-- <li><a href="#">Profile</a></li> -->
                    <!-- <li><a href="#">Help</a></li> -->
                </ul>
                <form class="navbar-form">
                    <input type="text" class="form-control" placeholder="Search by Incident ID...">
                </form>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="page-wrapper">
            <h1 class="page-header">Foobooks Status Dashboard</h1>
            <div class="row placeholders">
                <div class="col-xs-6 col-sm-3 placeholder">
                    <img src="/img/outage.png" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                    <h4>Website</h4>
                </div>
                <div class="col-xs-6 col-sm-3 placeholder">
                    <img src="/img/normal.png" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                    <h4>Mobile App</h4>
                </div>
                <div class="col-xs-6 col-sm-3 placeholder">
                    <img src="/img/normal.png" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                    <h4>API</h4>
                </div>
                <div class="col-xs-6 col-sm-3 placeholder">
                    <img src="/img/normal.png" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                    <h4>Messaging</h4>
                </div>
            </div>
            <h2 class="sub-header">Active Incidents</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Incident Details</th>
                        <th>Date</th>
                        <th>Incident ID</th>
                        <th>Affected Component</th>
                        <th>Brief Description</th>
                        <th>Severity</th>
                        <th>Edit / Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><button type="button" class="btn btn-primary btn-sm">VIEW UPDATES</button></td>
                        <td>April 22, 2018</td>
                        <td>123456</td>
                        <td>Foobooks.com</td>
                        <td>Foobooks.com is experiencing an outage</td>
                        <td>Critical</td>
                        <td>
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editIncidentModal">
                                <span class="glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm" id="deleteIncident">
                                <span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Edit incident modal -->
    <div class="modal fade" id="editIncidentModal" tabindex="-1" role="dialog" aria-labelledby="editIncidentLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="editModalTitle">Edit Incident</h4>
                </div>
                <div class="modal-body">
                    <form id="editIncidentForm" action="" method="post">
                        <div class="form-group">
                            <label for="incident-id" class="control-label">Incident ID:</label>
                            <input type="text" class="form-control" id="incident-id" readonly>
                        </div>
                        <div class="form-group">
                                <label for="severity">Edit Severity:</label>
                                <select class="form-control" id="severity">
                                    <option>Select...</option>
                                    <option value="Minor">Minor</option>
                                    <option value="Major">Major</option>
                                    <option value="Critical">Critical</option>
                                </select>
                            </div>
                        <div class="form-group">
                            <label for="indicator">Edit Indicator:</label>
                            <select class="form-control" id="indicator">
                                <option>Select...</option>
                                <option value="outage">Service Outage</option>
                                <option value="disruption">Service Disruption</option>
                                <option value="normal">Normal Operations</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="affected-component">Edit Affected Component:</label>
                            <select class="form-control" id="affected-component">
                                <option>Select...</option>
                                <option value="Website">Website</option>
                                <option value="Mobile">Mobile</option>
                                <option value="API">API</option>
                                <option value="Messaging">Messaging</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="headline" class="control-label">Edit Incident Headline:</label>
                            <textarea class="form-control" id="headline"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Confirm incident edits modal -->
    <div class="modal fade" id="confirmEdit" tabindex="-1" role="dialog" aria-labelledby="confirmEditLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="confirmModalTitle">Confirm Your Changes</h4>
                </div>
                <div class="modal-body">
                    <form id="confirmEditsForm" action="/update" method="post">
                        <div class="form-group">
                            <label for="incident-id" class="control-label">Incident ID:</label>
                            <input type="text" class="form-control" id="incident-id" readonly>
                        </div>
                        <div class="form-group">
                            <label for="severity">Edit Severity:</label>
                            <!-- Edited severity data goes here -->
                        </div>
                        <div class="form-group">
                            <label for="indicator">Edit Indicator:</label>
                            <!-- Edited indicator data goes here -->
                        </div>
                        <div class="form-group">
                            <label for="affected-component">Edit Affected Component:</label>
                            <!-- Edited affected component data goes here -->
                        </div>
                        <div class="form-group">
                            <label for="headline" class="control-label">Edit Incident Headline:</label>
                            <!-- Edited headline data goes here -->
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Confirm</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- Custom JS -->
    <script src="js/custom.js"></script>
    </body>
</html>