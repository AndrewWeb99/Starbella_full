let product = document.querySelectorAll(".product-wrapper");
let products = document.getElementById("products");
let sorter = document.getElementById("sorter");

let nach_cost = document.getElementById("nach_cost");
let kon_cost = document.getElementById("kon_cost");

sorter.addEventListener("change", function () {
  if (sorter.value == 2) {
    let sorted = [...product].sort(function (a, b) {
      return -a.dataset.cost + b.dataset.cost;
    });
    products.innerHTML = "";
    for (let li of sorted) {
      products.appendChild(li);
    }
  }
  if (sorter.value == 3) {
    let sorted = [...product].sort(function (a, b) {
      return a.dataset.cost - b.dataset.cost;
    });
    products.innerHTML = "";
    for (let li of sorted) {
      products.appendChild(li);
    }
  }
  if (sorter.value == 4) {
    let sorted = [...product].sort(function (a, b) {
      return a.dataset.star - b.dataset.star;
    });
    products.innerHTML = "";
    for (let li of sorted) {
      products.appendChild(li);
    }
  }
});



function filterRange(arr, a, b) {
  return arr.filter((item) => a <= item.dataset.cost && item.dataset.cost <= b);
}

kon_cost.addEventListener("input", function () {
  let filter2 = [...product];
  let filtered = filterRange(
    filter2,
    Number(nach_cost.value),
    Number(kon_cost.value)
  );
  products.innerHTML = "";
  for (let li of filtered) {
    products.appendChild(li);
  }
});
