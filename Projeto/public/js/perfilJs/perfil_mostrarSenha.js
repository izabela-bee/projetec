document.getElementById("toggleSenha").addEventListener("click", function(){
    const input = document.getElementById("senha");

    if(input.type === "password") {
        input.type = "text";
        this.src = "../public/img/formsComponents/eye.png";
    } else {
        input.type = "password";
        this.src = "../public/img/formsComponents/visibility-off.png";
    }
});