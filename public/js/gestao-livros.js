document.addEventListener("DOMContentLoaded", function () {
    var livroModal = document.getElementById("edita-livro");
    
    livroModal.addEventListener("show.bs.modal", function (event) {
        var button = event.relatedTarget;
        var values = JSON.parse(button.getAttribute('data-bs-values'))

        livroModal.querySelector("#id").value = values['id'];
        livroModal.querySelector("#title").value = values['titulo'];
        livroModal.querySelector("#descricao").value = values['descricao'];
        livroModal.querySelector("#autor").value = values['autor_id'];
        livroModal.querySelector("#data_publicacao").value = values['data_publicacao'];
    });
});
