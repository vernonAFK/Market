const cart_info = document.querySelectorAll("span");

for (let i = 0; i < cart_info.length; i = i + 2) {
    cart_info[i].innerHTML = cart_info[i].innerHTML * cart_info[i + 1].innerHTML;
}

