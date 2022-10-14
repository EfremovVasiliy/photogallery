import './bootstrap';
import createComment from './comment/create-comment';
import deleteComment from './comment/delete-comment';
import updateComment from './comment/update-comment';
import liker from './likes/liker';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

deleteComment();
createComment();
updateComment();

liker();

Alpine.start();
