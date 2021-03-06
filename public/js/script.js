
//Scrip para que no se cambie de pagina si no se han confirmado los datos y que se cambie el boton a aviable cuando haya un cambio en la pagina

let formTabla = document.getElementById("principal");
console.log(formTabla);

let inputs = formTabla.getElementsByTagName("input");

let enviar = document.getElementById("actualizar");

let paginadores = document.querySelectorAll("a.page-link");

let puedeSalir = true;

if (sessionStorage.getItem("url") != null) {
    let cookieUrl = sessionStorage.getItem("url");
    sessionStorage.removeItem("url");
    window.location.href = cookieUrl;
}

for (let i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener("change", function() {
        enviar.innerHTML = "Confirmar";
        enviar.removeAttribute("disabled");
        puedeSalir = false;
    });
}

for (let i = 0; i < paginadores.length; i++) {
    paginadores[i].addEventListener("click", function(e) {
        if (!puedeSalir) {
            if (confirm("¿Confirmar cambios antes de cambiar de página?")) {
                formTabla.submit();
                e.preventDefault();
            }
            sessionStorage.setItem("url", `${this.getAttribute("href")}`);
        }
    });
}