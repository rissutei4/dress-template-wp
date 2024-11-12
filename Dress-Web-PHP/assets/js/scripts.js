window.addEventListener('load', function () {
//Open Burger Menu/Close Menu
    const burgCont = document.querySelector(".burger-container-wrapper");
    const burgIcon = document.querySelector(".burgerIcon");
    const topLine = document.querySelector(".TopLine");
    const botLine = document.querySelector(".BotLine");
    const midLine = document.querySelector(".MidLine");
    const logoIcon = document.querySelector(".logoIcon");
    const stickyheader = document.querySelector('.header');
    const logoElems = document.querySelector('.burger-logo-elements');

    function toggleMenu() {
        if (burgCont.classList.contains("openedMenu")) {
            burgIcon.classList.remove("openedMenu");
            burgCont.classList.remove("openedMenu");
            topLine.classList.remove("openedMenu");
            botLine.classList.remove("openedMenu");
            midLine.classList.remove("openedMenu");
            logoIcon.classList.remove("openedMenu");
            logoElems.classList.remove("openedMenu");
            if (window.scrollY > 1) {
                stickyheader.classList.add('sticky-nav');
            }
            if (window.innerWidth <= 425 && !burgCont.classList.value.includes('openedMenu')) {
                logoElems.style.display = 'block'
            }
        } else {
            burgIcon.classList.add("openedMenu");
            burgCont.classList.add("openedMenu");
            topLine.classList.add("openedMenu");
            botLine.classList.add("openedMenu");
            midLine.classList.add("openedMenu");
            logoIcon.classList.add("openedMenu");
            logoElems.classList.add("openedMenu");
            // Do not remove sticky-nav if page has been scrolled.
            if (window.scrollY <= 1) {
                stickyheader.classList.remove('sticky-nav');
            }
            if (window.innerWidth <= 426 && burgCont.classList.value.includes('openedMenu')) {
                logoElems.style.display = 'none'
            }
        }
    }


    burgIcon.addEventListener("click", toggleMenu);

    const burgContMobile = document.querySelector(".burger-container-wrapper");
    const burgIconMobile = document.querySelector(".burgerIconMobile");

    function toggleMenuMobile() {
        if (burgContMobile.classList.contains("openedMenu")) {
            burgIcon.classList.remove("openedMenu");
            burgContMobile.classList.remove("openedMenu");
            burgIcon.classList.remove("openedMenu");
            burgCont.classList.remove("openedMenu");
            topLine.classList.remove("openedMenu");
            botLine.classList.remove("openedMenu");
            midLine.classList.remove("openedMenu");
            logoIcon.classList.remove("openedMenu");
            logoElems.style.display = 'flex'
            if (window.innerWidth <= 425 && !burgCont.classList.value.includes('openedMenu')) {
                logoElems.style.display = 'flex'
            }
        }
    }

    burgIconMobile.addEventListener("click", toggleMenuMobile);

    // Define a function to handle scroll events
    function handleScroll() {
        const stickyheaderY = document.querySelector('.header');
        const burgerContainer = document.querySelector('.burger-container-wrapper');
        const body = document.querySelector('body');
        const screenWidth = window.innerWidth;

        if (window.scrollY > 1 && screenWidth <= 425) {
            body.classList.remove('scroll-enabled');
            if (burgerContainer.classList.value.includes('openedMenu')) {
                stickyheaderY.classList.remove('sticky-nav');
            } else {
                stickyheaderY.classList.add('sticky-nav');
            }
        } else if (window.scrollY > 1 && screenWidth > 425) {
            stickyheaderY.classList.add('sticky-nav');
        } else {
            stickyheaderY.classList.remove('sticky-nav');
        }
    }

// Attach the function to the scroll event
    window.onscroll = handleScroll;

// Call the function once immediately to set the sticky-nav class correctly
    handleScroll();
    window.addEventListener('load', function () {
        const loadMoreButtons = document.querySelectorAll('.load-more');

        loadMoreButtons.forEach(button => {
            const container = button.closest('.product-cards-cont');
            const hiddenCards = container.querySelectorAll('.hidden-prod');

            if (hiddenCards.length === 0) {
                button.style.display = 'none';
            }
        });
    });

    function handleLoadMoreClick(event) {
        const container = event.target.closest('.product-cards-cont');
        const hiddenCards = container.querySelectorAll('.hidden-prod');

        for (let i = 0; i < Math.min(hiddenCards.length, 3); i++) {
            hiddenCards[i].classList.add('shownCards');
            hiddenCards[i].classList.remove('hidden-prod');
        }

        if (container.querySelectorAll('.hidden-prod').length === 0) {
            event.target.style.display = 'none';
        }
    }

    const loadMoreButtons = document.querySelectorAll('.load-more');

    loadMoreButtons.forEach(button => {
        button.addEventListener('click', handleLoadMoreClick);
    });


//Language button shows languages
    const button = document.querySelector('.langbtn');
    const dropdownContent = document.querySelector('.sub-menu');
    const dropdownLinks = document.querySelectorAll('.sub-menu li');

    button.addEventListener('click', () => {
        dropdownContent.classList.toggle('show');
    });

    dropdownLinks.forEach(link => {
        link.addEventListener('click', () => {
            dropdownContent.classList.remove('show');
        });
    });

    function updateLanguageSwitcher() {
        // Get the active language element
        const activeLanguageElem = document.querySelector('li.menu-item-home');

        // Add the 'active' class to the active language element
        if (activeLanguageElem) {
            activeLanguageElem.classList.add('active');
        }

        // Get the language switcher button
        const langSwitcherButton = document.querySelector('.langbtn');

        // Set the text content of the button to the active language
        if (langSwitcherButton && activeLanguageElem) {
            langSwitcherButton.textContent = activeLanguageElem.textContent;
        }
    }

    updateLanguageSwitcher();
});





