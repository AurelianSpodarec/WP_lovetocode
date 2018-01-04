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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

const css = __webpack_require__(1);



window.onload = function() {

	// MAIN NAVIGATION MENU TOGGLE
	var siteNav = document.querySelector(".site-header__main-nav");
	var siteHamburger = document.querySelector(".site-header__hamburger");

	siteHamburger.addEventListener('click', toggleMainMenu, false);

	function toggleMainMenu() {		
		siteNav.classList.toggle("is-active");
		siteHamburger.classList.toggle("is-active");
	}

	// Accordion
	var accordionHeaders = document.querySelectorAll('.curiculum-item-header');

	for(var i = 0; i < accordionHeaders.length; i++) {
		accordionHeaders[i].addEventListener('click', openAccordion);
	}

	function openAccordion(e) {
		var parent = this.parentElement;
		var article = this.nextElementSibling;
		
		if (!parent.classList.contains('open')) {
			parent.classList.add('open');
			article.style.maxHeight = article.scrollHeight + 'px';
		}
		else {
			parent.classList.remove('open');
			article.style.maxHeight = '0px';
		}
	}
  	

  	// Category Bar
  	var categoryBar = document.querySelector(".category__bar");
  	var topOfCategoryBar = categoryBar.offsetTop;
    var siteHeader = document.querySelector(".site-header");

  	var siteHeaderOuter = document.querySelector(".site-header__outer");

  	function categoryFixed(e) {

  		if (window.scrollY >= topOfCategoryBar) {
  			siteHeader.style.paddingBottom = categoryBar.offsetHeight + 'px';
  			categoryBar.classList.add('is-fixed');
  		} else {
  			siteHeader.style.paddingBottom = 0;
  			categoryBar.classList.remove('is-fixed');
  		}

  	}

  	window.addEventListener('scroll', categoryFixed);
  	

  	// Arrow Up
  	var arrowUp = document.querySelector('.arrow-up');
    var intervalId = 0;

    function showArrow(e) {

        if (window.scrollY >= 500) {
          arrowUp.classList.add('is-block');
          setTimeout(function() { 
             arrowUp.classList.add('is-opacity');
          }, 10);

        } else {
          arrowUp.classList.remove('is-opacity'); 
        }

      }

    function scrollStep() {
        if (window.pageYOffset === 0) {
            clearInterval(intervalId);
        }
        window.scroll(0, window.pageYOffset - 50);
    }

    function scrollToTop() {
        intervalId = setInterval(scrollStep, 8.36);
    }
  	
    arrowUp.addEventListener('click', scrollToTop);
    window.addEventListener('scroll', showArrow);

}

/***/ }),
/* 1 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);