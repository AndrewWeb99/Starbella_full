let div = document.querySelectorAll(".rating-reviews");
document.addEventListener("DOMContentLoaded", function () {
  div.forEach((elem) => {
    if (elem.dataset.id == 0) {
      elem.innerHTML =
        "<span></span> <span></span> <span></span> <span></span> <span></span>";
    }
    if (elem.dataset.id == 1) {
      elem.innerHTML =
        '<span class="active"></span> <span></span> <span></span> <span></span> <span></span>';
    }
    if (elem.dataset.id == 2) {
      elem.innerHTML =
        '<span class="active"></span> <span class="active"></span> <span></span> <span></span> <span></span>';
    }
    if (elem.dataset.id == 3) {
      elem.innerHTML =
        '<span class="active"></span> <span class="active"></span> <span class="active"></span> <span></span> <span></span>';
    }
    if (elem.dataset.id == 4) {
      elem.innerHTML =
        '<span class="active"></span> <span class="active"></span> <span class="active"></span> <span class="active"></span> <span></span>';
    }
    if (elem.dataset.id == 5) {
      elem.innerHTML =
        '<span class="active"></span> <span class="active"></span> <span class="active"></span> <span class="active"></span> <span class="active"></span>';
    }
  });
});


let mini = document.getElementById('main_r');

let number = Math.round(mini.dataset.total);

if (number == 0) {
  mini.innerHTML =
    "<span></span> <span></span> <span></span> <span></span> <span></span>";
}
if (number == 1) {
  mini.innerHTML =
    '<span class="active"></span> <span></span> <span></span> <span></span> <span></span>';
}
if (number == 2) {
  mini.innerHTML =
    '<span class="active"></span> <span class="active"></span> <span></span> <span></span> <span></span>';
}
if (number == 3) {
  mini.innerHTML =
    '<span class="active"></span> <span class="active"></span> <span class="active"></span> <span></span> <span></span>';
}
if (number == 4) {
  mini.innerHTML =
    '<span class="active"></span> <span class="active"></span> <span class="active"></span> <span class="active"></span> <span></span>';
}
if (number == 5) {
  mini.innerHTML =
    '<span class="active"></span> <span class="active"></span> <span class="active"></span> <span class="active"></span> <span class="active"></span>';
}
