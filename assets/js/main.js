document.addEventListener("DOMContentLoaded", function () {
  // ==== Gallery sliders ====
  $('.gallery-slider').each(function (i) {
    $(this).slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      infinite: true,
      autoplay: true,
      autoplaySpeed: 3500,
      arrows: true,
      prevArrow: '<button type="button" class="slick-prev">‹</button>',
      nextArrow: '<button type="button" class="slick-next">›</button>',
      responsive: [
        { breakpoint: 1024, settings: { slidesToShow: 2 } },
        { breakpoint: 700, settings: { slidesToShow: 1 } }
      ]
    });

    // fancybox group names
    const groupName = 'gal-' + i;
    $(this).find('a').attr('data-fancybox', groupName);
  });
  // ==== Fancybox ====
  Fancybox.bind('[data-fancybox^="gal-"]', {
    dragToClose: true,
    Thumbs: { autoStart: false },
    Toolbar: { display: ["close"] }
  });
  // ==== Furniture slider ====
  $(".furniture-slider").slick({
    dots: true,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 3000,
    speed: 700,
    slidesToShow: 1,
    adaptiveHeight: true,
    arrows: false,
    fade: true,
    pauseOnHover: true
  });
  // ==== Lazy load fade-in ====
  const imgs = document.querySelectorAll("img[loading='lazy'], img");
  imgs.forEach(img => {
    if (img.complete) {
      img.classList.add("loaded");
    } else {
      img.addEventListener("load", () => img.classList.add("loaded"));
      img.addEventListener("error", () => img.classList.add("loaded"));
    }
  });
});