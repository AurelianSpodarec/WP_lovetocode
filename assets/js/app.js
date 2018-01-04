const css = require('../scss/app.scss');



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