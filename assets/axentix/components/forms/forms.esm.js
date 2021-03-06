var forms = "";
const config = {
  components: [],
  plugins: [],
  prefix: "ax",
  mode: ""
};
const getCssVar = (variable) => `--${config.prefix}-${variable}`;
const checkBrowserValidity = (input) => {
  return input.checkValidity() || input.validationMessage;
};
const setAdvancedMode = (formField, content) => {
  const helper = document.createElement("div");
  helper.axGenerated = true;
  formField.appendChild(helper);
  helper.classList.add("form-helper-invalid");
  helper.innerHTML = content;
};
const clearAdvancedMode = (formField) => {
  const helper = formField.querySelector(".form-helper-invalid");
  if (!helper)
    return;
  if (helper.axGenerated)
    helper.remove();
};
const resetInputValidation = (formField) => {
  formField.classList.remove("form-valid", "form-invalid", "form-no-helper");
  clearAdvancedMode(formField);
};
const validateInput = (input, eType) => {
  const advancedMode = input.getAttribute("data-form-validate");
  let auto = false;
  if (advancedMode) {
    const advSplit = advancedMode.toLowerCase().split(",");
    auto = advSplit.includes("auto");
    if (advSplit.includes("lazy") && eType === "input")
      return;
  }
  const isValid = checkBrowserValidity(input);
  const formField = input.closest(".form-field");
  resetInputValidation(formField);
  if (isValid !== true) {
    if (auto && typeof isValid === "string")
      setAdvancedMode(formField, isValid);
    else if (!formField.querySelector(".form-helper-invalid"))
      formField.classList.add("form-no-helper");
    formField.classList.add("form-invalid");
    return false;
  }
  formField.classList.add("form-valid");
  if (!formField.querySelector(".form-helper-valid"))
    formField.classList.add("form-no-helper");
  return true;
};
const validateAll = (form, reset) => {
  const inputs = form.querySelectorAll(`[data-form-validate]`);
  if (reset) {
    inputs.forEach((input) => resetInputValidation(input.closest(".form-field")));
    return true;
  }
  return ![...inputs].some((input) => !validateInput(input, "change"));
};
let isInit = true;
const detectAllInputs = (inputElements) => {
  inputElements.forEach(detectInput);
};
const delayDetectionAllInputs = (inputElements) => {
  if (isInit) {
    isInit = false;
    return;
  }
  setTimeout(() => {
    detectAllInputs(inputElements);
  }, 10);
};
const detectInput = (input) => {
  const formField = input.closest(".form-field");
  const customSelect = formField.querySelector(".form-custom-select");
  const isActive = formField.classList.contains("active");
  const types = ["date", "month", "week", "time"];
  let hasContent = customSelect && input.tagName === "DIV" && input.innerText.length > 0;
  if (!customSelect)
    hasContent = input.value.length > 0 || input.tagName !== "SELECT" && input.placeholder.length > 0 || input.tagName === "SELECT" || types.some((type) => input.matches(`[type="${type}"]`));
  const isFocused = document.activeElement === input;
  const isDisabled = input.hasAttribute("disabled") || input.hasAttribute("readonly");
  if (input.firstInit) {
    updateInput(input, isActive, hasContent, isFocused, formField, customSelect);
    input.firstInit = false;
    input.isInit = true;
  } else {
    if (!isDisabled)
      updateInput(input, isActive, hasContent, isFocused, formField, customSelect);
  }
};
const updateInput = (input, isActive, hasContent, isFocused, formField, customSelect) => {
  const isTextArea = input.type === "textarea";
  const label = formField.querySelector("label:not(.form-check)");
  if (!isActive && (hasContent || isFocused)) {
    formField.classList.add("active");
  } else if (isActive && !(hasContent || isFocused)) {
    formField.classList.remove("active");
  }
  if (!isTextArea)
    setFormPosition(input, formField, customSelect, label);
  else if (label)
    label.style.backgroundColor = getLabelColor(label);
  if (isFocused && !isTextArea)
    formField.classList.add("is-focused");
  else if (!customSelect)
    formField.classList.remove("is-focused");
  if (isFocused && isTextArea)
    formField.classList.add("is-textarea-focused");
  else
    formField.classList.remove("is-textarea-focused");
};
const setFormPosition = (input, formField, customSelect, label) => {
  const inputWidth = input.clientWidth, inputLeftOffset = input.offsetLeft;
  const topOffset = input.clientHeight + (customSelect ? customSelect.offsetTop : input.offsetTop) + "px";
  const isBordered = input.closest(".form-material").classList.contains("form-material-bordered");
  formField.style.setProperty(getCssVar("form-material-position"), topOffset);
  let offset = inputLeftOffset, side = "left", width = inputWidth + "px", labelLeft = 0;
  if (formField.classList.contains("form-rtl")) {
    side = "right";
    offset = formField.clientWidth - inputWidth - inputLeftOffset;
  }
  formField.style.setProperty(getCssVar(`form-material-${side}-offset`), offset + "px");
  if (offset != 0)
    labelLeft = inputLeftOffset;
  formField.style.setProperty(getCssVar("form-material-width"), width);
  if (label) {
    label.style.left = labelLeft + "px";
    if (isBordered)
      label.style.backgroundColor = getLabelColor(label);
  }
};
const getLabelColor = (label) => {
  let target = label;
  while (target.parentElement) {
    let bg = window.getComputedStyle(target).backgroundColor;
    if (bg && !["transparent", "rgba(0, 0, 0, 0)"].includes(bg)) {
      return bg;
    }
    target = target.parentElement;
  }
  return "white";
};
const validate = (input, e) => {
  if (input.hasAttribute(`data-form-validate`))
    validateInput(input, e.type);
};
const handleListeners = (inputs, e) => {
  inputs.forEach((input) => {
    if (input === e.target)
      detectInput(input);
  });
};
const handleResetEvent = (inputs, e) => {
  if (e.target.tagName === "FORM" && e.target.classList.contains("form-material"))
    delayDetectionAllInputs(inputs);
};
const setupFormsListeners = (inputElements) => {
  inputElements.forEach((input) => {
    input.firstInit = true;
    input.validateRef = validate.bind(null, input);
    input.addEventListener("input", input.validateRef);
    input.addEventListener("change", input.validateRef);
  });
  detectAllInputs(inputElements);
  const handleListenersRef = handleListeners.bind(null, inputElements);
  document.addEventListener("focus", handleListenersRef, true);
  document.addEventListener("blur", handleListenersRef, true);
  const delayDetectionAllInputsRef = delayDetectionAllInputs.bind(null, inputElements);
  window.addEventListener("pageshow", delayDetectionAllInputsRef);
  const handleResetRef = handleResetEvent.bind(null, inputElements);
  document.addEventListener("reset", handleResetRef);
  const detectAllInputsRef = detectAllInputs.bind(null, inputElements);
  window.addEventListener("resize", detectAllInputsRef);
};
const handleFileInput = (input, filePath) => {
  const files = input.files;
  if (files.length > 1) {
    filePath.innerHTML = Array.from(files).map((file) => file.name).join(", ");
  } else if (files[0]) {
    filePath.innerHTML = files[0].name;
  }
};
const setupFormFile = (element) => {
  if (element.isInit)
    return;
  element.isInit = true;
  const input = element.querySelector('input[type="file"]');
  const filePath = element.querySelector(".form-file-path");
  input.handleRef = handleFileInput.bind(null, input, filePath);
  input.validateRef = validate.bind(null, input);
  input.addEventListener("change", input.handleRef);
  input.addEventListener("input", input.validateRef);
  input.addEventListener("change", input.validateRef);
};
const updateInputsFile = () => {
  const elements = Array.from(document.querySelectorAll(".form-file"));
  try {
    elements.forEach(setupFormFile);
  } catch (error) {
    console.error("[Axentix] Form file error", error);
  }
};
const updateInputs = (inputElements = document.querySelectorAll(".form-material .form-field:not(.form-default) .form-control:not(.form-custom-select)")) => {
  const { setupInputs, detectInputs } = Array.from(inputElements).reduce((acc, el) => {
    if (el.isInit)
      acc.detectInputs.push(el);
    else
      acc.setupInputs.push(el);
    return acc;
  }, { setupInputs: [], detectInputs: [] });
  updateInputsFile();
  try {
    if (setupInputs.length > 0)
      setupFormsListeners(setupInputs);
    if (detectInputs.length > 0)
      detectAllInputs(detectInputs);
  } catch (error) {
    console.error("[Axentix] Material forms error", error);
  }
};
document.addEventListener("DOMContentLoaded", () => updateInputs());
const Forms = { updateInputs, validateAll };
export { Forms };
