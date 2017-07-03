<div>
    <nav class="navbar navbar-default">
        <div class="col-md-12">
            <div class="navbar-header col-md-2">
                <a class="navbar-brand" href="#">My Drive</a>

            </div>
            <div class="col-md-8">
                <input id="head-search" class="form-control" type="text" name="search" placeholder="Search" title="Click to Seach for a file">
            </div>
            <div class="col-md-2">
                <img title="click to view User info" src="user.jpg" class="img-rounded" id="img-user-icon">
                @if(Auth::check())
                    <a class="navbar-link " href="/logout" title="Click to Logout">{{Auth::user() ->name}}</a>
                @endif
            </div>
        </div>
        <!--
        <div class="col-md-12">
            <div class="col-md-2">
                <button class="btn btn-primary btn-new" title="Make new File and folder"> New </button>
            </div>
            <div  class="col-md-8 btn-group">
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
        -->

    </nav>
</div>