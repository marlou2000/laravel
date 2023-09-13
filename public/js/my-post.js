const form = document.getElementById("form-post");

document.querySelector('.modify-posts-btn').addEventListener('click', function(event){
    
    document.querySelector('.modify-done-btn-container').style.display = "block";
    document.querySelector('.modify-posts-btn').style.display = "none";

    var containers = document.querySelectorAll('.modify-btn-container');
    
    containers.forEach(function(container) {
        container.style.display = "block";
    });

});

document.querySelector('.modify-posts-done-btn').addEventListener('click', function(event){
    
    document.querySelector('.modify-done-btn-container').style.display = "none";
    document.querySelector('.modify-posts-btn').style.display = "block";

    var containers = document.querySelectorAll('.modify-btn-container');
    
    containers.forEach(function(container) {
        container.style.display = "none";
    });

});

document.addEventListener('click', function(event) {

    const editBtn = event.target.closest('.edit-post-btn');
    if (editBtn) {
        event.preventDefault();
        const postContainer = editBtn.closest('.post-container');
        const bodyTextarea = postContainer.querySelector('.body-container textarea');
        const saveCancelBtnContainer = postContainer.querySelector('.save-cancel-btn-container');

        bodyTextarea.removeAttribute('disabled');
        saveCancelBtnContainer.style.display = 'flex';
    }

    const deleteBtn = event.target.closest('.delete-post-btn');
    if (deleteBtn) {
        event.preventDefault();
        
        const postContainer = event.target.closest('.post-container');
        const form = postContainer.closest("#form-post");

        form.action = '/deleteMyPost';

        form.submit();
    }

    const saveBtn = event.target.closest('.save-edit-btn');
    if (saveBtn) {
        event.preventDefault();
        
        const postContainer = event.target.closest('.post-container');
        const form = postContainer.closest("#form-post");

        form.action = '/updateMyPost';

        form.submit();
    }

    const cancelEditBtn = event.target.closest('.cancel-edit-btn');
    if (cancelEditBtn) {
        event.preventDefault();
        const postContainer = cancelEditBtn.closest('.post-container');
        const bodyTextarea = postContainer.querySelector('.body-container textarea');
        const saveCancelBtnContainer = postContainer.querySelector('.save-cancel-btn-container');

        bodyTextarea.setAttribute('disabled',"true");
        saveCancelBtnContainer.style.display = 'none';
    }
});
