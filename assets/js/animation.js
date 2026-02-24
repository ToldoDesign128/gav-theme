// Animation Script

// Donut Charts - animate on scroll
document.addEventListener('DOMContentLoaded', function () {
  const charts = document.querySelectorAll('.donut-chart');
  if (!charts.length) return;

  const observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        const svg = entry.target;
        const fill = svg.querySelector('.donut-fill');
        const targetOffset = parseFloat(fill.getAttribute('data-target-offset'));
        fill.style.strokeDashoffset = targetOffset;
        observer.unobserve(svg);
      }
    });
  }, { threshold: 0.4 });

  charts.forEach(function (chart) {
    observer.observe(chart);
  });
});