var currentLocation = false;

if ("geolocation" in navigator) {
  navigator.geolocation.getCurrentPosition(function (position) {
    currentLocation = [position.coords.latitude, position.coords.longitude];
  });
} else {
  console.log("no geolocation");
}

var mkModal = function (size) {
  var modal = document.getElementById("measoftModal");
  if (!modal) {
    var width = 600;
    var height = 400;

    if (size.width && size.height) {
      width = size.width;
      height = size.height;
    }
    modal = document.createElement("div");
    modal.id = "measoftModal";
    modal.classList.add("modal", "fade");
    modal.setAttribute("tabindex", -1);
    modal.setAttribute("role", "dialog");
    var dialog = document.createElement("div");
    dialog.classList.add("modal-dialog");
    dialog.setAttribute("role", "document");
    dialog.style.height = height;
    dialog.style.width = width;
    var mcontent = document.createElement("div");
    mcontent.classList.add("modal-content");
    var mheader = document.createElement("div");
    mheader.classList.add("modal-header");
    var mclose = document.createElement("button");
    mclose.type = "button";
    mclose.classList.add("close");
    mclose.dataset.dismiss = "modal";
    mclose.setAttribute("aria-label", "Close");
    mclose.innerHTML = '<span aria-hidden="true">&times;</span>';
    mheader.appendChild(mclose);
    var mbody = document.createElement("div");
    mbody.classList.add("modal-body");
    var mapBlock = document.createElement("div");
    mapBlock.id = "measoftmapblock";
    mbody.appendChild(mapBlock);
    mcontent.appendChild(mheader);
    mcontent.appendChild(mbody);
    dialog.appendChild(mcontent);
    modal.appendChild(dialog);
    return modal;
  }
  return modal;
};

var quotePvz = function (e) {
  var city_f = document.getElementById("input-shipping-city") || document.getElementById("shipping_address_city");
  var zip_f = document.getElementById("input-shipping-postcode") || document.getElementById("shipping_address_postcode");
  $.ajax({
    type: "post",
    url: "/index.php?route=extension/shipping/measoft/quote",
    data: {
      pvzid: e,
      city: city_f.value || "",
      zipcode: zip_f.value || "",
      pvzname: document.getElementById("pvzname").value
    },
    dataType: "json",
    success: function (result) {
      var mea_d = document.getElementById("mea_description");
      var cost = result.cost
        ? result.cost
        : result.empty;
      mea_d.innerHTML = document.getElementById("pvzname").value + " - " + cost;
      jQuery("#measoftModal").modal("hide");
      var checkbox = document.getElementById("measoftcouriershipping.standard");
      if (checkbox && checkbox.dataset.onchange === "reloadAll") {
        checkbox.dispatchEvent(new Event("change"));
      }

      var def_btn = document.querySelector("#button-shipping-method");
      if (def_btn) 
        def_btn.removeAttribute("disabled");
      }
    });
};


function mapint() {

  cityto_value = '';
  if ($("#input-shipping-city").length) {
    cityto_value = "input-shipping-city";
  } else if ($("#shipping_address_city").length) {
    cityto_value = "shipping_address_city";
  }

  if (!cityto_value) {    
    window.setTimeout(mapint, 100);
    return;
  }
	
  $.ajax({
    type: "get",
    url: "/index.php?route=extension/shipping/measoft/getSettings",
    dataType: "json",
    success: function (ks2008client) {
      var weight = ks2008client.weight || 0.1;
      var width = ks2008client.width || 600;
      var height = ks2008client.height || 400;

      document.body.appendChild(mkModal({height: height, width: width}));

      if (!ks2008client.id) {
        alert("Индентификационный номер клиента не заполнен в настройках.");
        return;
      }

		shipping_city_value='';
		if($("#input-shipping-city").length){
			shipping_city_value="input-shipping-city";
		}else if($("#shipping_address_city")) {
			shipping_city_value="shipping_address_city";
			
		}
      if (shipping_city_value != "") {
		
		 
        var measoftObject = measoftMap.config({
          pvzCodeSelector: ".pvzcode",
          mapSearchZoom: 10,
          pvzNameSelector: "#pvzname",
          mapBlock: "measoftmapblock",
          townBlock: shipping_city_value,
          client_id: ks2008client.id,
		  client_code: ks2008client.code,
          mapSize: {
            width: width,
            height: height
          },
          centerCoords: currentLocation || [
            "55.73", "37.60"
          ],
          showMapButton: "1",
          showMapButtonCaption: "Выбор на карте",
          filter: {
            maxweight: weight
          },
          allowedFilterParams: [
            "acceptcash", "acceptcard", "acceptfitting"
          ],
          choicePvzCallback: quotePvz
        });
      } else {
        var measoftObject = measoftMap.config({
          pvzCodeSelector: ".pvzcode",
          mapSearchZoom: 10,
          pvzNameSelector: "#pvzname",
          mapBlock: "measoftmapblock",
          client_id: ks2008client.id,
		  client_code: ks2008client.code,
          mapSize: {
            width: width,
            height: height
          },
          centerCoords: currentLocation || [
            "55.73", "37.60"
          ],
          showMapButton: "1",
          showMapButtonCaption: "Выбор на карте",
          filter: {
            maxweight: weight
          },
          allowedFilterParams: [
            "acceptcash", "acceptcard", "acceptfitting"
          ],
          choicePvzCallback: quotePvz
        });
      }

      measoftObject.init();
    }
  });
}

var showModalMea = function () {
  jQuery("#measoftModal").modal("show");

  jQuery("#measoftModal").on("shown.bs.modal", function () {
    window.dispatchEvent(new Event("resize"));
  });
	measoftMap.open();

  if (measoftMap.map && currentLocation) {
    measoftMap.map.setView(currentLocation, 10, {
      animate: true,
      pan: {
        duration: 0.5
      }
    });
  }
};

$(document).ready(function () {
  mapint();

  if (document.getElementById("accordion")) {
    let meamapToDelete = document.querySelector(".meamap");
    if (meamapToDelete) {
      meamapToDelete.parentNode.removeChild(meamapToDelete);
    }
  }
});
