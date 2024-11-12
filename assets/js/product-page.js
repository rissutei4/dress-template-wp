document.addEventListener('DOMContentLoaded', () => {
    function activateColor() {
        const colors = document.querySelector('.colors');

        colors.addEventListener('click', (event) => {
            const colorCircle = event.target.closest('.color-circle');
            if (colorCircle) {
                const color = colorCircle.parentNode;
                const activeColor = colors.querySelector('.color.active');
                activeColor.classList.remove('active');
                color.classList.add('active');
            }
        });
    }

    activateColor();

    const productImage = document.querySelector('.product-image img');
    const additionalImages = document.querySelectorAll('.additional-images img');

    additionalImages.forEach(img => {
        const newImage = new Image();
        newImage.src = img.src;
    });


// Store the initial product image source
    const initialProductImageSrc = productImage.src;

// Create a new function to reset the product image source to the initial value
    function resetProductImage() {
        productImage.src = initialProductImageSrc;
    }

    const carouselDotsContainer = document.querySelector('.carousel-mobile-dots');
    let dotsHTML = '';
    for (let i = 0; i < additionalImages.length + 1; i++) {
        dotsHTML += '<span></span>';
    }
    carouselDotsContainer.innerHTML = dotsHTML;

    const carouselDots = document.querySelectorAll('.carousel-mobile-dots span');

    let currentImageIndex = 0;

    carouselDots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            currentImageIndex = index;
            if (index === 0) {
                resetProductImage(); // Reset the product image to the initial source
            } else {
                productImage.src = additionalImages[index - 1].src;
            }
            carouselDots.forEach((dot, index) => {
                dot.classList.toggle('active', index === currentImageIndex);
            });
        });
    });

    additionalImages.forEach(img => {
        img.addEventListener('click', (event) => {
            const clickedImageSrc = event.target.getAttribute('src');
            const mainImage = document.querySelector('.product-image img');
            const mainImageSrc = mainImage.getAttribute('src');
            mainImage.setAttribute('src', clickedImageSrc);
            event.target.setAttribute('src', mainImageSrc);

            window.scrollTo({
                top: 0, behavior: 'smooth'
            });
        });
    });

    carouselDots[currentImageIndex].classList.add('active');

    const chevronButton = document.querySelector('.mobile-chevron');
    const orderProductButton = document.querySelector('.orderProductButton');
    const secondaryInfoBlock = document.querySelector('.secondary-information-block');
    const mobileLiftUpBlock = document.querySelector('.mobile-lift-up-block');
    const prodDescr = document.querySelector('.product-description');
    const colorGroup = document.querySelector('.color-group');

    let colorDivs = []; // Init colorDivs as empty array

    if (colorGroup !== null) {
        const colorNodes = colorGroup.querySelectorAll('.color');

        if (colorNodes.length > 0) {
            colorDivs = Array.from(colorNodes); // Assign colorDivs to array from colorNodes
        } else {
            console.log('No color nodes found.');
        }
    } else {
        console.log('colorGroup is null');
    }

    // Define the updateColorsVisibility function
    function updateColorsVisibility() {
        if (window.innerWidth <= 426) {
            colorDivs.forEach((div, index) => {
                if (index >= 4) {
                    div.style.display = secondaryInfoBlock.classList.contains('active') ? 'block' : 'none';
                }
            });
        } else {
            colorDivs.forEach(div => {
                div.style.display = 'block';
            });
        }
    }

    // Add a click event listener to the chevron button
    chevronButton.addEventListener('click', () => {
        if (window.innerWidth <= 440) {
            // Toggle the active class on the orderProduct button and secondary information block
            orderProductButton.classList.toggle('active');
            secondaryInfoBlock.classList.toggle('active');
            prodDescr.classList.toggle('active');

            // Hide the mobile lift up block if secondary info block is active
            if (secondaryInfoBlock.classList.contains('active')) {
                mobileLiftUpBlock.setAttribute('style', 'display: none !important;');
            } else {
                mobileLiftUpBlock.style.display = 'block';
            }

            // Update color visibility
            updateColorsVisibility();

            // Rotate the chevron button 180 degrees
            const chevronImg = chevronButton.querySelector('img');
            chevronImg.style.transform = `rotate(${chevronImg.style.transform === 'rotate(180deg)' ? '0deg' : '180deg'})`;
        }
    });

    // Run once on page load
    updateColorsVisibility();

    // Also update when the window is resized
    window.addEventListener('resize', updateColorsVisibility);


    const tabLinks = document.querySelectorAll('.three-tabs .nav-link');
    const tabContent = document.querySelectorAll('.three-tabs .tab-content .tab-pane');

    const isMobile = window.innerWidth <= 426; // Check if screen resolution is 440px or less

    if (isMobile) {
        tabContent.forEach((content) => {
            content.classList.add('active', 'show'); // add active and show classes to all tab-panes
        });
        tabLinks.forEach((link, index) => {
            link.addEventListener('click', () => {
                if (isMobile) {
                    tabContent.forEach((content) => {
                        content.classList.remove('active', 'show'); // remove active and show classes from all tab-panes
                    });
                }

                // show the clicked tab content
                tabContent[index].classList.add('active', 'show');
            });
        });

        // wrap each li and its corresponding content in a container
        const tabContentWrapper = document.createElement('div');
        tabContentWrapper.classList.add('tab-content-wrapper');

        tabLinks.forEach((link, index) => {
            const listItem = link.parentNode;
            const content = tabContent[index];

            // create a container for the list item and content
            const itemWrapper = document.createElement('div');
            itemWrapper.classList.add('item-wrapper');

            // append the list item and content to the container
            itemWrapper.appendChild(listItem);
            itemWrapper.appendChild(content);

            // append the container to the wrapper
            tabContentWrapper.appendChild(itemWrapper);
        });

        // insert the wrapper into the DOM
        const tabContainer = document.querySelector('.three-tabs');
        tabContainer.appendChild(tabContentWrapper);
    }
    const secondaryBlock = document.querySelector('.secondary-information-block');
    const productImgReal = document.querySelector('.product-image');
    const mobChevronButton = document.querySelector('.mob-chevron-button');

    mobChevronButton.addEventListener('click', function () {
        if (secondaryBlock.classList.contains('active')) {
            productImgReal.style.overflow = 'hidden';
            productImgReal.style.height = "470px";
        } else {
            productImgReal.style.marginBottom = '94px';
            productImgReal.style.overflow = 'auto';
            productImgReal.style.height = "auto";
        }
    });

    // Store the initial main image's source when the page loads
    let initialMainImage = document.querySelector('.product-image img');
    let initialMainImageSrc = initialMainImage ? initialMainImage.src : '';

    let carouselDots1 = document.querySelectorAll('.carousel-mobile-dots span');
    carouselDots1.forEach(function (dot, index) {
        dot.addEventListener('click', function () {
            let image;

            if (index === 0) { // If the first dot is clicked
                // Set the main image to the initial main image
                image = new Image();
                image.src = initialMainImageSrc;
            } else {
                // Otherwise, get the corresponding image from .additional-images
                let images = document.querySelectorAll('.additional-images .additional-image img');
                image = images[index - 1]; // Adjust the index by -1 because the first dot represents the initial main image
            }

            if (image) {
                let mainImage = document.querySelector('.product-image img');
                if (mainImage) {
                    mainImage.src = image.src;
                }
            }
        });
    });
});