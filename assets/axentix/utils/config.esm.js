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
export { config, exportToWindow, getAutoInitElements, getComponentClass, getCssVar, getDataElements, instances, registerComponent, registerPlugin, version };
