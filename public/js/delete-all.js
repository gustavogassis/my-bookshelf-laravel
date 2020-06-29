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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/delete-all.js":
/*!************************************!*\
  !*** ./resources/js/delete-all.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// Aplica o selectAll para todos qnt clickar na no checkbox cm id = 'select-all'
document.getElementById('select-all').addEventListener('click', function (e) {
  var flag = e.target.checked;
  var checkboxes = document.getElementsByClassName("checkDelete");
  Array.from(checkboxes).forEach(function (element) {
    return element.checked = flag;
  });
  putButtonDeleteAll();
});
var checkboxes = document.getElementsByClassName("checkDelete");
Array.from(checkboxes).forEach(function (element) {
  element.addEventListener('click', function (e) {
    putButtonDeleteAll();
  });
});

function putButtonDeleteAll() {
  var checkboxes = document.getElementsByClassName("checkDelete");
  var count = 0; // verifica qnts checkboxes estão checkados e guarda em count

  Array.from(checkboxes).forEach(function (element) {
    if (element.checked) {
      count++;
    }
  });
  var checkeds = Array.from(checkboxes).filter(function (item) {
    return item.checked;
  });
  var ids = checkeds.map(function (item) {
    return item.id;
  });
  document.getElementById("idLivros").value = ids.join(","); // verifica a qntd de checkboxes selecionados, se for diferente de 0 tira a classe hidden

  if (count === 0) {
    document.getElementById("delete-all").classList.add("hidden");
    document.getElementById("select-all").checked = false;
  } else {
    document.getElementById("delete-all").classList.remove("hidden");
  }
}

/***/ }),

/***/ 1:
/*!******************************************!*\
  !*** multi ./resources/js/delete-all.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/gustavo/code/myBookshelf/resources/js/delete-all.js */"./resources/js/delete-all.js");


/***/ })

/******/ });