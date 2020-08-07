<?php 
if ($this->session->has_userdata('error')) { ?>
<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
    <span class="badge badge-pill badge-danger">Error</span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
    </button> <?=$this->session->flashdata('error');?>
</div>
<?php } 

?> 

<?php 
if ($this->session->has_userdata('success')) { ?>
<div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
    <span class="badge badge-pill badge-primary">Success</span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
    </button> <?=$this->session->flashdata('success');?>
</div>
<?php } ?> 