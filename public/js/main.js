/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/jq.js":
/*!****************************!*\
  !*** ./resources/js/jq.js ***!
  \****************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $(".modalEdit").on("click", editForm);
  $("#modalFormEdit").on("submit", storeData);
  $(".cancelBtn").click(function () {
    $(".modal").modal("hide");
  });
  $("#deleteBtn").click(deleteUser);
  $(".admin__buttons-delete").click(function () {
    $(".edit-modal__delete").attr("data-id", $(this).attr("data-id"));
  });
  $(".admin__buttons-role").click(function () {
    $("#role-form").attr("data-id", $(this).attr("data-id"));
  });
  $("#role-form").submit(roleAssign);
});

function editForm() {
  var user_id = $(this).attr("data-id");
  console.log(user_id);
  $.ajax({
    type: 'POST',
    url: "/admin/".concat(user_id, "/edit"),
    data: {
      _token: $("meta[name='csrf-token']").attr("content"),
      user: user_id
    },
    success: function success(response) {
      $("#name").val(response["name"]);
      $("#surname").val(response["surname"]);
      $("#fathername").val(response["fathername"]);
      $("#faculty").val(response["faculty"]);
      $("#cathedra").val(response["cathedra"]);
      $("#specialty").val(response["specialty"]);
      $("#workplace").val(response["workplace"]);
      $("#group").val(response["group"]);
      $("#modalFormEdit").attr("data-id", "".concat(response["id"]));
    },
    error: function error() {
      console.log("");
    },
    dataType: 'json'
  });
}

function storeData(e) {
  e.preventDefault();
  var id = $("#modalFormEdit").attr("data-id");
  var name = $("#name").val();
  var surname = $("#surname").val();
  var fathername = $("#fathername").val();
  var faculty = $("#faculty").val();
  var cathedra = $("#cathedra").val();
  var specialty = $("#specialty").val();
  var group = $("#group").val();
  var workplace = $("#workplace").val();
  $.ajax({
    type: 'POST',
    url: "admin/".concat(id),
    data: {
      _token: $("meta[name='csrf-token']").attr("content"),
      id: id,
      name: name,
      surname: surname,
      fathername: fathername,
      faculty: faculty,
      specialty: specialty,
      cathedra: cathedra,
      group: group,
      workplace: workplace
    },
    success: function success(response) {
      console.log(response);
      $('#create').modal('hide');
      $("#row-".concat(response["id"], " a")).text(response["name"] + " " + response["surname"]);
    },
    error: function error(data) {
      console.log("error");
    },
    dataType: 'json'
  });
}

function deleteUser() {
  var id = $(".edit-modal__delete").attr("data-id");
  $.ajax({
    type: "POST",
    url: "/admin/".concat(id, "/delete"),
    data: {
      _token: $("meta[name='csrf-token']").attr("content")
    },
    success: function success(response) {
      $('#deleteModal').modal('hide');
      $("#row-".concat(response["id"])).remove();
      $("#row-".concat(response["id"]));
    },
    error: function error(response) {
      console.log("error");
    },
    dataType: 'json'
  });
}

function roleAssign(e) {
  e.preventDefault();
  var id = $(this).attr("data-id");
  var role_id = $("#role-name").val();
  $.ajax({
    type: "POST",
    url: "/admin/".concat(id, "/role"),
    data: {
      _token: $("meta[name='csrf-token']").attr("content"),
      role_id: role_id,
      user_id: id
    },
    success: function success(response) {
      $('#roleModal').modal('hide');
      $("#row-".concat(response["id"], " .admin__roles")).children("h4").detach();
      response["names"].forEach(function (name) {
        $("#row-".concat(response["id"], " .admin__roles")).append(" <h4>".concat(name, "</h4>"));
      });
      console.log(response["names"]);
    },
    error: function error(response) {
      console.log("error3");
    },
    dataType: 'json'
  });
}

/***/ }),

/***/ "./resources/js/main.js":
/*!******************************!*\
  !*** ./resources/js/main.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ./jq.js */ "./resources/js/jq.js");

var burger = document.getElementById("burger");
var menu = document.getElementById("navmenu");
var filterName = document.getElementById("filter-name");
var filter = document.getElementById("filter");
burger.addEventListener('click', function () {
  burger.classList.toggle("active");
  menu.classList.toggle("nav__active");
});
filterName.addEventListener('click', function () {
  filter.classList.toggle("active");
});

/***/ }),

/***/ "./resources/sass/main.scss":
/*!**********************************!*\
  !*** ./resources/sass/main.scss ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!***************************************************************!*\
  !*** multi ./resources/js/main.js ./resources/sass/main.scss ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /home/intusmortius/public_html/Laravel/graduate/resources/js/main.js */"./resources/js/main.js");
module.exports = __webpack_require__(/*! /home/intusmortius/public_html/Laravel/graduate/resources/sass/main.scss */"./resources/sass/main.scss");


/***/ })

/******/ });