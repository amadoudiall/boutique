import './forms.scss';
export declare const Forms: {
    updateInputs: (inputElements?: NodeListOf<HTMLElement> | HTMLElement[]) => void;
    validateAll: (form: HTMLFormElement, reset?: boolean) => boolean;
};
