export const EMAIL_REGEX = /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+))/;
export const ALPHABET_REGEX = /^[\p{L} ]+$/u;
export const NUMBER_REGEX = /^\d+$/;

export const ERROR_NUMBER_STEP = 0;
export const ERROR_NUMBER_MIN = 1;
export const ERROR_NUMBER_MAX = 2;
export const ERROR_REGEX = 4;
export const ERROR_REQUIRED = 5;
export const ERROR_EQUAL_WITH = 6;
export const ERROR_MIN = 7;
export const ERROR_MAX = 8;
export const ERROR_LENGTH = 9;


export default class Validate {
    stepErrorText = "";
    errorType;

    number_min_error = "lower that minimum";
    number_max_error = "higher that maximum";
    number_step_error = "not in allowed step";
    min_error = "lower that minimum length";
    max_error = "higher that maximum length";
    required_error = "this field is required";
    equal_with_error = "this field is not repeated properly";

    constructor(control) {
        this.control = control;
        this.formGroup = this.control.closest(".form-group");
        this.error = false;
        this.errors = [];
        try {
            this.errorElement = this.formGroup.querySelector(".error-message");
            this.textHelper = this.errorElement.getAttribute("helper-text");
        } catch (err) {
        }
    }

    set number_min_error(errorText) {
        this.number_min_error = errorText;
    }

    set number_max_error(errorText) {
        this.number_max_error = errorText;
    }

    set number_step_error(errorText) {
        this.number_step_error = errorText;
    }

    set min_error(errorText) {
        this.min_error = errorText;
    }

    set max_error(errorText) {
        this.max_error = errorText;
    }

    set required_error(errorText) {
        this.required_error = errorText;
    }

    set equal_with_error(errorText) {
        this.equal_with_error = errorText;
    }

    required(onEvent, requiredOnSubmit = false, submitButton = null) {
        if (typeof onEvent === "string") {
            this.control.addEventListener(onEvent, () => this.#required_validation(event));
        } else if (typeof onEvent === "object") {
            for (let e of onEvent) {
                this.control.addEventListener(e, () => this.#required_validation(event));
            }
        }
        if (requiredOnSubmit)
            submitButton.addEventListener("click", () => this.#required_validation(event));
    }

    regex(onEvent, regex, errorText) {
        if (typeof onEvent === "string") {
            this.control.addEventListener(onEvent, () => this.#regex_validate(event, regex, errorText));
        } else if (typeof onEvent === "object") {
            for (let e of onEvent)
                this.control.addEventListener(e, () => this.#regex_validate(event, regex, errorText));
        }
    }

    length(onEvent, min, max, errorText) {
        if (typeof onEvent === "string") {
            this.control.addEventListener(onEvent, () => this.#length_validation(event, min, max, errorText));
        } else if (typeof onEvent === "object") {
            for (let e of onEvent)
                this.control.addEventListener(e, () => this.#length_validation(event, min, max, errorText));
        }
    }

    min(onEvent, min, errorText) {
        if (typeof onEvent === "string") {
            this.control.addEventListener(onEvent, () => this.#min_validation(event, min, errorText));
        } else if (typeof onEvent === "object") {
            for (let e of onEvent)
                this.control.addEventListener(e, () => this.#min_validation(event, min, errorText));
        }
    }

    max(onEvent, max, errorText) {
        if (typeof onEvent === "string") {
            this.control.addEventListener(onEvent, () => this.#max_validation(event, max, errorText));
        } else if (typeof onEvent === "object") {
            for (let e of onEvent)
                this.control.addEventListener(e, () => this.#max_validation(event, max, errorText));
        }
    }

    step(onEvent, step, errorText) {
        if (typeof onEvent === "string") {
            this.control.addEventListener(onEvent, () => this.#step_validation(event, step, errorText));
        } else if (typeof onEvent === "object") {
            for (let e of onEvent)
                this.control.addEventListener(e, () => this.#step_validation(event, step, errorText));
        }
    }

    equal_with(onEvent, control, errorText) {
        if (typeof onEvent === "string") {
            this.control.addEventListener(onEvent, () => this.#equal_with_validation(event, control, errorText));
        } else if (typeof onEvent === "object") {
            for (let e of onEvent)
                this.control.addEventListener(e, () => this.#equal_with_validation(event, control, errorText));
        }
    }

    #regex_validate(event, regex, errorText) {
        if (regex.test(this.control.value)) {
            this.#set_validity(this.control, "false", ERROR_REGEX);
        } else {
            this.#set_validity(this.control, "true", ERROR_REGEX);
            this.errorElement.innerText = errorText;
        }
    }

    #length_validation(event, min, max, errorText) {
        if (this.control.value.length < min) {
            this.errorElement.innerText = errorText;
            this.#set_validity(this.control, "true", ERROR_LENGTH);
        } else if (this.control.value.length > max) {
            this.errorElement.innerText = errorText;
            this.#set_validity(this.control, "true", ERROR_LENGTH);
        } else {
            this.#set_validity(this.control, "false", ERROR_LENGTH);
        }
    }

    #min_validation(event, min, errorText) {
        if (this.control.value < min) {
            this.errorElement.innerText = errorText;
            this.#set_validity(this.control, "true", ERROR_NUMBER_MIN);
        } else {
            this.#set_validity(this.control, "false", ERROR_NUMBER_MIN);
        }
    }

    #max_validation(event, max, errorText) {
        if (this.control.value > max) {
            this.errorElement.innerText = errorText;
            this.#set_validity(this.control, "true", ERROR_NUMBER_MAX);
        } else {
            this.#set_validity(this.control, "false", ERROR_NUMBER_MAX);
        }
    }

    #step_validation(event, step, errorText) {
        if (this.control.value % step !== 0) {
            this.errorElement.innerText = errorText;
            this.#set_validity(this.control, "true", ERROR_NUMBER_STEP);
        } else {
            this.#set_validity(this.control, "false", ERROR_NUMBER_STEP);
        }
    }

    #equal_with_validation(event, equalWith, errorText) {
        if (this.control.value === equalWith.content) {
            this.#set_validity(this.control, "false", ERROR_EQUAL_WITH);
        } else {
            this.#set_validity(this.control, "true", ERROR_EQUAL_WITH);
            this.errorElement.innerText = errorText;
        }
    }

    #required_validation(event) {
        if (this.control.value === "") {
            this.#set_validity(this.control, "true", ERROR_REQUIRED);
            this.errorElement.innerText = "لطفا این فیلد را پر کنید.";
        } else {
            this.#set_validity(this.control, "false", ERROR_REQUIRED);
        }
    }

    #set_validity(control, error, errorType) {
        if (error === "true") {
            this.errorType = errorType;
            if (!this.errors.includes(errorType))
                this.errors.push(errorType);
            this.error = true;
        } else if (error === "false") {
            try {
                let index = this.errors.indexOf(errorType);
                if (index >= 0) this.errors.splice(index, 1);
            } catch (err) {
            }
        }
        if (this.errors.length === 0) {
            this.error = false;
            this.errorElement.innerText = this.textHelper;
        }
        this.control.setAttribute("error", this.error);
        this.errorElement.setAttribute("error", this.error);
    }
}

export class FormValidate {
    constructor(form, submitButtonSelector = "") {
        this.errorCount = 0;
        this.controls = [];
        this.submitButton = "";
        this.form = form;
        if (submitButtonSelector === "")
            submitButtonSelector = "#submit-button";
        this.submitButton = form.querySelector(submitButtonSelector);
    }

    get isValid() {
        this.errorCount = this.error_count;
        return this.errorCount === 0;
    }

    get error_count() {
        let errorCount = 0;
        for (let control of this.controls) {
            if (control.error === true)
                errorCount++;
        }
        return errorCount;
    }

    add_control(control) {
        this.controls.push(control);
    }

    validate_controls_on_button(onEvent, button = this.submitButton) {
        button.addEventListener(onEvent, () => this.#check_form_validate(event));
    }

    #check_form_validate(event) {
        if (this.isValid)
            this.form.submit();
    }
}