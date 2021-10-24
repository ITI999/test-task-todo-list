/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/list.js ***!
  \******************************/
$(document).ready(function () {
  $('.update-status').click(function (e) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var id = this.value;
    $.ajax({
      url: "../task/check/" + id,
      method: "POST",
      success: function success(data) {
        if (!data) {
          // console.log("#title-" + id);
          $("#title-" + id).removeClass("complete-task");
        } else {
          $("#title-" + id).addClass("complete-task");
        }
      },
      error: function error(_error) {
        e.preventDefault();
      }
    });
  });
});
/******/ })()
;