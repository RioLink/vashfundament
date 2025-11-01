// Burger (можно расширить под мобильное меню)
document.querySelectorAll('.burger').forEach(btn=>{
  btn.addEventListener('click',()=>{
    const info = document.querySelector('.header-info');
    if(!info) return;
    const visible = getComputedStyle(info).display !== 'none';
    info.style.display = visible ? 'none' : 'flex';
  });
});

// Простой слайдер (горизонтальная прокрутка)
(function(){
  const track = document.getElementById('galleryTrack');
  if(!track) return;
  const prev = document.querySelector('.slide-btn.prev');
  const next = document.querySelector('.slide-btn.next');
  const step = 320;

  prev && prev.addEventListener('click', ()=> track.scrollBy({left: -step, behavior: 'smooth'}));
  next && next.addEventListener('click', ()=> track.scrollBy({left:  step, behavior: 'smooth'}));
})();

// Служебная функция конверсії (как в исходнике)
function gtag_report_conversion(url) {
  var callback = function () {
    if (typeof(url) != 'undefined') {
      window.location = url;
    }
  };
  if (typeof gtag === 'function') {
    gtag('event', 'conversion', {
      'send_to': '/',
      'value': 25.0,
      'currency': 'UAH',
      'event_callback': callback
    });
  } else {
    callback();
  }
  return false;
}
