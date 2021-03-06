var __defProp = Object.defineProperty;
var __pow = Math.pow;
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
var __privateWrapper = (obj, member, setter, getter) => {
  return {
    set _(value) {
      __privateSet(obj, member, value, setter);
    },
    get _() {
      return __privateGet(obj, member, getter);
    }
  };
};
var __privateMethod = (obj, member, method) => {
  __accessCheck(obj, member, "access private method");
  return method;
};
var _draggedPositionX, _isAnimated, _children, _totalMediaToLoad, _loadedMediaCount, _isResizing, _isScrolling, _isPressed, _deltaX, _deltaY, _windowResizeRef, _arrowPrev, _arrowNext, _arrowNextRef, _arrowPrevRef, _touchStartRef, _touchMoveRef, _touchReleaseRef, _xStart, _yStart, _indicators, _autoplayInterval, _pointerType, _getChildren, getChildren_fn, _waitForLoad, waitForLoad_fn, _newItemLoaded, newItemLoaded_fn, _setItemsPosition, setItemsPosition_fn, _setBasicCaroulixHeight, setBasicCaroulixHeight_fn, _handleDragStart, handleDragStart_fn, _handleDragMove, handleDragMove_fn, _handleDragRelease, handleDragRelease_fn, _enableIndicators, enableIndicators_fn, _handleIndicatorClick, handleIndicatorClick_fn, _resetIndicators, resetIndicators_fn, _getXPosition, getXPosition_fn, _getYPosition, getYPosition_fn, _setTransitionDuration, setTransitionDuration_fn, _emitSlideEvent, emitSlideEvent_fn, _triggers, _sidenavTriggers, _isInit, _isActive, _isAnimated2, _childIsActive, _listenerRef, _resizeRef, _sidenavId, _handleResize, handleResize_fn, _detectSidenav, detectSidenav_fn, _addActiveInSidenav, addActiveInSidenav_fn, _toggleTriggerActive, toggleTriggerActive_fn, _autoClose, autoClose_fn, _applyOverflow, applyOverflow_fn, _onClickTrigger, onClickTrigger_fn, _triggers2, _isActive2, _isAnimated3, _isFixed, _firstSidenavInit, _layoutEl, _overlayElement, _listenerRef2, _windowResizeRef2, _windowWidth, _resizeHandler, resizeHandler_fn, _cleanLayout, cleanLayout_fn, _handleMultipleSidenav, handleMultipleSidenav_fn, _toggleBodyScroll, toggleBodyScroll_fn, _onClickTrigger2, onClickTrigger_fn2, _dropdownContent, _trigger, _isAnimated4, _isActive3, _documentClickRef, _listenerRef3, _contentHeightRef, _setupAnimation, setupAnimation_fn, _onDocumentClick, onDocumentClick_fn, _onClickTrigger3, onClickTrigger_fn3, _autoClose2, autoClose_fn2, _setContentHeight, setContentHeight_fn, _isAnimated5, _isActive4, _trigger2, _fabMenu, _openRef, _closeRef, _documentClickRef2, _listenerRef4, _verifOptions, verifOptions_fn, _setProperties, setProperties_fn, _setMenuPosition, setMenuPosition_fn, _handleDocumentClick, handleDocumentClick_fn, _onClickTrigger4, onClickTrigger_fn4, _onClickRef, _transitionEndEventRef, _keyUpRef, _scrollRef, _resizeRef2, _overlay, _overlayClickEventRef, _overflowParents, _baseRect, _newHeight, _newWidth, _isActive5, _isResponsive, _container, _isClosing, _isOpening, _setOverlay, setOverlay_fn, _showOverlay, showOverlay_fn, _hideOverlay, hideOverlay_fn, _unsetOverlay, unsetOverlay_fn, _calculateRatio, calculateRatio_fn, _setOverflowParents, setOverflowParents_fn, _unsetOverflowParents, unsetOverflowParents_fn, _handleTransition, handleTransition_fn, _handleKeyUp, handleKeyUp_fn, _handleScroll, handleScroll_fn, _handleResize2, _clearLightbox, clearLightbox_fn, _onClickTrigger5, onClickTrigger_fn5, _triggers3, _isActive6, _isAnimated6, _listenerRef5, _toggleBodyScroll2, toggleBodyScroll_fn2, _setZIndex, setZIndex_fn, _onClickTrigger6, onClickTrigger_fn6, _tabArrow, _tabLinks, _tabMenu, _currentItemIndex, _leftArrow, _rightArrow, _scrollLeftRef, _scrollRightRef, _arrowRef, _caroulixSlideRef, _resizeTabRef, _tabItems, _tabCaroulix, _tabCaroulixInit, _caroulixInstance, _isAnimated7, _handleResizeEvent, handleResizeEvent_fn, _handleCaroulixSlide, handleCaroulixSlide_fn, _getItems, getItems_fn, _hideContent, hideContent_fn, _enableSlideAnimation, enableSlideAnimation_fn, _setActiveElement, setActiveElement_fn, _toggleArrowMode, toggleArrowMode_fn, _scrollLeft, scrollLeft_fn, _scrollRight, scrollRight_fn, _onClickItem, onClickItem_fn, _getPreviousItemIndex, getPreviousItemIndex_fn, _getNextItemIndex, getNextItemIndex_fn, _oldLink, _updateRef, _links, _elements, _setupBasic, setupBasic_fn, _setupAuto, setupAuto_fn, _getElement, getElement_fn, _removeOldLink, removeOldLink_fn, _getClosestElem, getClosestElem_fn, _update, update_fn, _content, _toasters, _createToaster, createToaster_fn, _removeToaster, removeToaster_fn, _fadeInToast, fadeInToast_fn, _fadeOutToast, fadeOutToast_fn, _animOut, animOut_fn, _createToast, createToast_fn, _hide, hide_fn, _tooltip, _positionList, _listenerEnterRef, _listenerLeaveRef, _listenerResizeRef, _timeoutRef, _elRect, _tooltipRect, _setProperties2, setProperties_fn2, _setBasicPosition, setBasicPosition_fn, _manualTransform, manualTransform_fn, _onHover, onHover_fn, _onHoverOut, onHoverOut_fn, _dropdownInstance, _container2, _input, _label, _clickRef, _setupDropdown, setupDropdown_fn, _createCheckbox, createCheckbox_fn, _setupContent, setupContent_fn, _setFocusedClass, setFocusedClass_fn, _onClick, onClick_fn, _select, select_fn, _unSelect, unSelect_fn, _init, init_fn, _detectIds, detectIds_fn, _instanciate, instanciate_fn;
var core = "";
var grix = "";
var layouts = "";
var button = "";
var buttonGroup = "";
var card = "";
var footer = "";
var navbar = "";
var pagination = "";
var table = "";
var loading = "";
var utilities = "";
var trends = "";
var caroulix = "";
const version = "2.0.0";
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
const getAutoInitElements = () => {
  const autoInitComponents = config.components.filter((component) => component.autoInit && component.autoInit.enabled);
  const autoInitPlugins = config.plugins.filter((plugin) => plugin.autoInit && plugin.autoInit.enabled);
  return [...autoInitComponents, ...autoInitPlugins].reduce((acc, el) => {
    acc[el.name] = document.querySelectorAll(el.autoInit.selector);
    return acc;
  }, {});
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
const registerPlugin = (plugin) => {
  register(plugin, "plugins");
};
const exportToWindow = () => {
  if (!window)
    return;
  if (!window.Axentix)
    window.Axentix = {};
  [...config.components, ...config.plugins].forEach((el) => {
    window.Axentix[el.name] = el.class;
  });
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
const isTouchEnabled = () => "ontouchstart" in window || navigator.maxTouchPoints > 0 || navigator.msMaxTouchPoints > 0;
const isPointerEnabled = () => !!window.PointerEvent && "maxTouchPoints" in window.navigator && window.navigator.maxTouchPoints >= 0;
const getPointerType = () => {
  if (isTouchEnabled())
    return "touch";
  else if (isPointerEnabled())
    return "pointer";
  return "mouse";
};
const getInstanceByType = (type) => instances.filter((ins) => ins.type === type).map((ins) => ins.instance);
const getInstance = (element) => {
  const el = instances.find((ins) => ins.type !== "Toast" && "#" + ins.instance.el.id === element);
  if (el)
    return el.instance;
  return false;
};
const getUid = () => Math.random().toString().split(".")[1];
const getAllInstances = () => instances;
const sync = (element) => getInstance(element).sync();
const syncAll = () => instances.map((ins) => ins.instance.sync());
const reset = (element) => getInstance(element).reset();
const resetAll = () => instances.map((ins) => ins.instance.reset());
const destroy = (element) => getInstance(element).destroy();
const destroyAll = () => instances.map((ins) => ins.instance.destroy());
const createOverlay = (isActive, overlay, id, animationDuration) => {
  const overlayElement = isActive && overlay ? document.querySelector(`.ax-overlay[data-target="${id}"]`) : document.createElement("div");
  overlayElement.classList.add("ax-overlay");
  overlayElement.style.transitionDuration = animationDuration + "ms";
  overlayElement.dataset.target = id;
  return overlayElement;
};
const updateOverlay = (overlay, overlayElement, listenerRef, state, animationDuration) => {
  if (!overlay)
    return;
  if (state) {
    overlayElement.addEventListener("click", listenerRef);
    document.body.appendChild(overlayElement);
    setTimeout(() => {
      overlayElement.classList.add("active");
    }, 50);
  } else {
    overlayElement.classList.remove("active");
    setTimeout(() => {
      overlayElement.removeEventListener("click", listenerRef);
      document.body.removeChild(overlayElement);
    }, animationDuration);
  }
};
const getTriggers = (id, query = '[data-target="{ID}"]') => Array.from(document.querySelectorAll(query.replace("{ID}", id)));
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
const CaroulixOptions = {
  animationDuration: 500,
  height: "",
  backToOpposite: true,
  enableTouch: true,
  indicators: {
    enabled: false,
    isFlat: false,
    customClasses: ""
  },
  autoplay: {
    enabled: true,
    interval: 5e3,
    side: "right"
  }
};
class Caroulix extends AxentixComponent {
  constructor(element, options) {
    super();
    __privateAdd(this, _getChildren);
    __privateAdd(this, _waitForLoad);
    __privateAdd(this, _newItemLoaded);
    __privateAdd(this, _setItemsPosition);
    __privateAdd(this, _setBasicCaroulixHeight);
    __privateAdd(this, _handleDragStart);
    __privateAdd(this, _handleDragMove);
    __privateAdd(this, _handleDragRelease);
    __privateAdd(this, _enableIndicators);
    __privateAdd(this, _handleIndicatorClick);
    __privateAdd(this, _resetIndicators);
    __privateAdd(this, _getXPosition);
    __privateAdd(this, _getYPosition);
    __privateAdd(this, _setTransitionDuration);
    __privateAdd(this, _emitSlideEvent);
    __publicField(this, "options");
    __publicField(this, "activeIndex");
    __privateAdd(this, _draggedPositionX, 0);
    __privateAdd(this, _isAnimated, false);
    __privateAdd(this, _children, void 0);
    __privateAdd(this, _totalMediaToLoad, 0);
    __privateAdd(this, _loadedMediaCount, 0);
    __privateAdd(this, _isResizing, false);
    __privateAdd(this, _isScrolling, false);
    __privateAdd(this, _isPressed, false);
    __privateAdd(this, _deltaX, 0);
    __privateAdd(this, _deltaY, 0);
    __privateAdd(this, _windowResizeRef, void 0);
    __privateAdd(this, _arrowPrev, void 0);
    __privateAdd(this, _arrowNext, void 0);
    __privateAdd(this, _arrowNextRef, void 0);
    __privateAdd(this, _arrowPrevRef, void 0);
    __privateAdd(this, _touchStartRef, void 0);
    __privateAdd(this, _touchMoveRef, void 0);
    __privateAdd(this, _touchReleaseRef, void 0);
    __privateAdd(this, _xStart, 0);
    __privateAdd(this, _yStart, 0);
    __privateAdd(this, _indicators, void 0);
    __privateAdd(this, _autoplayInterval, void 0);
    __privateAdd(this, _pointerType, void 0);
    try {
      this.preventDbInstance(element);
      instances.push({ type: "Caroulix", instance: this });
      this.el = document.querySelector(element);
      this.options = getComponentOptions("Caroulix", options, this.el);
      this.setup();
    } catch (error) {
      console.error("[Axentix] Caroulix init error", error);
    }
  }
  setup() {
    createEvent(this.el, "caroulix.setup");
    this.options.autoplay.side = this.options.autoplay.side.toLowerCase();
    const sideList = ["right", "left"];
    if (!sideList.includes(this.options.autoplay.side))
      this.options.autoplay.side = "right";
    this.activeIndex = 0;
    __privateSet(this, _draggedPositionX, 0);
    __privateSet(this, _isAnimated, false);
    __privateSet(this, _pointerType, getPointerType());
    __privateSet(this, _children, __privateMethod(this, _getChildren, getChildren_fn).call(this));
    if (this.options.indicators.enabled)
      __privateMethod(this, _enableIndicators, enableIndicators_fn).call(this);
    const activeEl = this.el.querySelector(".active");
    if (activeEl)
      this.activeIndex = __privateGet(this, _children).indexOf(activeEl);
    else
      __privateGet(this, _children)[0].classList.add("active");
    __privateMethod(this, _waitForLoad, waitForLoad_fn).call(this);
    if (__privateGet(this, _totalMediaToLoad) === 0)
      __privateMethod(this, _setBasicCaroulixHeight, setBasicCaroulixHeight_fn).call(this);
    this.setupListeners();
    if (this.options.autoplay.enabled)
      this.play();
  }
  setupListeners() {
    __privateSet(this, _windowResizeRef, __privateMethod(this, _setBasicCaroulixHeight, setBasicCaroulixHeight_fn).bind(this));
    window.addEventListener("resize", __privateGet(this, _windowResizeRef));
    if (__privateGet(this, _arrowNext)) {
      __privateSet(this, _arrowNextRef, this.next.bind(this, 1));
      __privateGet(this, _arrowNext).addEventListener("click", __privateGet(this, _arrowNextRef));
    }
    if (__privateGet(this, _arrowPrev)) {
      __privateSet(this, _arrowPrevRef, this.prev.bind(this, 1));
      __privateGet(this, _arrowPrev).addEventListener("click", __privateGet(this, _arrowPrevRef));
    }
    if (this.options.enableTouch) {
      __privateSet(this, _touchStartRef, __privateMethod(this, _handleDragStart, handleDragStart_fn).bind(this));
      __privateSet(this, _touchMoveRef, __privateMethod(this, _handleDragMove, handleDragMove_fn).bind(this));
      __privateSet(this, _touchReleaseRef, __privateMethod(this, _handleDragRelease, handleDragRelease_fn).bind(this));
      this.el.addEventListener(`${__privateGet(this, _pointerType)}${__privateGet(this, _pointerType) === "touch" ? "start" : "down"}`, __privateGet(this, _touchStartRef));
      this.el.addEventListener(`${__privateGet(this, _pointerType)}move`, __privateGet(this, _touchMoveRef));
      this.el.addEventListener(`${__privateGet(this, _pointerType)}${__privateGet(this, _pointerType) === "touch" ? "end" : "up"}`, __privateGet(this, _touchReleaseRef));
      this.el.addEventListener(__privateGet(this, _pointerType) === "pointer" ? "pointerleave" : "mouseleave", __privateGet(this, _touchReleaseRef));
    }
  }
  removeListeners() {
    window.removeEventListener("resize", __privateGet(this, _windowResizeRef));
    __privateSet(this, _windowResizeRef, void 0);
    if (__privateGet(this, _arrowNext)) {
      __privateGet(this, _arrowNext).removeEventListener("click", __privateGet(this, _arrowNextRef));
      __privateSet(this, _arrowNextRef, void 0);
    }
    if (__privateGet(this, _arrowPrev)) {
      __privateGet(this, _arrowPrev).removeEventListener("click", __privateGet(this, _arrowPrevRef));
      __privateSet(this, _arrowPrevRef, void 0);
    }
    if (this.options.enableTouch) {
      this.el.removeEventListener(`${__privateGet(this, _pointerType)}${__privateGet(this, _pointerType) === "pointer" ? "down" : "start"}`, __privateGet(this, _touchStartRef));
      this.el.removeEventListener(`${__privateGet(this, _pointerType)}move`, __privateGet(this, _touchMoveRef));
      this.el.removeEventListener(`${__privateGet(this, _pointerType)}${__privateGet(this, _pointerType) === "touch" ? "end" : "up"}`, __privateGet(this, _touchReleaseRef));
      this.el.removeEventListener(__privateGet(this, _pointerType) === "pointer" ? "pointerleave" : "mouseleave", __privateGet(this, _touchReleaseRef));
      __privateSet(this, _touchStartRef, void 0);
      __privateSet(this, _touchMoveRef, void 0);
      __privateSet(this, _touchReleaseRef, void 0);
    }
  }
  goTo(number) {
    if (number === this.activeIndex)
      return;
    const side = number > this.activeIndex ? "right" : "left";
    if (side === "left")
      this.prev(Math.abs(this.activeIndex - number));
    else
      this.next(Math.abs(this.activeIndex - number));
    if (this.options.indicators.enabled)
      __privateMethod(this, _resetIndicators, resetIndicators_fn).call(this);
  }
  play() {
    if (!this.options.autoplay.enabled)
      return;
    this.stop();
    __privateSet(this, _autoplayInterval, setInterval(() => {
      if (this.options.autoplay.side === "right")
        this.next(1, false);
      else
        this.prev(1, false);
    }, this.options.autoplay.interval));
  }
  stop() {
    if (!this.options.autoplay.enabled)
      return;
    clearInterval(__privateGet(this, _autoplayInterval));
  }
  next(step = 1, resetAutoplay = true) {
    if (__privateGet(this, _isResizing) || this.activeIndex === __privateGet(this, _children).length - 1 && !this.options.backToOpposite)
      return;
    createEvent(this.el, "caroulix.next", { step });
    __privateSet(this, _isAnimated, true);
    if (resetAutoplay && this.options.autoplay.enabled)
      this.stop();
    if (this.activeIndex < __privateGet(this, _children).length - 1)
      this.activeIndex += step;
    else if (this.options.backToOpposite)
      this.activeIndex = 0;
    __privateMethod(this, _emitSlideEvent, emitSlideEvent_fn).call(this);
    __privateMethod(this, _setItemsPosition, setItemsPosition_fn).call(this);
    if (resetAutoplay && this.options.autoplay.enabled)
      this.play();
  }
  prev(step = 1, resetAutoplay = true) {
    if (__privateGet(this, _isResizing) || this.activeIndex === 0 && !this.options.backToOpposite)
      return;
    createEvent(this.el, "caroulix.prev", { step });
    __privateSet(this, _isAnimated, true);
    if (resetAutoplay && this.options.autoplay.enabled)
      this.stop();
    if (this.activeIndex > 0)
      this.activeIndex -= step;
    else if (this.options.backToOpposite)
      this.activeIndex = __privateGet(this, _children).length - 1;
    __privateMethod(this, _emitSlideEvent, emitSlideEvent_fn).call(this);
    __privateMethod(this, _setItemsPosition, setItemsPosition_fn).call(this);
    if (resetAutoplay && this.options.autoplay.enabled)
      this.play();
  }
}
_draggedPositionX = new WeakMap();
_isAnimated = new WeakMap();
_children = new WeakMap();
_totalMediaToLoad = new WeakMap();
_loadedMediaCount = new WeakMap();
_isResizing = new WeakMap();
_isScrolling = new WeakMap();
_isPressed = new WeakMap();
_deltaX = new WeakMap();
_deltaY = new WeakMap();
_windowResizeRef = new WeakMap();
_arrowPrev = new WeakMap();
_arrowNext = new WeakMap();
_arrowNextRef = new WeakMap();
_arrowPrevRef = new WeakMap();
_touchStartRef = new WeakMap();
_touchMoveRef = new WeakMap();
_touchReleaseRef = new WeakMap();
_xStart = new WeakMap();
_yStart = new WeakMap();
_indicators = new WeakMap();
_autoplayInterval = new WeakMap();
_pointerType = new WeakMap();
_getChildren = new WeakSet();
getChildren_fn = function() {
  return Array.from(this.el.children).reduce((acc, child) => {
    if (child.classList.contains("caroulix-item"))
      acc.push(child);
    if (child.classList.contains("caroulix-prev"))
      __privateSet(this, _arrowPrev, child);
    if (child.classList.contains("caroulix-next"))
      __privateSet(this, _arrowNext, child);
    return acc;
  }, []);
};
_waitForLoad = new WeakSet();
waitForLoad_fn = function() {
  __privateSet(this, _totalMediaToLoad, 0);
  __privateSet(this, _loadedMediaCount, 0);
  __privateGet(this, _children).forEach((item) => {
    const media = item.querySelector("img, video");
    if (media) {
      __privateWrapper(this, _totalMediaToLoad)._++;
      if (media.complete) {
        __privateMethod(this, _newItemLoaded, newItemLoaded_fn).call(this, media, true);
      } else {
        media.loadRef = __privateMethod(this, _newItemLoaded, newItemLoaded_fn).bind(this, media);
        media.addEventListener("load", media.loadRef);
      }
    }
  });
};
_newItemLoaded = new WeakSet();
newItemLoaded_fn = function(media, alreadyLoad) {
  __privateWrapper(this, _loadedMediaCount)._++;
  if (!alreadyLoad) {
    media.removeEventListener("load", media.loadRef);
    media.loadRef = void 0;
  }
  if (__privateGet(this, _totalMediaToLoad) == __privateGet(this, _loadedMediaCount)) {
    __privateMethod(this, _setBasicCaroulixHeight, setBasicCaroulixHeight_fn).call(this);
    __privateMethod(this, _setItemsPosition, setItemsPosition_fn).call(this, true);
  }
};
_setItemsPosition = new WeakSet();
setItemsPosition_fn = function(init = false) {
  const caroulixWidth = this.el.getBoundingClientRect().width;
  __privateGet(this, _children).forEach((child, index) => {
    child.style.transform = `translateX(${caroulixWidth * index - caroulixWidth * this.activeIndex - __privateGet(this, _draggedPositionX)}px)`;
  });
  if (this.options.indicators.enabled)
    __privateMethod(this, _resetIndicators, resetIndicators_fn).call(this);
  const activeElement = __privateGet(this, _children).find((child) => child.classList.contains("active"));
  activeElement.classList.remove("active");
  __privateGet(this, _children)[this.activeIndex].classList.add("active");
  setTimeout(() => {
    __privateSet(this, _isAnimated, false);
  }, this.options.animationDuration);
  if (init)
    setTimeout(() => __privateMethod(this, _setTransitionDuration, setTransitionDuration_fn).call(this, this.options.animationDuration), 50);
};
_setBasicCaroulixHeight = new WeakSet();
setBasicCaroulixHeight_fn = function() {
  __privateSet(this, _isResizing, true);
  this.el.style.transitionDuration = "";
  if (this.options.autoplay.enabled)
    this.play();
  if (this.options.height) {
    this.el.style.height = this.options.height;
  } else {
    const childrenHeight = __privateGet(this, _children).map((child) => child.offsetHeight);
    const maxHeight = Math.max(...childrenHeight);
    this.el.style.height = maxHeight + "px";
  }
  __privateMethod(this, _setItemsPosition, setItemsPosition_fn).call(this);
  setTimeout(() => {
    this.el.style.transitionDuration = this.options.animationDuration + "ms";
    __privateSet(this, _isResizing, false);
  }, 50);
};
_handleDragStart = new WeakSet();
handleDragStart_fn = function(e) {
  if (e.target.closest(".caroulix-arrow") || e.target.closest(".caroulix-indicators") || __privateGet(this, _isAnimated))
    return;
  if (e.type !== "touchstart")
    e.preventDefault();
  if (this.options.autoplay.enabled)
    this.stop();
  __privateMethod(this, _setTransitionDuration, setTransitionDuration_fn).call(this, 0);
  __privateSet(this, _isPressed, true);
  __privateSet(this, _isScrolling, false);
  __privateSet(this, _deltaX, 0);
  __privateSet(this, _deltaY, 0);
  __privateSet(this, _xStart, __privateMethod(this, _getXPosition, getXPosition_fn).call(this, e));
  __privateSet(this, _yStart, __privateMethod(this, _getYPosition, getYPosition_fn).call(this, e));
};
_handleDragMove = new WeakSet();
handleDragMove_fn = function(e) {
  if (!__privateGet(this, _isPressed) || __privateGet(this, _isScrolling))
    return;
  let x = __privateMethod(this, _getXPosition, getXPosition_fn).call(this, e), y = __privateMethod(this, _getYPosition, getYPosition_fn).call(this, e);
  __privateSet(this, _deltaX, __privateGet(this, _xStart) - x);
  __privateSet(this, _deltaY, Math.abs(__privateGet(this, _yStart) - y));
  if (e.type === "touchmove" && __privateGet(this, _deltaY) > Math.abs(__privateGet(this, _deltaX))) {
    __privateSet(this, _isScrolling, true);
    __privateSet(this, _deltaX, 0);
    return false;
  }
  if (e.cancelable)
    e.preventDefault();
  __privateSet(this, _draggedPositionX, __privateGet(this, _deltaX));
  __privateMethod(this, _setItemsPosition, setItemsPosition_fn).call(this);
};
_handleDragRelease = new WeakSet();
handleDragRelease_fn = function(e) {
  if (e.target.closest(".caroulix-arrow") || e.target.closest(".caroulix-indicators"))
    return;
  if (e.cancelable)
    e.preventDefault();
  if (__privateGet(this, _isPressed)) {
    __privateMethod(this, _setTransitionDuration, setTransitionDuration_fn).call(this, this.options.animationDuration);
    let caroulixWidth = this.el.getBoundingClientRect().width;
    __privateSet(this, _isPressed, false);
    const percent = caroulixWidth * 15 / 100;
    if (this.activeIndex !== __privateGet(this, _children).length - 1 && __privateGet(this, _deltaX) > percent) {
      this.next();
    } else if (this.activeIndex !== 0 && __privateGet(this, _deltaX) < -percent) {
      this.prev();
    }
    __privateSet(this, _deltaX, 0);
    __privateSet(this, _draggedPositionX, 0);
    __privateMethod(this, _setItemsPosition, setItemsPosition_fn).call(this);
    if (this.options.autoplay.enabled)
      this.play();
  }
};
_enableIndicators = new WeakSet();
enableIndicators_fn = function() {
  __privateSet(this, _indicators, document.createElement("ul"));
  __privateGet(this, _indicators).classList.add("caroulix-indicators");
  if (this.options.indicators.isFlat)
    __privateGet(this, _indicators).classList.add("caroulix-flat");
  if (this.options.indicators.customClasses)
    __privateGet(this, _indicators).className = `${__privateGet(this, _indicators).className} ${this.options.indicators.customClasses}`;
  for (let i = 0; i < __privateGet(this, _children).length; i++) {
    const li = document.createElement("li");
    li.triggerRef = __privateMethod(this, _handleIndicatorClick, handleIndicatorClick_fn).bind(this, i);
    li.addEventListener("click", li.triggerRef);
    __privateGet(this, _indicators).appendChild(li);
  }
  this.el.appendChild(__privateGet(this, _indicators));
};
_handleIndicatorClick = new WeakSet();
handleIndicatorClick_fn = function(i, e) {
  e.preventDefault();
  if (i === this.activeIndex)
    return;
  this.goTo(i);
};
_resetIndicators = new WeakSet();
resetIndicators_fn = function() {
  Array.from(__privateGet(this, _indicators).children).forEach((li) => li.removeAttribute("class"));
  __privateGet(this, _indicators).children[this.activeIndex].classList.add("active");
};
_getXPosition = new WeakSet();
getXPosition_fn = function(e) {
  if (e.targetTouches && e.targetTouches.length >= 1)
    return e.targetTouches[0].clientX;
  return e.clientX;
};
_getYPosition = new WeakSet();
getYPosition_fn = function(e) {
  if (e.targetTouches && e.targetTouches.length >= 1)
    return e.targetTouches[0].clientY;
  return e.clientY;
};
_setTransitionDuration = new WeakSet();
setTransitionDuration_fn = function(duration) {
  this.el.style.transitionDuration = duration + "ms";
};
_emitSlideEvent = new WeakSet();
emitSlideEvent_fn = function() {
  createEvent(this.el, "caroulix.slide", {
    nextElement: __privateGet(this, _children)[this.activeIndex],
    currentElement: __privateGet(this, _children)[__privateGet(this, _children).findIndex((child) => child.classList.contains("active"))]
  });
};
__publicField(Caroulix, "getDefaultOptions", () => CaroulixOptions);
registerComponent({
  class: Caroulix,
  name: "Caroulix",
  dataDetection: true,
  autoInit: {
    enabled: true,
    selector: ".caroulix"
  }
});
var collapsible = "";
const CollapsibleOptions = {
  animationDuration: 300,
  sidenav: {
    activeClass: true,
    activeWhenOpen: true,
    autoClose: true
  }
};
class Collapsible extends AxentixComponent {
  constructor(element, options) {
    super();
    __privateAdd(this, _handleResize);
    __privateAdd(this, _detectSidenav);
    __privateAdd(this, _addActiveInSidenav);
    __privateAdd(this, _toggleTriggerActive);
    __privateAdd(this, _autoClose);
    __privateAdd(this, _applyOverflow);
    __privateAdd(this, _onClickTrigger);
    __publicField(this, "options");
    __privateAdd(this, _triggers, void 0);
    __privateAdd(this, _sidenavTriggers, void 0);
    __privateAdd(this, _isInit, true);
    __privateAdd(this, _isActive, false);
    __privateAdd(this, _isAnimated2, false);
    __privateAdd(this, _childIsActive, false);
    __privateAdd(this, _listenerRef, void 0);
    __privateAdd(this, _resizeRef, void 0);
    __privateAdd(this, _sidenavId, void 0);
    try {
      this.preventDbInstance(element);
      instances.push({ type: "Collapsible", instance: this });
      this.el = document.querySelector(element);
      this.options = getComponentOptions("Collapsible", options, this.el);
      this.setup();
    } catch (error) {
      console.error("[Axentix] Collapsible init error", error);
    }
  }
  setup() {
    createEvent(this.el, "collapsible.setup");
    __privateSet(this, _triggers, getTriggers(this.el.id));
    __privateSet(this, _isInit, true);
    __privateSet(this, _isActive, this.el.classList.contains("active") ? true : false);
    __privateSet(this, _isAnimated2, false);
    __privateSet(this, _sidenavId, "");
    __privateSet(this, _childIsActive, false);
    this.setupListeners();
    this.el.style.transitionDuration = this.options.animationDuration + "ms";
    __privateMethod(this, _detectSidenav, detectSidenav_fn).call(this);
    __privateSet(this, _childIsActive, this.el.querySelector(".active") ? true : false);
    if (this.options.sidenav.activeClass)
      __privateMethod(this, _addActiveInSidenav, addActiveInSidenav_fn).call(this);
    if (__privateGet(this, _isActive))
      this.open();
    __privateSet(this, _isInit, false);
  }
  setupListeners() {
    __privateSet(this, _listenerRef, __privateMethod(this, _onClickTrigger, onClickTrigger_fn).bind(this));
    __privateGet(this, _triggers).forEach((trigger) => trigger.addEventListener("click", __privateGet(this, _listenerRef)));
    __privateSet(this, _resizeRef, __privateMethod(this, _handleResize, handleResize_fn).bind(this));
    window.addEventListener("resize", __privateGet(this, _resizeRef));
  }
  removeListeners() {
    __privateGet(this, _triggers).forEach((trigger) => trigger.removeEventListener("click", __privateGet(this, _listenerRef)));
    __privateSet(this, _listenerRef, void 0);
    window.removeEventListener("resize", __privateGet(this, _resizeRef));
    __privateSet(this, _resizeRef, void 0);
  }
  open() {
    if (__privateGet(this, _isActive) && !__privateGet(this, _isInit))
      return;
    createEvent(this.el, "collapsible.open");
    __privateSet(this, _isActive, true);
    __privateSet(this, _isAnimated2, true);
    this.el.style.display = "block";
    __privateMethod(this, _applyOverflow, applyOverflow_fn).call(this);
    this.el.style.maxHeight = this.el.scrollHeight + "px";
    if (this.options.sidenav.activeWhenOpen)
      __privateMethod(this, _toggleTriggerActive, toggleTriggerActive_fn).call(this, true);
    if (this.options.sidenav.autoClose)
      __privateMethod(this, _autoClose, autoClose_fn).call(this);
    setTimeout(() => {
      __privateSet(this, _isAnimated2, false);
    }, this.options.animationDuration);
  }
  close() {
    if (!__privateGet(this, _isActive))
      return;
    createEvent(this.el, "collapsible.close");
    __privateSet(this, _isAnimated2, true);
    this.el.style.maxHeight = "";
    __privateMethod(this, _applyOverflow, applyOverflow_fn).call(this);
    if (this.options.sidenav.activeWhenOpen)
      __privateMethod(this, _toggleTriggerActive, toggleTriggerActive_fn).call(this, false);
    setTimeout(() => {
      this.el.style.display = "";
      __privateSet(this, _isAnimated2, false);
      __privateSet(this, _isActive, false);
    }, this.options.animationDuration);
  }
}
_triggers = new WeakMap();
_sidenavTriggers = new WeakMap();
_isInit = new WeakMap();
_isActive = new WeakMap();
_isAnimated2 = new WeakMap();
_childIsActive = new WeakMap();
_listenerRef = new WeakMap();
_resizeRef = new WeakMap();
_sidenavId = new WeakMap();
_handleResize = new WeakSet();
handleResize_fn = function() {
  if (__privateGet(this, _isActive) && !__privateGet(this, _sidenavId))
    this.el.style.maxHeight = this.el.scrollHeight + "px";
};
_detectSidenav = new WeakSet();
detectSidenav_fn = function() {
  const sidenavElem = this.el.closest(".sidenav");
  if (sidenavElem) {
    __privateSet(this, _sidenavId, sidenavElem.id);
    __privateSet(this, _sidenavTriggers, __privateGet(this, _triggers).filter((t) => {
      var _a;
      return ((_a = t.closest(".sidenav")) == null ? void 0 : _a.id) === sidenavElem.id;
    }));
  }
};
_addActiveInSidenav = new WeakSet();
addActiveInSidenav_fn = function() {
  if (!__privateGet(this, _childIsActive) || !__privateGet(this, _sidenavId))
    return;
  __privateGet(this, _sidenavTriggers).forEach((trigger) => trigger.classList.add("active"));
  this.el.classList.add("active");
  this.open();
  __privateSet(this, _isActive, true);
};
_toggleTriggerActive = new WeakSet();
toggleTriggerActive_fn = function(state) {
  if (!__privateGet(this, _sidenavId))
    return;
  __privateGet(this, _sidenavTriggers).forEach((trigger) => {
    if (state)
      trigger.classList.add("active");
    else
      trigger.classList.remove("active");
  });
};
_autoClose = new WeakSet();
autoClose_fn = function() {
  if (!__privateGet(this, _isInit) && __privateGet(this, _sidenavId)) {
    getInstanceByType("Collapsible").forEach((collapsible2) => {
      if (__privateGet(collapsible2, _sidenavId) === __privateGet(this, _sidenavId) && collapsible2.el.id !== this.el.id)
        collapsible2.close();
    });
  }
};
_applyOverflow = new WeakSet();
applyOverflow_fn = function() {
  this.el.style.overflow = "hidden";
  setTimeout(() => {
    this.el.style.overflow = "";
  }, this.options.animationDuration);
};
_onClickTrigger = new WeakSet();
onClickTrigger_fn = function(e) {
  e.preventDefault();
  if (__privateGet(this, _isAnimated2))
    return;
  if (__privateGet(this, _isActive))
    this.close();
  else
    this.open();
};
__publicField(Collapsible, "getDefaultOptions", () => CollapsibleOptions);
registerComponent({
  class: Collapsible,
  name: "Collapsible",
  dataDetection: true,
  autoInit: {
    enabled: true,
    selector: ".collapsible"
  }
});
var sidenav = "";
const SidenavOptions = {
  overlay: true,
  bodyScrolling: false,
  animationDuration: 300
};
class Sidenav extends AxentixComponent {
  constructor(element, options) {
    super();
    __privateAdd(this, _resizeHandler);
    __privateAdd(this, _cleanLayout);
    __privateAdd(this, _handleMultipleSidenav);
    __privateAdd(this, _toggleBodyScroll);
    __privateAdd(this, _onClickTrigger2);
    __publicField(this, "options");
    __privateAdd(this, _triggers2, void 0);
    __privateAdd(this, _isActive2, false);
    __privateAdd(this, _isAnimated3, false);
    __privateAdd(this, _isFixed, false);
    __privateAdd(this, _firstSidenavInit, false);
    __privateAdd(this, _layoutEl, void 0);
    __privateAdd(this, _overlayElement, void 0);
    __privateAdd(this, _listenerRef2, void 0);
    __privateAdd(this, _windowResizeRef2, void 0);
    __privateAdd(this, _windowWidth, void 0);
    try {
      this.preventDbInstance(element);
      instances.push({ type: "Sidenav", instance: this });
      this.el = document.querySelector(element);
      this.options = getComponentOptions("Sidenav", options, this.el);
      this.setup();
    } catch (error) {
      console.error("[Axentix] Sidenav init error", error);
    }
  }
  setup() {
    createEvent(this.el, "sidenav.setup");
    __privateSet(this, _triggers2, getTriggers(this.el.id));
    __privateSet(this, _isActive2, false);
    __privateSet(this, _isAnimated3, false);
    __privateSet(this, _windowWidth, window.innerWidth);
    __privateSet(this, _isFixed, this.el.classList.contains("sidenav-fixed"));
    const sidenavFixed = getInstanceByType("Sidenav").find((sidenav2) => __privateGet(sidenav2, _isFixed));
    __privateSet(this, _firstSidenavInit, sidenavFixed && sidenavFixed.el === this.el);
    __privateSet(this, _layoutEl, document.querySelector('.layout, [class*="layout-"]'));
    if (__privateGet(this, _layoutEl) && __privateGet(this, _firstSidenavInit))
      __privateMethod(this, _cleanLayout, cleanLayout_fn).call(this);
    this.setupListeners();
    if (this.options.overlay)
      __privateSet(this, _overlayElement, createOverlay(__privateGet(this, _isActive2), this.options.overlay, this.el.id, this.options.animationDuration));
    if (__privateGet(this, _layoutEl) && __privateGet(this, _isFixed))
      __privateMethod(this, _handleMultipleSidenav, handleMultipleSidenav_fn).call(this);
    this.el.style.transitionDuration = this.options.animationDuration + "ms";
  }
  setupListeners() {
    __privateSet(this, _listenerRef2, __privateMethod(this, _onClickTrigger2, onClickTrigger_fn2).bind(this));
    __privateGet(this, _triggers2).forEach((trigger) => trigger.addEventListener("click", __privateGet(this, _listenerRef2)));
    __privateSet(this, _windowResizeRef2, __privateMethod(this, _resizeHandler, resizeHandler_fn).bind(this));
    window.addEventListener("resize", __privateGet(this, _windowResizeRef2));
  }
  removeListeners() {
    __privateGet(this, _triggers2).forEach((trigger) => trigger.removeEventListener("click", __privateGet(this, _listenerRef2)));
    __privateSet(this, _listenerRef2, void 0);
    window.removeEventListener("resize", __privateGet(this, _windowResizeRef2));
    __privateSet(this, _windowResizeRef2, void 0);
  }
  destroy() {
    createEvent(this.el, "component.destroy");
    this.removeListeners();
    if (__privateGet(this, _layoutEl))
      __privateMethod(this, _cleanLayout, cleanLayout_fn).call(this);
    const index = instances.findIndex((ins) => ins.instance.el.id === this.el.id);
    instances.splice(index, 1);
  }
  open() {
    if (__privateGet(this, _isActive2) || __privateGet(this, _isAnimated3))
      return;
    createEvent(this.el, "sidenav.open");
    __privateSet(this, _isActive2, true);
    __privateSet(this, _isAnimated3, true);
    this.el.classList.add("active");
    updateOverlay(this.options.overlay, __privateGet(this, _overlayElement), __privateGet(this, _listenerRef2), true, this.options.animationDuration);
    __privateMethod(this, _toggleBodyScroll, toggleBodyScroll_fn).call(this, false);
    setTimeout(() => {
      __privateSet(this, _isAnimated3, false);
      createEvent(this.el, "sidenav.opened");
    }, this.options.animationDuration);
  }
  close() {
    if (!__privateGet(this, _isActive2) || __privateGet(this, _isAnimated3))
      return;
    __privateSet(this, _isAnimated3, true);
    createEvent(this.el, "sidenav.close");
    this.el.classList.remove("active");
    updateOverlay(this.options.overlay, __privateGet(this, _overlayElement), __privateGet(this, _listenerRef2), false, this.options.animationDuration);
    setTimeout(() => {
      __privateMethod(this, _toggleBodyScroll, toggleBodyScroll_fn).call(this, true);
      __privateSet(this, _isActive2, false);
      __privateSet(this, _isAnimated3, false);
      createEvent(this.el, "sidenav.closed");
    }, this.options.animationDuration);
  }
}
_triggers2 = new WeakMap();
_isActive2 = new WeakMap();
_isAnimated3 = new WeakMap();
_isFixed = new WeakMap();
_firstSidenavInit = new WeakMap();
_layoutEl = new WeakMap();
_overlayElement = new WeakMap();
_listenerRef2 = new WeakMap();
_windowResizeRef2 = new WeakMap();
_windowWidth = new WeakMap();
_resizeHandler = new WeakSet();
resizeHandler_fn = function(e) {
  const target = e.target;
  const width = target.innerWidth;
  if (__privateGet(this, _windowWidth) !== width)
    this.close();
  __privateSet(this, _windowWidth, width);
};
_cleanLayout = new WeakSet();
cleanLayout_fn = function() {
  ["layout-sidenav-right", "layout-sidenav-both"].forEach((classes) => __privateGet(this, _layoutEl).classList.remove(classes));
};
_handleMultipleSidenav = new WeakSet();
handleMultipleSidenav_fn = function() {
  if (!__privateGet(this, _firstSidenavInit))
    return;
  const sidenavs = Array.from(document.querySelectorAll(".sidenav")).filter((sidenav2) => sidenav2.classList.contains("sidenav-fixed"));
  const { sidenavsRight, sidenavsLeft } = sidenavs.reduce((acc, sidenav2) => {
    sidenav2.classList.contains("sidenav-right") ? acc.sidenavsRight.push(sidenav2) : acc.sidenavsLeft.push(sidenav2);
    return acc;
  }, { sidenavsRight: [], sidenavsLeft: [] });
  const isBoth = sidenavsLeft.length > 0 && sidenavsRight.length > 0;
  if (sidenavsRight.length > 0 && !isBoth)
    __privateGet(this, _layoutEl).classList.add("layout-sidenav-right");
  else if (isBoth)
    __privateGet(this, _layoutEl).classList.add("layout-sidenav-both");
};
_toggleBodyScroll = new WeakSet();
toggleBodyScroll_fn = function(state) {
  if (!this.options.bodyScrolling)
    document.body.style.overflow = state ? "" : "hidden";
};
_onClickTrigger2 = new WeakSet();
onClickTrigger_fn2 = function(e) {
  e.preventDefault();
  if (__privateGet(this, _isFixed) && window.innerWidth >= 960)
    return;
  if (__privateGet(this, _isActive2))
    this.close();
  else
    this.open();
};
__publicField(Sidenav, "getDefaultOptions", () => SidenavOptions);
registerComponent({
  class: Sidenav,
  name: "Sidenav",
  dataDetection: true,
  autoInit: {
    enabled: true,
    selector: ".sidenav"
  }
});
var dropdown = "";
const DropdownOptions = {
  animationDuration: 300,
  animationType: "none",
  hover: false,
  autoClose: true,
  preventViewport: false,
  closeOnClick: true
};
class Dropdown extends AxentixComponent {
  constructor(element, options) {
    super();
    __privateAdd(this, _setupAnimation);
    __privateAdd(this, _onDocumentClick);
    __privateAdd(this, _onClickTrigger3);
    __privateAdd(this, _autoClose2);
    __privateAdd(this, _setContentHeight);
    __publicField(this, "options");
    __privateAdd(this, _dropdownContent, void 0);
    __privateAdd(this, _trigger, void 0);
    __privateAdd(this, _isAnimated4, false);
    __privateAdd(this, _isActive3, false);
    __privateAdd(this, _documentClickRef, void 0);
    __privateAdd(this, _listenerRef3, void 0);
    __privateAdd(this, _contentHeightRef, void 0);
    try {
      this.preventDbInstance(element);
      instances.push({ type: "Dropdown", instance: this });
      this.el = document.querySelector(element);
      this.options = getComponentOptions("Dropdown", options, this.el);
      this.setup();
    } catch (error) {
      console.error("[Axentix] Dropdown init error", error);
    }
  }
  setup() {
    createEvent(this.el, "dropdown.setup");
    __privateSet(this, _dropdownContent, this.el.querySelector(".dropdown-content"));
    __privateSet(this, _trigger, getTriggers(this.el.id)[0]);
    __privateSet(this, _isAnimated4, false);
    __privateSet(this, _isActive3, this.el.classList.contains("active") ? true : false);
    if (this.options.hover)
      this.el.classList.add("active-hover");
    else
      this.setupListeners();
    if (this.options.preventViewport)
      this.el.classList.add("dropdown-vp");
    __privateMethod(this, _setupAnimation, setupAnimation_fn).call(this);
  }
  setupListeners() {
    if (this.options.hover)
      return;
    __privateSet(this, _listenerRef3, __privateMethod(this, _onClickTrigger3, onClickTrigger_fn3).bind(this));
    __privateGet(this, _trigger).addEventListener("click", __privateGet(this, _listenerRef3));
    __privateSet(this, _documentClickRef, __privateMethod(this, _onDocumentClick, onDocumentClick_fn).bind(this));
    document.addEventListener("click", __privateGet(this, _documentClickRef), true);
    __privateSet(this, _contentHeightRef, __privateMethod(this, _setContentHeight, setContentHeight_fn).bind(this));
    if (this.options.preventViewport)
      window.addEventListener("scroll", __privateGet(this, _contentHeightRef));
  }
  removeListeners() {
    if (this.options.hover)
      return;
    __privateGet(this, _trigger).removeEventListener("click", __privateGet(this, _listenerRef3));
    __privateSet(this, _listenerRef3, void 0);
    document.removeEventListener("click", __privateGet(this, _documentClickRef), true);
    __privateSet(this, _documentClickRef, void 0);
    if (this.options.preventViewport)
      window.removeEventListener("scroll", __privateGet(this, _contentHeightRef));
    __privateSet(this, _contentHeightRef, void 0);
  }
  open() {
    if (__privateGet(this, _isActive3))
      return;
    createEvent(this.el, "dropdown.open");
    __privateGet(this, _dropdownContent).style.display = "flex";
    if (this.options.preventViewport)
      __privateMethod(this, _setContentHeight, setContentHeight_fn).call(this);
    setTimeout(() => {
      this.el.classList.add("active");
      __privateSet(this, _isActive3, true);
    }, 10);
    if (this.options.autoClose)
      __privateMethod(this, _autoClose2, autoClose_fn2).call(this);
    if (this.options.animationType !== "none") {
      __privateSet(this, _isAnimated4, true);
      setTimeout(() => {
        __privateSet(this, _isAnimated4, false);
        createEvent(this.el, "dropdown.opened");
      }, this.options.animationDuration);
    } else {
      createEvent(this.el, "dropdown.opened");
    }
  }
  close() {
    if (!__privateGet(this, _isActive3))
      return;
    createEvent(this.el, "dropdown.close");
    this.el.classList.remove("active");
    if (this.options.animationType !== "none") {
      __privateSet(this, _isAnimated4, true);
      setTimeout(() => {
        __privateGet(this, _dropdownContent).style.display = "";
        __privateSet(this, _isAnimated4, false);
        __privateSet(this, _isActive3, false);
        createEvent(this.el, "dropdown.closed");
      }, this.options.animationDuration);
    } else {
      __privateGet(this, _dropdownContent).style.display = "";
      __privateSet(this, _isActive3, false);
      createEvent(this.el, "dropdown.closed");
    }
  }
}
_dropdownContent = new WeakMap();
_trigger = new WeakMap();
_isAnimated4 = new WeakMap();
_isActive3 = new WeakMap();
_documentClickRef = new WeakMap();
_listenerRef3 = new WeakMap();
_contentHeightRef = new WeakMap();
_setupAnimation = new WeakSet();
setupAnimation_fn = function() {
  const animationList = ["none", "fade"];
  this.options.animationType = this.options.animationType.toLowerCase();
  if (!animationList.includes(this.options.animationType))
    this.options.animationType = "none";
  if (this.options.animationType === "fade" && !this.options.hover) {
    __privateGet(this, _dropdownContent).style.transitionDuration = this.options.animationDuration + "ms";
    this.el.classList.add("dropdown-anim-fade");
  }
};
_onDocumentClick = new WeakSet();
onDocumentClick_fn = function(e) {
  if (e.target === __privateGet(this, _trigger) || __privateGet(this, _isAnimated4) || !__privateGet(this, _isActive3) || !this.options.closeOnClick && e.target.closest(".dropdown-content"))
    return;
  this.close();
};
_onClickTrigger3 = new WeakSet();
onClickTrigger_fn3 = function(e) {
  e.preventDefault();
  if (__privateGet(this, _isAnimated4))
    return;
  if (__privateGet(this, _isActive3))
    this.close();
  else
    this.open();
};
_autoClose2 = new WeakSet();
autoClose_fn2 = function() {
  getInstanceByType("Dropdown").forEach((dropdown2) => {
    if (dropdown2.el.id !== this.el.id)
      dropdown2.close();
  });
};
_setContentHeight = new WeakSet();
setContentHeight_fn = function() {
  const elRect = __privateGet(this, _dropdownContent).getBoundingClientRect();
  const bottom = elRect.height - (elRect.bottom - (window.innerHeight || document.documentElement.clientHeight)) - 10;
  __privateGet(this, _dropdownContent).style.maxHeight = bottom + "px";
};
__publicField(Dropdown, "getDefaultOptions", () => DropdownOptions);
registerComponent({
  class: Dropdown,
  name: "Dropdown",
  dataDetection: true,
  autoInit: {
    enabled: true,
    selector: ".dropdown"
  }
});
var fab = "";
const FabOptions = {
  animationDuration: 300,
  hover: true,
  direction: "top",
  position: "bottom-right",
  offsetX: "1rem",
  offsetY: "1.5rem"
};
class Fab extends AxentixComponent {
  constructor(element, options) {
    super();
    __privateAdd(this, _verifOptions);
    __privateAdd(this, _setProperties);
    __privateAdd(this, _setMenuPosition);
    __privateAdd(this, _handleDocumentClick);
    __privateAdd(this, _onClickTrigger4);
    __publicField(this, "options");
    __privateAdd(this, _isAnimated5, false);
    __privateAdd(this, _isActive4, false);
    __privateAdd(this, _trigger2, void 0);
    __privateAdd(this, _fabMenu, void 0);
    __privateAdd(this, _openRef, void 0);
    __privateAdd(this, _closeRef, void 0);
    __privateAdd(this, _documentClickRef2, void 0);
    __privateAdd(this, _listenerRef4, void 0);
    try {
      this.preventDbInstance(element);
      instances.push({ type: "Fab", instance: this });
      this.el = document.querySelector(element);
      this.options = getComponentOptions("Fab", options, this.el);
      this.setup();
    } catch (error) {
      console.error("[Axentix] Fab init error", error);
    }
  }
  setup() {
    createEvent(this.el, "fab.setup");
    __privateSet(this, _isAnimated5, false);
    __privateSet(this, _isActive4, false);
    __privateSet(this, _trigger2, getTriggers(this.el.id)[0]);
    __privateSet(this, _fabMenu, this.el.querySelector(".fab-menu"));
    __privateMethod(this, _verifOptions, verifOptions_fn).call(this);
    this.setupListeners();
    this.el.style.transitionDuration = this.options.animationDuration + "ms";
    __privateMethod(this, _setProperties, setProperties_fn).call(this);
  }
  setupListeners() {
    if (this.options.hover) {
      __privateSet(this, _openRef, this.open.bind(this));
      __privateSet(this, _closeRef, this.close.bind(this));
      this.el.addEventListener("mouseenter", __privateGet(this, _openRef));
      this.el.addEventListener("mouseleave", __privateGet(this, _closeRef));
    } else {
      __privateSet(this, _listenerRef4, __privateMethod(this, _onClickTrigger4, onClickTrigger_fn4).bind(this));
      this.el.addEventListener("click", __privateGet(this, _listenerRef4));
    }
    __privateSet(this, _documentClickRef2, __privateMethod(this, _handleDocumentClick, handleDocumentClick_fn).bind(this));
    document.addEventListener("click", __privateGet(this, _documentClickRef2), true);
  }
  removeListeners() {
    if (this.options.hover) {
      this.el.removeEventListener("mouseenter", __privateGet(this, _openRef));
      this.el.removeEventListener("mouseleave", __privateGet(this, _closeRef));
      __privateSet(this, _openRef, void 0);
      __privateSet(this, _closeRef, void 0);
    } else {
      this.el.removeEventListener("click", __privateGet(this, _listenerRef4));
      __privateSet(this, _listenerRef4, void 0);
    }
    document.removeEventListener("click", __privateGet(this, _documentClickRef2), true);
    __privateSet(this, _documentClickRef2, void 0);
  }
  open() {
    if (__privateGet(this, _isActive4))
      return;
    createEvent(this.el, "fab.open");
    __privateSet(this, _isAnimated5, true);
    __privateSet(this, _isActive4, true);
    this.el.classList.add("active");
    setTimeout(() => {
      __privateSet(this, _isAnimated5, false);
    }, this.options.animationDuration);
  }
  close() {
    if (!__privateGet(this, _isActive4))
      return;
    createEvent(this.el, "fab.close");
    __privateSet(this, _isAnimated5, true);
    __privateSet(this, _isActive4, false);
    this.el.classList.remove("active");
    setTimeout(() => {
      __privateSet(this, _isAnimated5, false);
    }, this.options.animationDuration);
  }
}
_isAnimated5 = new WeakMap();
_isActive4 = new WeakMap();
_trigger2 = new WeakMap();
_fabMenu = new WeakMap();
_openRef = new WeakMap();
_closeRef = new WeakMap();
_documentClickRef2 = new WeakMap();
_listenerRef4 = new WeakMap();
_verifOptions = new WeakSet();
verifOptions_fn = function() {
  const directionList = ["right", "left", "top", "bottom"];
  if (!directionList.includes(this.options.direction))
    this.options.direction = "top";
  const positionList = ["top-right", "top-left", "bottom-right", "bottom-left"];
  if (!positionList.includes(this.options.position))
    this.options.position = "bottom-right";
};
_setProperties = new WeakSet();
setProperties_fn = function() {
  if (this.options.position.split("-")[0] === "top")
    this.el.style.top = this.options.offsetY;
  else
    this.el.style.bottom = this.options.offsetY;
  if (this.options.position.split("-")[1] === "right")
    this.el.style.right = this.options.offsetX;
  else
    this.el.style.left = this.options.offsetX;
  if (this.options.direction === "right" || this.options.direction === "left")
    this.el.classList.add("fab-dir-x");
  __privateMethod(this, _setMenuPosition, setMenuPosition_fn).call(this);
};
_setMenuPosition = new WeakSet();
setMenuPosition_fn = function() {
  if (this.options.direction === "top" || this.options.direction === "bottom") {
    const height = __privateGet(this, _trigger2).clientHeight;
    if (this.options.direction === "top")
      __privateGet(this, _fabMenu).style.bottom = height + "px";
    else
      __privateGet(this, _fabMenu).style.top = height + "px";
  } else {
    const width = __privateGet(this, _trigger2).clientWidth;
    if (this.options.direction === "right")
      __privateGet(this, _fabMenu).style.left = width + "px";
    else
      __privateGet(this, _fabMenu).style.right = width + "px";
  }
};
_handleDocumentClick = new WeakSet();
handleDocumentClick_fn = function(e) {
  const isInside = this.el.contains(e.target);
  if (!isInside && __privateGet(this, _isActive4))
    this.close();
};
_onClickTrigger4 = new WeakSet();
onClickTrigger_fn4 = function(e) {
  e.preventDefault();
  if (__privateGet(this, _isAnimated5))
    return;
  if (__privateGet(this, _isActive4))
    this.close();
  else
    this.open();
};
__publicField(Fab, "getDefaultOptions", () => FabOptions);
registerComponent({
  class: Fab,
  name: "Fab",
  dataDetection: true,
  autoInit: {
    enabled: true,
    selector: ".fab:not(i)"
  }
});
var lightbox = "";
const LightboxOptions = {
  animationDuration: 400,
  overlayClass: "grey dark-4",
  offset: 150,
  mobileOffset: 80,
  caption: ""
};
class Lightbox extends AxentixComponent {
  constructor(element, options) {
    super();
    __privateAdd(this, _setOverlay);
    __privateAdd(this, _showOverlay);
    __privateAdd(this, _hideOverlay);
    __privateAdd(this, _unsetOverlay);
    __privateAdd(this, _calculateRatio);
    __privateAdd(this, _setOverflowParents);
    __privateAdd(this, _unsetOverflowParents);
    __privateAdd(this, _handleTransition);
    __privateAdd(this, _handleKeyUp);
    __privateAdd(this, _handleScroll);
    __privateAdd(this, _clearLightbox);
    __privateAdd(this, _onClickTrigger5);
    __publicField(this, "options");
    __privateAdd(this, _onClickRef, void 0);
    __privateAdd(this, _transitionEndEventRef, void 0);
    __privateAdd(this, _keyUpRef, void 0);
    __privateAdd(this, _scrollRef, void 0);
    __privateAdd(this, _resizeRef2, void 0);
    __privateAdd(this, _overlay, void 0);
    __privateAdd(this, _overlayClickEventRef, void 0);
    __privateAdd(this, _overflowParents, void 0);
    __privateAdd(this, _baseRect, void 0);
    __privateAdd(this, _newHeight, 0);
    __privateAdd(this, _newWidth, 0);
    __privateAdd(this, _isActive5, false);
    __privateAdd(this, _isResponsive, false);
    __privateAdd(this, _container, void 0);
    __privateAdd(this, _isClosing, false);
    __privateAdd(this, _isOpening, false);
    __privateAdd(this, _handleResize2, () => {
      if (__privateGet(this, _isActive5))
        this.close();
    });
    try {
      this.preventDbInstance(element);
      instances.push({ type: "Lightbox", instance: this });
      this.el = document.querySelector(element);
      this.options = getComponentOptions("Lightbox", options, this.el);
      this.setup();
    } catch (error) {
      console.error("[Axentix] Lightbox init error", error);
    }
  }
  setup() {
    createEvent(this.el, "lightbox.setup");
    this.el.style.transitionDuration = this.options.animationDuration + "ms";
    __privateSet(this, _container, wrap([this.el]));
    this.setupListeners();
  }
  setupListeners() {
    __privateSet(this, _onClickRef, __privateMethod(this, _onClickTrigger5, onClickTrigger_fn5).bind(this));
    this.el.addEventListener("click", __privateGet(this, _onClickRef));
    __privateSet(this, _keyUpRef, __privateMethod(this, _handleKeyUp, handleKeyUp_fn).bind(this));
    __privateSet(this, _scrollRef, __privateMethod(this, _handleScroll, handleScroll_fn).bind(this));
    __privateSet(this, _resizeRef2, __privateGet(this, _handleResize2).bind(this));
    __privateSet(this, _transitionEndEventRef, __privateMethod(this, _handleTransition, handleTransition_fn).bind(this));
    window.addEventListener("keyup", __privateGet(this, _keyUpRef));
    window.addEventListener("scroll", __privateGet(this, _scrollRef));
    window.addEventListener("resize", __privateGet(this, _resizeRef2));
    this.el.addEventListener("transitionend", __privateGet(this, _transitionEndEventRef));
  }
  removeListeners() {
    this.el.removeEventListener("click", __privateGet(this, _onClickRef));
    this.el.removeEventListener("transitionend", __privateGet(this, _transitionEndEventRef));
    window.removeEventListener("keyup", __privateGet(this, _keyUpRef));
    window.removeEventListener("scroll", __privateGet(this, _scrollRef));
    window.removeEventListener("resize", __privateGet(this, _resizeRef2));
    __privateSet(this, _onClickRef, void 0);
    __privateSet(this, _keyUpRef, void 0);
    __privateSet(this, _scrollRef, void 0);
    __privateSet(this, _resizeRef2, void 0);
    __privateSet(this, _transitionEndEventRef, void 0);
  }
  open() {
    __privateSet(this, _isOpening, true);
    let rect, containerRect;
    if (__privateGet(this, _isClosing)) {
      rect = containerRect = __privateGet(this, _container).getBoundingClientRect();
    } else {
      rect = containerRect = this.el.getBoundingClientRect();
    }
    __privateSet(this, _isClosing, false);
    __privateMethod(this, _setOverlay, setOverlay_fn).call(this);
    __privateMethod(this, _showOverlay, showOverlay_fn).call(this);
    const centerTop = window.innerHeight / 2;
    const centerLeft = window.innerWidth / 2;
    __privateSet(this, _baseRect, rect);
    this.el.style.width = __privateGet(this, _baseRect).width + "px";
    this.el.style.height = __privateGet(this, _baseRect).height + "px";
    this.el.style.top = "0";
    this.el.style.left = "0";
    const newTop = centerTop + window.scrollY - (containerRect.top + window.scrollY);
    const newLeft = centerLeft + window.scrollX - (containerRect.left + window.scrollX);
    __privateMethod(this, _calculateRatio, calculateRatio_fn).call(this);
    __privateGet(this, _container).style.position = "relative";
    setTimeout(() => {
      createEvent(this.el, "lightbox.open");
      __privateSet(this, _isActive5, true);
      if (this.el.classList.contains("responsive-media")) {
        __privateSet(this, _isResponsive, true);
        this.el.classList.remove("responsive-media");
      }
      this.el.classList.add("active");
      __privateGet(this, _container).style.width = __privateGet(this, _baseRect).width + "px";
      __privateGet(this, _container).style.height = __privateGet(this, _baseRect).height + "px";
      this.el.style.width = __privateGet(this, _newWidth) + "px";
      this.el.style.height = __privateGet(this, _newHeight) + "px";
      this.el.style.top = newTop - __privateGet(this, _newHeight) / 2 + "px";
      this.el.style.left = newLeft - __privateGet(this, _newWidth) / 2 + "px";
    }, 50);
  }
  close(e) {
    if ((e == null ? void 0 : e.key) && e.key !== "Escape")
      return;
    __privateSet(this, _isActive5, false);
    __privateSet(this, _isClosing, true);
    __privateSet(this, _isOpening, false);
    createEvent(this.el, "lightbox.close");
    __privateMethod(this, _hideOverlay, hideOverlay_fn).call(this);
    this.el.style.position = "absolute";
    this.el.style.top = "0px";
    this.el.style.left = "0px";
    this.el.style.width = __privateGet(this, _baseRect).width + "px";
    this.el.style.height = __privateGet(this, _baseRect).height + "px";
  }
}
_onClickRef = new WeakMap();
_transitionEndEventRef = new WeakMap();
_keyUpRef = new WeakMap();
_scrollRef = new WeakMap();
_resizeRef2 = new WeakMap();
_overlay = new WeakMap();
_overlayClickEventRef = new WeakMap();
_overflowParents = new WeakMap();
_baseRect = new WeakMap();
_newHeight = new WeakMap();
_newWidth = new WeakMap();
_isActive5 = new WeakMap();
_isResponsive = new WeakMap();
_container = new WeakMap();
_isClosing = new WeakMap();
_isOpening = new WeakMap();
_setOverlay = new WeakSet();
setOverlay_fn = function() {
  if (__privateGet(this, _overlay)) {
    return;
  }
  __privateMethod(this, _setOverflowParents, setOverflowParents_fn).call(this);
  __privateSet(this, _overlay, document.createElement("div"));
  __privateGet(this, _overlay).style.transitionDuration = this.options.animationDuration + "ms";
  __privateGet(this, _overlay).className = "lightbox-overlay " + this.options.overlayClass;
  __privateGet(this, _container).appendChild(__privateGet(this, _overlay));
  if (this.options.caption) {
    const caption = document.createElement("p");
    caption.className = "lightbox-caption";
    caption.innerHTML = this.options.caption;
    __privateGet(this, _overlay).appendChild(caption);
  }
  __privateSet(this, _overlayClickEventRef, this.close.bind(this));
  __privateGet(this, _overlay).addEventListener("click", __privateGet(this, _overlayClickEventRef));
};
_showOverlay = new WeakSet();
showOverlay_fn = function() {
  setTimeout(() => {
    __privateGet(this, _overlay).style.opacity = "1";
  }, 50);
};
_hideOverlay = new WeakSet();
hideOverlay_fn = function() {
  __privateGet(this, _overlay).style.opacity = "0";
};
_unsetOverlay = new WeakSet();
unsetOverlay_fn = function() {
  __privateGet(this, _overlay).removeEventListener("click", __privateGet(this, _overlayClickEventRef));
  __privateGet(this, _overlay).remove();
  __privateSet(this, _overlay, null);
};
_calculateRatio = new WeakSet();
calculateRatio_fn = function() {
  const offset = window.innerWidth >= 960 ? this.options.offset : this.options.mobileOffset;
  if (window.innerWidth / window.innerHeight >= __privateGet(this, _baseRect).width / __privateGet(this, _baseRect).height) {
    __privateSet(this, _newHeight, window.innerHeight - offset);
    __privateSet(this, _newWidth, __privateGet(this, _newHeight) * __privateGet(this, _baseRect).width / __privateGet(this, _baseRect).height);
  } else {
    __privateSet(this, _newWidth, window.innerWidth - offset);
    __privateSet(this, _newHeight, __privateGet(this, _newWidth) * __privateGet(this, _baseRect).height / __privateGet(this, _baseRect).width);
  }
};
_setOverflowParents = new WeakSet();
setOverflowParents_fn = function() {
  __privateSet(this, _overflowParents, []);
  for (let elem = this.el; elem && elem !== document; elem = elem.parentNode) {
    const elementSyle = window.getComputedStyle(elem);
    if (elementSyle.overflow === "hidden" || elementSyle.overflowX === "hidden" || elementSyle.overflowY === "hidden") {
      __privateGet(this, _overflowParents).push(elem);
      if (elem !== document.body)
        elem.style.setProperty("overflow", "visible", "important");
      document.body.style.overflowX = "hidden";
    }
  }
};
_unsetOverflowParents = new WeakSet();
unsetOverflowParents_fn = function() {
  __privateGet(this, _overflowParents).forEach((parent) => parent.style.overflow = "");
  document.body.style.overflowX = "";
};
_handleTransition = new WeakSet();
handleTransition_fn = function(e) {
  if (!e.propertyName.includes("width") && !e.propertyName.includes("height")) {
    return;
  }
  if (__privateGet(this, _isClosing)) {
    __privateMethod(this, _clearLightbox, clearLightbox_fn).call(this);
    __privateSet(this, _isClosing, false);
    __privateSet(this, _isActive5, false);
    createEvent(this.el, "lightbox.closed");
  } else if (__privateGet(this, _isOpening)) {
    __privateSet(this, _isOpening, false);
    createEvent(this.el, "lightbox.opened");
  }
};
_handleKeyUp = new WeakSet();
handleKeyUp_fn = function(e) {
  if (e.key === "Escape" && (__privateGet(this, _isOpening) || __privateGet(this, _isActive5)))
    this.close();
};
_handleScroll = new WeakSet();
handleScroll_fn = function() {
  if (__privateGet(this, _isActive5) || __privateGet(this, _isOpening))
    this.close();
};
_handleResize2 = new WeakMap();
_clearLightbox = new WeakSet();
clearLightbox_fn = function() {
  this.el.classList.remove("active");
  __privateMethod(this, _unsetOverlay, unsetOverlay_fn).call(this);
  __privateMethod(this, _unsetOverflowParents, unsetOverflowParents_fn).call(this);
  if (__privateGet(this, _isResponsive))
    this.el.classList.add("responsive-media");
  __privateGet(this, _container).removeAttribute("style");
  this.el.style.position = "";
  this.el.style.left = "";
  this.el.style.top = "";
  this.el.style.width = "";
  this.el.style.height = "";
  this.el.style.transform = "";
};
_onClickTrigger5 = new WeakSet();
onClickTrigger_fn5 = function() {
  if (__privateGet(this, _isOpening) || __privateGet(this, _isActive5)) {
    this.close();
    return;
  }
  this.open();
};
__publicField(Lightbox, "getDefaultOptions", () => LightboxOptions);
registerComponent({
  class: Lightbox,
  name: "Lightbox",
  dataDetection: true,
  autoInit: {
    enabled: true,
    selector: ".lightbox"
  }
});
var modal = "";
const ModalOptions = {
  overlay: true,
  bodyScrolling: false,
  animationDuration: 400
};
class Modal extends AxentixComponent {
  constructor(element, options) {
    super();
    __privateAdd(this, _toggleBodyScroll2);
    __privateAdd(this, _setZIndex);
    __privateAdd(this, _onClickTrigger6);
    __publicField(this, "options");
    __publicField(this, "overlayElement");
    __privateAdd(this, _triggers3, void 0);
    __privateAdd(this, _isActive6, false);
    __privateAdd(this, _isAnimated6, false);
    __privateAdd(this, _listenerRef5, void 0);
    try {
      this.preventDbInstance(element);
      instances.push({ type: "Modal", instance: this });
      this.el = document.querySelector(element);
      this.options = getComponentOptions("Modal", options, this.el);
      this.setup();
    } catch (error) {
      console.error("[Axentix] Modal init error", error);
    }
  }
  setup() {
    createEvent(this.el, "modal.setup");
    __privateSet(this, _triggers3, getTriggers(this.el.id));
    __privateSet(this, _isActive6, this.el.classList.contains("active") ? true : false);
    __privateSet(this, _isAnimated6, false);
    this.setupListeners();
    if (this.options.overlay)
      this.overlayElement = createOverlay(__privateGet(this, _isActive6), this.options.overlay, this.el.id, this.options.animationDuration);
    this.el.style.transitionDuration = this.options.animationDuration + "ms";
    this.el.style.animationDuration = this.options.animationDuration + "ms";
  }
  setupListeners() {
    __privateSet(this, _listenerRef5, __privateMethod(this, _onClickTrigger6, onClickTrigger_fn6).bind(this));
    __privateGet(this, _triggers3).forEach((trigger) => trigger.addEventListener("click", __privateGet(this, _listenerRef5)));
  }
  removeListeners() {
    __privateGet(this, _triggers3).forEach((trigger) => trigger.removeEventListener("click", __privateGet(this, _listenerRef5)));
    __privateSet(this, _listenerRef5, void 0);
  }
  open() {
    if (__privateGet(this, _isActive6))
      return;
    createEvent(this.el, "modal.open");
    __privateSet(this, _isActive6, true);
    __privateSet(this, _isAnimated6, true);
    __privateMethod(this, _setZIndex, setZIndex_fn).call(this);
    this.el.style.display = "block";
    updateOverlay(this.options.overlay, this.overlayElement, __privateGet(this, _listenerRef5), true, this.options.animationDuration);
    __privateMethod(this, _toggleBodyScroll2, toggleBodyScroll_fn2).call(this, false);
    setTimeout(() => {
      this.el.classList.add("active");
    }, 50);
    setTimeout(() => {
      __privateSet(this, _isAnimated6, false);
      createEvent(this.el, "modal.opened");
    }, this.options.animationDuration);
  }
  close() {
    if (!__privateGet(this, _isActive6))
      return;
    createEvent(this.el, "modal.close");
    __privateSet(this, _isAnimated6, true);
    this.el.classList.remove("active");
    updateOverlay(this.options.overlay, this.overlayElement, __privateGet(this, _listenerRef5), false, this.options.animationDuration);
    setTimeout(() => {
      this.el.style.display = "";
      __privateSet(this, _isAnimated6, false);
      __privateSet(this, _isActive6, false);
      __privateMethod(this, _toggleBodyScroll2, toggleBodyScroll_fn2).call(this, true);
      createEvent(this.el, "modal.closed");
    }, this.options.animationDuration);
  }
}
_triggers3 = new WeakMap();
_isActive6 = new WeakMap();
_isAnimated6 = new WeakMap();
_listenerRef5 = new WeakMap();
_toggleBodyScroll2 = new WeakSet();
toggleBodyScroll_fn2 = function(state) {
  if (!this.options.bodyScrolling)
    document.body.style.overflow = state ? "" : "hidden";
};
_setZIndex = new WeakSet();
setZIndex_fn = function() {
  const totalModals = document.querySelectorAll(".modal.active").length + 1;
  if (this.options.overlay)
    this.overlayElement.style.zIndex = String(800 + totalModals * 10 - 2);
  this.el.style.zIndex = String(800 + totalModals * 10);
};
_onClickTrigger6 = new WeakSet();
onClickTrigger_fn6 = function(e) {
  e.preventDefault();
  if (__privateGet(this, _isAnimated6))
    return;
  if (__privateGet(this, _isActive6))
    this.close();
  else
    this.open();
};
__publicField(Modal, "getDefaultOptions", () => ModalOptions);
registerComponent({
  class: Modal,
  name: "Modal",
  dataDetection: true,
  autoInit: {
    enabled: true,
    selector: ".modal"
  }
});
var tab = "";
const TabOptions = {
  animationDuration: 300,
  animationType: "none",
  disableActiveBar: false,
  caroulix: {
    animationDuration: 300,
    backToOpposite: false,
    enableTouch: false,
    autoplay: {
      enabled: false
    }
  }
};
class Tab extends AxentixComponent {
  constructor(element, options) {
    super();
    __privateAdd(this, _handleResizeEvent);
    __privateAdd(this, _handleCaroulixSlide);
    __privateAdd(this, _getItems);
    __privateAdd(this, _hideContent);
    __privateAdd(this, _enableSlideAnimation);
    __privateAdd(this, _setActiveElement);
    __privateAdd(this, _toggleArrowMode);
    __privateAdd(this, _scrollLeft);
    __privateAdd(this, _scrollRight);
    __privateAdd(this, _onClickItem);
    __privateAdd(this, _getPreviousItemIndex);
    __privateAdd(this, _getNextItemIndex);
    __publicField(this, "options");
    __privateAdd(this, _tabArrow, void 0);
    __privateAdd(this, _tabLinks, void 0);
    __privateAdd(this, _tabMenu, void 0);
    __privateAdd(this, _currentItemIndex, 0);
    __privateAdd(this, _leftArrow, void 0);
    __privateAdd(this, _rightArrow, void 0);
    __privateAdd(this, _scrollLeftRef, void 0);
    __privateAdd(this, _scrollRightRef, void 0);
    __privateAdd(this, _arrowRef, void 0);
    __privateAdd(this, _caroulixSlideRef, void 0);
    __privateAdd(this, _resizeTabRef, void 0);
    __privateAdd(this, _tabItems, void 0);
    __privateAdd(this, _tabCaroulix, void 0);
    __privateAdd(this, _tabCaroulixInit, false);
    __privateAdd(this, _caroulixInstance, void 0);
    __privateAdd(this, _isAnimated7, false);
    try {
      this.preventDbInstance(element);
      instances.push({ type: "Tab", instance: this });
      this.el = document.querySelector(element);
      this.options = getComponentOptions("Tab", options, this.el);
      this.setup();
    } catch (error) {
      console.error("[Axentix] Tab init error", error);
    }
  }
  setup() {
    createEvent(this.el, "tab.setup");
    const animationList = ["none", "slide"];
    if (!animationList.includes(this.options.animationType))
      this.options.animationType = "none";
    __privateSet(this, _isAnimated7, false);
    __privateSet(this, _tabArrow, this.el.querySelector(".tab-arrow"));
    __privateSet(this, _tabLinks, this.el.querySelectorAll(".tab-menu .tab-link"));
    __privateSet(this, _tabMenu, this.el.querySelector(".tab-menu"));
    __privateSet(this, _currentItemIndex, 0);
    __privateSet(this, _tabItems, __privateMethod(this, _getItems, getItems_fn).call(this));
    if (__privateGet(this, _tabArrow)) {
      __privateMethod(this, _toggleArrowMode, toggleArrowMode_fn).call(this);
      __privateSet(this, _leftArrow, this.el.querySelector(".tab-arrow .tab-prev"));
      __privateSet(this, _rightArrow, this.el.querySelector(".tab-arrow .tab-next"));
    }
    this.setupListeners();
    __privateGet(this, _tabMenu).style.transitionDuration = this.options.animationDuration + "ms";
    if (this.options.animationType === "slide")
      __privateMethod(this, _enableSlideAnimation, enableSlideAnimation_fn).call(this);
    else
      this.updateActiveElement();
  }
  setupListeners() {
    __privateGet(this, _tabLinks).forEach((item) => {
      item.listenerRef = __privateMethod(this, _onClickItem, onClickItem_fn).bind(this, item);
      item.addEventListener("click", item.listenerRef);
    });
    __privateSet(this, _resizeTabRef, __privateMethod(this, _handleResizeEvent, handleResizeEvent_fn).bind(this));
    window.addEventListener("resize", __privateGet(this, _resizeTabRef));
    if (__privateGet(this, _tabArrow)) {
      __privateSet(this, _arrowRef, __privateMethod(this, _toggleArrowMode, toggleArrowMode_fn).bind(this));
      window.addEventListener("resize", __privateGet(this, _arrowRef));
      __privateSet(this, _scrollLeftRef, __privateMethod(this, _scrollLeft, scrollLeft_fn).bind(this));
      __privateSet(this, _scrollRightRef, __privateMethod(this, _scrollRight, scrollRight_fn).bind(this));
      __privateGet(this, _leftArrow).addEventListener("click", __privateGet(this, _scrollLeftRef));
      __privateGet(this, _rightArrow).addEventListener("click", __privateGet(this, _scrollRightRef));
    }
  }
  removeListeners() {
    __privateGet(this, _tabLinks).forEach((item) => {
      item.removeEventListener("click", item.listenerRef);
      item.listenerRef = void 0;
    });
    window.removeEventListener("resize", __privateGet(this, _resizeTabRef));
    __privateSet(this, _resizeTabRef, void 0);
    if (__privateGet(this, _tabArrow)) {
      window.removeEventListener("resize", __privateGet(this, _arrowRef));
      __privateSet(this, _arrowRef, void 0);
      __privateGet(this, _leftArrow).removeEventListener("click", __privateGet(this, _scrollLeftRef));
      __privateGet(this, _rightArrow).removeEventListener("click", __privateGet(this, _scrollRightRef));
      __privateSet(this, _scrollLeftRef, void 0);
      __privateSet(this, _scrollRightRef, void 0);
    }
    if (__privateGet(this, _caroulixSlideRef)) {
      this.el.removeEventListener("ax.caroulix.slide", __privateGet(this, _caroulixSlideRef));
      __privateSet(this, _caroulixSlideRef, void 0);
    }
  }
  select(itemId) {
    if (__privateGet(this, _isAnimated7))
      return;
    __privateSet(this, _isAnimated7, true);
    const menuItem = this.el.querySelector('.tab-menu a[href="#' + itemId + '"]');
    __privateSet(this, _currentItemIndex, Array.from(__privateGet(this, _tabLinks)).findIndex((item) => item.children[0] === menuItem));
    createEvent(menuItem, "tab.select", { currentIndex: __privateGet(this, _currentItemIndex) });
    __privateMethod(this, _setActiveElement, setActiveElement_fn).call(this, menuItem.parentElement);
    if (__privateGet(this, _tabCaroulixInit)) {
      __privateGet(this, _tabItems).forEach((item) => item.id === itemId ? item.classList.add("active") : "");
      const caroulixClass = getComponentClass("Caroulix");
      __privateSet(this, _caroulixInstance, new caroulixClass("#" + __privateGet(this, _tabCaroulix).id, this.options.caroulix, this.el, true));
      __privateSet(this, _caroulixSlideRef, __privateMethod(this, _handleCaroulixSlide, handleCaroulixSlide_fn).bind(this));
      this.el.addEventListener("ax.caroulix.slide", __privateGet(this, _caroulixSlideRef));
      __privateSet(this, _tabCaroulixInit, false);
      __privateSet(this, _isAnimated7, false);
      return;
    }
    if (this.options.animationType === "slide") {
      const nb = __privateGet(this, _tabItems).findIndex((item) => item.id === itemId);
      __privateGet(this, _caroulixInstance).goTo(nb);
      setTimeout(() => {
        __privateSet(this, _isAnimated7, false);
      }, this.options.animationDuration);
    } else {
      __privateMethod(this, _hideContent, hideContent_fn).call(this);
      __privateGet(this, _tabItems).forEach((item) => {
        if (item.id === itemId)
          item.style.display = "block";
      });
      __privateSet(this, _isAnimated7, false);
    }
  }
  updateActiveElement() {
    let itemSelected;
    __privateGet(this, _tabLinks).forEach((item, index) => {
      if (item.classList.contains("active")) {
        itemSelected = item;
        __privateSet(this, _currentItemIndex, index);
      }
    });
    if (!itemSelected) {
      itemSelected = __privateGet(this, _tabLinks).item(0);
      __privateSet(this, _currentItemIndex, 0);
    }
    const target = itemSelected.children[0].getAttribute("href");
    this.select(target.split("#")[1]);
  }
  prev(step = 1) {
    if (__privateGet(this, _isAnimated7))
      return;
    const previousItemIndex = __privateMethod(this, _getPreviousItemIndex, getPreviousItemIndex_fn).call(this, step);
    __privateSet(this, _currentItemIndex, previousItemIndex);
    createEvent(this.el, "tab.prev", { step });
    const target = __privateGet(this, _tabLinks)[previousItemIndex].children[0].getAttribute("href");
    this.select(target.split("#")[1]);
  }
  next(step = 1) {
    if (__privateGet(this, _isAnimated7))
      return;
    const nextItemIndex = __privateMethod(this, _getNextItemIndex, getNextItemIndex_fn).call(this, step);
    __privateSet(this, _currentItemIndex, nextItemIndex);
    createEvent(this.el, "tab.next", { step });
    const target = __privateGet(this, _tabLinks)[nextItemIndex].children[0].getAttribute("href");
    this.select(target.split("#")[1]);
  }
}
_tabArrow = new WeakMap();
_tabLinks = new WeakMap();
_tabMenu = new WeakMap();
_currentItemIndex = new WeakMap();
_leftArrow = new WeakMap();
_rightArrow = new WeakMap();
_scrollLeftRef = new WeakMap();
_scrollRightRef = new WeakMap();
_arrowRef = new WeakMap();
_caroulixSlideRef = new WeakMap();
_resizeTabRef = new WeakMap();
_tabItems = new WeakMap();
_tabCaroulix = new WeakMap();
_tabCaroulixInit = new WeakMap();
_caroulixInstance = new WeakMap();
_isAnimated7 = new WeakMap();
_handleResizeEvent = new WeakSet();
handleResizeEvent_fn = function() {
  this.updateActiveElement();
  for (let i = 100; i < 500; i += 100) {
    setTimeout(() => {
      this.updateActiveElement();
    }, i);
  }
};
_handleCaroulixSlide = new WeakSet();
handleCaroulixSlide_fn = function() {
  if (__privateGet(this, _currentItemIndex) !== __privateGet(this, _caroulixInstance).activeIndex) {
    __privateSet(this, _currentItemIndex, __privateGet(this, _caroulixInstance).activeIndex);
    __privateMethod(this, _setActiveElement, setActiveElement_fn).call(this, __privateGet(this, _tabLinks)[__privateGet(this, _currentItemIndex)]);
  }
};
_getItems = new WeakSet();
getItems_fn = function() {
  return Array.from(__privateGet(this, _tabLinks)).map((link) => {
    const id = link.children[0].getAttribute("href");
    return this.el.querySelector(id);
  });
};
_hideContent = new WeakSet();
hideContent_fn = function() {
  __privateGet(this, _tabItems).forEach((item) => item.style.display = "none");
};
_enableSlideAnimation = new WeakSet();
enableSlideAnimation_fn = function() {
  __privateGet(this, _tabItems).forEach((item) => item.classList.add("caroulix-item"));
  __privateSet(this, _tabCaroulix, wrap(__privateGet(this, _tabItems)));
  __privateGet(this, _tabCaroulix).classList.add("caroulix");
  const nb = Math.random().toString().split(".")[1];
  __privateGet(this, _tabCaroulix).id = "tab-caroulix-" + nb;
  __privateSet(this, _tabCaroulixInit, true);
  if (this.options.animationDuration !== 300)
    this.options.caroulix.animationDuration = this.options.animationDuration;
  this.updateActiveElement();
};
_setActiveElement = new WeakSet();
setActiveElement_fn = function(element) {
  __privateGet(this, _tabLinks).forEach((item) => item.classList.remove("active"));
  if (!this.options.disableActiveBar) {
    const elementRect = element.getBoundingClientRect();
    const elementPosLeft = elementRect.left;
    const menuPosLeft = __privateGet(this, _tabMenu).getBoundingClientRect().left;
    const left = elementPosLeft - menuPosLeft + __privateGet(this, _tabMenu).scrollLeft;
    const elementWidth = elementRect.width;
    const right = __privateGet(this, _tabMenu).clientWidth - left - elementWidth;
    __privateGet(this, _tabMenu).style.setProperty(getCssVar("tab-bar-left-offset"), Math.floor(left) + "px");
    __privateGet(this, _tabMenu).style.setProperty(getCssVar("tab-bar-right-offset"), Math.ceil(right) + "px");
  }
  element.classList.add("active");
};
_toggleArrowMode = new WeakSet();
toggleArrowMode_fn = function() {
  const totalWidth = Array.from(__privateGet(this, _tabLinks)).reduce((acc, element) => {
    acc += element.clientWidth;
    return acc;
  }, 0);
  const arrowWidth = __privateGet(this, _tabArrow).clientWidth;
  if (totalWidth > arrowWidth) {
    if (!__privateGet(this, _tabArrow).classList.contains("tab-arrow-show"))
      __privateGet(this, _tabArrow).classList.add("tab-arrow-show");
  } else {
    if (__privateGet(this, _tabArrow).classList.contains("tab-arrow-show"))
      __privateGet(this, _tabArrow).classList.remove("tab-arrow-show");
  }
};
_scrollLeft = new WeakSet();
scrollLeft_fn = function(e) {
  e.preventDefault();
  __privateGet(this, _tabMenu).scrollLeft -= 40;
};
_scrollRight = new WeakSet();
scrollRight_fn = function(e) {
  e.preventDefault();
  __privateGet(this, _tabMenu).scrollLeft += 40;
};
_onClickItem = new WeakSet();
onClickItem_fn = function(item, e) {
  e.preventDefault();
  if (__privateGet(this, _isAnimated7) || item.classList.contains("active"))
    return;
  const target = item.children[0].getAttribute("href");
  this.select(target.split("#")[1]);
};
_getPreviousItemIndex = new WeakSet();
getPreviousItemIndex_fn = function(step) {
  let previousItemIndex = 0;
  let index = __privateGet(this, _currentItemIndex);
  for (let i = 0; i < step; i++) {
    if (index > 0) {
      previousItemIndex = index - 1;
      index--;
    } else {
      index = __privateGet(this, _tabLinks).length - 1;
      previousItemIndex = index;
    }
  }
  return previousItemIndex;
};
_getNextItemIndex = new WeakSet();
getNextItemIndex_fn = function(step) {
  let nextItemIndex = 0;
  let index = __privateGet(this, _currentItemIndex);
  for (let i = 0; i < step; i++) {
    if (index < __privateGet(this, _tabLinks).length - 1) {
      nextItemIndex = index + 1;
      index++;
    } else {
      index = 0;
      nextItemIndex = index;
    }
  }
  return nextItemIndex;
};
__publicField(Tab, "getDefaultOptions", () => TabOptions);
registerComponent({
  class: Tab,
  name: "Tab",
  dataDetection: true,
  autoInit: {
    enabled: true,
    selector: ".tab"
  }
});
const ScrollSpyOptions = {
  offset: 200,
  linkSelector: "a",
  classes: "active",
  auto: {
    enabled: false,
    classes: "",
    selector: ""
  }
};
class ScrollSpy extends AxentixComponent {
  constructor(element, options) {
    super();
    __privateAdd(this, _setupBasic);
    __privateAdd(this, _setupAuto);
    __privateAdd(this, _getElement);
    __privateAdd(this, _removeOldLink);
    __privateAdd(this, _getClosestElem);
    __privateAdd(this, _update);
    __publicField(this, "options");
    __privateAdd(this, _oldLink, void 0);
    __privateAdd(this, _updateRef, void 0);
    __privateAdd(this, _links, void 0);
    __privateAdd(this, _elements, void 0);
    try {
      this.preventDbInstance(element);
      instances.push({ type: "ScrollSpy", instance: this });
      this.el = document.querySelector(element);
      this.options = getComponentOptions("ScrollSpy", options, this.el);
      this.setup();
    } catch (error) {
      console.error("[Axentix] ScrollSpy init error", error);
    }
  }
  setup() {
    createEvent(this.el, "scrollspy.setup");
    if (this.options.auto.enabled)
      __privateMethod(this, _setupAuto, setupAuto_fn).call(this);
    else
      __privateMethod(this, _setupBasic, setupBasic_fn).call(this);
    if (typeof this.options.classes === "string")
      this.options.classes = this.options.classes.split(" ");
    __privateSet(this, _oldLink, "");
    this.setupListeners();
    __privateMethod(this, _update, update_fn).call(this);
  }
  setupListeners() {
    __privateSet(this, _updateRef, __privateMethod(this, _update, update_fn).bind(this));
    window.addEventListener("scroll", __privateGet(this, _updateRef));
    window.addEventListener("resize", __privateGet(this, _updateRef));
  }
  removeListeners() {
    window.removeEventListener("scroll", __privateGet(this, _updateRef));
    window.removeEventListener("resize", __privateGet(this, _updateRef));
    __privateSet(this, _updateRef, void 0);
  }
}
_oldLink = new WeakMap();
_updateRef = new WeakMap();
_links = new WeakMap();
_elements = new WeakMap();
_setupBasic = new WeakSet();
setupBasic_fn = function() {
  __privateSet(this, _links, Array.from(this.el.querySelectorAll(this.options.linkSelector)));
  __privateSet(this, _elements, __privateGet(this, _links).map((link) => document.querySelector(link.getAttribute("href"))));
};
_setupAuto = new WeakSet();
setupAuto_fn = function() {
  __privateSet(this, _elements, Array.from(document.querySelectorAll(this.options.auto.selector)));
  __privateSet(this, _links, __privateGet(this, _elements).map((el) => {
    const link = document.createElement("a");
    link.className = this.options.auto.classes;
    link.setAttribute("href", "#" + el.id);
    link.innerHTML = el.innerHTML;
    this.el.appendChild(link);
    return link;
  }));
};
_getElement = new WeakSet();
getElement_fn = function() {
  const top = window.scrollY, left = window.scrollX, right = window.innerWidth, bottom = window.innerHeight, topBreakpoint = top + this.options.offset;
  if (bottom + top >= document.body.offsetHeight - 2)
    return __privateGet(this, _elements)[__privateGet(this, _elements).length - 1];
  return __privateGet(this, _elements).find((el) => {
    const elRect = el.getBoundingClientRect();
    return elRect.top + top >= top && elRect.left + left >= left && elRect.right <= right && elRect.bottom <= bottom && elRect.top + top <= topBreakpoint;
  });
};
_removeOldLink = new WeakSet();
removeOldLink_fn = function() {
  if (!__privateGet(this, _oldLink))
    return;
  this.options.classes.forEach((cl) => __privateGet(this, _oldLink).classList.remove(cl));
};
_getClosestElem = new WeakSet();
getClosestElem_fn = function() {
  const top = window.scrollY;
  return __privateGet(this, _elements).reduce((prev, curr) => {
    const currTop = curr.getBoundingClientRect().top + top;
    const prevTop = prev.getBoundingClientRect().top + top;
    if (currTop > top + this.options.offset)
      return prev;
    else if (Math.abs(currTop - top) < Math.abs(prevTop - top))
      return curr;
    return prev;
  });
};
_update = new WeakSet();
update_fn = function() {
  let element = __privateMethod(this, _getElement, getElement_fn).call(this);
  if (!element)
    element = __privateMethod(this, _getClosestElem, getClosestElem_fn).call(this);
  const link = __privateGet(this, _links).find((l) => l.getAttribute("href").split("#")[1] === element.id);
  if (link === __privateGet(this, _oldLink))
    return;
  createEvent(this.el, "scrollspy.update");
  __privateMethod(this, _removeOldLink, removeOldLink_fn).call(this);
  this.options.classes.forEach((cl) => link.classList.add(cl));
  __privateSet(this, _oldLink, link);
};
__publicField(ScrollSpy, "getDefaultOptions", () => ScrollSpyOptions);
registerComponent({
  class: ScrollSpy,
  name: "ScrollSpy",
  dataDetection: true,
  autoInit: {
    enabled: true,
    selector: ".scrollspy"
  }
});
var toast = "";
const ToastOptions = {
  animationDuration: 400,
  duration: 4e3,
  classes: "",
  position: "right",
  direction: "top",
  mobileDirection: "bottom",
  offset: { x: "5%", y: "0%", mobileX: "10%", mobileY: "0%" },
  isClosable: false,
  closableContent: "x",
  loading: {
    enabled: true,
    border: "2px solid #E2E2E2"
  }
};
const _Toast = class {
  constructor(content, options) {
    __privateAdd(this, _createToaster);
    __privateAdd(this, _removeToaster);
    __privateAdd(this, _fadeInToast);
    __privateAdd(this, _fadeOutToast);
    __privateAdd(this, _animOut);
    __privateAdd(this, _createToast);
    __privateAdd(this, _hide);
    __publicField(this, "options");
    __publicField(this, "id");
    __privateAdd(this, _content, void 0);
    __privateAdd(this, _toasters, void 0);
    if (getInstanceByType("Toast").length > 0) {
      console.error("[Axentix] Toast: Don't try to create multiple toast instances");
      return;
    }
    instances.push({ type: "Toast", instance: this });
    this.id = Math.random().toString().split(".")[1];
    __privateSet(this, _content, content);
    this.options = extend(_Toast.getDefaultOptions(), options);
    this.options.position = this.options.position.toLowerCase();
    this.options.direction = this.options.direction.toLowerCase();
    this.options.mobileDirection = this.options.mobileDirection.toLowerCase();
    __privateSet(this, _toasters, {});
  }
  destroy() {
    const index = instances.findIndex((ins) => ins.instance.id === this.id);
    instances.splice(index, 1);
  }
  show() {
    try {
      if (!Object.keys(__privateGet(this, _toasters)).includes(this.options.position))
        __privateMethod(this, _createToaster, createToaster_fn).call(this);
      __privateMethod(this, _createToast, createToast_fn).call(this);
    } catch (error) {
      console.error("[Axentix] Toast error", error);
    }
  }
  change(content, options) {
    __privateSet(this, _content, content);
    this.options = extend(this.options, options);
  }
};
let Toast = _Toast;
_content = new WeakMap();
_toasters = new WeakMap();
_createToaster = new WeakSet();
createToaster_fn = function() {
  let toaster = document.createElement("div");
  const positionList = ["right", "left"];
  if (!positionList.includes(this.options.position))
    this.options.position = "right";
  if (this.options.position === "right")
    toaster.style.right = this.options.offset.x;
  else
    toaster.style.left = this.options.offset.x;
  const directionList = ["bottom", "top"];
  if (!directionList.includes(this.options.direction))
    this.options.direction = "top";
  if (this.options.direction === "top")
    toaster.style.top = this.options.offset.y;
  else
    toaster.style.bottom = this.options.offset.y;
  if (!directionList.includes(this.options.mobileDirection))
    this.options.mobileDirection = "bottom";
  toaster.style.setProperty(getCssVar("toaster-m-width"), 100 - this.options.offset.mobileX.slice(0, -1) + "%");
  toaster.style.setProperty(getCssVar("toaster-m-offset"), this.options.offset.mobileY);
  if (this.options.loading.enabled)
    toaster.style.setProperty(getCssVar("toast-loading-border"), this.options.loading.border);
  toaster.className = `toaster toaster-${this.options.position} toast-${this.options.direction} toaster-m-${this.options.mobileDirection}`;
  __privateGet(this, _toasters)[this.options.position] = toaster;
  document.body.appendChild(toaster);
};
_removeToaster = new WeakSet();
removeToaster_fn = function() {
  for (const key in __privateGet(this, _toasters)) {
    let toaster = __privateGet(this, _toasters)[key];
    if (toaster.childElementCount <= 0) {
      toaster.remove();
      delete __privateGet(this, _toasters)[key];
    }
  }
};
_fadeInToast = new WeakSet();
fadeInToast_fn = function(toast2) {
  setTimeout(() => {
    createEvent(toast2, "toast.show");
    if (this.options.loading.enabled) {
      toast2.classList.add("toast-loading");
      toast2.style.setProperty(getCssVar("toast-loading-duration"), this.options.duration + "ms");
    }
    toast2.classList.add("toast-animated");
    setTimeout(() => {
      createEvent(toast2, "toast.shown");
      if (this.options.loading.enabled)
        toast2.classList.add("toast-load");
    }, this.options.animationDuration);
  }, 50);
};
_fadeOutToast = new WeakSet();
fadeOutToast_fn = function(toast2) {
  setTimeout(() => {
    createEvent(toast2, "toast.hide");
    __privateMethod(this, _hide, hide_fn).call(this, toast2);
  }, this.options.duration + this.options.animationDuration);
};
_animOut = new WeakSet();
animOut_fn = function(toast2) {
  toast2.style.transitionTimingFunction = "cubic-bezier(0.445, 0.05, 0.55, 0.95)";
  toast2.style.paddingTop = "0";
  toast2.style.paddingBottom = "0";
  toast2.style.margin = "0";
  toast2.style.height = "0";
};
_createToast = new WeakSet();
createToast_fn = function() {
  let toast2 = document.createElement("div");
  toast2.className = "toast shadow-1 " + this.options.classes;
  toast2.innerHTML = __privateGet(this, _content);
  toast2.style.transitionDuration = this.options.animationDuration + "ms";
  if (this.options.isClosable) {
    let trigger = document.createElement("div");
    trigger.className = "toast-trigger";
    trigger.innerHTML = this.options.closableContent;
    trigger.listenerRef = __privateMethod(this, _hide, hide_fn).bind(this, toast2, trigger);
    trigger.addEventListener("click", trigger.listenerRef);
    toast2.appendChild(trigger);
  }
  __privateMethod(this, _fadeInToast, fadeInToast_fn).call(this, toast2);
  __privateGet(this, _toasters)[this.options.position].appendChild(toast2);
  __privateMethod(this, _fadeOutToast, fadeOutToast_fn).call(this, toast2);
  const height = toast2.clientHeight;
  toast2.style.height = height + "px";
};
_hide = new WeakSet();
hide_fn = function(toast2, trigger, e) {
  if (toast2.isAnimated)
    return;
  let timer = 1;
  if (e) {
    e.preventDefault();
    timer = 0;
    if (this.options.isClosable)
      trigger.removeEventListener("click", trigger.listenerRef);
  }
  toast2.style.opacity = "0";
  toast2.isAnimated = true;
  const delay = timer * this.options.animationDuration + this.options.animationDuration;
  setTimeout(() => {
    __privateMethod(this, _animOut, animOut_fn).call(this, toast2);
  }, delay / 2);
  setTimeout(() => {
    toast2.remove();
    createEvent(toast2, "toast.remove");
    __privateMethod(this, _removeToaster, removeToaster_fn).call(this);
  }, delay * 1.45);
};
__publicField(Toast, "getDefaultOptions", () => ToastOptions);
registerComponent({
  class: Toast,
  name: "Toast"
});
var tooltip = "";
const TooltipOptions = {
  content: "",
  animationDelay: 0,
  offset: "10px",
  animationDuration: 200,
  classes: "grey dark-4 light-shadow-2 p-2",
  position: "top"
};
class Tooltip extends AxentixComponent {
  constructor(element, options) {
    super();
    __privateAdd(this, _setProperties2);
    __privateAdd(this, _setBasicPosition);
    __privateAdd(this, _manualTransform);
    __privateAdd(this, _onHover);
    __privateAdd(this, _onHoverOut);
    __publicField(this, "options");
    __privateAdd(this, _tooltip, void 0);
    __privateAdd(this, _positionList, void 0);
    __privateAdd(this, _listenerEnterRef, void 0);
    __privateAdd(this, _listenerLeaveRef, void 0);
    __privateAdd(this, _listenerResizeRef, void 0);
    __privateAdd(this, _timeoutRef, void 0);
    __privateAdd(this, _elRect, void 0);
    __privateAdd(this, _tooltipRect, void 0);
    try {
      this.preventDbInstance(element);
      instances.push({ type: "Tooltip", instance: this });
      this.el = document.querySelector(element);
      this.options = getComponentOptions("Tooltip", options, this.el);
      this.setup();
    } catch (error) {
      console.error("[Axentix] Tooltip init error", error);
    }
  }
  setup() {
    if (!this.options.content)
      return console.error(`Tooltip #${this.el.id} : empty content.`);
    createEvent(this.el, "tooltip.setup");
    this.options.position = this.options.position.toLowerCase();
    const tooltips = document.querySelectorAll(".tooltip");
    tooltips.forEach((tooltip2) => {
      if (tooltip2.dataset.tooltipId && tooltip2.dataset.tooltipId === this.el.id)
        __privateSet(this, _tooltip, tooltip2);
    });
    if (!__privateGet(this, _tooltip))
      __privateSet(this, _tooltip, document.createElement("div"));
    if (__privateGet(this, _tooltip).dataset.tooltipId !== this.el.id)
      __privateGet(this, _tooltip).dataset.tooltipId = this.el.id;
    __privateMethod(this, _setProperties2, setProperties_fn2).call(this);
    document.body.appendChild(__privateGet(this, _tooltip));
    __privateSet(this, _positionList, ["right", "left", "top", "bottom"]);
    if (!__privateGet(this, _positionList).includes(this.options.position))
      this.options.position = "top";
    this.setupListeners();
    this.updatePosition();
    __privateGet(this, _tooltip).style.display = "none";
  }
  setupListeners() {
    __privateSet(this, _listenerEnterRef, __privateMethod(this, _onHover, onHover_fn).bind(this));
    __privateSet(this, _listenerLeaveRef, __privateMethod(this, _onHoverOut, onHoverOut_fn).bind(this));
    __privateSet(this, _listenerResizeRef, this.updatePosition.bind(this));
    this.el.addEventListener("mouseenter", __privateGet(this, _listenerEnterRef));
    this.el.addEventListener("mouseleave", __privateGet(this, _listenerLeaveRef));
    window.addEventListener("resize", __privateGet(this, _listenerResizeRef));
  }
  removeListeners() {
    this.el.removeEventListener("mouseenter", __privateGet(this, _listenerEnterRef));
    this.el.removeEventListener("mouseleave", __privateGet(this, _listenerLeaveRef));
    window.removeEventListener("resize", __privateGet(this, _listenerResizeRef));
    __privateSet(this, _listenerEnterRef, void 0);
    __privateSet(this, _listenerLeaveRef, void 0);
    __privateSet(this, _listenerResizeRef, void 0);
  }
  updatePosition() {
    __privateSet(this, _elRect, this.el.getBoundingClientRect());
    __privateMethod(this, _setBasicPosition, setBasicPosition_fn).call(this);
    __privateSet(this, _tooltipRect, __privateGet(this, _tooltip).getBoundingClientRect());
    __privateMethod(this, _manualTransform, manualTransform_fn).call(this);
  }
  show() {
    __privateGet(this, _tooltip).style.display = "block";
    this.updatePosition();
    clearTimeout(__privateGet(this, _timeoutRef));
    __privateSet(this, _timeoutRef, setTimeout(() => {
      createEvent(this.el, "tooltip.show");
      const negativity = this.options.position == "top" || this.options.position == "left" ? "-" : "";
      const verticality = this.options.position == "top" || this.options.position == "bottom" ? "Y" : "X";
      __privateGet(this, _tooltip).style.transform = `translate${verticality}(${negativity}${this.options.offset})`;
      __privateGet(this, _tooltip).style.opacity = "1";
    }, this.options.animationDelay));
  }
  hide() {
    createEvent(this.el, "tooltip.hide");
    clearTimeout(__privateGet(this, _timeoutRef));
    __privateGet(this, _tooltip).style.transform = "translate(0)";
    __privateGet(this, _tooltip).style.opacity = "0";
    __privateSet(this, _timeoutRef, setTimeout(() => {
      __privateGet(this, _tooltip).style.display = "none";
    }, this.options.animationDuration));
  }
  change(options) {
    this.options = getComponentOptions("Tooltip", options, this.el);
    if (!__privateGet(this, _positionList).includes(this.options.position))
      this.options.position = "top";
    __privateMethod(this, _setProperties2, setProperties_fn2).call(this);
    this.updatePosition();
  }
}
_tooltip = new WeakMap();
_positionList = new WeakMap();
_listenerEnterRef = new WeakMap();
_listenerLeaveRef = new WeakMap();
_listenerResizeRef = new WeakMap();
_timeoutRef = new WeakMap();
_elRect = new WeakMap();
_tooltipRect = new WeakMap();
_setProperties2 = new WeakSet();
setProperties_fn2 = function() {
  __privateGet(this, _tooltip).style.transform = "translate(0)";
  __privateGet(this, _tooltip).style.opacity = "0";
  __privateGet(this, _tooltip).className = "tooltip " + this.options.classes;
  __privateGet(this, _tooltip).style.transitionDuration = this.options.animationDuration + "ms";
  __privateGet(this, _tooltip).innerHTML = this.options.content;
};
_setBasicPosition = new WeakSet();
setBasicPosition_fn = function() {
  const isVerticalSide = this.options.position == "top" || this.options.position == "bottom";
  if (isVerticalSide) {
    const top = this.options.position === "top" ? __privateGet(this, _elRect).top : __privateGet(this, _elRect).top + __privateGet(this, _elRect).height;
    __privateGet(this, _tooltip).style.top = top + "px";
  } else if (this.options.position == "right") {
    __privateGet(this, _tooltip).style.left = __privateGet(this, _elRect).left + __privateGet(this, _elRect).width + "px";
  }
};
_manualTransform = new WeakSet();
manualTransform_fn = function() {
  const isVerticalSide = this.options.position == "top" || this.options.position == "bottom";
  if (isVerticalSide) {
    __privateGet(this, _tooltip).style.left = __privateGet(this, _elRect).left + __privateGet(this, _elRect).width / 2 - __privateGet(this, _tooltipRect).width / 2 + "px";
  } else {
    __privateGet(this, _tooltip).style.top = __privateGet(this, _elRect).top + __privateGet(this, _elRect).height / 2 - __privateGet(this, _tooltipRect).height / 2 + "px";
  }
  if (this.options.position == "top") {
    __privateGet(this, _tooltip).style.top = __privateGet(this, _tooltipRect).top - __privateGet(this, _tooltipRect).height + "px";
  } else if (this.options.position == "left") {
    __privateGet(this, _tooltip).style.left = __privateGet(this, _elRect).left - __privateGet(this, _tooltipRect).width + "px";
  }
  const scrollY = window.scrollY;
  const tooltipTop = parseFloat(__privateGet(this, _tooltip).style.top);
  if (this.options.position === "top")
    __privateGet(this, _tooltip).style.top = scrollY * 2 + tooltipTop + "px";
  else
    __privateGet(this, _tooltip).style.top = scrollY + tooltipTop + "px";
};
_onHover = new WeakSet();
onHover_fn = function(e) {
  e.preventDefault();
  this.show();
};
_onHoverOut = new WeakSet();
onHoverOut_fn = function(e) {
  e.preventDefault();
  this.hide();
};
__publicField(Tooltip, "getDefaultOptions", () => TooltipOptions);
registerComponent({
  class: Tooltip,
  name: "Tooltip",
  dataDetection: true
});
var waves = "";
let pointerType = "";
const targetMap = {};
const itemMap = {};
const createWaveItem = (target) => {
  const id = getUid();
  const el = document.createElement("div");
  const container = document.createElement("div");
  const tagName = target.tagName.toLowerCase();
  target.setAttribute("data-waves-id", id);
  container.classList.add("data-waves-item-inner");
  container.setAttribute("data-waves-id", id);
  el.classList.add("data-waves-box");
  el.setAttribute("data-waves-id", id);
  el.appendChild(container);
  targetMap[id] = target;
  itemMap[id] = el;
  if (["img", "video"].includes(tagName))
    target.parentNode.appendChild(el);
  else
    target.appendChild(el);
  return el;
};
const createWaves = ({ id, size, x, y, container, item, target }, color) => {
  const waves2 = document.createElement("span");
  let style = `height:${size}px;
           width:${size}px;
           left:${x}px;
           top:${y}px;`;
  if (color)
    style += `${getCssVar("waves-color")}: ${color}`;
  waves2.setAttribute("data-waves-id", id);
  waves2.classList.add("data-waves-item");
  waves2.setAttribute("style", style);
  waves2.addEventListener("animationend", () => {
    container.removeChild(waves2);
    if (!container.children.length && item) {
      if (item.parentNode)
        item.parentNode.removeChild(item);
      target.removeAttribute("data-waves-id");
      delete itemMap[id];
      delete targetMap[id];
    }
  }, { once: true });
  return waves2;
};
const getWavesParams = (clientX, clientY, id, target) => {
  const { top, left, width, height } = target.getBoundingClientRect();
  const x = clientX - left;
  const y = clientY - top;
  let item = itemMap[id];
  if (!item)
    item = createWaveItem(target);
  id = item.getAttribute("data-waves-id") || getUid();
  const container = item.children[0];
  const size = __pow(__pow(Math.max(left + width - clientX, clientX - left), 2) + __pow(Math.max(top + height - clientY, clientY - top), 2), 0.5) * 2;
  return { id, size, x, y, container, item, target };
};
const getContainerStyle = (target, item) => {
  const { left, top, width, height } = target.getBoundingClientRect();
  const { left: itemLeft, top: itemTop } = item.getBoundingClientRect();
  const { borderRadius, zIndex } = window.getComputedStyle(target);
  return `left:${left - itemLeft}px;
          top:${top - itemTop}px;
          height:${height}px;
          width:${width}px;
          border-radius:${borderRadius || "0"};
          z-index:${zIndex};`;
};
const getTarget = (el, id) => {
  const target = targetMap[id];
  if (target)
    return target;
  if (el.getAttribute("data-waves") !== null)
    return el;
  return el.closest("[data-waves]") || null;
};
const handler = (e) => {
  const el = e.target;
  const id = el.getAttribute("data-waves-id") || "";
  const target = getTarget(el, id);
  if (!target || target.getAttribute("disabled"))
    return;
  const color = target.getAttribute("data-waves");
  let { clientX, clientY } = e;
  if (pointerType === "touch") {
    const click = e.touches[0];
    clientX = click.clientX;
    clientY = click.clientY;
  }
  const params = getWavesParams(clientX, clientY, id, target);
  const waves2 = createWaves(params, color);
  const { container, item } = params;
  container.setAttribute("style", getContainerStyle(target, item));
  container.appendChild(waves2);
};
const Waves = () => {
  pointerType = getPointerType();
  const eventType = `${pointerType}${pointerType === "touch" ? "start" : "down"}`;
  window.addEventListener(eventType, handler);
};
document.addEventListener("DOMContentLoaded", () => Waves());
var forms = "";
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
const validateAll = (form, reset2) => {
  const inputs = form.querySelectorAll(`[data-form-validate]`);
  if (reset2) {
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
    __privateAdd(this, _container2, void 0);
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
    __privateSet(this, _container2, wrap([this.el]));
    __privateGet(this, _container2).className = "form-custom-select";
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
    unwrap(__privateGet(this, _container2));
    this.el.classList.add("form-custom-select");
    this.el.style.display = "";
  }
}
_dropdownInstance = new WeakMap();
_container2 = new WeakMap();
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
    __privateGet(this, _container2).append(__privateGet(this, _input));
    __privateMethod(this, _setupContent, setupContent_fn).call(this, dropdownContent);
    return;
  }
  __privateSet(this, _clickRef, __privateMethod(this, _setFocusedClass, setFocusedClass_fn).bind(this));
  const dropdown2 = document.createElement("div");
  dropdown2.className = "dropdown";
  dropdown2.id = uid;
  dropdown2.addEventListener("ax.dropdown.open", __privateGet(this, _clickRef));
  dropdown2.addEventListener("ax.dropdown.close", __privateGet(this, _clickRef));
  Array.from(this.el.attributes).forEach((a) => {
    if (a.name.startsWith("data-dropdown"))
      dropdown2.setAttribute(a.name, a.value);
  });
  dropdown2.append(__privateGet(this, _input));
  dropdown2.append(dropdownContent);
  __privateGet(this, _container2).append(dropdown2);
  __privateMethod(this, _setupContent, setupContent_fn).call(this, dropdownContent);
  const dropdownClass = getComponentClass("Dropdown");
  __privateSet(this, _dropdownInstance, new dropdownClass(`#${uid}`, {
    closeOnClick: !this.el.multiple,
    preventViewport: true
  }));
  const zindex = window.getComputedStyle(dropdown2).zIndex;
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
var _colors = "";
class Axentix$1 {
  constructor(component, options) {
    __privateAdd(this, _init);
    __privateAdd(this, _detectIds);
    __privateAdd(this, _instanciate);
    __publicField(this, "component");
    __publicField(this, "isAll");
    __publicField(this, "options");
    this.component = component[0].toUpperCase() + component.slice(1).toLowerCase();
    this.isAll = component === "all" ? true : false;
    this.options = this.isAll ? {} : options;
    __privateMethod(this, _init, init_fn).call(this);
  }
}
_init = new WeakSet();
init_fn = function() {
  const componentList = getAutoInitElements();
  const isInList = componentList.hasOwnProperty(this.component);
  if (isInList) {
    const ids = __privateMethod(this, _detectIds, detectIds_fn).call(this, componentList[this.component]);
    __privateMethod(this, _instanciate, instanciate_fn).call(this, ids, this.component);
  } else if (this.isAll) {
    Object.keys(componentList).forEach((component) => {
      const ids = __privateMethod(this, _detectIds, detectIds_fn).call(this, componentList[component]);
      if (ids.length > 0)
        __privateMethod(this, _instanciate, instanciate_fn).call(this, ids, component);
    });
  }
};
_detectIds = new WeakSet();
detectIds_fn = function(component) {
  return Array.from(component).map((el) => "#" + el.id);
};
_instanciate = new WeakSet();
instanciate_fn = function(ids, component) {
  ids.forEach((id) => {
    const constructor = getComponentClass(component);
    const args = [id, this.options];
    try {
      new constructor(...args);
    } catch (error) {
      console.error("[Axentix] Unable to load " + component, error);
    }
  });
};
export { Axentix$1 as Axentix, Caroulix, Collapsible, Dropdown, Fab, Forms, Lightbox, Modal, ScrollSpy, Select, Sidenav, Tab, Toast, Tooltip, Waves, config, createEvent, createOverlay, destroy, destroyAll, exportToWindow, extend, getAllInstances, getAutoInitElements, getComponentClass, getComponentOptions, getCssVar, getDataElements, getInstance, getInstanceByType, getPointerType, getTriggers, getUid, instances, isPointerEnabled, isTouchEnabled, registerComponent, registerPlugin, reset, resetAll, sync, syncAll, unwrap, updateOverlay, version, wrap };
