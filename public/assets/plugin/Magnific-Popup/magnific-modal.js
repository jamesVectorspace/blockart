"use strict";
class ModalManager {
    constructor() {
        this.openModals = [];
    }

    openModal(target, effect) {
        const modalContentId = '#' + target;
        this.openModals.push(modalContentId);

        $.magnificPopup.open({
            items: {
                src: modalContentId
            },
            type: 'inline',
            removalDelay: 100,
            mainClass: effect,
        });
    }

    closeModal() {
        const lastModal = this.openModals.pop();
        $.magnificPopup.close();
    }
}

const modalManager = new ModalManager();

$(document).ready(function () {
    $(document).on('click', '.modal-trigger', function () {
        const target = $(this).data('target');
        const effect = $(this).data('effect');
        modalManager.openModal(target, effect);
    });

    $(document).on('click', '.close-popup', function () {
        modalManager.closeModal();
    });
});


$(document).on('click', '.modal-mest', function () {
    $('#generateFolderOnModal').removeClass('hidden')
    $('#updateFolderItemForm').addClass('hidden')
});
$(document).on('click', '.close-popup-mest', function () {
    $('#generateFolderOnModal').addClass('hidden')
    $('#updateFolderItemForm').removeClass('hidden')
});
