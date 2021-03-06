export declare const extend: (...args: any[]) => any;
export declare const getComponentOptions: (component: any, options: any, el: any) => any;
export declare const wrap: (target: any, wrapper?: HTMLDivElement) => HTMLDivElement;
export declare const unwrap: (wrapper: any) => any;
export declare const createEvent: (element: HTMLElement, eventName: string, extraData?: any) => void;
export declare const isTouchEnabled: () => boolean;
export declare const isPointerEnabled: () => boolean;
export declare const getPointerType: () => "touch" | "pointer" | "mouse";
export declare const getInstanceByType: (type: any) => any[];
export declare const getInstance: (element: any) => any;
export declare const getUid: () => string;
export declare const getAllInstances: () => any[];
export declare const sync: (element: any) => any;
export declare const syncAll: () => any[];
export declare const reset: (element: any) => any;
export declare const resetAll: () => any[];
export declare const destroy: (element: any) => any;
export declare const destroyAll: () => any[];
export declare const createOverlay: (isActive: any, overlay: any, id: any, animationDuration: any) => HTMLElement;
export declare const updateOverlay: (overlay: any, overlayElement: any, listenerRef: any, state: any, animationDuration: any) => void;
export declare const getTriggers: (id: string, query?: string) => Array<HTMLElement>;
