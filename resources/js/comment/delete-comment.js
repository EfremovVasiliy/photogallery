'use strict';

import jQuery from 'jquery';
import createCommentField from './comment-field';

export default function deleteComment() {
    jQuery(document).ready(function($) {
        $('.comment-field').on('submit', (e) => {

            e.preventDefault();

            const commentId = e.target.querySelector('[data-comment-id]').getAttribute('data-comment-id');

            $.ajax({
                url: '/comment-delete',
                type: 'DELETE',
                data: JSON.stringify({commentId}),
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
                    'accept': 'application/json',
                },
                success: function (data) {
                    // console.log(data);
                    createCommentField(data);
                },
                error: function (msg) {
                    console.log('error');
                }
            });
        });
    });
}
