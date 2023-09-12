const shrink_btn = document.querySelector(".shrink-btn");
const search = document.querySelector(".search");
const sidebar_links = document.querySelectorAll(".sidebar-links a");
const main_navigation = document.querySelectorAll(".main-navigation a");
const active_tab = document.querySelector(".active-tab");
const shortcuts = document.querySelector(".sidebar-links h4");
const tooltip_elements = document.querySelectorAll(".tooltip-element");

let activeIndex;
if (screen.availWidth > 768) {
  shrink_btn.addEventListener("click", () => {
    document.body.classList.toggle("shrink");
    setTimeout(moveActiveTab, 400);

    shrink_btn.classList.add("hovered");

    setTimeout(() => {
      shrink_btn.classList.remove("hovered");
    }, 500);
  });
}
search.addEventListener("click", () => {
  document.body.classList.remove("shrink");
  search.lastElementChild.focus();
});

function moveActiveTab() {
  let topPosition = activeIndex * 58 + 2.5;

  if (activeIndex > main_navigation.length - 1) {
    topPosition += shortcuts.clientHeight;
  }

  active_tab.style.top = `${topPosition}px`;
}

function changeLink() {
  sidebar_links.forEach((sideLink) => sideLink.classList.remove("active"));
  this.classList.add("active");
  activeIndex = this.dataset.active;

  moveActiveTab();
}

sidebar_links.forEach((link) => link.addEventListener("click", changeLink));

function showTooltip() {
  let tooltip = this.parentNode.lastElementChild;
  let spans = tooltip.children;
  let tooltipIndex = this.dataset.tooltip;

  Array.from(spans).forEach((sp) => sp.classList.remove("show"));
  spans[tooltipIndex].classList.add("show");

  tooltip.style.top = `${(100 / (spans.length * 2)) * (tooltipIndex * 2 + 1)}%`;
}

tooltip_elements.forEach((elem) => {
  elem.addEventListener("mouseover", showTooltip);
});

// add class name below 576px width
window.addEventListener("resize", () => {
  if (window.innerWidth < 800) {
    document.body.classList.add("shrink");
  }
});

window.addEventListener("load", () => {
  if (window.innerWidth < 800) {
    document.body.classList.add("shrink");
  }
});

// CUSTOM CHOOSE FILE BUTTON
$(function () {
  $(".__lk-fileInput input").change(function () {
    var label = $(this).parent().find("span");
    if (typeof this.files != "undefined") {
      // fucking IE
      if (this.files.length == 0) {
        label.removeClass("withFile").text(label.data("default"));
      } else {
        var file = this.files[0];
        var name = file.name;
        var size = (file.size / 1048576).toFixed(3); //size in mb
        label.addClass("withFile").text(name + " (" + size + "mb)");
      }
    } else {
      var name = this.value.split("\\");
      label.addClass("withFile").text(name[name.length - 1]);
    }
    return false;
  });
});
