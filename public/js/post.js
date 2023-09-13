function toggleModificationMode() {
    const modifyDoneBtnContainer = document.querySelector('.modify-done-btn-container');
    const modifyPostsBtn = document.querySelector('.modify-posts-btn');
    const modifyBtnContainers = document.querySelectorAll('.modify-btn-container');

    modifyDoneBtnContainer.style.display = 'block';
    modifyPostsBtn.style.display = 'none';

    modifyBtnContainers.forEach(function (container) {
        container.style.display = 'block';
    });
}

function exitModificationMode() {
    const modifyDoneBtnContainer = document.querySelector('.modify-done-btn-container');
    const modifyPostsBtn = document.querySelector('.modify-posts-btn');
    const modifyBtnContainers = document.querySelectorAll('.modify-btn-container');

    modifyDoneBtnContainer.style.display = 'none';
    modifyPostsBtn.style.display = 'block';

    modifyBtnContainers.forEach(function (container) {
        container.style.display = 'none';
    });
}

// Attach a click event listener to the parent container
document.addEventListener('click', function (event) {
    const target = event.target;

    if (target.classList.contains('edit-post-btn')) {
        event.preventDefault();
        const postContainer = target.closest('.post-container');
        const bodyTextarea = postContainer.querySelector('.body-container textarea');
        const saveCancelBtnContainer = postContainer.querySelector('.save-cancel-btn-container');

        bodyTextarea.removeAttribute('disabled');
        saveCancelBtnContainer.style.display = 'flex';
    } else if (target.classList.contains('delete-post-btn')) {
        event.preventDefault();
        const postContainer = target.closest('.post-container');
        const form = postContainer.closest("#form-post");

        form.action = '/deletePostAdmin';
        form.submit();
    } else if (target.classList.contains('save-edit-btn')) {
        event.preventDefault();
        const postContainer = target.closest('.post-container');
        const form = postContainer.closest("#form-post");

        form.action = '/updatePostAdmin';
        form.submit();
    } else if (target.classList.contains('cancel-edit-btn')) {
        event.preventDefault();
        const postContainer = target.closest('.post-container');
        const bodyTextarea = postContainer.querySelector('.body-container textarea');
        const saveCancelBtnContainer = postContainer.querySelector('.save-cancel-btn-container');

        bodyTextarea.setAttribute('disabled', "true");
        saveCancelBtnContainer.style.display = 'none';
    }
});

// Attach a click event listener to the "Modify Posts" button
document.querySelector('.modify-posts-btn').addEventListener('click', function () {
    toggleModificationMode();
});

// Attach a click event listener to the "Done" button
document.querySelector('.modify-posts-done-btn').addEventListener('click', function () {
    exitModificationMode();
});
