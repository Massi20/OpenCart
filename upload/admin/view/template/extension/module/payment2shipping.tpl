<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-module" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
	    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
	<?php if (!empty($error_warning)) { ?>
    <div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
      </div>
      <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-module" class="form-horizontal">
          <div class="tab-pane">
            <ul class="nav nav-tabs" id="option">
              <li><a href="#option_setting" data-toggle="tab"><?php echo $tab_setting; ?></a></li>
              <li><a href="#option_about" data-toggle="tab"><?php echo $tab_about; ?></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="option_setting">
                  <div class="form-group">
                    <label class="col-sm-2 control-label"><?php echo $entry_status; ?></label>
                    <div class="col-sm-10">
                      <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-success <?php if (!empty($status)) { ?> active <?php } ?>">
                          <input name="module_payment2shipping_status" value="1" autocomplete="off" <?php if (!empty($status)) { ?> checked="checked" <?php } ?> type="radio"><?php echo $text_on; ?>
                        </label>
                        <label class="btn btn-danger <?php if (empty($status)) { ?> active <?php } ?>">
                          <input name="module_payment2shipping_status" value="0" autocomplete="off" <?php if (empty($status)) { ?> checked="checked" <?php } ?> type="radio"><?php echo $text_off; ?>
                        </label>
                      </div>
                    </div>
                  </div>
              <div class="table-responsive">
                <table id="shippings" class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <td class="text-left" colspan="2"><?php echo $entry_shipping; ?></td>
                      <td class="text-left" colspan="2"><?php echo $entry_payment; ?></td>
                      <td></td>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $shipping_rows = 0; ?>
				  <?php foreach ($payment2shippings as $shipping_row) { ?>
                    <tr id="shipping-row<?php echo $shipping_rows; ?>">
                      <td class="text-left" style="width:160px;"><select value="" class="form-control" data-target="module_payment2shipping_shippings[<?php echo $shipping_rows; ?>][shipping]" style="max-width:150px;">
                        <option value=""></option>
                        <?php foreach ($shippings as $shipping) { ?>
                        <?php if (!empty($shipping['installed'])) { ?>
                        <option value="<?php echo $shipping['extension']; ?>"><?php echo $shipping['name']; ?></option>
                        <?php } ?>
                        <?php } ?>
                      </select></td>
                      <td class="text-left"><input type="text" name="module_payment2shipping_shippings[<?php echo $shipping_rows; ?>][shipping]" value="<?php echo $shipping_row['shipping']; ?>" placeholder="flat.flat" class="form-control" /></td>
                      <td class="text-left"style="width:160px;"><select value="" class="form-control" data-target="module_payment2shipping_shippings[<?php echo $shipping_rows; ?>][payment]" style="max-width:150px;">
                        <option value=""><?php echo $text_none; ?></option>
                        <option value="*"><?php echo $text_all; ?></option>
	                    <?php foreach ($payments as $payment) { ?>
	                    <?php if (!empty($payment['installed'])) { ?>
                        <option value="<?php echo $payment['extension']; ?>"><?php echo $payment['name']; ?></option>
	                    <?php } ?>
	                    <?php } ?>
                      </select></td>
                      <td class="text-left"><input type="text" name="module_payment2shipping_shippings[<?php echo $shipping_rows; ?>][payment]" value="<?php echo $shipping_row['payment']; ?>" placeholder="bank_transfer" class="form-control" /></td>
                      <td class="text-left"><button type="button" onclick="$('#shipping-row<?php echo $shipping_rows; ?>').remove();" data-toggle="tooltip" title="<?php echo $button_remove; ?>" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>
                    </tr>
                  <?php $shipping_rows++; ?>
                  <?php } ?>
                    </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="4"></td>
                      <td class="text-left"><button type="button" onclick="addShipping();" data-toggle="tooltip" title="<?php echo $button_shipping_add; ?>" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              </div>
              <div class="tab-pane" id="option_about">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Product</label>
                    <div class="col-sm-10">
                      Shipping based payments by Cl!icker (https://opencart.click)
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Support</label>
                    <div class="col-sm-10">
                      info@clicker.com.ua
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Our modules</label>
                    <div class="col-sm-10">
                      <a href="https://www.opencart.com/index.php?route=marketplace/extension&filter_member=Cl!cker" target="_blank">OpenCart Marketplace</a>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
  <style type="text/css">
.btn-group > .btn, .btn-group-vertical > .btn {
	opacity: 0.3;
}
.btn-group > .btn:hover, .btn-group-vertical > .btn:hover {
	opacity: 0.7;
}
.btn-group > .btn.active, .btn-group-vertical > .btn.active {
	opacity: 1;
}
</style>
<script type="text/javascript"><!--
$('#option a:first').tab('show');
//--></script>
  <script type="text/javascript">
var shipping_rows = <?php echo $shipping_rows; ?>;

function addShipping() {
    html_shippings = '<option value=""></option>';
	<?php foreach ($shippings as $shipping) { ?>
	<?php if (!empty($shipping['installed'])) { ?>
    html_shippings += '<option value="<?php echo $shipping['extension']; ?>"><?php echo $shipping['name']; ?></option>';
	<?php } ?>
	<?php } ?>

    html_payments = '<option value=""><?php echo $text_none; ?></option>';
    html_payments += '<option value="*"><?php echo $text_all; ?></option>';
	<?php foreach ($payments as $payment) { ?>
	<?php if (!empty($payment['installed'])) { ?>
    html_payments += '<option value="<?php echo $payment['extension']; ?>"><?php echo $payment['name']; ?></option>';
	<?php } ?>
	<?php } ?>

    html  = '<tr id="shipping-row' + shipping_rows + '">';
    html += '  <td class="text-left" style="width:160px;"><select value="" class="form-control" data-target="module_payment2shipping_shippings[' + shipping_rows + '][shipping]" style="max-width:150px;">' + html_shippings + '</select></td>';
    html += '  <td class="text-left"><input type="text" name="module_payment2shipping_shippings[' + shipping_rows + '][shipping]" value="" placeholder="flat.flat" class="form-control" /></td>';
    html += '  <td class="text-left"style="width:160px;"><select value="" class="form-control" data-target="module_payment2shipping_shippings[' + shipping_rows + '][payment]" style="max-width:150px;">' + html_payments + '</select></td>';
    html += '  <td class="text-left"><input type="text" name="module_payment2shipping_shippings[' + shipping_rows + '][payment]" value="" placeholder="bank_transfer" class="form-control" /></td>';
    html += '  <td class="text-left"><button type="button" onclick="$(\'#shipping-row' + shipping_rows  + '\').remove();" data-toggle="tooltip" title="<?php echo $button_remove; ?>" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
    html += '</tr>';

    $('#shippings tbody').append(html);

    shipping_rows++;
}

$(document).on("change", "select[data-target]", function() {
    $('input[name="' + $(this).attr('data-target') + '"]').val($(this).val());
});
</script>
<?php echo $footer; ?>