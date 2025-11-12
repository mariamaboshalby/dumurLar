document.addEventListener('DOMContentLoaded', function() {
    const accordionButtons = document.querySelectorAll('.accor-btn');
    
    accordionButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('data-target');
            const target = document.querySelector(targetId);
            const isActive = this.classList.contains('active');
            
            // Close all accordions
            accordionButtons.forEach(btn => {
                btn.classList.remove('active');
                const btnTarget = document.querySelector(btn.getAttribute('data-target'));
                if (btnTarget) {
                    btnTarget.classList.remove('show');
                }
            });
            
            // Open clicked accordion if it wasn't active
            if (!isActive && target) {
                this.classList.add('active');
                target.classList.add('show');
            }
        });
    });
});