/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/ajax.js ***!
  \******************************/
function setBtnCloseList() {
  $('.btn-close-list').click(function (e) {
    e.preventDefault();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var id = this.id;
    $.ajax({
      url: this.value,
      method: "POST",
      data: {
        _method: 'DELETE'
      },
      success: function success(data) {
        $('#' + id + '-container').remove();
      },
      error: function error(_error) {
        console.log('deleting failed');
      }
    });
  });
}

function setBtnCloseTask() {
  $('.btn-close-task').click(function (e) {
    e.preventDefault();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var id = this.id;
    $.ajax({
      url: this.value,
      method: "POST",
      data: {
        _method: 'DELETE'
      },
      success: function success(data) {
        $('#' + id + '-container').remove();
      },
      error: function error(_error2) {
        console.log('deleting failed');
      }
    });
  });
}

function setUpdateStatus() {
  $('.update-status').click(function (e) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var id = this.id;
    $.ajax({
      url: this.value,
      method: "POST",
      success: function success(data) {
        if (!data) {
          $("#title-" + id).removeClass("complete-task");
        } else {
          $("#title-" + id).addClass("complete-task");
        }
      },
      error: function error(_error3) {
        e.preventDefault();
      }
    });
  });
}

$(document).ready(function () {
  setUpdateStatus();
  setBtnCloseList();
  setBtnCloseTask();
  $('#add-list').click(function (e) {
    e.preventDefault();
    $('.error-response').remove();
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
        $('#list-container').prepend(data);
        setBtnCloseList();
      },
      error: function error(_error4) {
        console.log('adding failed');
      }
    });
  });
  $('#add-task').click(function (e) {
    e.preventDefault();
    $('.error-response').remove();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: this.value,
      method: "POST",
      data: {
        task: $('#task').val()
      },
      success: function success(data) {
        $('#task-container').prepend(data);
        setUpdateStatus();
        setBtnCloseTask();
      },
      error: function error(_error5) {
        console.log('adding failed');
      }
    });
  });
});
/******/ })()
;