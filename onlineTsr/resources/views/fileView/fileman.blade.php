
<script src="js/jquery.js"></script>
<script src="vendor/laravel-filemanager/js/lfm.js"></script>

<div class="input-group">
   <span class="input-group-btn">
     <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary" onclick="$('#lfm').filemanager('image');">
       <i class="fa fa-picture-o"></i> Choose
     </a>
   </span>
    <input id="thumbnail" class="form-control" type="text" name="filepath">
</div>
<img id="holder" style="margin-top:15px;max-height:100px;">
<script>
    //$domain="";
    $('#lfm').filemanager('image', {prefix: ""});
</script>