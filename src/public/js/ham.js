const btn = document.getElementById("btn");
const menu = document.getElementById("menu");

btn.addEventListener("click", () => {
  btn.classList.toggle("on");
  menu.classList.toggle("on");
});