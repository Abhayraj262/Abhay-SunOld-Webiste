/**
 * Navbar "SERVICES" menu: toggle on click, close on outside click / Escape.
 * Works alongside assets/js/main.js (dropdowns excluding .nav-services).
 */
(function () {
  'use strict';

  function initNavServicesDropdown() {
    var root = document.querySelector('#navbar li.nav-services');
    if (!root || !document.body) return;

    var toggle = root.querySelector('.nav-services-toggle');
    var panel = root.querySelector('.nav-services-panel');

    if (!toggle || !panel) return;

    function setExpanded(open) {
      root.classList.toggle('nav-services-is-open', open);
      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
      panel.classList.toggle('dropdown-active', open);
      var arrow = toggle.querySelector('.dropdown-indicator');
      if (arrow) {
        arrow.classList.toggle('bi-chevron-up', open);
        arrow.classList.toggle('bi-chevron-down', !open);
      }
    }

    function close() {
      setExpanded(false);
    }

    function isOpen() {
      return root.classList.contains('nav-services-is-open');
    }

    toggle.addEventListener('click', function (e) {
      e.preventDefault();
      e.stopPropagation();
      setExpanded(!isOpen());
    });

    panel.addEventListener('click', function (e) {
      e.stopPropagation();
    });

    document.addEventListener(
      'click',
      function (e) {
        if (!isOpen()) return;
        if (root.contains(e.target)) return;
        close();
      },
      false
    );

    document.addEventListener('keydown', function (e) {
      if (e.key !== 'Escape' || !isOpen()) return;
      close();
      toggle.focus();
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initNavServicesDropdown);
  } else {
    initNavServicesDropdown();
  }
})();
