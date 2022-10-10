import './bootstrap';
import createComment from "./comment/create-comment";
import deleteComment from './comment/delete-comment';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

deleteComment();
createComment();

Alpine.start();
