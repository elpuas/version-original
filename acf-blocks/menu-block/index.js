/**
 * Menu Block Animation Script
 *
 * This script handles the animation of menu items when they come into view.
 * It uses Intersection Observer to trigger animations and dynamically
 * calculates animation delays based on the item's position.
 */

document.addEventListener('DOMContentLoaded', function () {
	// Select all menu sections
	const menuSections = document.querySelectorAll('.menu-section');

	if (!menuSections.length) return;

	// Set up the Intersection Observer
	const observer = new IntersectionObserver(
		(entries) => {
			entries.forEach((entry) => {
				// When a menu section enters the viewport
				if (entry.isIntersecting) {
					const section = entry.target;
					animateMenuItems(section);

					// Unobserve after animation is triggered
					observer.unobserve(section);
				}
			});
		},
		{
			root: null, // Use the viewport
			threshold: 0.1, // Trigger when at least 10% of the target is visible
			rootMargin: '0px 0px -100px 0px', // Adjust the trigger point
		}
	);

	// Observe all menu sections
	menuSections.forEach((section) => {
		observer.observe(section);
	});

	/**
	 * Animate menu items within a section
	 *
	 * @param {HTMLElement} section The menu section element
	 */
	function animateMenuItems(section) {
		// Get all menu items in this section
		const columns = section.querySelectorAll('.menu-column');

		columns.forEach((column, columnIndex) => {
			const items = column.querySelectorAll('.menu-item');

			items.forEach((item, itemIndex) => {
				// Calculate a staggered delay based on column and position
				const baseDelay = columnIndex * 0.05; // Slight offset for second column
				const itemDelay = baseDelay + itemIndex * 0.1; // 0.1s between items

				// Apply animation styles
				item.style.opacity = '0';
				item.style.transform = 'translateX(-30px)';
				item.style.animation = `slideIn 0.5s ease forwards ${itemDelay}s`;
			});
		});

		// Also animate the section header if it exists
		const header = section.querySelector('.menu-section-header');
		if (header) {
			header.style.opacity = '0';
			header.style.animation = 'fadeIn 0.8s ease forwards';
		}

		// Animate section image if it exists
		const image = section.querySelector('.menu-section-image');
		if (image) {
			image.style.opacity = '0';
			image.style.transform = 'translateY(20px)';
			image.style.animation = 'slideUp 0.7s ease forwards 0.3s';
		}
	}
});

// Define animations in JavaScript to avoid CSS duplication
if (!document.getElementById('menu-animations-style')) {
	const style = document.createElement('style');
	style.id = 'menu-animations-style';
	style.textContent = `
        @keyframes slideIn {
            0% {
                opacity: 0;
                transform: translateX(-30px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
        
        @keyframes slideUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @media (prefers-reduced-motion: reduce) {
            .menu-item, .menu-section-header, .menu-section-image {
                animation: none !important;
                opacity: 1 !important;
                transform: none !important;
            }
        }
    `;
	document.head.appendChild(style);
}
