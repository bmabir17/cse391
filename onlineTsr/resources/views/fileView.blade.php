<!DOCTYPE html>
<html>
@include('layout.header')


    <style>
        #draggable { width: 150px; height: 150px; padding: 0.5em; }
    </style>

<body>
<div class="container-fluid">
    <div>
        <nav class="navbar navbar-default">
            <div class="col-md-12">
                <div class="navbar-header col-md-3">
                    <a class="navbar-brand" href="#">My Drive</a>

                </div>
                <div class="col-md-7">
                    <input id="head-search" class="form-control" type="text" name="search" placeholder="Search" title="Click to Seach for a file">
                </div>
                <div class="col-md-2">
                    <img title="click to view User info" src="user.jpg" class="img-rounded" id="img-user-icon">

                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-3">
                    <button class="btn btn-primary btn-new" title="Make new File and folder"> New </button>
                </div>
                <div  class="col-md-7 btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle btn-no-border" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Main Drive <span class="caret"></span> </button>
                </div>
                <div class="col-md-2 btn-align">

                    <div class="col-md-4">
                        <button class="btn btn-default btn-circle btn-no-border" title="change layout">
                            <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-default btn-circle btn-no-border" title="information">
                            <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-default btn-circle btn-no-border" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </button>
                    </div>

                </div>

            </div>

        </nav>
    </div>
    <div>
        <div class="col-md-3">
            <div class="panel panel-default left-panel">
                <div class="panel-body">
                    <div class="list-group">
                        <button type="button" class="list-group-item active">Main Drive</button>
                        <button type="button" class="list-group-item ">Recent</button>
                        <button type="button" class="list-group-item ">Recycle Bin</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="col-md-8 folder-space">
                <div class="folder-space">
                    <div>
                        <div class="col-md-3">
                            <p>Folders</p>
                        </div>
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-5">
                            <div class="col-md-7">
                                <button type="button"  class="btn btn-no-border sort-btn">name</button>
                            </div>
                            <div class="col-md-5">
                                <button type="button" class="btn btn-circle btn-no-border"><span class="glyphicon glyphicon-arrow-down"></span></button>
                            </div>
                        </div>
                    </div>
                    <div >
                        <div class="col-md-4">
                            <div class="ui-widget-content">
                                <button class="btn btn-default file-btn"><span class="glyphicon glyphicon-folder-open"> </span> Web Development</button>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="draggable ui-widget-content">
                                <button class="btn btn-default file-btn"><span class="glyphicon glyphicon-folder-open"> </span> Web Development</button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div  class="draggable ui-widget-content">
                                <button class="btn btn-default file-btn"><span class="glyphicon glyphicon-folder-open"> </span> Web Development</button>
                            </div>
                        </div>

                    </div>
                    <div>
                        <div class="col-md-4">
                            <button class="btn btn-default file-btn"><span class="glyphicon glyphicon-folder-open"> </span> Web Development 1</button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-default file-btn"><span class="glyphicon glyphicon-folder-open"> </span> LICT 1</button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-default file-btn"><span class="glyphicon glyphicon-folder-open"> </span> Batch 12</button>
                        </div>

                    </div>

                </div>
                <div>

                </div>
            </div>
            <div class="col-md-4">

            </div>

        </div>
    </div>
</div>
<div id="draggable" class="ui-widget-content">
    <p>Drag me around</p>
</div>
<script>
    $( function() {
        $( "#draggable" ).draggable();
    } );
</script>

</body>
</html>