let btn_newTasks = document.querySelector(".btn_newTasks");
let close_btn = document.querySelector(".close_btn");
let popup = document.querySelector(".popup");

let btn_edit = document.querySelectorAll(".btn_edit");
let close_btn_edit = document.querySelectorAll(".close_btn_edit");

let taskId = 0

btn_edit.forEach(btn => {
    btn.addEventListener("click", () => {
        // Obtenha o ID associado ao botão de edição clicado
        taskId = btn.getAttribute('value');
        let edit_popup = document.querySelector(`#edit_popup_${taskId}`);
        if (edit_popup) {
            edit_popup.style.visibility = "visible";
        }
    });
});

close_btn_edit.forEach(btn => {
    btn.addEventListener("click", () => {
        // Obtenha o ID associado ao botão de fechar clicado
        let edit_popup = document.querySelector(`#edit_popup_${taskId}`);
        if (edit_popup) {
            edit_popup.style.visibility = "hidden";
        }
    });
});

btn_newTasks.addEventListener("click", () => {
    popup.style.visibility = "visible";
});

close_btn.addEventListener("click", () => {
    popup.style.visibility = "hidden";
});