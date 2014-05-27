var Mayhak = {};

Mayhak.StatusBoard = {
    $statusBoardModal: $('#mayhakStatusBoardModal'),
    $statusBoardEmployeeList: $('#mayhakStatusBoardEmployeeList'),
    $statusBoardModalFade: $('#mayhakStatusBoardFade'),
    scrollModal: function () {
        Mayhak.StatusBoard.$statusBoardModal.css('margin-top', $(window).scrollTop() + 50);
        Mayhak.StatusBoard.$statusBoardModalFade.css('margin-top', $(window).scrollTop());
    },
    openModal: function (e) {

        e.preventDefault();

        var employee = {
            full_name: $(this).attr('data-employee-full-name'),
            personal_phone: $(this).attr('data-employee-personal-phone'),
            id: $(this).attr('data-employee-id'),
            comment: $(this).attr('data-employee-comment'),
            status: $(this).attr('data-employee-status')
        };

        Mayhak.StatusBoard.$statusBoardModal.attr('data-employee-id', employee.id);
        $('#mayhakStatusBoardEmployeeFullName').html(employee.full_name + ' <small>' + employee.personal_phone + '</small>');
        $('#mayhakStatusBoardEmployeeComment').text(employee.comment);

        $('input[name=mayhakStatusBoardEmployeeStatus]').prop('checked', false);

        $('input[name=mayhakStatusBoardEmployeeStatus][value=' + employee.status + ']').prop('checked', true);

        Mayhak.StatusBoard.showModal();

        return false;
    },
    closeModal: function (e) {

        e.preventDefault();

        Mayhak.StatusBoard.hideModal();

        return false;
    },
    updateEmployee: function (e) {

        e.preventDefault();

        var employee_id = Mayhak.StatusBoard.$statusBoardModal.attr('data-employee-id'),
            status = $(this).attr('data-employee-status');

        $.request('statusBoard::onEmployeeUpdate', {
            update: {'statusBoard::board': '#mayhakStatusBoardEmployeeList'},
            data: {
                id: employee_id,
                status: status
            }
        });

        Mayhak.StatusBoard.hideModal();

        return false;
    },
    showModal: function () {
        Mayhak.StatusBoard.$statusBoardModal.css('display', 'block');
        Mayhak.StatusBoard.$statusBoardModalFade.css('display', 'block')
    },
    hideModal: function () {
        Mayhak.StatusBoard.$statusBoardModal.css('display', 'none');
        Mayhak.StatusBoard.$statusBoardModalFade.css('display', 'none')

    }
};

jQuery(function ($) {
    Mayhak.StatusBoard.$statusBoardEmployeeList.on('tap click', 'div.mayhak-statusboard-employee', Mayhak.StatusBoard.openModal);
    Mayhak.StatusBoard.$statusBoardModal.on('tap click', 'div.mayhak-statusboard-update', Mayhak.StatusBoard.updateEmployee);
    Mayhak.StatusBoard.$statusBoardModal.on('tap click', 'div.mayhak-statusboard-cancel', Mayhak.StatusBoard.closeModal);
    $(document).on('scroll', window, Mayhak.StatusBoard.scrollModal);
});
