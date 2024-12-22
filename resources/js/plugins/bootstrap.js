import * as bootstrap from "bootstrap";

const enableTooltip = (enable = true) => {
    if (enable) {
        const tooltipTriggerList = document.querySelectorAll(
            '[data-bs-toggle="tooltip"]'
        );
        [...tooltipTriggerList].map(
            (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
        );
    }
};

const enablePopover = (enable = true) => {
    if (enable) {
        const popoverTriggerList = document.querySelectorAll(
            '[data-bs-toggle="popover"]'
        );
        [...popoverTriggerList].map(
            (popoverTriggerEl) => new bootstrap.Popover(popoverTriggerEl)
        );
    }
};

export { bootstrap, enableTooltip, enablePopover };