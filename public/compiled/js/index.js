/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/web/index.js":
/*!***********************************!*\
  !*** ./resources/js/web/index.js ***!
  \***********************************/
/***/ (() => {

//search in main page
$(document).ready(function () {
  //hide spinner
  setTimeout(function () {
    // Приховуємо спіннер за допомогою jQuery
    $("#spinner-container").hide();
    $(".question-content").show();
  }, 10);
  //hide spinner

  var isHidden = localStorage.getItem('isHidden');
  if (isHidden !== 'true') {
    $('.banner').css('display', 'flex');
  }
  var inputDelay = 500;
  var currentInput = "";
  $(".select-box__input-text").on("input", function () {
    var inputText = $(this).val();
    var search = $('#search').val();
    var cleanedText = inputText.replace(/\s/g, '').toLowerCase();
    if (cleanedText.length % 2 === 0 && cleanedText !== currentInput) {
      $(".select-box__list").empty();
      $('.select-box__list').css('display', 'block');
      $('#loader').css('display', 'block');
      console.log('here');
      currentInput = cleanedText;
      setTimeout(function () {
        $.ajax({
          url: "/search/branch?search=" + search,
          type: "GET",
          data: {
            input: currentInput
          },
          success: function success(response, status, xhr) {
            $(".select-box__list").empty();
            $('#loader').css('display', 'none');
            if (xhr.status === 200) {
              if (response.data.length !== 0) {
                for (var i = 0; i < response.data.length; i++) {
                  // $('.loader').css('display', 'none');
                  if (response.data[i].type === 'branch') {
                    $(".select-box__list").prepend("<li class='li_search'><a href=\"" + response.data[i].url + "\"  style='text-decoration: none; color: black'><label class=\"select-box__option\"><img src='" + response.data[i].icon_path + "' style='float: left;width: 21px;'>" + response.data[i].name + "</label></a></li>");
                  }
                  if (response.data[i].type === 'question') {
                    $(".select-box__list").prepend("<li class='li_search'><a href=\"" + response.data[i].url + "\"  style='text-decoration: none; color: black'><label class=\"select-box__option\"><img src='/web/images/question.png' style='float: left;width: 21px;'>" + response.data[i].name + "</label></a></li>");
                  }
                  if (response.data[i].type === 'roadmap') {
                    $(".select-box__list").prepend("<li class='li_search'><a href=\"" + response.data[i].url + "\"  style='text-decoration: none; color: black'><label class=\"select-box__option\"><img src='/web/images/roadmap.png' style='float: left;width: 21px;'>" + response.data[i].name + "</label></a></li>");
                  }
                  if (response.data[i].type === 'article') {
                    $(".select-box__list").prepend("<li class='li_search'><a href=\"" + response.data[i].url + "\"  style='text-decoration: none; color: black'><label class=\"select-box__option\"><img src='/web/images/blog.png' style='float: left;width: 21px;'>" + response.data[i].name + "</label></a></li>");
                  }
                  if (response.data[i].type === 'clue') {
                    $(".select-box__list").prepend("<li class='li_search'><a href=\"" + response.data[i].url + "\"  style='text-decoration: none; color: black'><label class=\"select-box__option\"><img src='/web/images/hint.png' style='float: left;width: 21px;'>" + response.data[i].name + "</label></a></li>");
                  }
                  if (response.data[i].type === 'cv') {
                    $(".select-box__list").prepend("<li class='li_search'><a href=\"" + response.data[i].url + "\"  style='text-decoration: none; color: black'><label class=\"select-box__option\"><img src='/web/images/template.png' style='float: left;width: 21px;'>" + response.data[i].name + "</label></a></li>");
                  }
                }
              } else {
                $('#loader').css('display', 'none');
                // $('.loader').css('display', 'none');
              }
            } else {
              $(".select-box__list").empty();
            }
          },
          error: function error(_error) {
            $(".select-box__list").empty();
          }
        });
      }, inputDelay);
    }
  });

  //redirect to main page
  $('#logo').on('click', function () {
    window.location.href = "/";
  });
});

//sweetAlert show popup on click
$('#need_to_auth_button').on('click', function () {
  // Отримайте переклади з сервера
  $.get('/translations', function (translations) {
    Swal.fire(translations.login_please);
  });
});
$('#help-service').on('click', function () {
  $('#swal-form').css('display', 'block');
  // Отримайте переклади з сервера
  $.get('/translations', function (translations) {
    Swal.fire({
      title: translations.any_question,
      html: "\n                <div id=\"swal-form\" style=\"display: block;\">\n                    <input type=\"text\" id=\"email\" class=\"support-input\" placeholder=\"Email\">\n                    <textarea id=\"message\" class=\"support-textarea\" placeholder=\"Message\"></textarea>\n                </div>\n            ",
      showCancelButton: true,
      confirmButtonText: translations.send,
      cancelButtonText: translations.cancel,
      preConfirm: function preConfirm() {
        var email = document.getElementById('email').value;
        var message = document.getElementById('message').value;

        // Ваш AJAX-запит
        return fetch('/api/support/send', {
          method: 'POST',
          // Метод вашого запиту (POST, GET, тощо)
          body: JSON.stringify({
            email: email,
            message: message
          }),
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
          }
        }).then(function (response) {
          if (!response.ok) {
            throw new Error(translations.error_when_sent);
          }
          return response.json();
        }).then(function (data) {
          // Обробка успішної відповіді
          Swal.fire(translations.thanks_for_answer + '', '', 'success');
        })["catch"](function (error) {
          // Обробка помилки
          Swal.fire(translations.error, error.message, 'error');
        });
      }
    });
  });
});

//logout
$('#svg_profile_icon').on('click', function () {
  $('#svg_profile_icon_form').submit();
});

//banner

$('.banner_remove').on('click', function () {
  $('.banner').css('display', 'none');
  localStorage.setItem('isHidden', true);
});

//captcha
function refreshCaptcha() {
  $('#refreshCaptcha').click(function () {
    $.ajax({
      type: 'GET',
      url: '/refresh-captcha',
      // Роут, який повертає новий URL капчі
      success: function success(data) {
        $('#captcha-img').empty().append('<img src="' + data + '" alt="Captcha">');
        // $('#captchaImage').attr('src', data); // Оновлення зображення капчі
      }
    });
  });
}

//refresh captcha
$(document).ready(function () {
  refreshCaptcha();
});

/***/ }),

/***/ "./resources/css/web/type-writter.css":
/*!********************************************!*\
  !*** ./resources/css/web/type-writter.css ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/web/learn-more.css":
/*!******************************************!*\
  !*** ./resources/css/web/learn-more.css ***!
  \******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/web/index.css":
/*!*************************************!*\
  !*** ./resources/css/web/index.css ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/web/pages.css":
/*!*************************************!*\
  !*** ./resources/css/web/pages.css ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/web/blog.css":
/*!************************************!*\
  !*** ./resources/css/web/blog.css ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/web/navigation.css":
/*!******************************************!*\
  !*** ./resources/css/web/navigation.css ***!
  \******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/web/cv.css":
/*!**********************************!*\
  !*** ./resources/css/web/cv.css ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/compiled/js/index": 0,
/******/ 			"compiled/css/cv": 0,
/******/ 			"compiled/css/navigation": 0,
/******/ 			"compiled/css/blog": 0,
/******/ 			"compiled/css/pages": 0,
/******/ 			"compiled/css/index": 0,
/******/ 			"compiled/css/learn-more": 0,
/******/ 			"compiled/css/type-writter": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["compiled/css/cv","compiled/css/navigation","compiled/css/blog","compiled/css/pages","compiled/css/index","compiled/css/learn-more","compiled/css/type-writter"], () => (__webpack_require__("./resources/js/web/index.js")))
/******/ 	__webpack_require__.O(undefined, ["compiled/css/cv","compiled/css/navigation","compiled/css/blog","compiled/css/pages","compiled/css/index","compiled/css/learn-more","compiled/css/type-writter"], () => (__webpack_require__("./resources/css/web/index.css")))
/******/ 	__webpack_require__.O(undefined, ["compiled/css/cv","compiled/css/navigation","compiled/css/blog","compiled/css/pages","compiled/css/index","compiled/css/learn-more","compiled/css/type-writter"], () => (__webpack_require__("./resources/css/web/pages.css")))
/******/ 	__webpack_require__.O(undefined, ["compiled/css/cv","compiled/css/navigation","compiled/css/blog","compiled/css/pages","compiled/css/index","compiled/css/learn-more","compiled/css/type-writter"], () => (__webpack_require__("./resources/css/web/blog.css")))
/******/ 	__webpack_require__.O(undefined, ["compiled/css/cv","compiled/css/navigation","compiled/css/blog","compiled/css/pages","compiled/css/index","compiled/css/learn-more","compiled/css/type-writter"], () => (__webpack_require__("./resources/css/web/navigation.css")))
/******/ 	__webpack_require__.O(undefined, ["compiled/css/cv","compiled/css/navigation","compiled/css/blog","compiled/css/pages","compiled/css/index","compiled/css/learn-more","compiled/css/type-writter"], () => (__webpack_require__("./resources/css/web/cv.css")))
/******/ 	__webpack_require__.O(undefined, ["compiled/css/cv","compiled/css/navigation","compiled/css/blog","compiled/css/pages","compiled/css/index","compiled/css/learn-more","compiled/css/type-writter"], () => (__webpack_require__("./resources/css/web/type-writter.css")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["compiled/css/cv","compiled/css/navigation","compiled/css/blog","compiled/css/pages","compiled/css/index","compiled/css/learn-more","compiled/css/type-writter"], () => (__webpack_require__("./resources/css/web/learn-more.css")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;