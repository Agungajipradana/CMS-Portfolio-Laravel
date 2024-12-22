import { bootstrap, enableTooltip, enablePopover } from "./plugins/bootstrap";

try {
    enableTooltip(true);
    enablePopover(true);
    window.bootstrap = bootstrap;
} catch (exception) {
    console.error(exception);
}