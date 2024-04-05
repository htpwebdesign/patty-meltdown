const btnValue = document.getElementById("addon-191-0");
const btnValue1 = document.getElementById("addon-191-1");
const btnValue2 = document.getElementById("addon-191-3");
const checkboxToppings = document.querySelectorAll(
  "input[name='addon-191-2[]']"
);
const checkboxSauces = document.querySelectorAll("input[name='addon-191-4[]']");
const bunTop = document.querySelectorAll("#top-bun img");
const bunBottom = document.querySelectorAll("#bottom-bun img");
const meat = document.querySelectorAll("#meat img");
const cheese = document.querySelectorAll("#cheese img");
const toppings = document.querySelectorAll("#toppings img");
const sauces = document.querySelectorAll("#sauces img");
btnValue.addEventListener("change", (e) => {
  byobReturnSomething(e);
});
btnValue1.addEventListener("change", (e) => {
  byobReturnMeat(e);
});
btnValue2.addEventListener("change", (e) => {
  byobReturnCheese(e);
});
checkboxToppings.forEach((checkbox) => {
  checkbox.addEventListener("change", (e) => {
    byobReturnToppings(e, checkbox);
  });
});
checkboxSauces.forEach((checkbox) => {
  checkbox.addEventListener("change", (e) => {
    byobReturnSauces(e, checkbox);
  });
});
function byobReturnSomething(e) {
  let properString = e.target.value;
  let modifiedString = properString.replace(/-\d+$/, "");
  bunTop.forEach((img) => {
    if (img.classList.contains(modifiedString)) {
      img.classList.remove("hidden");
    } else {
      img.classList.add("hidden");
    }
  });
  bunBottom.forEach((img) => {
    if (img.classList.contains(modifiedString)) {
      img.classList.remove("hidden");
    } else {
      img.classList.add("hidden");
    }
  });
}
function byobReturnMeat(e) {
  let properString = e.target.value;
  let modifiedString = properString.replace(/-\d+$/, "");
  meat.forEach((img) => {
    if (img.classList.contains(modifiedString)) {
      img.classList.remove("hidden");
    } else {
      img.classList.add("hidden");
    }
  });
}
function byobReturnCheese(e) {
  let properString = e.target.value;
  let modifiedString = properString.replace(/-\d+$/, "");
  cheese.forEach((img) => {
    if (img.classList.contains(modifiedString)) {
      img.classList.remove("hidden");
    } else {
      img.classList.add("hidden");
    }
  });
}
function byobReturnToppings(e, checkbox) {
  let properString = e.target.value;
  let modifiedString = properString.replace(/-\d+$/, "");
  if (checkbox.checked === true) {
    toppings.forEach((img) => {
      if (img.classList.contains(modifiedString)) {
        img.classList.remove("hidden");
      }
    });
  } else {
    toppings.forEach((img) => {
      if (img.classList.contains(modifiedString)) {
        img.classList.add("hidden");
      }
    });
  }
}
function byobReturnSauces(e, checkbox) {
  let properString = e.target.value;
  let modifiedString = properString.replace(/-\d+$/, "");
  if (checkbox.checked === true) {
    sauces.forEach((img) => {
      if (img.classList.contains(modifiedString)) {
        img.classList.remove("hidden");
      }
    });
  } else {
    sauces.forEach((img) => {
      if (img.classList.contains(modifiedString)) {
        img.classList.add("hidden");
      }
    });
  }
}
