 <!-- Bootstrap -->
    <link href="<?php echo base_url();?>css/font-awesome.min.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Lato:100italic,100,300italic,300,400italic,400,700italic,700,900italic,900" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
<?php echo form_open('tdcelite/save_employee_task'); ?>
<div class="modal-body clearfix">
    <input type="hidden" name="id" value="" />
    <div class="form-group">
        <label for="title" class=" col-md-3">Title</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "title",
                "name" => "title",
                "value" => "",
                "class" => "form-control",
                "placeholder" => "title",
                "autofocus" => true,
                "data-rule-required" => true,
                "data-msg-required" => "field_required",
            ));
            ?>
        </div>
    </div>
    <div class="form-group">
        <label for="description" class=" col-md-3">Description</label>
        <div class=" col-md-9">
            <?php
            echo form_textarea(array(
                "id" => "description",
                "name" => "description",
                "value" => "",
                "class" => "form-control",
                "placeholder" => 'description',
                "data-rule-required" => true,
                "data-msg-required" => 'field_required',
            ));
            ?>
        </div>
    </div>

    <div class="clearfix">
        <label for="start_date" class=" col-md-3 col-sm-3">Date</label>
        <div class="col-md-4 col-sm-4 form-group">
            <?php
            echo form_input(array(
                "id" => "date",
                "name" => "date",
                "value" => "",
                "class" => "form-control",
                "placeholder" => "date",
                "data-rule-required" => true,
                "data-msg-required" => "field_required",
            ));
            ?>
        </div>       
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span>Close</button>
    <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle"></span>Save</button>
</div>
<?php echo form_close(); ?>