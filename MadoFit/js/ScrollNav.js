let prevScrollpos = window.pageYOffset;
window.onscroll = function() {
  let currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.querySelector(".navbar").classList.add("visible");
  } else {
    document.querySelector(".navbar").classList.remove("visible");
  }
  prevScrollpos = currentScrollPos;
}