<?php
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
$this->registerJs("$('[data-toggle=\"popover\"]').popover()");
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Highload</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com" data-toggle="modal" data-target="#about-modal">About project</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-md-3 col-sm-6">
                <h2>Header #1</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-primary btn-sm" href=""><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span> Read more &raquo;</a></p>
            </div>
            <div class="col-md-3 col-sm-6">
                <h2>Header #2</h2>
                <span class="label label-danger">Hot news!</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-primary btn-sm" href=""><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span> Read more &raquo;</a></p>
            </div>
            <div class="clearfix hidden-md hidden-lg"></div>
            <div class="col-md-3 col-sm-6">
                <h2>Header #3</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-primary btn-sm" href=""><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span> Read more &raquo;</a></p>
            </div>
            <div class="col-md-3 col-sm-6">
                <h2>Header #4</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <div class="btn-group" role="group" aria-label="group1">
                    <a class="btn btn-primary btn-sm" href=""><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span> Read more &raquo;</a>
                    <a class="btn btn-default btn-sm" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." title="Author info"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Author</a>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="modal fade" id="about-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">About project</h4>
      </div>
      <div class="modal-body">
        <p>About project info</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->