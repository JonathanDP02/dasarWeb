
// ANIMASI NAVBAR & HALAMAN
function showPage(pageId) {
    const sections = document.querySelectorAll('.section');
    const selected = document.getElementById(pageId);

    // Hilangkan semua halaman dengan animasi fade-out
    sections.forEach(sec => {
        sec.classList.remove('active');
        sec.classList.add('fade-out');
    });

    // Tambahkan delay agar animasi halus
    setTimeout(() => {
        sections.forEach(sec => sec.style.display = 'none');
        selected.style.display = 'block';
        selected.classList.remove('fade-out');
        selected.classList.add('active', 'fade-in');
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }, 300);
}

// ANIMASI NAVBAR (HOVER EFFECT)
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('nav ul li a').forEach(link => {
        link.addEventListener('mouseenter', () => {
            link.style.color = '#FFD700';
            link.style.transition = 'color 0.3s';
        });
        link.addEventListener('mouseleave', () => {
            link.style.color = '';
        });
    });


    // ANIMASI HOVER UNTUK ROSTER
    const players = document.querySelectorAll('.player');
    players.forEach(player => {
        player.addEventListener('mouseenter', () => {
            player.style.transform = 'scale(1.05)';
            player.style.boxShadow = '0 0 15px rgba(255, 215, 0, 0.6)';
            player.style.transition = 'all 0.3s';
        });
        player.addEventListener('mouseleave', () => {
            player.style.transform = 'scale(1)';
            player.style.boxShadow = '';
        });
    });

    // ANIMASI HOVER UNTUK TROPHY
    const trophy = document.querySelectorAll('.trophy-item');
     trophy.forEach(trophy => {
        trophy.addEventListener('mouseenter', () => {
            trophy.style.transform = 'scale(1.05)';
            trophy.style.boxShadow = '0 0 15px rgba(255, 215, 0, 0.6)';
            trophy.style.transition = 'all 0.3s';
        });
        trophy.addEventListener('mouseleave', () => {
            trophy.style.transform = 'scale(1)';
            trophy.style.boxShadow = '';
        });
    });

    const logo = document.querySelectorAll('.logo-item');
     logo.forEach(logo => {
        logo.addEventListener('mouseenter', () => {
            logo.style.transform = 'scale(1.05)';
            logo.style.boxShadow = '0 0 15px rgba(255, 215, 0, 0.6)';
            logo.style.transition = 'all 0.3s';
        });
        logo.addEventListener('mouseleave', () => {
            logo.style.transform = 'scale(1)';
            logo.style.boxShadow = '';
        });
    });

});
