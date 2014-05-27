var Cn = {};

Cn.StatusBoard = {
    $statusBoardModal: $('#cnStatusBoardModal'),
    $statusBoardEmployeeList: $('#cnStatusBoardEmployeeList'),
    $statusBoardModalFade: $('#cnStatusBoardFade'),
    scrollModal: function () {
        Cn.StatusBoard.$statusBoardModal.css('margin-top', $(window).scrollTop() + 50);
        Cn.StatusBoard.$statusBoardModalFade.css('margin-top', $(window).scrollTop());
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

        Cn.StatusBoard.$statusBoardModal.attr('data-employee-id', employee.id);
        $('#cnStatusBoardEmployeeFullName').html(employee.full_name + ' <small>' + employee.personal_phone + '</small>');
        $('#cnStatusBoardEmployeeComment').text(employee.comment);

        $('input[name=cnStatusBoardEmployeeStatus]').prop('checked', false);

        $('input[name=cnStatusBoardEmployeeStatus][value=' + employee.status + ']').prop('checked', true);

        Cn.StatusBoard.showModal();

        return false;
    },
    closeModal: function (e) {

        e.preventDefault();

        Cn.StatusBoard.hideModal();

        return false;
    },
    updateEmployee: function (e) {

        e.preventDefault();

        var employee_id = Cn.StatusBoard.$statusBoardModal.attr('data-employee-id'),
            status = $(this).attr('data-employee-status');

        $.request('statusBoard::onEmployeeUpdate', {
            update: {'statusBoard::board': '#cnStatusBoardEmployeeList'},
            data: {
                id: employee_id,
                status: status
            }
        });

        Cn.StatusBoard.hideModal();

        return false;
    },
    showModal: function () {
        Cn.StatusBoard.$statusBoardModal.css('display', 'block');
        Cn.StatusBoard.$statusBoardModalFade.css('display', 'block')
    },
    hideModal: function () {
        Cn.StatusBoard.$statusBoardModal.css('display', 'none');
        Cn.StatusBoard.$statusBoardModalFade.css('display', 'none')

    }
};

jQuery(function ($) {
    Cn.StatusBoard.$statusBoardEmployeeList.on('tap', 'div.cn-statusboard-employee', Cn.StatusBoard.openModal);
    Cn.StatusBoard.$statusBoardModal.on('tap click', 'div.cn-statusboard-update', Cn.StatusBoard.updateEmployee);
    Cn.StatusBoard.$statusBoardModal.on('tap click', 'div.cn-statusboard-cancel', Cn.StatusBoard.closeModal);
    $(document).on('scroll', window, Cn.StatusBoard.scrollModal);
});
