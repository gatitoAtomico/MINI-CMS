const draggables = document.querySelectorAll(".draggable");
const containers = document.querySelectorAll(".drag-container");

draggables.forEach((draggable) => {
    draggable.addEventListener("dragstart", () => {
        draggable.classList.add("dragging");
    });
    draggable.addEventListener("dragend", () => {
        draggable.classList.remove("dragging");
    });
});

containers.forEach((cont) => {
    cont.addEventListener("dragover", (e) => {
        e.preventDefault();
        const draggable = document.querySelector(".dragging");
        cont.appendChild(draggable);
    });
});
