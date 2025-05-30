document.addEventListener('mousemove', function(e) {
    const el = document.querySelector('.parallax-bg');
    if (!el) return;
    const x = e.clientX / window.innerWidth;
    const y = e.clientY / window.innerHeight;
    // Tăng hệ số để ảnh di chuyển sát theo chuột
    const posX = x * 100;
    const posY = y * 100;
    el.style.backgroundPosition = `${posX}% ${posY}%, center center`;
});