export default class Validate {
    constructor(control) {
        this.control = control;
        this.formGroup = this.control.closest(".form-group");
        this.error = false;
        try {
            this.errorElement = this.formGroup.querySelector(".error-message");
            this.textHelper = this.errorElement.getAttribute("helper-text");
        } catch (err) {
        }
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
            this.#set_validity(this.control, "false");
            this.errorElement.innerText = this.textHelper;
        } else {
            this.#set_validity(this.control, "true");
            this.errorElement.innerText = errorText;
        }
    }

    #length_validation(event, min, max, errorText) {
        if (this.control.value.length < min || this.control.value.length > max) {
            this.errorElement.innerText = errorText;
            this.#set_validity(this.control, "true");
        } else {
            this.#set_validity(this.control, "false");
            this.errorElement.innerText = this.textHelper;
        }
    }

    #equal_with_validation(event, equalWith, errorText) {
        if (this.control.value === equalWith.content) {
            this.#set_validity(this.control, "false");
            this.errorElement.innerText = this.textHelper;
        } else {
            this.#set_validity(this.control, "true");
            this.errorElement.innerText = errorText;
        }
    }

    #required_validation(event) {
        if (this.control.value === "") {
            this.#set_validity(this.control, "true");
            this.errorElement.innerText = "لطفا این فیلد را پر کنید.";
        }
    }

    #set_validity(control, error) {
        if (error === "true") {
            this.error = true;
        } else if (error === "false") {
            this.error = false;
        }
        this.control.setAttribute("error", error);
        this.errorElement.setAttribute("error", error);
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
        return this.errorCount === 0;
    }

    static #error_count(controls) {
        let errorCount = 0;
        for (let control of controls) {
            if (control.error === true)
                errorCount++;
        }
        return errorCount;
    }

    add_control(control) {
        this.controls.push(control);
    }

    close() {
        this.submitButton.addEventListener("click", () => this.#check_form_validate(event));
    }

    #check_form_validate(event) {
        this.errorCount = FormValidate.#error_count(this.controls);
        if (this.errorCount === 0)
            this.form.submit();
    }
}