feather.replace();
document.addEventListener('DOMContentLoaded', function() {
    const toggleButton = document.querySelector('.toggle-button');
    const navEtBoutton = document.querySelector('.nav-et-boutton');
    const body = document.body;

    function closeMenu() {
        toggleButton.classList.remove('active');
        navEtBoutton.classList.remove('active');
        body.style.overflow = '';
    }

    // Gestion du clic sur le bouton hamburger
    toggleButton.addEventListener('click', function() {
        this.classList.toggle('active');
        navEtBoutton.classList.toggle('active');
        
        // Empêcher le défilement du body quand le menu est ouvert
        if (this.classList.contains('active')) {
            body.style.overflow = 'hidden';
        } else {
            body.style.overflow = '';
        }
    });


    // Fermer le menu quand on clique sur un lien
    navEtBoutton.addEventListener('click', function(e) {
        if (e.target.tagName === 'A') {
            closeMenu();
        }
    });

   
    document.addEventListener('click', function(e) {
        if (!navEtBoutton.contains(e.target) && !toggleButton.contains(e.target)) {
            closeMenu();
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const faqItems = document.querySelectorAll('.faq-item');

    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        question.addEventListener('click', () => {
  
            faqItems.forEach(otherItem => {
                if (otherItem !== item && otherItem.classList.contains('active')) {
                    otherItem.classList.remove('active');
                }
            });
            
       
            item.classList.toggle('active');
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    var publicationsSection = document.getElementById('publications');
    

    if (!publicationsSection.querySelector('.publication')) {
        publicationsSection.classList.add('hidden');
    }
});


let subMenu = document.getElementById("subMenu");
      function toggleMenu() {
        subMenu.classList.toggle("open-menu");
      }

document.addEventListener('DOMContentLoaded', function() {
    const statistiques = document.querySelectorAll('.statistique-chiffre');
    
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = parseInt(entry.target.getAttribute('data-target'));
                animateValue(entry.target, 0, target, 2000);
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    statistiques.forEach(stat => {
        observer.observe(stat);
    });

    function animateValue(obj, start, end, duration) {
        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            obj.innerHTML = Math.floor(progress * (end - start) + start);
            if (progress < 1) {
                window.requestAnimationFrame(step);
            }
        };
        window.requestAnimationFrame(step);
    }
});
