function getFieldError(el) {
    const validity = el.validity;
  
    if (validity.valid) return true;
    if (validity.valueMissing) return "Wypełnij pole";
    if (validity.patternMismatch) return "Wpisana wartość nie spełnia wymagań";
    if (validity.typeMismatch) {
      if (el.type === "email") return "Wpisz poprawny email";
    }
    if (validity.tooLong)
      return "Wpisana wartość przekroczyła maksymalną ilość znaków";
    return "Wypełnij poprawnie pole";
  }
  
  function removeFieldError(field) {
    const errorField = field.nextElementSibling;
    if (errorField !== null) {
      if (errorField.classList.contains("form-error-text")) {
        errorField.remove();
      }
    }
  }
  
  function createFieldError(field, text) {
    removeFieldError(field);
  
    const div = document.createElement("div");
    div.classList.add("form-error-text");
    if (field.type === "checkbox") {
      text = "Wymagane";
      div.innerText = text;
      field.parentElement.appendChild(div);
    } else {
      div.innerText = text;
      field.insertAdjacentElement("afterend", div);
    }
  }
  const form = document.querySelector("form");
  const inputs = document.querySelectorAll("input");
  
  form.setAttribute("novalidate", true);
  
  for (const el of inputs) {
    el.addEventListener("click", (e) => {
      removeFieldError(e.target);
      el.classList.remove("field-error");
      
    });
  }
  form.addEventListener("submit", (e) => {
    e.preventDefault();
    let haslo = document.querySelector("#haslo");
    let phaslo = document.querySelector("#phaslo");
    let formHasErrors = false;
    for (const el of inputs) {
      removeFieldError(el);
      el.classList.remove("field-error");
  
      if (!el.checkValidity()) {
        createFieldError(el, getFieldError(el));
        el.classList.add("field-error");
        formHasErrors = true;
      }
    }
    if (phaslo != null) {
      if (haslo.value !== phaslo.value) {
        console.log("A");
        createFieldError(phaslo, "podane hasła różnią się");
        phaslo.classList.add("field-error");
        formHasErrors = true;
      }
    }
    if (!formHasErrors) {
      e.target.submit();
    }
  });