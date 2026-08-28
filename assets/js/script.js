// ========================================
// STANLEY TECH CONNECT - MAIN JAVASCRIPT
// Day 1-2: Foundation
// ========================================

console.log('Stanley Tech Connect - JavaScript Loaded!');
console.log('Day 2: HTML Foundation Complete ✅');

// Wait for DOM to load
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM fully loaded and parsed');
    
    // Mobile menu toggle (will be expanded on Day 10)
    // Add any initial functionality here
    
    // Smooth scroll for anchor links (if needed)
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });
});