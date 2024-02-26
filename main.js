const form = document.querySelector("form");
const main_text = document.querySelector("h2");
const login_inputs = document.querySelectorAll(".invisible");
const submit_input = document.querySelector("input[type=submit]");
const helper_text = document.getElementById("helper-text");
const change_form_button = document.getElementById("change-form");

// Смена формы
let login_form = false;

change_form_button.addEventListener("click", () => {
    if (!login_form) {
      form.action = "registration.php";

      main_text.innerHTML = "Регистрация";

      login_inputs.forEach(login_input => {
        login_input.setAttribute("required", true);
        login_input.classList.remove("invisible");
      });

      submit_input.value = "Зарегистрироваться";

      helper_text.innerHTML = "Eсть профиль?";
      change_form_button.innerHTML = "Войти";

      login_form = true;
      controllerEventListener(login_form);
    } else {
      form.action = "login.php";

      main_text.innerHTML = "Вход";

      login_inputs.forEach(login_input => {
        login_input.removeAttribute("required");
        login_input.classList.add("invisible");
      });

      submit_input.value = "Войти";

      helper_text.innerHTML = "Нет профиля?";
      change_form_button.innerHTML = "Зарегистрироваться";

      login_form = false;
      controllerEventListener(login_form);
    }
});

// Проверка на подтверждение пароля в форме регистрации
const password_inputs = document.querySelectorAll("input[type=password]");
const label = document.querySelector('label');

function checkPasswords() {
  if (password_inputs[0].value != password_inputs[1].value) {
    label.innerHTML = "Пароли не совпадают!";
    label.classList.remove("invisible-label");
    submit_input.setAttribute("disabled", "disabled");
  } else {
    label.classList.add("invisible-label");
    submit_input.removeAttribute("disabled");
  }
}

// Скрытие label + input подтверждения пароля и email'а при смене формы
function controllerEventListener(controller) {
  if (controller) {
    password_inputs.forEach(password_input => {
      password_input.addEventListener("input", checkPasswords);
    });
  } else {
    password_inputs.forEach(password_input => {
      password_input.removeEventListener("input", checkPasswords);
    });
  }
  label.classList.add("invisible-label");
}

// Ограничение на использование некоторых специальных символов в input
const inputs = document.querySelectorAll('input');
const banned_symbols = [" ", "\"", "#", "№", "$", ";", "%", "^", ":", "*", "+", "(", ")", "'", "<", ">", "&", "|", "\\", "/"];

inputs.forEach(input => {
  input.addEventListener("keydown", (event) => {
    if (banned_symbols.includes(event.key)) {
      event.preventDefault();
      label.innerHTML = "Запрещено использовать спец.символы!";
      label.classList.remove("invisible-label");
    }
  });
});

if (label.innerHTML != null) {
  label.classList.remove("invisible-label");
}