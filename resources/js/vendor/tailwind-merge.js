import * as tailwindMerge from "tailwind-merge";

const { twMerge } = tailwindMerge;

function applyTailwindMerge() {
    document.querySelectorAll("[data-tw-merge]").forEach((el) => {
        el.setAttribute("class", twMerge(el.getAttribute("class")));
        el.removeAttribute("data-tw-merge");
    });
}

applyTailwindMerge();  // Run on initial page load

window.twMerge = tailwindMerge;
window.applyTailwindMerge = applyTailwindMerge;
