'use strict';

export default function createCommentField(data) {

    const commentField = document.querySelector('.comment-field');
    const csrfToken = document.querySelector('meta[name="csrf-token"]');

    let comments;

    commentField.innerHTML = '';

    if (data === []) {
        return false;
    } else {
        data.forEach((item) => {
            let forms = '';
            if (item.userId === item.authorId) {
                forms = `
                <div class="actions d-flex justify-content-between mb-1">
                    <small class="me-1">
                        <form class="comment-update-form" action="http://photogallery.test/comment-update">
                            <input type="hidden" name="_method" value="PUT">
                              <input type="hidden" name="_token" value="${csrfToken.content}">
                              <input data-comment-id="${item.id}" type="hidden" name="id">
                            <input type="submit" value="Update" class="btn btn-sm btn-primary">
                        </form>
                    </small>
                    <small class="">
                        <form class="comment-delete-form" action="http://photogallery.test/comment-delete" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="${csrfToken.content}">
                            <input data-comment-id="${item.id}" type="hidden" name="id">
                            <input type="submit" value="Delete" class="btn btn-sm btn-danger">
                        </form>
                    </small>
                </div>
            `;
            }
            const content = `
            <div class="comment-item">
                <div class="d-flex justify-content-between">
                    <small>${item.authorName}</small>
                    ${forms}
                </div>
                <p>${item.commentText}</p>
            </div>
            <hr>
        `;
            comments += content;
        });
        comments = comments.slice(10);
        commentField.innerHTML = comments;
    }
}
