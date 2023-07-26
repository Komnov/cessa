<?= $header; ?><?= $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-left">
        <h1><?= $heading_title; ?></h1>
        <ul class="breadcrumb">
          <?php foreach ($breadcrumbs as $breadcrumb): ?>
          <li><a href="<?= $breadcrumb['href']; ?>"><?= $breadcrumb['text']; ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
    <div class="container-fluid"><?php if($error_warning): ?>
      <div class="alert alert-danger alert-dismissible">
        <i class="fa fa-exclamation-circle"></i> <?= $error_warning; ?>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>
      <?php endif; ?>
      <?php if($success): ?>
      <div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> <?= $success; ?>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>
      <?php endif; ?>
      <div class="row">
        <div id="filter-order" class="col-md-3 col-md-push-9 col-sm-12 hidden-sm hidden-xs">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-filter"></i> <?= $text_filter; ?></h3>
            </div>
            <div class="panel-body">
              <div class="form-group">
                <label class="control-label" for="input-order-id"><?= $entry_order_id; ?></label>
                <input type="text" name="filter_order_id" value="<?= $filter_order_id; ?>"
                     placeholder="<?= $entry_order_id; ?>" id="input-order-id" class="form-control"/>
              </div>
              <div class="form-group text-right">
                <button type="button" id="button-filter" class="btn btn-default">
                  <i class="fa fa-filter"></i> <?= $button_filter; ?>
                </button>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-file-text"></i> <?= $tab_act; ?></h3>
            </div>
            <div class="panel-body">
              <div class="form-group text-center">
                <button type="button" id="button-parsel-send" data-toggle="tooltip" title="<?= $button_parsel_send_print; ?>" class="btn btn-info">
                  <i class="fa fa-file-text"></i> <?= $button_parsel_send; ?>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-9 col-md-pull-3 col-sm-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-list"></i> <?= $text_list; ?></h3>
            </div>
            <div class="panel-body">
              <form method="post" action="" enctype="multipart/form-data" id="form-order">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <td style="width: 1px;" class="text-center">
                        <input type="checkbox" onclick="$('input[name*=\'selected\']').not(':disabled').prop('checked', this.checked);"/>
                      </td>
                      <td class="text-left">
                        <?php if($sort == 'order_id'): ?>
                        <a href="<?= $sort_order_id; ?>" class="<?= $order; ?>"><?= $column_order_id; ?></a>
                        <?php else: ?>
                        <a href="<?= $sort_order_id; ?>"><?= $column_order_id; ?></a>
                        <?php endif; ?>
                      </td>
                      <td class="text-left">
                        <?php if($sort == 'im_id'): ?>
                        <a href="<?= $sort_im_id; ?>" class="<?= $order; ?>"><?= $column_im_id; ?></a>
                        <?php else: ?>
                        <a href="<?= $sort_im_id; ?>"><?= $column_im_id; ?></a>
                        <?php endif; ?>
                      </td>
                      <td class="text-left">
                        <?php if($sort == 'label'): ?>
                        <a href="<?= $sort_label; ?>" class="<?= $order; ?>"><?= $column_label; ?></a>
                        <?php else: ?>
                        <a href="<?= $sort_label; ?>"><?= $column_label; ?></a>
                        <?php endif; ?>
                      </td>
                      <td class="text-left">
                        <?php if($sort == 'boxberry_to_point'): ?>
                        <a href="<?= $sort_boxberry_to_point; ?>" class="<?= $order; ?>"><?= $column_boxberry_to_point; ?></a>
                        <?php else: ?>
                        <a href="<?= $sort_boxberry_to_point; ?>"><?= $column_boxberry_to_point; ?></a>
                        <?php endif; ?>
                      </td>
                      <td class="text-left">
                        <?php if($sort == 'address'): ?>
                        <a href="<?= $sort_address; ?>" class="<?= $order; ?>"><?= $column_address; ?></a>
                        <?php else: ?>
                        <a href="<?= $sort_address; ?>"><?= $column_address; ?></a>
                        <?php endif; ?>
                      </td>
                      <td class="text-left">
                        <?php if($sort == 'error'): ?>
                        <a href="<?= $sort_error; ?>" class="<?= mb_strtolower($order); ?>"><?= $column_error; ?></a>
                        <?php else: ?>
                        <a href="<?= $sort_error; ?>"><?= $column_error; ?></a>
                        <?php endif; ?>
                      </td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(!empty($deliveries)): ?>
                    <?php foreach($deliveries as $delivery): ?>
                    <?php $act_label = explode(' ', $delivery['label']) ?>
                    <tr>
                      <td class="text-center">
                        <input type="checkbox" name="selected[]" <?= (!empty($act_label[1])) ? 'disabled' : '' ?>
                        value="<?= $delivery['im_id']; ?>" <?= (in_array($delivery['im_id'], $selected, true)) ? 'checked="checked"' : '' ?> />
                      </td>
                      <td class="text-right">
                        <?= $delivery['order_id']; ?>
                      </td>
                      <td class="text-left">
                        <?php if(!empty($delivery['im_id'])) : ?>
                        <?php $tracking_link = explode(' ', $delivery['im_id']) ?>
                        <?php if(!empty($tracking_link[1])) : ?>
                        <?= $tracking_link[0]; ?><p></p>
                        <a target="_blank" href="<?= $tracking_link[1]; ?>">Ссылка на отслеживание</a>
                        <?php else: ?>
                        <?= $delivery['im_id']; ?>
                        <?php endif; ?>
                        <?php endif; ?>
                      </td>
                      <td class="text-left">
                        <?php if(!empty($delivery['label'])) : ?>
                        <?php $new_label = explode(' ', $delivery['label']) ?>
                        <?php if(!empty($new_label[0])) : ?>
                        <a target="_blank" href="<?= $new_label[0]; ?>">Скачать этикетку</a>
                        <br>
                        <?php else: ?>
                        <a target="_blank" href="<?= $delivery['label']; ?>">Скачать этикетку</a>
                        <br>
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php if(!empty($delivery['label'])) : ?>
                        <?php if(!empty($act_label[1])) : ?>
                        <p></p>
                        <a target="_blank" href="<?= $act_label[1]; ?>">Скачать акт</a>
                        <?php endif; ?>
                        <?php endif; ?>
                      </td>
                      <td class="text-left">
                        <?= $delivery['boxberry_to_point']; ?>
                      </td>
                      <td class="text-left">
                        <?= $delivery['address']; ?>
                      </td>
                      <td class="text-left">
                        <?= $delivery['error']; ?>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <tr>
                      <td class="text-center" colspan="8"><?= $text_no_results; ?></td>
                    </tr>
                    <?php endif; ?>
                    </tbody>
                  </table>
                </div>
              </form>
              <div class="row">
                <div class="col-sm-6 text-left"><?= $pagination; ?></div>
                <div class="col-sm-6 text-right"><?= $results; ?></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script type="text/javascript">
          $('#button-filter').on('click', function () {
              url = '';
              var filter_order_id = $('input[name=\'filter_order_id\']').val();
              if (filter_order_id) {
                  url += '&filter_order_id=' + encodeURIComponent(filter_order_id);
              }
              location = 'index.php?route=sale/boxberry&<?= (strpos(VERSION, '2.') !== false ? 'token' : 'user_token') ;?>=<?= (strpos(VERSION, '2.') !== false ? $user_token : $user_token) ;?>' + url;
          });
      </script>
      <script type="text/javascript">
          $('input[name^=\'selected\']').on('change', function() {
              $('#button-parsel-send').prop('disabled', true);
              var selected = $('input[name^=\'selected\']:checked');
              if (selected.length) {
                  $('#button-parsel-send').prop('disabled', false);
              }
          });
          $('#button-parsel-send').prop('disabled', true);
      </script>
      <script type="text/javascript">
          $('#button-parsel-send').on('click', function() {
              let im_ids = [];
              $('input[name^=\'selected\']:checked').each(function() {
                  if (this.value.includes('http')) {
                      return;
                  }
                  im_ids.push(this.value);
              });

              $.ajax({
                  method: "POST",
                  url: "index.php?route=sale/boxberry&<?= (strpos(VERSION, '2.') !== false ? 'token' : 'user_token') ;?>=<?= (strpos(VERSION, '2.') !== false ? $user_token : $user_token) ;?>",
                  data: { im_ids: im_ids },
                  success: function() {
                      location.reload();
                  }
              })
          });
      </script>
    </div>
  </div>
</div>
<?= $footer; ?>