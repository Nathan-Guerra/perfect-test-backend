
let btnDeleteEls = $('.btn-remove');
Array.from(btnDeleteEls).map(val => val.onclick = ajaxRemove);

function ajaxRemove(e) {
    e.preventDefault();
    $.ajax({
        url: $(this).attr('href'),
        method: 'delete',
        data: {
            '_token': $(this).data('token'),
        },
        success: (data, status, jqXHR) => {
            alert('Deletado com sucesso!');
            location.reload();
        },
        error: (jqXHR, status, errorThrown) => {
            alert('Erro ao deletar.');
        }
    });
}
