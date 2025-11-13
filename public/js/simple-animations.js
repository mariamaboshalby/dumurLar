// Simple scroll animations
document.addEventListener('DOMContentLoaded', function() {
    // Add animate-on-scroll class to sections
    const sections = document.querySelectorAll('.about-section, .features-section, .comments-section');
    sections.forEach(section => {
        section.classList.add('animate-on-scroll');
    });
    
    // Add animate-on-scroll class to feature boxes with delay
    const featureBoxes = document.querySelectorAll('.feature-box');
    featureBoxes.forEach((box, index) => {
        box.classList.add('animate-on-scroll');
        box.style.transitionDelay = `${index * 0.1}s`;
    });
    
    // Intersection Observer for scroll animations
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animated');
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });
    
    // Observe all elements with animate-on-scroll class
    document.querySelectorAll('.animate-on-scroll').forEach(element => {
        observer.observe(element);
    });
});