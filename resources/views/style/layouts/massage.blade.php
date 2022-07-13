<?php $success_chack = Session::get('success');?>
@if(!empty($success_chack))
<div class="container-fluid">
  <div class="alert alert-dismissable alert-success">
    <button class="close" aria-hidder="true" data-dismiss="alert">&times;</button>
    <h4>{{Session::get('success') }}</h4>
    
  </div>
</div>
@endif

<?php $error_check = Session::get('error');?>
@if(!empty($error_check))
<div class="container-fluid">
  <div class="alert alert-dismissable alert-danger">
    <button class="close" aria-hidder="true" data-dismiss="alert">&times;</button>
    <h4>{{Session::get('error') }}</h4>
    
  </div>
</div>
@endif