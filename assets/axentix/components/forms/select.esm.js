var __defProp = Object.defineProperty;
var __defNormalProp = (obj, key, value) => key in obj ? __defProp(obj, key, { enumerable: true, configurable: true, writable: true, value }) : obj[key] = value;
var __publicField = (obj, key, value) => {
  __defNormalProp(obj, typeof key !== "symbol" ? key + "" : key, value);
  return value;
};
var __accessCheck = (obj, member, msg) => {
  if (!member.has(obj))
    throw TypeError("Cannot " + msg);
};
var __privateGet = (obj, member, getter) => {
  __accessCheck(obj, member, "read from private field");
  return getter ? getter.call(obj) : member.get(obj);
};
var __privateAdd = (obj, member, value) => {
  if (member.has(obj))
    throw TypeError("Cannot add the same private member more than once");
  member instanceof WeakSet ? member.add(obj) : member.set(obj, value);
};
var __privateSet = (obj, member, value, setter) => {
  __accessCheck(obj, member, "write to private field");
  setter ? setter.call(obj, value) : member.set(obj, value);
  return value;
};
var __privateMethod = (obj, member, method) => {
  __accessCheck(obj, member, "access private method");
  return method;
};
var _dropdownInstance, _container, _input, _label, _clickRef, _setupDropdown, setupDropdown_fn, _createCheckbox, createCheckbox_fn, _setupContent, setupContent_fn, _setFocusedClass, setFocusedClass_fn, _onClick, onClick_fn, _select, select_fn, _unSelect, unSelect_fn;
const instances = [];
const config = {
  components: [],
  plugins: [],
  prefix: "ax",
  mode: ""
};
const getCssVar = (variable) => `--${config.prefix}-${variable}`;
const getComponentClass = (component) => config.components.find((c) => c.name === component).class;
const getDataElements = () => {
  const dataComponents = config.components.filter((component) => component.dataDetection);
  const dataPlugins = config.plugins.filter((plugin) => plugin.dataDetection);
  return [...dataComponents, ...dataPlugins].map((el) => el.name);
};
const register = (el, term) => {
  if (!el.name || !el.class) {
    console.error(`[Axentix] Error registering ${term} : Missing required parameters.`);
    return;
  }
  if (config[term].some((elem) => elem.name === el.name)) {
    console.error(`[Axentix] Error registering ${term} : Already exist.`);
    return;
  }
  if (el.autoInit)
    el.autoInit.selector = el.autoInit.selector += ":not(.no-axentix-init)";
  config[term].push(el);
};
const registerComponent = (component) => {
  register(component, "components");
};
const getFormattedName = (name) => {
  return name.replace(/[\w]([A-Z])/g, (s) => {
    return s[0] + "-" + s[1];
  }).toLowerCase();
};
const getName = (name, baseName = "") => {
  const fmtName = getFormattedName(name);
  return baseName ? baseName + "-" + fmtName : fmtName;
};
const getOptionsForObject = (obj, name, component, element, baseName = "") => {
  const tmpOptName = name[0].toUpperCase() + name.slice(1).toLowerCase();
  if (getDataElements().includes(tmpOptName) && component !== "Collapsible" && tmpOptName !== "Sidenav")
    obj[name] = getComponentClass(tmpOptName).getDefaultOptions();
  const fmtName = baseName ? baseName + "-" + name : name;
  const keys = getOptions(obj[name], component, element, fmtName);
  if (!(Object.keys(keys).length === 0 && obj.constructor === Object))
    return keys;
};
const getOptions = (obj, component, element, baseName = "") => {
  return Object.keys(obj).reduce((acc, name) => {
    if (typeof obj[name] === "object" && obj[name] !== null) {
      const opts = getOptionsForObject(obj, name, component, element, baseName);
      if (opts)
        acc[name] = opts;
    } else if (obj[name] !== null) {
      const dataAttribute = "data-" + component.toLowerCase() + "-" + getName(name, baseName);
      if (element.hasAttribute(dataAttribute)) {
        const attr = element.getAttribute(dataAttribute);
        acc[name] = typeof obj[name] === "number" ? Number(attr) : attr;
        if (typeof obj[name] === "boolean")
          acc[name] = attr === "true";
      }
    }
    return acc;
  }, {});
};
const formatOptions = (component, element) => {
  const defaultOptions = Object.assign({}, getComponentClass(component).getDefaultOptions());
  return getOptions(defaultOptions, component, element);
};
const setup = () => {
  const elements = document.querySelectorAll("[data-ax]");
  elements.forEach((el) => {
    let component = el.dataset.ax;
    component = component[0].toUpperCase() + component.slice(1).toLowerCase();
    if (!getDataElements().includes(component)) {
      console.error(`[Axentix] Error: ${component} component doesn't exist. 
 Did you forget to register him ?`, el);
      return;
    }
    try {
      const classDef = getComponentClass(component);
      new classDef(`#${el.id}`);
    } catch (error) {
      console.error("[Axentix] Data: Unable to load " + component, error);
    }
  });
};
const setupAll = () => {
  try {
    new Axentix.Axentix("all");
  } catch (error) {
    console.error("[Axentix] Unable to auto init.", error);
  }
};
document.addEventListener("DOMContentLoaded", () => {
  if (document.documentElement.dataset.axentix)
    setupAll();
  setup();
});
const extend = (...args) => {
  return args.reduce((acc, obj) => {
    for (let key in obj) {
      acc[key] = typeof obj[key] === "object" && obj[key] !== null ? extend(acc[key], obj[key]) : obj[key];
    }
    return acc;
  }, {});
};
const getComponentOptions = (component, options, el) => extend(getComponentClass(component).getDefaultOptions(), formatOptions(component, el), options);
const wrap = (target, wrapper = document.createElement("div")) => {
  const parent = target[0].parentElement;
  parent.insertBefore(wrapper, target[0]);
  target.forEach((elem) => wrapper.appendChild(elem));
  return wrapper;
};
const unwrap = (wrapper) => wrapper.replaceWith(...wrapper.childNodes);
const createEvent = (element, eventName, extraData) => {
  const event = new CustomEvent("ax." + eventName, {
    detail: extraData || {},
    bubbles: true
  });
  element.dispatchEvent(event);
};
const getInstance = (element) => {
  const el = instances.find((ins) => ins.type !== "Toast" && "#" + ins.instance.el.id === element);
  if (el)
    return el.instance;
  return false;
};
const getUid = () => Math.random().toString().split(".")[1];
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
class AxentixComponent {
  constructor() {
    __publicField(this, "el");
  }
  removeListeners() {
  }
  setupListeners() {
  }
  setup() {
  }
  preventDbInstance(element) {
    if (element && getInstance(element))
      throw new Error(`Instance already exist on ${element}`);
  }
  sync() {
    createEvent(this.el, "component.sync");
    this.removeListeners();
    this.setupListeners();
  }
  reset() {
    createEvent(this.el, "component.reset");
    this.removeListeners();
    this.setup();
  }
  destroy() {
    createEvent(this.el, "component.destroy");
    this.removeListeners();
    const index = instances.findIndex((ins) => ins.instance.el.id === this.el.id);
    instances.splice(index, 1);
  }
}
const SelectOptions = {
  inputClasses: ""
};
class Select extends AxentixComponent {
  constructor(element, options) {
    super();
    __privateAdd(this, _setupDropdown);
    __privateAdd(this, _createCheckbox);
    __privateAdd(this, _setupContent);
    __privateAdd(this, _setFocusedClass);
    __privateAdd(this, _onClick);
    __privateAdd(this, _select);
    __privateAdd(this, _unSelect);
    __publicField(this, "options");
    __privateAdd(this, _dropdownInstance, void 0);
    __privateAdd(this, _container, void 0);
    __privateAdd(this, _input, void 0);
    __privateAdd(this, _label, void 0);
    __privateAdd(this, _clickRef, void 0);
    try {
      this.preventDbInstance(element);
      instances.push({ type: "Select", instance: this });
      this.el = document.querySelector(element);
      this.options = getComponentOptions("Select", options, this.el);
      this.setup();
    } catch (error) {
      console.error("[Axentix] Select init error", error);
    }
  }
  setup() {
    this.el.style.display = "none";
    __privateSet(this, _container, wrap([this.el]));
    __privateGet(this, _container).className = "form-custom-select";
    __privateMethod(this, _setupDropdown, setupDropdown_fn).call(this);
  }
  reset() {
    this.destroy(true);
    super.reset();
  }
  destroy(withoutSuperCall) {
    if (!withoutSuperCall)
      super.destroy();
    if (__privateGet(this, _dropdownInstance)) {
      __privateGet(this, _dropdownInstance).el.removeEventListener("ax.dropdown.open", __privateGet(this, _clickRef));
      __privateGet(this, _dropdownInstance).el.removeEventListener("ax.dropdown.close", __privateGet(this, _clickRef));
      __privateSet(this, _clickRef, null);
      __privateGet(this, _dropdownInstance).destroy();
      __privateGet(this, _dropdownInstance).el.remove();
      __privateSet(this, _dropdownInstance, null);
    }
    unwrap(__privateGet(this, _container));
    this.el.classList.add("form-custom-select");
    this.el.style.display = "";
  }
}
_dropdownInstance = new WeakMap();
_container = new WeakMap();
_input = new WeakMap();
_label = new WeakMap();
_clickRef = new WeakMap();
_setupDropdown = new WeakSet();
setupDropdown_fn = function() {
  const uid = `dropdown-${getUid()}`;
  __privateSet(this, _input, document.createElement("div"));
  __privateGet(this, _input).className = `form-control ${this.options.inputClasses}`;
  __privateGet(this, _input).dataset.target = uid;
  const dropdownContent = document.createElement("div");
  const classes = this.el.className.replace("form-control", "");
  dropdownContent.className = `dropdown-content ${classes}`;
  if (this.el.disabled) {
    __privateGet(this, _input).setAttribute("disabled", "");
    __privateGet(this, _container).append(__privateGet(this, _input));
    __privateMethod(this, _setupContent, setupContent_fn).call(this, dropdownContent);
    return;
  }
  __privateSet(this, _clickRef, __privateMethod(this, _setFocusedClass, setFocusedClass_fn).bind(this));
  const dropdown = document.createElement("div");
  dropdown.className = "dropdown";
  dropdown.id = uid;
  dropdown.addEventListener("ax.dropdown.open", __privateGet(this, _clickRef));
  dropdown.addEventListener("ax.dropdown.close", __privateGet(this, _clickRef));
  Array.from(this.el.attributes).forEach((a) => {
    if (a.name.startsWith("data-dropdown"))
      dropdown.setAttribute(a.name, a.value);
  });
  dropdown.append(__privateGet(this, _input));
  dropdown.append(dropdownContent);
  __privateGet(this, _container).append(dropdown);
  __privateMethod(this, _setupContent, setupContent_fn).call(this, dropdownContent);
  const dropdownClass = getComponentClass("Dropdown");
  __privateSet(this, _dropdownInstance, new dropdownClass(`#${uid}`, {
    closeOnClick: !this.el.multiple,
    preventViewport: true
  }));
  const zindex = window.getComputedStyle(dropdown).zIndex;
  __privateSet(this, _label, this.el.closest(".form-field").querySelector("label:not(.form-check)"));
  __privateGet(this, _label).style.zIndex = zindex + 5;
};
_createCheckbox = new WeakSet();
createCheckbox_fn = function(content, isDisabled) {
  const formField = document.createElement("div");
  formField.className = "form-field";
  const label = document.createElement("label");
  label.className = "form-check";
  const checkbox = document.createElement("input");
  checkbox.type = "checkbox";
  if (isDisabled)
    checkbox.setAttribute("disabled", "");
  const span = document.createElement("span");
  span.innerHTML = content;
  label.append(checkbox, span);
  formField.append(label);
  return formField;
};
_setupContent = new WeakSet();
setupContent_fn = function(dropdownContent) {
  for (const option of this.el.options) {
    const isDisabled = option.hasAttribute("disabled");
    const item = document.createElement("div");
    item.className = "dropdown-item";
    item.innerHTML = this.el.multiple ? __privateMethod(this, _createCheckbox, createCheckbox_fn).call(this, option.text, isDisabled).innerHTML : option.text;
    item.axValue = option.value || option.text;
    if (!isDisabled) {
      item.axClickRef = __privateMethod(this, _onClick, onClick_fn).bind(this, item);
      item.addEventListener("click", item.axClickRef);
    } else
      item.classList.add("form-disabled");
    if (option.hasAttribute("selected") || !this.el.multiple && this.el.value === (option.value || option.text))
      __privateMethod(this, _select, select_fn).call(this, item);
    dropdownContent.append(item);
  }
};
_setFocusedClass = new WeakSet();
setFocusedClass_fn = function() {
  __privateGet(this, _input).closest(".form-field").classList.toggle("is-focused");
};
_onClick = new WeakSet();
onClick_fn = function(item, e) {
  e.preventDefault();
  if (!item.classList.contains("form-selected"))
    __privateMethod(this, _select, select_fn).call(this, item);
  else
    __privateMethod(this, _unSelect, unSelect_fn).call(this, item);
};
_select = new WeakSet();
select_fn = function(item) {
  const value = item.axValue;
  if (this.el.multiple)
    item.querySelector("input").checked = true;
  else if (__privateGet(this, _dropdownInstance))
    __privateGet(this, _dropdownInstance).el.querySelectorAll(".dropdown-item").forEach((i) => i.classList.remove("form-selected"));
  item.classList.add("form-selected");
  const computedValue = this.el.multiple ? [...__privateGet(this, _input).innerText.split(", ").filter(Boolean), value].join(", ") : value;
  __privateGet(this, _input).innerText = computedValue;
  this.el.value = computedValue;
  updateInputs([__privateGet(this, _input)]);
};
_unSelect = new WeakSet();
unSelect_fn = function(item) {
  const value = item.axValue;
  item.classList.remove("form-selected");
  let computedValue = "";
  if (this.el.multiple) {
    item.querySelector("input").checked = false;
    const values = __privateGet(this, _input).innerText.split(", ").filter(Boolean);
    const i = values.findIndex((v) => v === value);
    values.splice(i, 1);
    computedValue = values.join(", ");
  }
  __privateGet(this, _input).innerText = computedValue;
  this.el.value = computedValue;
  updateInputs([__privateGet(this, _input)]);
};
__publicField(Select, "getDefaultOptions", () => SelectOptions);
registerComponent({
  class: Select,
  name: "Select",
  dataDetection: true,
  autoInit: {
    enabled: true,
    selector: ".form-custom-select"
  }
});
export { Select };
