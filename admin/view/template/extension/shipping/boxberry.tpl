<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-boxberry" data-toggle="tooltip" title="<?php echo $button_save ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel ?>" data-toggle="tooltip" title="<?php echo $button_cancel ?>" class="btn btn-default"><i class="fa fa-reply"></i></a>
      </div>
      <h1><?php echo $heading_title ?></h1>
      <ul class="breadcrumb">
        <?php foreach($breadcrumbs as $breadcrumb): ?>
        <li><a href="<?php echo $breadcrumb['href'] ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
    <?php if($error_warning): ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php endif; ?>
    <div class="panel panel-default">
      <div class="panel-body">
        <form action="<?php echo $action ?>" method="post" enctype="multipart/form-data" id="form-boxberry" class="form-horizontal">
          <div class="col-sm-2">
            <ul class="nav nav-pills nav-stacked">
              <li class="active">
                <a href="#tab-accesses" data-toggle="tab"><?php echo $tab_accesses ?></a>
              </li>
              <li>
                <a href="#tab-weights-dimensions" data-toggle="tab"><?php echo $tab_weights_dimensions ?></a>
              </li>
              <li>
                <a href="#tab-shipping-profiles" data-toggle="tab"><?php echo $tab_shipping_profiles ?></a>
              </li>
            </ul>
          </div>
          <div class="col-sm-10">
            <div class="tab-content">
              <div class="tab-pane active" id="tab-accesses">
                <div class="page-header">
                  <h2><?php echo $tab_accesses ?></h2>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="status"><?php echo $text_status ?></label>
                  <div class="col-sm-2">
                    <select class="form-control" id="status" name="shipping_boxberry_status">
                      <?php if($shipping_boxberry_status): ?>
                      <option value="1" selected><?php echo $text_enabled ?></option>
                      <option value="0"><?php echo $text_disabled ?></option>
                      <?php else: ?>
                      <option value="1"><?php echo $text_enabled ?></option>
                      <option value="0" selected><?php echo $text_disabled ?></option>
                      <?php endif; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="api_token">
                    <span data-toggle="tooltip" title="<?php echo $text_api_token_tooltip ?>"><?php echo $text_api_token ?></span>
                  </label>
                  <div class="col-sm-5">
                    <input type="text" id="api_token" name="shipping_boxberry_api_token" class="form-control" value="<?php echo $shipping_boxberry_api_token ?>"/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="api_url"><?php echo $text_api_url ?></label>
                  <div class="col-sm-5">
                    <input type="text" id="api_url" name="shipping_boxberry_api_url" class="form-control" value="<?php echo $shipping_boxberry_api_url ?>"/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="widget_url"><?php echo $text_widget_url ?></label>
                  <div class="col-sm-5">
                    <input type="text" id="widget_url" name="shipping_boxberry_widget_url" class="form-control" value="<?php echo $shipping_boxberry_widget_url ?>"/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="order_status"><?php echo $text_order_status ?></label>
                  <div class="col-sm-5">
                    <select class="form-control" id="order_status" name="shipping_boxberry_order_status">
                      <?php foreach($order_statuses as $order_status) : ?>
                      <?php if($order_status['order_status_id'] == $shipping_boxberry_order_status): ?>
                      <option value="<?php echo $order_status['order_status_id']?>" selected="selected"><?php echo $order_status['name'] ?></option>
                      <?php else: ?>
                      <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name'] ?></option>
                      <?php endif; ?>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="sort_order"><?php echo $text_sort_order ?></label>
                  <div class="col-sm-1">
                    <input type="text" id="sort_order" name="shipping_boxberry_sort_order" class="form-control" value="<?php echo $shipping_boxberry_sort_order ?>"/>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-weights-dimensions">
                <div class="page-header">
                  <h2><?php echo $tab_weights_dimensions ?></h2>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="weight"><?php echo $text_weight ?></label>
                  <div class="col-sm-2">
                    <input type="text" id="weight" name="shipping_boxberry_weight" class="form-control" value="<?php echo $shipping_boxberry_weight ?>"/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="weight_min"><?php echo $text_weight_min ?></label>
                  <div class="col-sm-2">
                    <input type="text" id="weight_min" name="shipping_boxberry_weight_min" class="form-control" value="<?php echo $shipping_boxberry_weight_min ?>"/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="weight_max"><?php echo $text_weight_max ?></label>
                  <div class="col-sm-2">
                    <input type="text" id="weight_max" name="shipping_boxberry_weight_max" class="form-control" value="<?php echo $shipping_boxberry_weight_max ?>"/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="width"><?php echo $text_width ?></label>
                  <div class="col-sm-2">
                    <input type="text" id="width" name="shipping_boxberry_width" class="form-control" value="<?php echo $shipping_boxberry_width ?>"/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="height"><?php echo $text_height ?></label>
                  <div class="col-sm-2">
                    <input type="text" id="height" name="shipping_boxberry_height" class="form-control" value="<?php echo $shipping_boxberry_height ?>"/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="depth"><?php echo $text_depth ?></label>
                  <div class="col-sm-2">
                    <input type="text" id="depth" name="shipping_boxberry_depth" class="form-control" value="<?php echo $shipping_boxberry_depth ?>"/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="package_size"><?php echo $text_package_size ?></label>
                  <div class="col-sm-2">
                    <select class="form-control" id="package_size" name="shipping_boxberry_package_size">
                      <?php if ($shipping_boxberry_package_size) : ?>
                      <option value="1" selected><?php echo $text_apply_package_size_yes ?></option>
                      <option value="0"><?php echo $text_apply_package_size_no ?></option>
                      <?php else : ?>
                      <option value="1"><?php echo $text_apply_package_size_yes ?></option>
                      <option value="0" selected><?php echo $text_apply_package_size_no ?></option>
                      <?php endif ?>
                    </select>
                  </div>
                </div>
                <div class="form-group" style="display: none">
                  <label class="control-label col-sm-3" for="weight_class_id"><?php echo $text_weight_id ?></label>
                  <div class="col-sm-2">
                    <select class="form-control" id="weight_class_id" name="shipping_boxberry_weight_class_id">
                      <?php foreach($weight_ids as $weight_id) : ?>
                      <?php if($weight_id['weight_class_id'] == $shipping_boxberry_weight_class_id) : ?>
                      <option value="<?php echo $weight_id['weight_class_id'] ?>" selected="selected"><?php echo $weight_id['title'] ?></option>
                      <?php else: ?>
                      <option value="<?php echo $weight_id['weight_class_id'] ?>"><?php echo $weight_id['title'] ?></option>
                      <?php endif; ?>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group" style="display: none">
                  <label class="control-label col-sm-3" for="length_class_id"><?php echo $text_length_id ?></label>
                  <div class="col-sm-2">
                    <select class="form-control" id="length_class_id" name="shipping_boxberry_length_class_id">
                      <?php foreach($length_ids as $length_id) : ?>
                      <?php if($length_id['length_class_id'] == $shipping_boxberry_length_class_id) : ?>
                      <option value="<?php echo $length_id['length_class_id'] ?>" selected="selected"><?php echo $length_id['title'] ?></option>
                      <?php else: ?>
                      <option value="<?php echo $length_id['length_class_id'] ?>"><?php echo $length_id['title'] ?></option>
                      <?php endif; ?>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-shipping-profiles">
                <div class="page-header">
                  <h2><?php echo $tab_shipping_profiles ?></h2>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $text_pickup ?></h3>
                  </div>
                  <div class="panel-body">
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="pickup_status"><?php echo $text_status ?></label>
                      <div class="col-sm-2">
                        <select class="form-control" id="pickup_status" name="shipping_boxberry_pickup_status">
                          <?php if($shipping_boxberry_pickup_status): ?>
                          <option value="1" selected="selected"><?php echo $text_enabled ?></option>
                          <option value="0"><?php echo $text_disabled ?></option>
                          <?php else: ?>
                          <option value="1"><?php echo $text_enabled ?></option>
                          <option value="0" selected="selected"><?php echo $text_disabled ?></option>
                          <?php endif; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="pickup_sucrh"><?php echo $text_sucrh ?></label>
                      <div class="col-sm-2">
                        <select class="form-control" id="pickup_sucrh" name="shipping_boxberry_pickup_sucrh">
                          <?php if($shipping_boxberry_pickup_sucrh) : ?>
                          <option value="1" selected="selected"><?php echo $text_sucrh_yes ?></option>
                          <option value="0"><?php echo $text_sucrh_no ?></option>
                          <?php else: ?>
                          <option value="1"><?php echo $text_sucrh_yes ?></option>
                          <option value="0" selected="selected"><?php echo $text_sucrh_no ?></option>
                          <?php endif; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="pickup_parselcreate_auto"><?php echo $text_parselcreate_auto ?></label>
                      <div class="col-sm-2">
                        <select class="form-control" id="pickup_parselcreate_auto" name="shipping_boxberry_pickup_parselcreate_auto">
                          <?php if($shipping_boxberry_pickup_parselcreate_auto) : ?>
                          <option value="1" selected="selected"><?php echo $text_parselcreate_auto_yes ?></option>
                          <option value="0"><?php echo $text_parselcreate_auto_no ?></option>
                          <?php else: ?>
                          <option value="1"><?php echo $text_parselcreate_auto_yes ?></option>
                          <option value="0" selected="selected"><?php echo $text_parselcreate_auto_no ?></option>
                          <?php endif; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="pickup_parselsend_auto"><?php echo $text_parselsend_auto ?></label>
                      <div class="col-sm-2">
                        <select class="form-control" id="pickup_parselsend_auto" name="shipping_boxberry_pickup_parselsend_auto">
                          <?php if($shipping_boxberry_pickup_parselsend_auto) : ?>
                          <option value="1" selected="selected"><?php echo $text_parselsend_auto_yes ?></option>
                          <option value="0"><?php echo $text_parselsend_auto_no ?></option>
                          <?php else: ?>
                          <option value="1"><?php echo $text_parselsend_auto_yes ?></option>
                          <option value="0" selected="selected"><?php echo $text_parselsend_auto_no ?></option>
                          <?php endif; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="pickup_name"><?php echo $text_name ?></label>
                      <div class="col-sm-7">
                        <input type="text" id="pickup_name" name="shipping_boxberry_pickup_name" class="form-control" value="<?php echo $shipping_boxberry_pickup_name ?>"/>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $text_pickup_prepaid ?></h3>
                  </div>
                  <div class="panel-body">
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="pickup_prepaid_status"><?php echo $text_status ?></label>
                      <div class="col-sm-2">
                        <select class="form-control" id="pickup_prepaid_status" name="shipping_boxberry_pickup_prepaid_status">
                          <?php if($shipping_boxberry_pickup_prepaid_status): ?>
                          <option value="1" selected="selected"><?php echo $text_enabled ?></option>
                          <option value="0"><?php echo $text_disabled ?></option>
                          <?php else: ?>
                          <option value="1"><?php echo $text_enabled ?></option>
                          <option value="0" selected="selected"><?php echo $text_disabled ?></option>
                          <?php endif; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="pickup_prepaid_sucrh"><?php echo $text_sucrh ?></label>
                      <div class="col-sm-2">
                        <select class="form-control" id="pickup_prepaid_sucrh" name="shipping_boxberry_pickup_prepaid_sucrh">
                          <?php if($shipping_boxberry_pickup_prepaid_sucrh) : ?>
                          <option value="1" selected="selected"><?php echo $text_sucrh_yes ?></option>
                          <option value="0"><?php echo $text_sucrh_no ?></option>
                          <?php else: ?>
                          <option value="1"><?php echo $text_sucrh_yes ?></option>
                          <option value="0" selected="selected"><?php echo $text_sucrh_no ?></option>
                          <?php endif; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="pickup_prepaid_parselcreate_auto"><?php echo $text_parselcreate_auto ?></label>
                      <div class="col-sm-2">
                        <select class="form-control" id="pickup_prepaid_parselcreate_auto" name="shipping_boxberry_pickup_prepaid_parselcreate_auto">
                          <?php if($shipping_boxberry_pickup_prepaid_parselcreate_auto) : ?>
                          <option value="1" selected="selected"><?php echo $text_parselcreate_auto_yes ?></option>
                          <option value="0"><?php echo $text_parselcreate_auto_no ?></option>
                          <?php else: ?>
                          <option value="1"><?php echo $text_parselcreate_auto_yes ?></option>
                          <option value="0" selected="selected"><?php echo $text_parselcreate_auto_no ?></option>
                          <?php endif; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="pickup_prepaid_parselsend_auto"><?php echo $text_parselsend_auto ?></label>
                      <div class="col-sm-2">
                        <select class="form-control" id="pickup_prepaid_parselsend_auto" name="shipping_boxberry_pickup_prepaid_parselsend_auto">
                          <?php if($shipping_boxberry_pickup_prepaid_parselsend_auto) : ?>
                          <option value="1" selected="selected"><?php echo $text_parselsend_auto_yes ?></option>
                          <option value="0"><?php echo $text_parselsend_auto_no ?></option>
                          <?php else: ?>
                          <option value="1"><?php echo $text_parselsend_auto_yes ?></option>
                          <option value="0" selected="selected"><?php echo $text_parselsend_auto_no ?></option>
                          <?php endif; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="pickup_prepaid_name"><?php echo $text_name ?></label>
                      <div class="col-sm-7">
                        <input type="text" id="pickup_prepaid_name" name="shipping_boxberry_pickup_prepaid_name" class="form-control" value="<?php echo $shipping_boxberry_pickup_prepaid_name ?>"/>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $text_courier_delivery ?></h3>
                  </div>
                  <div class="panel-body">
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="courier_delivery_status"><?php echo $text_status ?></label>
                      <div class="col-sm-2">
                        <select class="form-control" id="courier_delivery_status" name="shipping_boxberry_courier_delivery_status">
                          <?php if($shipping_boxberry_courier_delivery_sucrh): ?>
                          <option value="1" selected="selected"><?php echo $text_enabled ?></option>
                          <option value="0"><?php echo $text_disabled ?></option>
                          <?php else: ?>
                          <option value="1"><?php echo $text_enabled ?></option>
                          <option value="0" selected="selected"><?php echo $text_disabled ?></option>
                          <?php endif; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="courier_delivery_sucrh"><?php echo $text_sucrh ?></label>
                      <div class="col-sm-2">
                        <select class="form-control" id="courier_delivery_sucrh" name="shipping_boxberry_courier_delivery_sucrh">
                          <?php if($shipping_boxberry_courier_delivery_parselcreate_auto): ?>
                          <option value="1" selected="selected"><?php echo $text_sucrh_yes ?></option>
                          <option value="0"><?php echo $text_sucrh_no ?></option>
                          <?php else: ?>
                          <option value="1"><?php echo $text_sucrh_yes ?></option>
                          <option value="0" selected="selected"><?php echo $text_sucrh_no ?></option>
                          <?php endif; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="courier_delivery_parselcreate_auto"><?php echo $text_parselcreate_auto ?></label>
                      <div class="col-sm-2">
                        <select class="form-control" id="courier_delivery_parselcreate_auto" name="shipping_boxberry_courier_delivery_parselcreate_auto">
                          <?php if($shipping_boxberry_courier_delivery_parselsend_auto) : ?>
                          <option value="1" selected="selected"><?php echo $text_parselcreate_auto_yes ?></option>
                          <option value="0"><?php echo $text_parselcreate_auto_no ?></option>
                          <?php else: ?>
                          <option value="1"><?php echo $text_parselcreate_auto_yes ?></option>
                          <option value="0" selected="selected"><?php echo $text_parselcreate_auto_no ?></option>
                          <?php endif; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="courier_delivery_parselsend_auto"><?php echo $text_parselsend_auto ?></label>
                      <div class="col-sm-2">
                        <select class="form-control" id="courier_delivery_parselsend_auto" name="shipping_boxberry_courier_delivery_parselsend_auto">
                          <?php if($shipping_boxberry_courier_delivery_parselsend_auto) : ?>
                          <option value="1" selected="selected"><?php echo $text_parselsend_auto_yes ?></option>
                          <option value="0"><?php echo $text_parselsend_auto_no ?></option>
                          <?php else: ?>
                          <option value="1"><?php echo $text_parselsend_auto_yes ?></option>
                          <option value="0" selected="selected"><?php echo $text_parselsend_auto_no ?></option>
                          <?php endif; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="courier_delivery_name"><?php echo $text_name ?></label>
                      <div class="col-sm-7">
                        <input type="text" id="courier_delivery_name" name="shipping_boxberry_courier_delivery_name" class="form-control" value="<?php echo $shipping_boxberry_courier_delivery_name ?>"/>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $text_courier_delivery_prepaid ?></h3>
                  </div>
                  <div class="panel-body">
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="courier_delivery_prepaid_status"><?php echo $text_status ?></label>
                      <div class="col-sm-2">
                        <select class="form-control" id="courier_delivery_prepaid_status" name="shipping_boxberry_courier_delivery_prepaid_status">
                          <?php if($shipping_boxberry_courier_delivery_prepaid_status): ?>
                          <option value="1" selected="selected"><?php echo $text_enabled ?></option>
                          <option value="0"><?php echo $text_disabled ?></option>
                          <?php else: ?>
                          <option value="1"><?php echo $text_enabled ?></option>
                          <option value="0" selected="selected"><?php echo $text_disabled ?></option>
                          <?php endif; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="courier_delivery_prepaid_sucrh"><?php echo $text_sucrh ?></label>
                      <div class="col-sm-2">
                        <select class="form-control" id="courier_delivery_prepaid_sucrh" name="shipping_boxberry_courier_delivery_prepaid_sucrh">
                          <?php if($shipping_boxberry_courier_delivery_prepaid_sucrh): ?>
                          <option value="1" selected="selected"><?php echo $text_sucrh_yes ?></option>
                          <option value="0"><?php echo $text_sucrh_no ?></option>
                          <?php else: ?>
                          <option value="1"><?php echo $text_sucrh_yes ?></option>
                          <option value="0" selected="selected"><?php echo $text_sucrh_no ?></option>
                          <?php endif; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="courier_delivery_prepaid_parselcreate_auto"><?php echo $text_parselcreate_auto ?></label>
                      <div class="col-sm-2">
                        <select class="form-control" id="courier_delivery_prepaid_parselcreate_auto" name="shipping_boxberry_courier_delivery_prepaid_parselcreate_auto">
                          <?php if($shipping_boxberry_courier_delivery_prepaid_parselcreate_auto): ?>
                          <option value="1" selected="selected"><?php echo $text_parselcreate_auto_yes ?></option>
                          <option value="0"><?php echo $text_parselcreate_auto_no ?></option>
                          <?php else: ?>
                          <option value="1"><?php echo $text_parselcreate_auto_yes ?></option>
                          <option value="0" selected="selected"><?php echo $text_parselcreate_auto_no ?></option>
                          <?php endif; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="courier_delivery_prepaid_parselsend_auto"><?php echo $text_parselsend_auto ?></label>
                      <div class="col-sm-2">
                        <select class="form-control" id="courier_delivery_prepaid_parselsend_auto" name="shipping_boxberry_courier_delivery_prepaid_parselsend_auto">
                          <?php if($shipping_boxberry_courier_delivery_prepaid_parselsend_auto) : ?>
                          <option value="1" selected="selected"><?php echo $text_parselsend_auto_yes ?></option>
                          <option value="0"><?php echo $text_parselsend_auto_no ?></option>
                          <?php else: ?>
                          <option value="1"><?php echo $text_parselsend_auto_yes ?></option>
                          <option value="0" selected="selected"><?php echo $text_parselsend_auto_no ?></option>
                          <?php endif; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="courier_delivery_prepaid_name"><?php echo $text_name ?></label>
                      <div class="col-sm-7">
                        <input type="text" id="courier_delivery_prepaid_name" name="shipping_boxberry_courier_delivery_prepaid_name" class="form-control" value="<?php echo $shipping_boxberry_courier_delivery_prepaid_name ?>"/>
                      </div>
                    </div>
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
<?php echo $footer ?>