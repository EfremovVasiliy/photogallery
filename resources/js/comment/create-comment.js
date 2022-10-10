'use strict';

import jQuery from 'jquery';
import createCommentField from './comment-field';

export default function createComment() {
    jQuery(document).ready(function($) {
        $('.comment-form').on('submit', (e) => {
            e.preventDefault();
            let commentText = $('#comment_textarea').val();
            let postId = $('#post_id').val();

            $.ajax({
                url: '/comment-create',
                type: 'POST',
                data: JSON.stringify({commentText, postId}),
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
                    'accept': 'application/json',
                },
                success: function (data) {
                    $('#comment_textarea').val('');
                    createCommentField(data);
                },
                error: function (msg) {
                    console.log('error');
                }
            });
        });
    });
}
