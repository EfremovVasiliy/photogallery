import './bootstrap';
import createComment from './comment/create-comment';
import deleteComment from './comment/delete-comment';
import updateComment from './comment/update-comment';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

deleteComment();
createComment();
updateComment();

Alpine.start();
