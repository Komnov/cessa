if ($(window).width() <= 1024) {
    var width = ($(window).width() * 19) / 20;
} else {
    var width = ($(window).width() * 3) / 4;
}
if ($(window).height() < 1024) {
    var height = ($(window).height() * 14) / 20;
} else {
    var height = 900;
}


$(document).ready(function () {
    $('[name="shipping_method"]').removeAttr("checked");

    if (width < 1024) {
        $("#ozon-modal .ozon-modal-dialog").removeAttr("style");
    }
});

$(window).resize(function () {
    if ($(window).width() <= 1024) {
        var width = ($(window).width() * 19) / 20;
    } else {
        var width = ($(window).width() * 3) / 4;
    }
    if ($(window).height() < 1024) {
        var height = ($(window).height() * 14) / 20;
    } else {
        var height = 900;
    }
    if (width < 1024) {
        $("#ozon-modal .ozon-modal-dialog").removeAttr("style");
    } else {
        $("#ozon-modal .ozon-modal-dialog").css("width", width + "px");
    }

    if($(window).width() <= 767) {
    	var ozonMapH = $('#ozon_map').parents('.ozon-map-container').height();
		$("#ozon_map").height(ozonMapH);
		$('#ozon-modal .ozon-modal-dialog .ozon-pvz-list').removeAttr("style");
		if($('.ozon-pvz-list .tab-content').hasClass('open')) {
			$('.ozon-pvz-list .tab-content').height(ozonMapH);
		}
	} else {
		$("#ozon_map").height(height);
		$('#ozon-modal .ozon-modal-dialog .ozon-pvz-list').height(height);
		if($('.ozon-pvz-list .tab-content').hasClass('open') || $('.ozon-pvz-list .tab-content').height() === 0) {
			$('.ozon-pvz-list .tab-content').removeAttr("style");
			$('.ozon-pvz-list .tab-content').removeClass('open');
		}
	}
});

$(document).on("click", '[name="shipping_method"]', function () {
    shipping_method = $("input[name='shipping_method']:checked").val();

    if (typeof reloadAll == "function") {
        reloadAll();
    }

    if (shipping_method == "ozon.ozonterminal") {
        if (document.getElementById("ozon-hide-pvz")) {
            document.getElementById("ozon-hide-pvz").style.display = "block";
        } else if (document.getElementById("ozon-hide-pvz-simple")) {
            document.getElementById("ozon-hide-pvz-simple").style.display =
                "block";
        }
    } else {
        if (document.getElementById("ozon-hide-pvz")) {
            document.getElementById("ozon-hide-pvz").style.display = "none";
        } else if (document.getElementById("ozon-hide-pvz-simple")) {
            document.getElementById("ozon-hide-pvz-simple").style.display =
                "none";
        }
    }

    if (shipping_method == "ozon.ozonpostomat") {
        if (document.getElementById("ozon-hide-postamat")) {
            document.getElementById("ozon-hide-postamat").style.display =
                "block";
        } else if (document.getElementById("ozon-hide-postamat-simple")) {
            document.getElementById("ozon-hide-postamat-simple").style.display =
                "block";
        }
    } else {
        if (document.getElementById("ozon-hide-postamat")) {
            document.getElementById("ozon-hide-postamat").style.display =
                "none";
        } else if (document.getElementById("ozon-hide-postamat-simple")) {
            document.getElementById("ozon-hide-postamat-simple").style.display =
                "none";
        }
    }
});

var ozonModal = $('<div class="ozon-modal ozon-fade" id="ozon-modal" tabindex="-1" role="dialog"></div>');


var ozonModalContent =
    '<div class="ozon-modal-dialog ozon-modal-lg">' +
    '<div class="ozon-modal-content">' +
    '<div class="ozon-modal-header">' +
    '<button type="button" class="ozon-close" data-dismiss="modal" aria-label="Закрыть"><span aria-hidden="true">×</span></button>' +
    '<h4 class="ozon-modal-title"></h4>' +
    "</div>" +
    '<div class="ozon-modal-body">' +
    '<div class="ozon-container-fluid">' +
    '<div class="ozon-row ozon-map-row">' +
    '<div class="ozon-col-md-3 ozon-pvz-list" id="ozon-filter_content"></div>' +
    '<div class="ozon-col-sm-12 ozon-col-md-9 ozon-map-container">' +
    '<div id="ozon_map"></div>' +
    "</div></div></div></div></div></div>";

ozonModal.append(ozonModalContent);

if($(window).width() > 767) {
	ozonModal.find('.ozon-modal-dialog').width(width);
	ozonModal.find('.ozon-pvz-list').height(height);
	ozonModal.find('#ozon_map').height(height);
}

var ozonMap;

$(document).on("click", "#ozon-open-pvz-simple", function () {
    Ozon.points();
});

$(document).on("click", "#ozon-open-pvz", function () {
    Ozon.points();
});

$(document).on("click", "#ozon-open-postamat-simple", function () {
    Ozon.pointsTwo();
});

$(document).on("click", "#ozon-open-postamat", function () {
    Ozon.pointsTwo();
});

$(document).on("click", ".toggle-tab-content", function (e) {
	e.preventDefault();
	if($(window).width() <= 767) {
		var $tabContent = $(this).parents('.ozon-pvz-list').find('.tab-content');
		if($(this).hasClass('open')) {
			$(this).removeClass('open');
			$tabContent.height(0);
		} else {
			$(this).addClass('open');
			$tabContent.height($("#ozon_map").height());
		}
	}
});

$(document).on("click", ".toggle-tab-content2", function (e) {
	e.preventDefault();
	if($(window).width() <= 767) {
		var $tabContent = $(this).parents('.ozon-pvz-list').find('.tab-content');
		if($(this).hasClass('open')) {
			$(this).removeClass('open');
			$tabContent.height(0);
		} else {
			$(this).addClass('open');
			$tabContent.height($("#ozon_map").height());
		}
	}
});

var Ozon = {
    points: function () {
        $("#ozon-open-pvz").attr("disabled","disabled");
		$("#ozon-open-pvz").button('loading');
        $("#ozon-modal").remove();

        $("body").append(ozonModal);
        ymaps.ready(init);

        function init() {
            ozonMap = new ymaps.Map(
                "ozon_map",
                {
                    center: [55.76, 37.64],
                    zoom: 9,
                    controls: ["searchControl"],
                },
                {
                    // Будет производиться поиск по топонимам и организациям.
                    searchControlProvider: "yandex#search",
                }
            );

            if ($(window).width() >= 767) {
                var fBallibContentHead =
                    '<div style="line-height: 170%; margin: 10px;">';
            } else {
                var fBallibContentHead =
                    '<div style="line-height: 100%; width: 180px; margin: 10px;">';
            }

            var BalloonContentLayout = ymaps.templateLayoutFactory.createClass(
                fBallibContentHead +
                    "<b>Адресс пункта выдачи заказов:</b></br><h4>{{properties.address}}</h4>" +
                    "[if properties.workingHours.0.day]<b>Время работы:</b></br>" +
                    '<i class="fa fa-clock-o" aria-hidden="true"></i> {{properties.workingHours[0].day}}</br>[endif]' +
                    '[if properties.workingHours.1.day]<i class="fa fa-clock-o" aria-hidden="true"></i> {{properties.workingHours[1].day}}</br>[endif]' +
                    '[if properties.workingHours.2.day]<i class="fa fa-clock-o" aria-hidden="true"></i> {{properties.workingHours[2].day}}</br>[endif]' +
                    '[if properties.workingHours.3.day]<i class="fa fa-clock-o" aria-hidden="true"></i> {{properties.workingHours[3].day}}</br>[endif]' +
                    '[if properties.workingHours.4.day]<i class="fa fa-clock-o" aria-hidden="true"></i> {{properties.workingHours[4].day}}</br>[endif]' +
                    '[if properties.workingHours.5.day]<i class="fa fa-clock-o" aria-hidden="true"></i> {{properties.workingHours[5].day}}</br>[endif]' +
                    '[if properties.workingHours.6.day]<i class="fa fa-clock-o" aria-hidden="true"></i> {{properties.workingHours[6].day}}</br>[endif]' +
                    "[if properties.description]<b>Описание:</b></br><h4>{{properties.description}}</h4>[endif]" +
                    "[if properties.howToGet]<b>Описание проезда:</b></br><h4>{{properties.howToGet}}</h4>[endif]" +
                    '<button type="button" class="btn btn-outline-secondary btn-sm" id="ozon_button"><i class="fa fa-check" aria-hidden="true"></i> Выбрать</button>' +
                    "</div>",
                {
                    build: function () {
                        BalloonContentLayout.superclass.build.call(this);
                        $("#ozon_button").bind("click", this.onCounterClick);
                    },
                    clear: function () {
                        $("#ozon_button").unbind("click", this.onCounterClick);
                        BalloonContentLayout.superclass.clear.call(this);
						
						$('[name="shipping_address[address_1]"], [name="address_1"]').val(this._data.object.properties.address);
						
						if ($("input[name=address_same]").is(":checked")) {
							$('[name="payment_address[address_1]"]').val(this._data.object.properties.address);
						}
						
						$.post("index.php?route=extension/shipping/ozon/save", {
							address: this._data.object.properties.address,
						}).done(function (data) {});
                    },
                    onCounterClick: function () {
                        $("#ozon-modal").modal("hide");
                    },
                }
            );

            objectManager = new ymaps.ObjectManager({
                clusterize: true,
                clusterHasBalloon: true,
            });

            objectManager.clusters.options.set({
                gridSize: 50,
                preset: "islands#blueIcon",
                hasBalloon: false,
                groupByCoordinates: false,
                clusterDisableClickZoom: false,
                maxZoom: 8,
                zoomMargin: [45],
                clusterHideIconOnBalloonOpen: false,
                geoObjectHideIconOnBalloonOpen: false,
            });

            objectManager.objects.options.set({
                balloonContentLayout: BalloonContentLayout,
            });

            ozonMap.geoObjects.add(objectManager);

            var filter_down = "";

            /* действие при закрытии всплывающего окна */
            $("#ozon-modal").on("hidden.bs.modal", function (e) {
                ozonMap.destroy();

                $(this).remove();

                if (typeof reloadAll == "function") {
                    setTimeout(function () {
                        reloadAll();
                    }, 500);
                }
            });

            $.post("index.php?route=extension/shipping/ozon/getTerminalPvz", {
                filter_down: filter_down,
            }).done(function (data) {
				$("#ozon-open-pvz").removeAttr("disabled");
				$("#ozon-open-pvz").button('reset');
				
                objectManager.add(data);

                if (data.position) {
                    $("#ozon-modal").modal("show");
                    $("#ozon-modal .ozon-modal-title").html(
                        '<div style="background-size: auto 90%; line-height:38px; height:38px;">Пункты самовывоза</div>'
                    );
                    ozonMap.setCenter(
                        [data.position.location[0], data.position.location[1]],
                        data.features.length == 1 ? 13 : 10
                    );
                }

                /* создаем макет левого блока со списком адресов ПВЗ */
                var template = "";
                var price = $('[name="shipping_method"]:checked')
                    .closest("label")
                    .text()
                    .split("-");

                if (price[0] !== "") {
                    template +=
                        '<div class="delivery-text"><span>Стоимость ' +
                        price[1] +
                        "</span> <span class='toggle-tab-content'></span></div>";

                    if ($(window).width() >= 767) {
                        $(
                            '<div class="ozon-price"></br>Стоимость: <b>' +
                                price[1] +
                                "</b></br></div>"
                        ).insertBefore("#ozon_button");
                    } else {
                        $(
                            '<div class="ozon-price">Стоимость: <b>' +
                                price[1] +
                                "</b></br></div>"
                        ).insertBefore("#ozon_button");
                    }
                }

                template += '<div class="tab-content">';
                template += '<div class="tab-pane active">';
                if (data.features) {
                    $.each(data.features, function (i, e) {
                        template +=
                            '<div class="ozon-filter ozon-list-group-item" data-point-id="' +
                            e.properties.id +
                            '" data-location="' +
                            e.geometry.coordinates +
                            '">';
                        template +=
                            '<div style="font-size:12px;">' +
                            e.properties.address +
                            "</div>";
                        template += "</div>";
                    });
                }
                template += "</div>";
                template += "</div>";
                $("#ozon-filter_content").html(template);

                /* действие по клику на элемент списка ПВЗ */
                $(document).on("click", ".ozon-filter", function (event) {
                    $(".ozon-filter").removeClass("ozon-point-active");
					$(".toggle-tab-content").click();

                    $(this).addClass("ozon-point-active");

                    var objectId = $(this).attr("data-point-id"),
                        location = $(this).attr("data-location").split(",");

                    objectManager.objects.balloon.open(objectId);

                    $.post("index.php?route=extension/shipping/ozon/save", {
                        id: objectId,
                        typeTitle: "Terminal",
                        type: "terminal",
                    }).done(function (data) {
                        $(".ozon-price").remove();
                        $(
                            '<div class="ozon-price"></br>Стоимость: <b>' +
                                data.price +
                                "</b></br></div>"
                        ).insertBefore("#ozon_button");
                    });

                    if (objectManager.objects.balloon.isOpen(objectId)) {
                        ozonMap.setCenter(location, 13);
                    }
                });

                /* действие по клику на метку */
                objectManager.objects.events.add("click", function (e) {
                    var objectId = e.get("objectId"),
                        button = $('[data-point-id="' + objectId + '"]');

                    $(".ozon-filter").removeClass("ozon-point-active");

                    button.addClass("ozon-point-active");

                    $.post("index.php?route=extension/shipping/ozon/save", {
                        id: objectId,
                        typeTitle: "Terminal",
                        type: "terminal",
                    }).done(function (data) {
                        $(".ozon-price").remove();
                        $(
                            '<div class="ozon-price"></br>Стоимость: <b>' +
                                data.price +
                                "</b></br></div>"
                        ).insertBefore("#ozon_button");
                    });

                    if ($(window).width() >= 767) {
                        $("#ozon-filter_content").scrollTo(button, 300);
                    }
                });
            });
        }
    },
    pointsTwo: function () {
        $("#ozon-open-postamat").attr("disabled","disabled");
		$("#ozon-open-postamat").button('loading');

        $("#ozon-modal").remove();

        $("body").append(ozonModal);
        ymaps.ready(init);

        function init() {
            ozonMap = new ymaps.Map(
                "ozon_map",
                {
                    center: [55.76, 37.64],
                    zoom: 9,
                    controls: ["searchControl"],
                },
                {
                    // Будет производиться поиск по топонимам и организациям.
                    searchControlProvider: "yandex#search",
                }
            );

            if ($(window).width() >= 767) {
                var fBallibContentHead =
                    '<div style="line-height: 170%; margin: 10px;">';
            } else {
                var fBallibContentHead =
                    '<div style="line-height: 100%; width: 180px; margin: 10px;">';
            }

            var BalloonContentLayout = ymaps.templateLayoutFactory.createClass(
                fBallibContentHead +
                    "<b>Адресс пункта выдачи заказов:</b></br><h4>{{properties.address}}</h4>" +
                    "[if properties.workingHours.0.day]<b>Время работы:</b></br>" +
                    '<i class="fa fa-clock-o" aria-hidden="true"></i> {{properties.workingHours[0].day}}</br>[endif]' +
                    '[if properties.workingHours.1.day]<i class="fa fa-clock-o" aria-hidden="true"></i> {{properties.workingHours[1].day}}</br>[endif]' +
                    '[if properties.workingHours.2.day]<i class="fa fa-clock-o" aria-hidden="true"></i> {{properties.workingHours[2].day}}</br>[endif]' +
                    '[if properties.workingHours.3.day]<i class="fa fa-clock-o" aria-hidden="true"></i> {{properties.workingHours[3].day}}</br>[endif]' +
                    '[if properties.workingHours.4.day]<i class="fa fa-clock-o" aria-hidden="true"></i> {{properties.workingHours[4].day}}</br>[endif]' +
                    '[if properties.workingHours.5.day]<i class="fa fa-clock-o" aria-hidden="true"></i> {{properties.workingHours[5].day}}</br>[endif]' +
                    '[if properties.workingHours.6.day]<i class="fa fa-clock-o" aria-hidden="true"></i> {{properties.workingHours[6].day}}</br>[endif]' +
                    "[if properties.description]<b>Описание:</b></br><h4>{{properties.description}}</h4>[endif]" +
                    "[if properties.howToGet]<b>Описание проезда:</b></br><h4>{{properties.howToGet}}</h4>[endif]" +
                    '<button type="button" class="btn btn-outline-secondary btn-sm" id="ozon_button"><i class="fa fa-check" aria-hidden="true"></i> Выбрать</button>' +
                    "</div>",
                {
                    build: function () {
                        BalloonContentLayout.superclass.build.call(this);
                        $("#ozon_button").bind("click", this.onCounterClick);
                    },
                    clear: function () {
                        $("#ozon_button").unbind("click", this.onCounterClick);
                        BalloonContentLayout.superclass.clear.call(this);

                        $('[name="shipping_address[address_1]"], [name="address_1"]').val(this._data.object.properties.address);
						
						if ($("input[name=address_same]").is(":checked")) {
							$('[name="payment_address[address_1]"]').val(this._data.object.properties.address);
						}
						
						$.post("index.php?route=extension/shipping/ozon/save", {
							address: this._data.object.properties.address,
						}).done(function (data) {});
                    },
                    onCounterClick: function () {
                        $("#ozon-modal").modal("hide");
                    },
                }
            );

            objectManager = new ymaps.ObjectManager({
                clusterize: true,
                clusterHasBalloon: true,
            });

            objectManager.clusters.options.set({
                gridSize: 50,
                preset: "islands#blueIcon",
                hasBalloon: false,
                groupByCoordinates: false,
                clusterDisableClickZoom: false,
                maxZoom: 11,
                zoomMargin: [45],
                clusterHideIconOnBalloonOpen: false,
                geoObjectHideIconOnBalloonOpen: false,
            });

            objectManager.objects.options.set({
                balloonContentLayout: BalloonContentLayout,
            });

            ozonMap.geoObjects.add(objectManager);

            var filter_down = "";

            /* действие при закрытии всплывающего окна */
            $("#ozon-modal").on("hidden.bs.modal", function (e) {
                ozonMap.destroy();

                $(this).remove();

                if (typeof reloadAll == "function") {
                    setTimeout(function () {
                        reloadAll();
                    }, 500);
                }
            });

            $.post(
                "index.php?route=extension/shipping/ozon/getTerminalPostamat",
                { filter_down: filter_down }
            ).done(function (data) {
				$("#ozon-open-postamat").removeAttr("disabled");
				$("#ozon-open-postamat").button('reset');
				
                objectManager.add(data);

                if (data.position) {
                    $("#ozon-modal").modal("show");
                    $("#ozon-modal .ozon-modal-title").html(
                        '<div style="background-size: auto 90%; line-height:38px; height:38px;">Постаматы</div>'
                    );
                    ozonMap.setCenter(
                        [data.position.location[0], data.position.location[1]],
                        data.features.length == 1 ? 13 : 10
                    );
                }

                /* создаем макет левого блока со списком адресов ПВЗ */
                var template = "";
                var price = $('[name="shipping_method"]:checked')
                    .closest("label")
                    .text()
                    .split("-");

                if (price[0] !== "") {
                    template +=
                        '<div class="delivery-text"><span>Стоимость ' +
                        price[1] +
                        "</span> <span class='toggle-tab-content2'></span></div>";
						
                    if ($(window).width() >= 767) {
                        $(
                            '<div class="ozon-price"></br>Стоимость: <b>' +
                                price[1] +
                                "</b></br></div>"
                        ).insertBefore("#ozon_button");
                    } else {
                        $(
                            '<div class="ozon-price">Стоимость: <b>' +
                                price[1] +
                                "</b></br></div>"
                        ).insertBefore("#ozon_button");
                    }
                }

                template += '<div class="tab-content">';
                template += '<div class="tab-pane active">';
                if (data.features) {
                    $.each(data.features, function (i, e) {
                        template +=
                            '<div class="ozon-filter ozon-list-group-item" data-point-id="' +
                            e.properties.id +
                            '" data-location="' +
                            e.geometry.coordinates +
                            '">';
                        template +=
                            '<div style="font-size:12px;">' +
                            e.properties.address +
                            "</div>";
                        template += "</div>";
                    });
                }
                template += "</div>";
                template += "</div>";
                $("#ozon-filter_content").html(template);

                /* действие по клику на элемент списка ПВЗ */
                $(document).on("click", ".ozon-filter", function (event) {
                    $(".ozon-filter").removeClass("ozon-point-active");
					$(".toggle-tab-content2").click();

                    $(this).addClass("ozon-point-active");

                    var objectId = $(this).attr("data-point-id"),
                        location = $(this).attr("data-location").split(",");

                    objectManager.objects.balloon.open(objectId);

                    $.post("index.php?route=extension/shipping/ozon/save", {
                        id: objectId,
                        typeTitle: "Postamat",
                        type: "postomat",
                    }).done(function (data) {
                        $(".ozon-price").remove();
                        $(
                            '<div class="ozon-price"></br>Стоимость: <b>' +
                                data.price +
                                "</b></br></div>"
                        ).insertBefore("#ozon_button");
                    });

                    if (objectManager.objects.balloon.isOpen(objectId)) {
                        ozonMap.setCenter(location, 13);
                    }
                });

                /* действие по клику на метку */
                objectManager.objects.events.add("click", function (e) {
                    var objectId = e.get("objectId"),
                        button = $('[data-point-id="' + objectId + '"]');

                    $(".ozon-filter").removeClass("ozon-point-active");

                    button.addClass("ozon-point-active");

                    $.post("index.php?route=extension/shipping/ozon/save", {
                        id: objectId,
                        typeTitle: "Postamat",
                        type: "postomat",
                    }).done(function (data) {
                        $(".ozon-price").remove();
                        $(
                            '<div class="ozon-price"></br>Стоимость: <b>' +
                                data.price +
                                "</b></br></div>"
                        ).insertBefore("#ozon_button");
                    });

                    if ($(window).width() >= 767) {
                        $("#ozon-filter_content").scrollTo(button, 300);
                    }
                });
            });
        }
    },
};
