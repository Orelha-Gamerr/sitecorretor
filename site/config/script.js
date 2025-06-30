function verificar(){
    var input = document.getElementById("nome");
    var nome = input.value;
    var input = document.getElementById("senha");
    var senha = input.value;

    if(nome === "leandroluciettocorretor"){
        if(senha === "lucietto1234"){
            window.location.href = "administrador457736472034767842370467623046452427554239747526492532.html"; // Substitua pelo caminho da sua página
        }else{
            alert("Senha incorreta")
        }
    }else{
        alert("Nome incorreto")
    }
}