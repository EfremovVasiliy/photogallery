'use strict'

import jQuery from "jquery";
import createCommentField from "./comment-field";

export default function updateComment() {
    jQuery(document).ready(function($) {
        const commentField = document.querySelector('.comment-field');

        commentField.addEventListener('submit', (e) => {

            e.preventDefault();

            if (e.target.classList.contains('comment-update-form')) {

                const commentId = e.target.querySelector('[data-comment-id]').getAttribute('data-comment-id');
                const commentParagraph = commentField.querySelector(`.comment-id-${commentId}`);
                const commentText = commentParagraph.textContent;
                const commentParagraphUpdateField = commentParagraph.parentElement.querySelector('.visually-hidden');
                const commentParagraphUpdateFieldTextarea = commentParagraphUpdateField.querySelector('#comment_textarea-update');
                const edit = commentParagraphUpdateField.querySelector('.edit');
                const cancel = commentParagraphUpdateField.querySelector('.cancel');

                commentParagraphUpdateField.classList.remove('visually-hidden');
                commentParagraph.classList.add('visually-hidden');

                edit.addEventListener('click', (e) => {

                    const updateCommentText = commentParagraphUpdateFieldTextarea.value;

                    $.ajax({
                        url: '/comment-update',
                        type: 'PUT',
                        data: JSON.stringify({"commentText": updateCommentText, commentId}),
                        headers: {
                            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
                            'accept': 'application/json',
                        },
                        success: function(data) {
                            createCommentField(data);
                        },
                        error: function(msg) {
                            console.log(msg);
                        }
                    });
                });

                cancel.addEventListener('click', (e) => {
                    commentParagraphUpdateField.classList.add('visually-hidden');
                    commentParagraph.classList.remove('visually-hidden');
                });
            }
        });
    });
}
