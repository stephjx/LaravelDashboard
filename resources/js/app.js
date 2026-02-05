import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

// Only hide scrollbars, no scroll restrictions
document.addEventListener('DOMContentLoaded', function() {
    // Add classes for scrollbar hiding only
    document.body.classList.add('hide-scrollbar');
    document.documentElement.classList.add('hide-scrollbar');
    
    // Also hide scrollbar on main content area
    const mainContent = document.querySelector('main');
    if (mainContent) {
        mainContent.classList.add('hide-scrollbar');
    }
    
    // Hide scrollbar on scrollable elements
    const scrollableElements = document.querySelectorAll('.overflow-auto, .overflow-y-auto, .overflow-x-auto');
    scrollableElements.forEach(el => {
        el.classList.add('hide-scrollbar');
    });
});

Alpine.start();
