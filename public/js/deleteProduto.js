function deleteProduto(id) {
    $.ajax({
        url: "/produto/excluir/" + id,
        type: "DELETE",
        success: function (response) {
            $("#produto_" + id).remove();
            $("#exampleModal_" + id).modal("hide");
        },
    });
}
