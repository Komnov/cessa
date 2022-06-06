<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <a href="<?php echo $orders; ?>" target="_blank" id="orders" data-toggle="tooltip" class="btn btn-info">К заказам</a>
                <a href="<?php echo $import; ?>" target="_blank" id="import-city" data-toggle="tooltip" title="Импорт местоположений" class="btn btn-success"><i class="fa fa-upload"></i></a>
                <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a>
                <?php if ($button_save) { ?>
                <button type="submit" form="form-ozon" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
                <?php } ?>
            </div>
            <ul class="breadcrumb">
                <?php foreach ($breadcrumbs as $breadcrumb) { ?>
                <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <?php if ($success) { ?>
        <div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo $success; ?>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <?php } ?>

        <?php if ($error_warning) { ?>
        <div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <?php } ?>
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-ozon" class="form-horizontal">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab-main" data-toggle="tab"><?php echo $tab_main; ?></a></li>
                        <li><a href="#tab-general" data-toggle="tab"><?php echo $tab_general; ?></a></li>
                        <li><a href="#tab-dimensions" data-toggle="tab"><?php echo $tab_dimensions; ?></a></li>
                        <li><a href="#tab-calculate-shipping" data-toggle="tab"><?php echo $tab_calculate_shipping; ?></a></li>
                        <li><a href="#tab-sender" id="test" data-toggle="tab"><?php echo $tab_sender; ?></a></li>
                        <li><a href="#tab-status" data-toggle="tab"><?php echo $tab_status; ?></a></li>
                        <li><a href="#tab-faq" data-toggle="tab">FAQ</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-main">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="input-status-module"><?php echo $entry_status_module; ?></label>
                                <div class="col-sm-3">
                                    <select name="ozon_status" id="input-status-module" class="form-control">
                                        <?php if ($ozon_status) { ?>
                                        <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                                        <option value="0"><?php echo $text_disabled; ?></option>
                                        <?php } else { ?>
                                        <option value="1"><?php echo $text_enabled; ?></option>
                                        <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <label class="col-sm-3 control-label" for="input-ozon_uncovering"><span data-toggle="tooltip" title="Разрешить вскрытие отправления покупателем по умолчанию. Влияет на автоустановку соответствующего флага при отправке заказа.">Разрешение вскрытия отправления по-умолчанию:</span></label>
                                <div class="col-sm-4">
                                    <div class="checkbox">
                                        <label> <?php if ($ozon_uncovering) { ?>
                                            <input type="checkbox" id="input-ozon_uncovering" name="ozon_uncovering" checked="checked" />
                                            <?php } else { ?>
                                            <input type="checkbox" id="input-ozon_uncovering" name="ozon_uncovering" />
                                            <?php } ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"><?php echo $entry_sort_order; ?></label>
                                <div class="col-sm-3">
                                    <input type="number" name="ozon_sort_order" value="<?php echo $ozon_sort_order; ?>" class="form-control">
                                </div>
                                <label class="col-sm-3 control-label" for="input-ozon_partial_delivery"><span data-toggle="tooltip" title="Разрешить частичную выдачу заказа. Влияет на автоустановку соответствующего флага при отправке заказа.">Разрешение частичной выдачи по-умолчанию:</span></label>
                                <div class="col-sm-4">
                                    <div class="checkbox">
                                        <label> <?php if ($ozon_partial_delivery) { ?>
                                            <input type="checkbox" id="input-ozon_partial_delivery" name="ozon_partial_delivery" checked="checked" />
                                            <?php } else { ?>
                                            <input type="checkbox" id="input-ozon_partial_delivery" name="ozon_partial_delivery" />
                                            <?php } ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            </br>
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab-to-door" data-toggle="tab"><?php echo $tab_to_door; ?></a></li>
                                <li><a href="#tab-from-terminal" data-toggle="tab"><?php echo $tab_from_terminal; ?></a></li>
                                <li><a href="#tab-from-postomat" data-toggle="tab"><?php echo $tab_from_postomat; ?></a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab-to-door">
                                    <div class="form-group required">
                                        <div class="sh-flex">
                                            <label class="col-sm-2 control-label"><?php echo $entry_name; ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" name="ozon_name_door" value="<?php echo $ozon_name_door; ?>" class="form-control">
                                                <?php if ($error_name_door) { ?>
                                                <div class="text-danger"><?php echo $error_name_door; ?></div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-status"><?php echo $entry_status; ?></label>
                                        <div class="col-sm-4">
                                            <select name="ozon_door_status" id="input-status" class="form-control">
                                                <?php if ($ozon_door_status) { ?>
                                                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                                                <option value="0"><?php echo $text_disabled; ?></option>
                                                <?php } else { ?>
                                                <option value="1"><?php echo $text_enabled; ?></option>
                                                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="sh-flex">
                                            <label class="col-sm-2 control-label" for="description"><?php echo $entry_description; ?></label>
                                            <div class="col-sm-8">
                                                <textarea id="description" data-toggle="summernote" name="ozon_description_door" cols="90" rows="12"><?php echo $ozon_description_door; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-image"><?php echo $entry_image; ?></label>
                                        <div class="col-sm-10">
                                            <a href="" id="thumb-image-door" data-toggle="image" class="img-thumbnail"><img src="<?php echo $ozon_thumb_door; ?>" alt="" title="" data-placeholder="<?php echo $placeholder; ?>" /></a>
                                            <input type="hidden" name="ozon_image_door" value="<?php echo $ozon_image_door; ?>" id="input-image" /></td>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="sh-flex">
                                            <label class="col-sm-2 control-label"><?php echo $entry_markup; ?></label>
                                            <div class="col-sm-4">
                                                <input type="number" name="ozon_markup_door" value="<?php echo $ozon_markup_door; ?>" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-markup-type"><?php echo $entry_markup_type; ?></label>
                                        <div class="col-sm-4">
                                            <select name="ozon_markup_type_door" id="input-markup-type" class="form-control">
                                                <?php if ($ozon_markup_type_door) { ?>
                                                <option value="1" selected="selected"><?php echo $text_percent; ?></option>
                                                <option value="0"><?php echo $text_fix; ?></option>
                                                <?php } else { ?>
                                                <option value="1"><?php echo $text_percent; ?></option>
                                                <option value="0" selected="selected"><?php echo $text_fix; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-from-terminal">
                                    <div class="form-group required">
                                        <div class="sh-flex">
                                            <label class="col-sm-2 control-label"><?php echo $entry_name; ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" name="ozon_name_terminal" value="<?php echo $ozon_name_terminal; ?>" class="form-control">
                                                <?php if ($error_name_terminal) { ?>
                                                <div class="text-danger"><?php echo $error_name_terminal; ?></div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-status"><?php echo $entry_status; ?></label>
                                        <div class="col-sm-4">
                                            <select name="ozon_terminal_status" id="input-status" class="form-control">
                                                <?php if ($ozon_terminal_status) { ?>
                                                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                                                <option value="0"><?php echo $text_disabled; ?></option>
                                                <?php } else { ?>
                                                <option value="1"><?php echo $text_enabled; ?></option>
                                                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="sh-flex">
                                            <label class="col-sm-2 control-label" for="description"><?php echo $entry_description; ?></label>
                                            <div class="col-sm-8">
                                                <textarea id="description" data-toggle="summernote" name="ozon_description_terminal" cols="90" rows="12"><?php echo $ozon_description_terminal; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-image-terminal"><?php echo $entry_image; ?></label>
                                        <div class="col-sm-10">
                                            <a href="" id="thumb-image-terminal" data-toggle="image" class="img-thumbnail"><img src="<?php echo $ozon_thumb_terminal; ?>" alt="" title="" data-placeholder="<?php echo $placeholder; ?>" /></a>
                                            <input type="hidden" name="ozon_image_terminal" value="<?php echo $ozon_image_terminal; ?>" id="input-image-terminal" /></td>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="sh-flex">
                                            <label class="col-sm-2 control-label"><?php echo $entry_markup; ?></label>
                                            <div class="col-sm-4">
                                                <input type="number" name="ozon_markup_terminal" value="<?php echo $ozon_markup_terminal; ?>" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-markup-type"><?php echo $entry_markup_type; ?></label>
                                        <div class="col-sm-4">
                                            <select name="ozon_markup_type_terminal" id="input-markup-type" class="form-control">
                                                <?php if ($ozon_markup_type_terminal) { ?>
                                                <option value="1" selected="selected"><?php echo $text_percent; ?></option>
                                                <option value="0"><?php echo $text_fix; ?></option>
                                                <?php } else { ?>
                                                <option value="1"><?php echo $text_percent; ?></option>
                                                <option value="0" selected="selected"><?php echo $text_fix; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-from-postomat">
                                    <div class="form-group required">
                                        <div class="sh-flex">
                                            <label class="col-sm-2 control-label"><?php echo $entry_name; ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" name="ozon_name_postomat" value="<?php echo $ozon_name_postomat; ?>" class="form-control">
                                                <?php if ($error_name_postomat) { ?>
                                                <div class="text-danger"><?php echo $error_name_postomat; ?></div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-status"><?php echo $entry_status; ?></label>
                                        <div class="col-sm-4">
                                            <select name="ozon_postomat_status" id="input-status" class="form-control">
                                                <?php if ($ozon_postomat_status) { ?>
                                                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                                                <option value="0"><?php echo $text_disabled; ?></option>
                                                <?php } else { ?>
                                                <option value="1"><?php echo $text_enabled; ?></option>
                                                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="sh-flex">
                                            <label class="col-sm-2 control-label" for="description"><?php echo $entry_description; ?></label>
                                            <div class="col-sm-8">
                                                <textarea id="description" data-toggle="summernote" name="ozon_description_postomat" cols="90" rows="12"><?php echo $ozon_description_postomat; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-image-terminal"><?php echo $entry_image; ?></label>
                                        <div class="col-sm-10">
                                            <a href="" id="thumb-image-terminal" data-toggle="image" class="img-thumbnail"><img src="<?php echo $ozon_thumb_postomat; ?>" alt="" title="" data-placeholder="<?php echo $placeholder; ?>" /></a>
                                            <input type="hidden" name="ozon_image_postomat" value="<?php echo $ozon_image_postomat; ?>" id="input-image-terminal" /></td>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="sh-flex">
                                            <label class="col-sm-2 control-label"><?php echo $entry_markup; ?></label>
                                            <div class="col-sm-4">
                                                <input type="number" name="ozon_markup_postomat" value="<?php echo $ozon_markup_postomat; ?>" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-markup-type"><?php echo $entry_markup_type; ?></label>
                                        <div class="col-sm-4">
                                            <select name="ozon_markup_type_postomat" id="input-markup-type" class="form-control">
                                                <?php if ($ozon_markup_type_postomat) { ?>
                                                <option value="1" selected="selected"><?php echo $text_percent; ?></option>
                                                <option value="0"><?php echo $text_fix; ?></option>
                                                <?php } else { ?>
                                                <option value="1"><?php echo $text_percent; ?></option>
                                                <option value="0" selected="selected"><?php echo $text_fix; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-general">
                            <div class="tab-content">
                                <div class="form-group required">
                                    <div class="sh-flex">
                                        <label class="col-sm-4 control-label"><span data-toggle="tooltip" title="<?php echo $help_number; ?>"><?php echo $entry_client_id; ?></span></label>
                                        <div class="col-sm-4">
                                            <input type="text" name="ozon_client_id" value="<?php echo $ozon_client_id; ?>" class="form-control">
                                            <?php if ($error_client_id) { ?>
                                            <div class="text-danger"><?php echo $error_client_id; ?></div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <div class="sh-flex">
                                        <label class="col-sm-4 control-label"><span data-toggle="tooltip" title="<?php echo $help_auth; ?>"><?php echo $entry_client_secret; ?></span></label>
                                        <div class="col-sm-4">
                                            <input type="text" name="ozon_client_secret" value="<?php echo $ozon_client_secret; ?>" class="form-control">
                                            <?php if ($error_client_secret) { ?>
                                            <div class="text-danger"><?php echo $error_client_secret; ?></div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="input-test">Тестовый режим:</label>
                                <div class="col-sm-4">
                                    <div class="checkbox">
                                        <label> <?php if ($ozon_test) { ?>
                                            <input type="checkbox" id="input-test" name="ozon_test" checked="checked" />
                                            <?php } else { ?>
                                            <input type="checkbox" id="input-test" name="ozon_test" />
                                            <?php } ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="input-ozon-button"><span data-toggle="tooltip" title="Указывает модулю, когда добавлять на страницу заказа кнопку оформления заявки на доставку модуля: она отображается либо всегда, либо только если выбрана служба доставки модуля."><?php echo $entry_ozon_button; ?></span></label>
                                <div class="col-sm-4">
                                    <select name="ozon_button" id="input-ozon-button" class="form-control">
                                        <?php foreach($buttons_with_ozon as $_key => $button) { ?>
                                        <?php if ($button['value'] == $ozon_button) { ?>
                                        <option value="<?php echo $button['value']; ?>" selected="selected"><?php echo $button['name']; ?></option>
                                        <?php } else { ?>
                                        <option value="<?php echo $button['value']; ?>"><?php echo $button['name']; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="input-pvz"><?php echo $entry_pvz; ?></label>
                                <div class="col-sm-4">
                                    <div class="checkbox">
                                        <label> <?php if ($ozon_pvz) { ?>
                                            <input type="checkbox" id="input-pvz" name="ozon_pvz" checked="checked" />
                                            <?php } else { ?>
                                            <input type="checkbox" id="input-pvz" name="ozon_pvz" />
                                            <?php } ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10">
                                    <div class="alert alert-warning" style="color:black;" role="alert">
                                        Ключ для яндекс карту можно получить бесплатно на developer.tech.yandex.ru. При оформлении заявки необходимо выбрать пункт JavaScript API (первый в списке)
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="sh-flex">
                                    <label class="col-sm-4 control-label"><span data-toggle="tooltip" title="Для работы поиска на Яндекс.карте требуется ввод API-ключа. Получить его можно в Кабинете разработчика." >Ключ Яндекс Карт</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" name="ozon_yandex_api" value="<?php echo $ozon_yandex_api; ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="input-api-map"><span data-toggle="tooltip" title="<?php echo $help_api_map; ?>"><?php echo $entry_api_map; ?></span></label>
                                <div class="col-sm-4">
                                    <div class="checkbox">
                                        <label> <?php if ($ozon_api_map) { ?>
                                            <input type="checkbox" id="input-api-map" name="ozon_api_map" checked="checked" />
                                            <?php } else { ?>
                                            <input type="checkbox" id="input-api-map" name="ozon_api_map" />
                                            <?php } ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-dimensions">
                            <div class="alert alert-warning" style="color:black;"  role="alert">
                                <?php echo $text_dimensions; ?>
                            </div>
                            <div class="form-group required">
                                <div class="sh-flex">
                                    <label class="col-sm-4 control-label"><?php echo $entry_weight; ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" name="ozon_weight" value="<?php echo $ozon_weight; ?>" class="form-control">
                                        <?php if ($error_weight) { ?>
                                        <div class="text-danger"><?php echo $error_weight; ?></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group required">
                                <div class="sh-flex">
                                    <label class="col-sm-4 control-label"><?php echo $entry_length; ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" name="ozon_length" value="<?php echo $ozon_length; ?>" class="form-control">
                                        <?php if ($error_length) { ?>
                                        <div class="text-danger"><?php echo $error_length; ?></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group required">
                                <div class="sh-flex">
                                    <label class="col-sm-4 control-label"><?php echo $entry_width; ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" name="ozon_width" value="<?php echo $ozon_width; ?>" class="form-control">
                                        <?php if ($error_width) { ?>
                                        <div class="text-danger"><?php echo $error_width; ?></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group required">
                                <div class="sh-flex">
                                    <label class="col-sm-4 control-label"><?php echo $entry_height; ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" name="ozon_height" value="<?php echo $ozon_height; ?>" class="form-control">
                                        <?php if ($error_height) { ?>
                                        <div class="text-danger"><?php echo $error_height; ?></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-calculate-shipping">
                            <div class="form-group">
                                <div class="sh-flex">
                                    <label class="col-sm-4 control-label" for="input-cart-q-product"><span data-toggle="tooltip" title="Объявленная ценность посылки, равна стоимости товаров в корзине">Включать страховку в стоимость доставки:</span></label>
                                    <div class="col-sm-4">
                                        <div class="checkbox">
                                            <label> <?php if ($ozon_insurance) { ?>
                                                <input type="checkbox" id="input-cart-q-product" name="ozon_insurance" checked="checked" />
                                                <?php } else { ?>
                                                <input type="checkbox" id="input-cart-q-product" name="ozon_insurance" />
                                                <?php } ?>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-info" align="center" role="alert">
                                Настройка групп пользователей
                            </div>
                            <ul class="nav nav-tabs">
                                <?php foreach($customer_groups as $_key => $group) { ?>
                                <?php if ($minimum_customer_id == $group['customer_group_id']) { ?>
                                <li class="active"><a href="#tab-<?php echo $group['customer_group_id']; ?>" data-toggle="tab"><?php echo $group['name']; ?></a></li>
                                <?php } else { ?>
                                <li><a href="#tab-<?php echo $group['customer_group_id']; ?>" data-toggle="tab"><?php echo $group['name']; ?></a></li>
                                <?php } ?>
                                <?php } ?>
                            </ul>
                            <div class="tab-content">
                                <?php foreach($customer_groups as $_key => $group) { ?>
                                <?php if ($minimum_customer_id == $group['customer_group_id']) { ?>
                                <div class="tab-pane active" id="tab-<?php echo $group['customer_group_id']; ?>">
                                    <div class="form-group">
                                        <div class="sh-flex">
                                            <label class="col-sm-4 control-label" for="input-face-type<?php echo $group['customer_group_id']; ?>">Юр. лицо:</span></label>
                                            <div class="col-sm-4">
                                                <div class="checkbox">
                                                    <label> <?php if (${'ozon_face_type_' . $group['customer_group_id']}) { ?>
                                                        <input type="checkbox" id="input-face-type<?php echo $group['customer_group_id']; ?>" name="ozon_face_type_<?php echo $group['customer_group_id']; ?>" checked="checked" />
                                                        <?php } else { ?>
                                                        <input type="checkbox" id="input-face-type<?php echo $group['customer_group_id']; ?>" name="ozon_face_type_<?php echo $group['customer_group_id']; ?>" />
                                                        <?php } ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="binding-payment-<?php echo $group['customer_group_id']; ?>">
                                            Привяжите платежные системы, которые означают что оплата будет происходить наложенным платежом:
                                        </label>
                                        <div class="col-sm-3">
                                            <select name="ozon_bind_payment_<?php echo $group['customer_group_id']; ?>[]" multiple class="form-control" id="binding-payment-<?php echo $group['customer_group_id']; ?>">
                                                <option></option>
                                                <?php foreach($payment_methods as $_key => $payment) { ?>
                                                <?php if ($payment['code'] == ${'ozon_bind_payment_' . $group['customer_group_id'] . $payment['code']} ) { ?>
                                                <option value="<?php echo $payment['code']; ?>" selected="selected"><?php echo $payment['title']; ?></option>
                                                <?php } else { ?>
                                                <option value="<?php echo $payment['code']; ?>"><?php echo $payment['title']; ?></option>
                                                <?php } ?>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <?php } else { ?>
                                <div class="tab-pane" id="tab-<?php echo $group['customer_group_id']; ?>">
                                    <div class="form-group">
                                        <div class="sh-flex">
                                            <label class="col-sm-4 control-label" for="input-face-type<?php echo $group['customer_group_id']; ?>">Юр. лицо:</span></label>
                                            <div class="col-sm-4">
                                                <div class="checkbox">
                                                    <label> <?php if (${'ozon_face_type_' . $group['customer_group_id']}) { ?>
                                                        <input type="checkbox" id="input-face-type<?php echo $group['customer_group_id']; ?>" name="ozon_face_type_<?php echo $group['customer_group_id']; ?>" checked="checked" />
                                                        <?php } else { ?>
                                                        <input type="checkbox" id="input-face-type<?php echo $group['customer_group_id']; ?>" name="ozon_face_type_<?php echo $group['customer_group_id']; ?>" />
                                                        <?php } ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="binding-payment-<?php echo $group['customer_group_id']; ?>">
                                            Привяжите платежные системы, которые означают что оплата будет происходить наложенным платежом:
                                        </label>
                                        <div class="col-sm-3">
                                            <select name="ozon_bind_payment_<?php echo $group['customer_group_id']; ?>" multiple class="form-control" id="binding-payment-<?php echo $group['customer_group_id']; ?>">
                                                <option></option>
                                                <?php foreach($payment_methods as $_key => $payment) { ?>
                                                <?php if ($payment['code'] == ${'ozon_bind_payment_' . $group['customer_group_id']}) { ?>
                                                <option value="<?php echo $payment['code']; ?>" selected="selected"><?php echo $payment['title']; ?></option>
                                                <?php } else { ?>
                                                <option value="<?php echo $payment['code']; ?>"><?php echo $payment['title']; ?></option>
                                                <?php } ?>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-sender">
                            <div class="form-group">
                                <div class="sh-flex">
                                    <label class="col-sm-4 control-label">ФИО:</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="ozon_fio" value="<?php echo $ozon_fio; ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="sh-flex">
                                    <label class="col-sm-4 control-label">Телефон отправителя:</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="ozon_phone_sender" value="<?php echo $ozon_phone_sender; ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="sh-flex">
                                    <label class="col-sm-4 control-label">Email отправителя:</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="ozon_email_sender" value="<?php echo $ozon_email_sender; ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="sh-flex">
                                    <label class="col-sm-4 control-label">Название организации:</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="ozon_company" value="<?php echo $ozon_company; ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="sh-flex">
                                    <label class="col-sm-4 control-label">Юр.лицо:</label>
                                    <div class="col-sm-4">
                                        <div class="checkbox">
                                            <label> <?php if ($ozon_type) { ?>
                                                <input type="checkbox" name="ozon_type" checked="checked" />
                                                <?php } else { ?>
                                                <input type="checkbox" name="ozon_type" />
                                                <?php } ?>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-info" align="center" role="alert">
                                Адрес отправителя
                            </div>
                            <div class="form-group">
                                <div class="sh-flex">
                                    <label class="col-sm-4 control-label"><span data-toggle="tooltip" title="(Автозаполнение)">Склад:</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" name="ozon_warehouse" value="<?php echo $ozon_warehouse; ?>" id="warehouse" class="form-control warehouse">
                                        <input type="hidden" name="ozon_warehouse_id" id="warehouse_id" value="<?php echo $ozon_warehouse_id; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="sh-flex">
                                    <label class="col-sm-4 control-label">
                                        <span data-toggle="tooltip" title='Значение выставляется через автозаполнение поля "Склад"'>Город склада:</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="ozon_warehouse_city" value="<?php echo $ozon_warehouse_city; ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="sh-flex">
                                    <label class="col-sm-4 control-label">
                                        <span data-toggle="tooltip" title='Значение выставляется через автозаполнение поля "Склад"'>Адрес склада:</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="ozon_warehouse_address" value="<?php echo $ozon_warehouse_address; ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-status">
                            <div class="alert alert-warning" style="color:black;" role="alert">
                                Данная группа настроек нужна для того, чтобы оперативно отслеживать статусы заказов. При получении ответа заказы выставятся в указанные статусы если они приняты, или по каким-то причинам отклонены.
                            </div>
                            <div class="form-group">
                                <div class="sh-flex">
                                    <label class="col-sm-4 control-label" for="input-track-status-ozon">Отслеживать статусы заказов в OZON:</label>
                                    <div class="col-sm-4">
                                        <div class="checkbox">
                                            <label> <?php if ($ozon_track_status) { ?>
                                                <input type="checkbox" id="input-track-status-ozon" name="ozon_track_status" checked="checked" />
                                                <?php } else { ?>
                                                <input type="checkbox" id="input-track-status-ozon" name="ozon_track_status" />
                                                <?php } ?>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="input-status-5">Отправление зарегистрировано:</label>
                                <div class="col-sm-4">
                                    <select name="ozon_status_numb_5" id="input-status-5" class="form-control">
                                        <option value="non"><?php echo $text_non; ?></option>
                                        <?php foreach($order_statuses as $_key => $status) { ?>
                                        <?php if ($status['order_status_id'] == $ozon_status_numb_5) { ?>
                                        <option value="<?php echo $status['order_status_id']; ?>" selected="selected"><?php echo $status['name']; ?></option>
                                        <?php } else { ?>
                                        <option value="<?php echo $status['order_status_id']; ?>"><?php echo $status['name']; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="input-status-10">Передано в службу доставки:</label>
                                <div class="col-sm-4">
                                    <select name="ozon_status_numb_10" id="input-status-10" class="form-control">
                                        <option value="non"><?php echo $text_non; ?></option>
                                        <?php foreach($order_statuses as $_key => $status) { ?>
                                        <?php if ($status['order_status_id'] == $ozon_status_numb_10) { ?>
                                        <option value="<?php echo $status['order_status_id']; ?>" selected="selected"><?php echo $status['name']; ?></option>
                                        <?php } else { ?>
                                        <option value="<?php echo $status['order_status_id']; ?>"><?php echo $status['name']; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="input-status-1005">Ожидаемая дата доставки:</label>
                                <div class="col-sm-4">
                                    <select name="ozon_status_numb_1005" id="input-status-1005" class="form-control">
                                        <option value="non"><?php echo $text_non; ?></option>
                                        <?php foreach($order_statuses as $_key => $status) { ?>
                                        <?php if ($status['order_status_id'] == $ozon_status_numb_1005) { ?>
                                        <option value="<?php echo $status['order_status_id']; ?>" selected="selected"><?php echo $status['name']; ?></option>
                                        <?php } else { ?>
                                        <option value="<?php echo $status['order_status_id']; ?>"><?php echo $status['name']; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="input-status-1010">Отправление аннулировано:</label>
                                <div class="col-sm-4">
                                    <select name="ozon_status_numb_1010" id="input-status-1010" class="form-control">
                                        <option value="non"><?php echo $text_non; ?></option>
                                        <?php foreach($order_statuses as $_key => $status) { ?>
                                        <?php if ($status['order_status_id'] == $ozon_status_numb_1010) { ?>
                                        <option value="<?php echo $status['order_status_id']; ?>" selected="selected"><?php echo $status['name']; ?></option>
                                        <?php } else { ?>
                                        <option value="<?php echo $status['order_status_id']; ?>"><?php echo $status['name']; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="input-status-20">Отправлено в Ваш город:</label>
                                <div class="col-sm-4">
                                    <select name="ozon_status_numb_20" id="input-status-20" class="form-control">
                                        <option value="non"><?php echo $text_non; ?></option>
                                        <?php foreach($order_statuses as $_key => $status) { ?>
                                        <?php if ($status['order_status_id'] == $ozon_status_numb_20) { ?>
                                        <option value="<?php echo $status['order_status_id']; ?>" selected="selected"><?php echo $status['name']; ?></option>
                                        <?php } else { ?>
                                        <option value="<?php echo $status['order_status_id']; ?>"><?php echo $status['name']; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="input-status-40">Прибыло в Ваш город:</label>
                                <div class="col-sm-4">
                                    <select name="ozon_status_numb_40" id="input-status-40" class="form-control">
                                        <option value="non"><?php echo $text_non; ?></option>
                                        <?php foreach($order_statuses as $_key => $status) { ?>
                                        <?php if ($status['order_status_id'] == $ozon_status_numb_40) { ?>
                                        <option value="<?php echo $status['order_status_id']; ?>" selected="selected"><?php echo $status['name']; ?></option>
                                        <?php } else { ?>
                                        <option value="<?php echo $status['order_status_id']; ?>"><?php echo $status['name']; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="input-status-45">Готово к выдаче:</label>
                                <div class="col-sm-4">
                                    <select name="ozon_status_numb_45" id="input-status-45" class="form-control">
                                        <option value="non"><?php echo $text_non; ?></option>
                                        <?php foreach($order_statuses as $_key => $status) { ?>
                                        <?php if ($status['order_status_id'] == $ozon_status_numb_45) { ?>
                                        <option value="<?php echo $status['order_status_id']; ?>" selected="selected"><?php echo $status['name']; ?></option>
                                        <?php } else { ?>
                                        <option value="<?php echo $status['order_status_id']; ?>"><?php echo $status['name']; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="input-status-50">Отправление выдано:</label>
                                <div class="col-sm-4">
                                    <select name="ozon_status_numb_50" id="input-status-50" class="form-control">
                                        <option value="non"><?php echo $text_non; ?></option>
                                        <?php foreach($order_statuses as $_key => $status) { ?>
                                        <?php if ($status['order_status_id'] == $ozon_status_numb_50) { ?>
                                        <option value="<?php echo $status['order_status_id']; ?>" selected="selected"><?php echo $status['name']; ?></option>
                                        <?php } else { ?>
                                        <option value="<?php echo $status['order_status_id']; ?>"><?php echo $status['name']; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="input-status-60">Отправление выдано частично:</label>
                                <div class="col-sm-4">
                                    <select name="ozon_status_numb_60" id="input-status-60" class="form-control">
                                        <option value="non"><?php echo $text_non; ?></option>
                                        <?php foreach($order_statuses as $_key => $status) { ?>
                                        <?php if ($status['order_status_id'] == $ozon_status_numb_60) { ?>
                                        <option value="<?php echo $status['order_status_id']; ?>" selected="selected"><?php echo $status['name']; ?></option>
                                        <?php } else { ?>
                                        <option value="<?php echo $status['order_status_id']; ?>"><?php echo $status['name']; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="input-status-65">Частичный возврат после выдачи:</label>
                                <div class="col-sm-4">
                                    <select name="ozon_status_numb_65" id="input-status-65" class="form-control">
                                        <option value="non"><?php echo $text_non; ?></option>
                                        <?php foreach($order_statuses as $_key => $status) { ?>
                                        <?php if ($status['order_status_id'] == $ozon_status_numb_65) { ?>
                                        <option value="<?php echo $status['order_status_id']; ?>" selected="selected"><?php echo $status['name']; ?></option>
                                        <?php } else { ?>
                                        <option value="<?php echo $status['order_status_id']; ?>"><?php echo $status['name']; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="input-status-70">Отказ клиента:</label>
                                <div class="col-sm-4">
                                    <select name="ozon_status_numb_70" id="input-status-70" class="form-control">
                                        <option value="non"><?php echo $text_non; ?></option>
                                        <?php foreach($order_statuses as $_key => $status) { ?>
                                        <?php if ($status['order_status_id'] == $ozon_status_numb_70) { ?>
                                        <option value="<?php echo $status['order_status_id']; ?>" selected="selected"><?php echo $status['name']; ?></option>
                                        <?php } else { ?>
                                        <option value="<?php echo $status['order_status_id']; ?>"><?php echo $status['name']; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="input-status-80">Отправление не востребовано:</label>
                                <div class="col-sm-4">
                                    <select name="ozon_status_numb_80" id="input-status-80" class="form-control">
                                        <option value="non"><?php echo $text_non; ?></option>
                                        <?php foreach($order_statuses as $_key => $status) { ?>
                                        <?php if ($status['order_status_id'] == $ozon_status_numb_80) { ?>
                                        <option value="<?php echo $status['order_status_id']; ?>" selected="selected"><?php echo $status['name']; ?></option>
                                        <?php } else { ?>
                                        <option value="<?php echo $status['order_status_id']; ?>"><?php echo $status['name']; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="input-status-90">Передано курьеру:</label>
                                <div class="col-sm-4">
                                    <select name="ozon_status_numb_90" id="input-status-90" class="form-control">
                                        <option value="non"><?php echo $text_non; ?></option>
                                        <?php foreach($order_statuses as $_key => $status) { ?>
                                        <?php if ($status['order_status_id'] == $ozon_status_numb_90) { ?>
                                        <option value="<?php echo $status['order_status_id']; ?>" selected="selected"><?php echo $status['name']; ?></option>
                                        <?php } else { ?>
                                        <option value="<?php echo $status['order_status_id']; ?>"><?php echo $status['name']; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="input-status-100">Возврат отправлен на склад:</label>
                                <div class="col-sm-4">
                                    <select name="ozon_status_numb_100" id="input-status-100" class="form-control">
                                        <option value="non"><?php echo $text_non; ?></option>
                                        <?php foreach($order_statuses as $_key => $status) { ?>
                                        <?php if ($status['order_status_id'] == $ozon_status_numb_100) { ?>
                                        <option value="<?php echo $status['order_status_id']; ?>" selected="selected"><?php echo $status['name']; ?></option>
                                        <?php } else { ?>
                                        <option value="<?php echo $status['order_status_id']; ?>"><?php echo $status['name']; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="input-status-110">Возврат прибыл на склад:</label>
                                <div class="col-sm-4">
                                    <select name="ozon_status_numb_110" id="input-status-110" class="form-control">
                                        <option value="non"><?php echo $text_non; ?></option>
                                        <?php foreach($order_statuses as $_key => $status) { ?>
                                        <?php if ($status['order_status_id'] == $ozon_status_numb_110) { ?>
                                        <option value="<?php echo $status['order_status_id']; ?>" selected="selected"><?php echo $status['name']; ?></option>
                                        <?php } else { ?>
                                        <option value="<?php echo $status['order_status_id']; ?>"><?php echo $status['name']; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="input-status-115">Возврат готов к передаче отправителю:</label>
                                <div class="col-sm-4">
                                    <select name="ozon_status_numb_115" id="input-status-115" class="form-control">
                                        <option value="non"><?php echo $text_non; ?></option>
                                        <?php foreach($order_statuses as $_key => $status) { ?>
                                        <?php if ($status['order_status_id'] == $ozon_status_numb_115) { ?>
                                        <option value="<?php echo $status['order_status_id']; ?>" selected="selected"><?php echo $status['name']; ?></option>
                                        <?php } else { ?>
                                        <option value="<?php echo $status['order_status_id']; ?>"><?php echo $status['name']; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="input-status-120">Возврат передан отправителю:</label>
                                <div class="col-sm-4">
                                    <select name="ozon_status_numb_120" id="input-status-120" class="form-control">
                                        <option value="non"><?php echo $text_non; ?></option>
                                        <?php foreach($order_statuses as $_key => $status) { ?>
                                        <?php if ($status['order_status_id'] == $ozon_status_numb_120) { ?>
                                        <option value="<?php echo $status['order_status_id']; ?>" selected="selected"><?php echo $status['name']; ?></option>
                                        <?php } else { ?>
                                        <option value="<?php echo $status['order_status_id']; ?>"><?php echo $status['name']; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-faq">
                            <div class="alert alert-info" align="center" role="alert">О модуле</div>
                            <a href="javascript:void(0);" style="font-size:15px;" id="moduleFor">- Для чего нужен модуль</a>
                            <div id="moduleForContent" class="faq-content" style="display:none; margin: 7px;">
                                Модуль обеспечивает интеграцию Интернет-магазина со службой доставки Ozon. Обеспечивается отправка заявок на доставку заказов, мониторинг статусов доставки заказов и выставление соответствующих им статусов в админке Opencart. В модуле присутствует функционал для получения наклеек, актов приема-передачи, которые затем можно распечатать.

                                Вместе с модулем устанавливается служба доставки Ozon, позволяющая покупателям выбрать удобный для них способ доставки: курьер, самовывоз, либо постамат, а также желаемую точку выдачи заказов.

                                Стоимость доставки вычисляется с помощью данных о доступных вариантах доставки, полученных от сервера Ozon.
                            </div>
                            <br />
                            <a href="javascript:void(0);" style="font-size:15px;" id="moduleWork">- Как работает модуль</a>
                            <div id="moduleWorkContent" class="faq-content" style="display:none; margin: 7px;">
                                Состав модуля:
                                <ul>
                                    <li>функционал службы доставки Ozon;</li>
                                    <li>функционал расчета габаритов заказа;</li>
                                    <li>функионал расчета стоимости доставки;</li>
                                    <li>функционал отображения информации о пунктах выдачи заказов и постаматах;</li>
                                    <li>функционал оформления заявки на доставку;</li>
                                    <li>функционал скачивания наклеек, актов приема-передачи;</li>
                                    <li>функционал синхронизации вариантов доставки с базой сервера Ozon;</li>
                                    <li>база данных с отосланными заявками;</li>
                                    <li>прочий функционал</li>
                                </ul>
                                <p>Модуль устанавливает новую службу доставки "Интеграция с Ozon". У нее есть профили Курьер, Самовывоз и Постамат.</p>
                                <p>Они будут отображаться на странице оформления заказа, если в выбранном покупателем городе доставки возможна доставка соответствующим профилем с учетом его персональных настроек. Возможность доставки определенным профилем, стоимость и сроки рассчитываются модулем на основании данных, полученных от сервера Ozon.</p>
                                <p>Заявка на доставку составляется для каждого заказа в отдельности, контроль за корректностью введенных данных возлагается на менеджера магазина, отправляющего заявку. При сохранении данные о заявке сохраняются в базу данных. При отправке заявки модуль формирует запрос согласно документации API Ozon и отправляет его на сервер. Результат обработки заявки приходит сразу же, выдавая либо ошибку, либо информацию об успешном принятии заявки. Отосланные заявки при необходимости можно отменить. </p>
                                <p><span style="color:red;">Важно!</span> данный модуль разработан компанией, специализирующейся на разработке модулей доставки, но не являющейся представителем Ozon, поэтому мы не можем ответить на вопросы касательно работы самого сервиса Ozon.</p>
                            </div>
                            <div class="alert alert-info" style="margin:10px 0px;" align="center" role="alert">Начало работы</div>
                            <a href="javascript:void(0);" style="font-size:15px;" id="moduleSettings">- Настройка службы доставки</a>
                            <div id="moduleSettingsContent" class="faq-content" style="display:none; margin: 7px;">
                                <p>В первую очередь не стоит пугаться большого количества оповещений, которые отображаются в опциях ненастроенного модуля. Вы уже на верном пути, если обратились к FAQ.</p>
                                <p><b>Настройка состоит из следующих шагов:</b></p>
                                <ul>
                                    <li>Заполнение настроек;</li>
                                    <li>Выполнить импорт местоположений;</li>
                                </ul>
                                <p>Заполнение опций модуля необходимо вести согласно блокам документации, расположенным рядом с группами настроек. Наведите на иконку со знаком вопроса для получения подробной информации об опции.</p>
                                <p>Ограничения по весу заказа учитываются самим модулем при расчете служб доставки. Данные о габаритах и весе товара берутся только из штатных параметров Торгового каталога. Если модуль некорректно обрабатывает вес заказа - проверьте в первую очередь настройки торгового каталога в товаре.</p>
                            </div>
                            <br />
                            <a href="javascript:void(0);" style="font-size:15px;" id="moduleOrder">- Оформление и отправка заявки</a>
                            <div id="moduleOrderContent" class="faq-content" style="display:none; margin: 7px;">
                                <p>Для открытия формы отправки необходимо воспользоваться кнопкой "Ozon доставка" в шапке на странице просмотра заказа.</p>
                                <p>В открывшемся окне необходимо заполнить данные заявки. Модуль проверит заполненность необходимых полей. По умолчанию поля будут заполнены свойствами заказа согласно указаниям в настройках.</p>
                                <p>Если заявка готова к отправке - нажмите кнопку "Отправить". После оповещения, что заявка сохранена, можно закрыть окно. Если при отравке возникнут ошибки, их можно просмотреть в этом же окне.</p>
                                <p>Возможна отправка заявки, содержащей только один заказ (то есть только методом, описанным выше).</p>
                            </div>
                            <br />
                            <a href="javascript:void(0);" style="font-size:15px;" id="moduleStatus">- Отслеживание состояний (статусов)</a>
                            <div id="moduleStatusContent" class="faq-content" style="display:none; margin: 7px;">
                                <p><b>Таблица заказов</b></p>
                                <p>Таблица заказов находится в разделе "Продажи" -> "Заказы". На этой странице можно ознакомиться с состояниями всех имеющихся заявок, с возможностью их фильтрации и сортировки.</p>
                                <p>Здесь принятые заказы можно отозвать и удалить, распечатать наклейку и акт приема-передачи, проверить статус. В случае успешной отправки заявки все эти действия можно производить и из окна оформления заявки на странице конкретного заказа.</p>
                                <p><b>Обновление информации о заявке</b></p>
                                <p>Обновление информации происходит через планировщик задач (cron) на вашем сервере или хостинге</p>
                                <p>Пример планировщика для возможности отслеживания и обновления статусов посылок /usr/bin/GET https://ВашСайт/index.php?route=extension/shipping/ozon/getStatus.</p>
                                <p><b>Получение наклейки и акта приема-передачи</b></p>
                                <p>Если заявка имеет статус "Заказ успешно зарегистрирован" и выше - заявка принята и можно получить с сервера Ozon файл наклейки, либо акта приема-передачи по заказу для распечатки. Аналогичная возможность есть и в форме отправки заявок.</p>

                            </div>
                            <div class="alert alert-info" style="margin:10px 0px;" align="center" role="alert">Справочная информация</div>
                            <a href="javascript:void(0);" style="font-size:15px;" id="moduleTest">- Тестовый аккаунт</a>
                            <div id="moduleTestContent" class="faq-content" style="display:none; margin: 7px 5px 0px 7px;">
                                <p>Модуль поддерживает работу с тестовым контуром: вы можете авторизоваться с тестовыми доступами, чтобы проверить его работу. Учтите несколько важных моментов:</p>
                                <ul>
                                    <li>Если вы планируете отправить какие-то текущие заказы в Ozon, это следует сделать до смены доступов.</li>
                                    <li>Доступные варианты доставки, склады отправки отправлений и непосредственно тарификация стоимости доставки могут отличаться от аккаунта к аккаунту - поэтому в случае перелогинивания на другой необходимо заново запустить импорт, а также выбрать желаемый склад из доступных вариантов.</li>
                                </ul>
                            </div>
                            <br />
                            <a href="javascript:void(0);" style="font-size:15px;" id="moduleCalculate">- Особенности расчета стоимости доставки</a>
                            <div id="moduleCalculateContent" class="faq-content" style="display:none; margin: 7px;">
                                <p>Стоимость доставки рассчитывается на сервере Ozon с учетом доступных вариантов доставки а также выбранного склада отправки отправлений.</p>
                                <p>Стоимость доставки зависит от веса заказа. Также производится проверка по габаритам заказа применительно к доступным вариантам доставки, заведомо не подходящие отсеиваются. Если в заказе несколько товаров - модуль считает их единой коробкой и выводит стоимость доставки для этой упаковки.</p>
                                <p>Габариты и вес, для которых рассчитывается доставка можно увидеть на странице заказа (в админке), нажав на кнопку "Ozon доставка" и щелкнув в открывшемся окне по заголовку "Габариты заказа".</p>
                                <p>Если в заказе присутствуют товары с неуказанными габаритами или весом - то расчет изначально производится без их учета. Для расчета стоимости доставки принимается максимальное значение из рассчитанных габаритов или веса и значения по умолчанию. Таким образом, причина того, что заказ в модуле весит больше, чем на сайте, в том, что в составе этого заказа есть товар с неуказанными габаритами.</p>
                            </div>
                            <br />
                            <a href="javascript:void(0);" style="font-size:15px;" id="moduleProblems">- Частые проблемы</a>
                            <div id="moduleProblemsContent" class="faq-content" style="display:none; margin: 7px;">
                                <b>Расчет не совпадает с личным кабинетом.</b>
                                <p>Внимательно ознакомьтесь с пунктом FAQ "Особенности расчета стоимости доставки": в нем детально расписано, как считается вес и габариты товара. Убедитесь, что вы работаете с боевыми доступами.</p>
                                <b>Доставка не считается.</b>
                                <p>Убедитесь, что выбран склад отправки отправлений в настройках модуля. Обновите кэш модификаторов и проверьте журнал ошибок.</p>
                                <b>Служба доставки не отображается.</b>
                                <b>Служба доставки не отображается.</b>
                                <ul>
                                    <li>Убедитесь, что вы ввели верные данные авторизации в модуле.</li>
                                    <li>Убедитесь, что импорт был выполнен.</li>
                                    <li>Убедитесь, что в настройках модуля выбран склад отправки отправлений.</li>
                                    <li>Проверьте включена ли доставка и ее профили.</li>
                                </ul>
                                <b>Не отображается кнопка "OZON доставка" для оформления заявки.</b>
                                <p>Убедитесь, что вы ввели верные данные авторизации в модуле и Обновите кэш модификаторов.</p>
                                <b>Не отсылается заявка.</b>
                                <ul>
                                    <li>Убедитесь, что исправлены все возможные ошибки в полях (неверный формат телефона, заполнены все необходимые поля, определен склад отправки отправлений).</li>
                                    <li>Удалите (замените) из полей символы кавычек, углобые скобки, итп.</li>
                                    <li>Убедитесь, что на странице оформления доставок после очистки кэша продолжают отображаться доставки. Если нет - сервер OZON "лежит".</li>
                                </ul>
                                <b>Заявка отправилась, но не появилась в ЛК.</b>
                                <ul>
                                    <li>Убедитесь, что сервер OZON доступен (после очистки кэша продолжают отображаться в оформлении заказа), иначе - нужно ждать, пока сервер не "поднимется".</li>
                                    <li>Убедитесь, что заявка была отправлена в боевом режиме и с корректного аккаунта.</li>
                                </ul>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript" src="view/javascript/summernote/summernote.js"></script>
<link href="view/javascript/summernote/summernote.css" rel="stylesheet" />
<script type="text/javascript" src="view/javascript/summernote/summernote-image-attributes.js"></script>
<script type="text/javascript" src="view/javascript/summernote/opencart.js"></script>
<script type="text/javascript"><!--
	var xhr;

    $('input[name="ozon_warehouse"').autocomplete({
        'delay': 0,
        'source': function(request, response) {
            var regex = new RegExp(request.term, 'i');
            if(xhr){
                xhr.abort();
            }

            var fn = function(){
                xhr = $.ajax({
                    url: 'index.php?route=extension/shipping/ozon/autocomplete&token=<?php echo $token; ?>&filter_name=' +  encodeURIComponent(request),
                    dataType: 'json',
                    success: function(json) {
                        json.unshift({
                            city_id: 0,
                            name: '<?php echo $text_none; ?>'
                        });

                        response($.map(json, function(item) {
                            if(regex.test(item.label)){
                                return {
                                    label: item['name'],
                                    name: item['name'],
                                    id: item['id'],
                                    city: item['city'],
                                    address: item['address'],
                                }
                            }
                        }));
                    },
                });
            };
            var interval = setTimeout(fn, 400);
        },
        'minlength':2,
        'select': function(item) {
            $('input[name="ozon_warehouse"').val(item['name']);
            $('input[name="ozon_warehouse_id"').val(item['id']);
            $('input[name="ozon_warehouse_city"').val(item['city']);
            $('input[name="ozon_warehouse_address"').val(item['address']);
        }
    });

    $("#input-ozon_uncovering").click(function() {
        if ($('#input-ozon_uncovering').is(':checked')){
            $('#input-ozon_partial_delivery').prop('checked', true);
        }else{
            $('#input-ozon_partial_delivery').prop('checked', false);
        }
    });

    $("#input-ozon_partial_delivery").click(function() {
        if ($('#input-ozon_partial_delivery').is(':checked')){
            $('#input-ozon_uncovering').prop('checked', true);
        }else{
            $('#input-ozon_uncovering').prop('checked', false);
        }
    });

    $('#moduleFor').click(function(){
        $('#moduleForContent').toggle();
    });

    $('#moduleWork').click(function(){
        $('#moduleWorkContent').toggle();
    });

    $('#moduleSettings').click(function(){
        $('#moduleSettingsContent').toggle();
    });

    $('#moduleOrder').click(function(){
        $('#moduleOrderContent').toggle();
    });

    $('#moduleStatus').click(function(){
        $('#moduleStatusContent').toggle();
    });

    $('#moduleTest').click(function(){
        $('#moduleTestContent').toggle();
    });

    $('#moduleCalculate').click(function(){
        $('#moduleCalculateContent').toggle();
    });

    $('#moduleProblems').click(function(){
        $('#moduleProblemsContent').toggle();
    });

</script>
<?php echo $footer; ?>
