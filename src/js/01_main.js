// Мобильное меню бургер
function burgerMenu() {
  let burger = document.querySelector(".burger");
  let menu = document.querySelector(".menu__list");
  burger.addEventListener("click", () => {
    if (!menu.classList.contains("active")) {
      menu.classList.add("active");
      burger.classList.add("active-burger");
    } else {
      menu.classList.remove("active");
      burger.classList.remove("active-burger");
    }
  });
  window.addEventListener("resize", () => {
    if (window.innerWidth > 885) {
      menu.classList.remove("active");
      burger.classList.remove("active-burger");
    }
  });
}
burgerMenu();
// Аккордеон
function accordion() {
  const items = document.querySelectorAll(".accordion__item-trigger");
  items.forEach((item) => {
    item.addEventListener("click", () => {
      const parent = item.parentNode;
      if (parent.classList.contains("accordion__item-active")) {
        parent.classList.remove("accordion__item-active");
      } else {
        document
          .querySelectorAll(".accordion__item")
          .forEach((child) => child.classList.remove("accordion__item-active"));
        parent.classList.add("accordion__item-active");
      }
    });
  });
}
accordion();
// Модальное окно (вызов, закрыть)

function openForm(nameId) {
  document.getElementById(nameId).style.display = "block";
}
function closeForm(nameId) {
  document.getElementById(nameId).style.display = "none";
}
//
// подмена лого
function replaceLogo() {
  const winWidth = window.innerWidth;
  if (winWidth < 490) {
    const imgLogo = logo.getAttribute("src");
    if (!imgLogo.includes("logo.")) {
      const replaceLogo = /logo_text./g;
      return logo.setAttribute("src", imgLogo.replace(replaceLogo, "logo."));
    }
  }
}
replaceLogo();
//// подсветка меню
function activMenu() {
  document.querySelectorAll(".menu__list-item a").forEach(function (el) {
    console.log(el);
    if (window.location == el.getAttribute("href")) {
      el.parentNode.classList.add("active");
      console.log(el);
    }
  });
}
activMenu();
// отправка формы
function submitHandler(e) {
  e.preventDefault();

  const request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    console.log("readyState=", this.readyState, "statis=", this.status);
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
      // success, show this.responseText here
    }
  };

  request.open(this.method, this.action, true);
  request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  const data = new FormData(this);
  for (var key of data.keys()) request.send(data);
}

document
  .querySelectorAll("form")
  .forEach((form) => form.addEventListener("submit", submitHandler));
