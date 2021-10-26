/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/ajax.js ***!
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
  $('#add-list').click(function (e) {
    console.log('check');
    e.preventDefault();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: "/list/add",
      method: "POST",
      data: {
        title: $('#title').val(),
        description: $('#description').val()
      },
      success: function success(data) {
        console.log(data);
        $('#list-container').prepend(data);
      },
      error: function error(_error2) {
        console.log('failed');
      }
    });
  });
});
/******/ })()
;
